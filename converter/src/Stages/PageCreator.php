<?php
/**
 * Stage 1: Page Files Creation
 * 
 * This stage handles the extraction and conversion of HTML pages
 * to PHP format with dynamic linking capabilities.
 * 
 * Process:
 * 1. Read all HTML files from front/ directory
 * 2. Extract main content from each page
 * 3. Convert static links to dynamic PHP calls
 * 4. Generate PHP page files in view/default/sayfa/
 * 
 * @package HtmlToPhpConverter\Stages
 * @version 1.0.0
 */

class PageCreator {
    
    /**
     * Statistics tracking
     * 
     * @var array
     */
    private $stats = [
        'files_processed' => 0,
        'pages_created' => 0,
        'links_converted' => 0
    ];
    
    /**
     * Execute Stage 1
     * 
     * @return bool True if successful, false otherwise
     */
    public function execute() {
        // Print stage header
        Console::header(
            "STAGE 1: Page Files Creation",
            "Creating PHP page files from HTML sources"
        );
        
        Console::dim("Process:");
        Console::dim("  1. Extract main content from HTML");
        Console::dim("  2. Convert static links to dynamic PHP");
        Console::dim("  3. Generate view/default/sayfa/*.php files");
        Console::line();
        
        // Get HTML files
        $htmlFiles = FileManager::getHtmlFiles(Config::$frontDir);
        
        if (empty($htmlFiles)) {
            Console::error("ERROR: No HTML files found in front/ directory");
            return false;
        }
        
        Console::info("Found " . count($htmlFiles) . " HTML files:");
        Console::line();
        
        // List files
        foreach ($htmlFiles as $index => $file) {
            echo "  [" . ($index + 1) . "] " . FileManager::getBasename($file) . "\n";
        }
        
        Console::line();
        Console::warning("All files will be processed.");
        Console::line();
        
        // Confirm before proceeding
        if (!Console::confirm("Do you want to continue?")) {
            Console::info("Operation cancelled by user.");
            return false;
        }
        
        Console::line();
        Console::info("Starting conversion...");
        Console::line();
        
        // Process each file
        foreach ($htmlFiles as $file) {
            $this->processHtmlFile($file);
        }
        
        // Print statistics
        $this->printStats();
        
        return true;
    }
    
    /**
     * Process a single HTML file
     * 
     * @param string $filePath Full path to HTML file
     * @return void
     */
    private function processHtmlFile($filePath) {
        $filename = FileManager::getFilenameWithoutExtension($filePath);
        Console::info("Processing file: $filename.html");
        
        // Read HTML content
        $html = FileManager::readFile($filePath);
        
        if ($html === false) {
            Console::error("  ERROR: Failed to read file");
            return;
        }
        
        Console::dim("  - Reading HTML content");
        
        // Extract main content
        $content = $this->extractMainContent($html, $filename);
        Console::dim("  - Extracting main content");
        
        // Convert links
        $result = LinkConverter::convertAllLinks($content);
        $content = $result['content'];
        $this->stats['links_converted'] += $result['linksConverted'];
        Console::dim("  - Converting links (" . $result['linksConverted'] . " links)");
        
        // Create PHP file
        $this->createPageFile($filename, $content);
        
        $this->stats['files_processed']++;
        Console::line();
    }
    
    /**
     * Extract main content from HTML file
     * 
     * Extracts content between Header and Footer using multiple strategies:
     * 1. Try standard tags (<header>, <footer>)
     * 2. Try comment markers
     * 3. Try common class patterns
     * 
     * @param string $html Full HTML content
     * @param string $filename Page filename (without extension)
     * @return string Extracted content
     */
    private function extractMainContent($html, $filename) {
        $content = '';
        
        // STRATEGY 1: Try to find content after <header> or </Header> tag
        $headerEndPos = false;
        
        // Try </Header> (capital H)
        if (preg_match('/<\/[Hh]eader>/i', $html, $matches, PREG_OFFSET_CAPTURE)) {
            $headerEndPos = $matches[0][1] + strlen($matches[0][0]);
        }
        // Try comment marker
        elseif (preg_match('/<!--\s*END_HEADER\s*-->/i', $html, $matches, PREG_OFFSET_CAPTURE)) {
            $headerEndPos = $matches[0][1] + strlen($matches[0][0]);
        }
        
        // STRATEGY 2: Try to find content before <footer> or footer markers
        $footerStartPos = false;
        
        // Try <footer> tag
        if (preg_match('/<[Ff]ooter/i', $html, $matches, PREG_OFFSET_CAPTURE)) {
            $footerStartPos = $matches[0][1];
        }
        // Try <div class="the_footer"
        elseif (preg_match('/<div\s+class=["\']the_footer/i', $html, $matches, PREG_OFFSET_CAPTURE)) {
            $footerStartPos = $matches[0][1];
        }
        // Try <div class="footer"
        elseif (preg_match('/<div\s+class=["\']footer/i', $html, $matches, PREG_OFFSET_CAPTURE)) {
            $footerStartPos = $matches[0][1];
        }
        // Try comment marker
        elseif (preg_match('/<!--\s*START_FOOTER\s*-->/i', $html, $matches, PREG_OFFSET_CAPTURE)) {
            $footerStartPos = $matches[0][1];
        }
        
        // Extract content between header and footer
        if ($headerEndPos !== false && $footerStartPos !== false && $footerStartPos > $headerEndPos) {
            $content = substr($html, $headerEndPos, $footerStartPos - $headerEndPos);
            $content = trim($content);
            
            // Clean up extra whitespace
            $content = preg_replace('/^\s*\n\s*\n/m', "\n", $content);
        } else {
            Console::warning("  WARNING: Could not auto-detect content boundaries");
            Console::dim("    TIP: Add <!-- END_HEADER --> and <!-- START_FOOTER --> markers to HTML");
            
            // Fallback: extract everything between <body> and </body>
            if (preg_match('/<body[^>]*>(.*?)<\/body>/s', $html, $matches)) {
                $content = $matches[1];
                Console::dim("    Using full <body> content as fallback");
            }
        }
        
        return $content;
    }
    
    /**
     * Create PHP page file
     * 
     * Generates a PHP file with:
     * - Standard header with variable documentation
     * - SEO settings block (page title, OG tags, meta keywords)
     * - Converted page content
     * - Special handling for iletisim (contact) page: merges with existing form
     * 
     * @param string $filename Page name (without extension)
     * @param string $content Page content
     * @return void
     */
    private function createPageFile($filename, $content) {
        // Build PHP file content with SEO settings
        $phpContent = Config::getPhpFileHeader($filename);
        
        // Special handling for iletisim (contact) page
        if ($filename === 'iletisim') {
            // Load existing iletisim.php if it exists
            $existingFile = Config::$sayfaDir . 'iletisim.php';
            if (file_exists($existingFile)) {
                // Read existing contact form
                $existingContent = FileManager::readFile($existingFile);
                
                // Remove the header section from existing content (first 5 lines roughly)
                // Keep just the form part
                if (preg_match('/(<\?php Form::Open.*?<\/div>\s*<\?php Form::Close\(\); \?>)/s', $existingContent, $matches)) {
                    $formPart = $matches[1];
                    // Add new content from HTML first, then form below it
                    $phpContent .= $content . "\n\n";
                    $phpContent .= $formPart . "\n";
                    Console::dim("  - Merging with existing contact form");
                    
                    // Write file
                    $pageFile = Config::$sayfaDir . $filename . '.php';
                    
                    if (FileManager::writeFile($pageFile, $phpContent)) {
                        Console::dim("  - Created file: view/default/sayfa/$filename.php");
                        $this->stats['pages_created']++;
                    } else {
                        Console::error("  ERROR: Failed to create $filename.php");
                    }
                    
                    return;
                }
            }
        }
        
        // Standard file creation (non-iletisim or iletisim without existing file)
        $phpContent .= $content . "\n";
        
        // Write file
        $pageFile = Config::$sayfaDir . $filename . '.php';
        
        if (FileManager::writeFile($pageFile, $phpContent)) {
            Console::dim("  - Created file: view/default/sayfa/$filename.php");
            $this->stats['pages_created']++;
        } else {
            Console::error("  ERROR: Failed to create $filename.php");
        }
    }
    
    /**
     * Print conversion statistics
     * 
     * @return void
     */
    private function printStats() {
        Console::separator();
        Console::statsBox("Summary", [
            "Files Processed" => $this->stats['files_processed'],
            "Pages Created" => $this->stats['pages_created'],
            "Links Converted" => $this->stats['links_converted']
        ]);
        
        Console::complete("Stage 1 completed successfully!");
        Console::line();
    }
    
    /**
     * Get statistics
     * 
     * @return array Statistics array
     */
    public function getStats() {
        return $this->stats;
    }
}
