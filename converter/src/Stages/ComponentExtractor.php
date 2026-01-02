<?php
/**
 * Stage 2: Component Extraction (Header & Footer)
 * 
 * This stage handles the extraction of reusable components
 * like Header and Footer from HTML files using intelligent detection.
 * 
 * Detection Strategy (3-level fallback):
 * 1. AUTO: Try standard HTML tags (<header>, <footer>)
 * 2. MARKERS: Look for comment markers (<!-- START_HEADER -->, <!-- END_HEADER -->)
 * 3. MANUAL: Ask user for custom CSS selector (.class, #id, or tag)
 * 
 * Process:
 * 1. Read index.html from front/ directory (primary reference)
 * 2. Extract Header component using 3-level detection
 * 3. Extract Footer component using 3-level detection
 * 4. Convert static links to dynamic PHP calls
 * 5. Generate ust.php (Header) and alt.php (Footer)
 * 
 * @package HtmlToPhpConverter\Stages
 * @version 2.0.0
 */

class ComponentExtractor {
    
    /**
     * Statistics tracking
     * 
     * @var array
     */
    private $stats = [
        'components_created' => 0,
        'links_converted' => 0
    ];
    
    /**
     * Execute Stage 2
     * 
     * @return bool True if successful, false otherwise
     */
    public function execute() {
        // Print stage header
        Console::header(
            "STAGE 2: Component Extraction",
            "Extracting Header and Footer components"
        );
        
        Console::dim("Process:");
        Console::dim("  1. Extract Header component with smart detection");
        Console::dim("  2. Extract Footer component with smart detection");
        Console::dim("  3. Convert static links to dynamic PHP");
        Console::dim("  4. Generate bolum/ust.php and bolum/alt.php");
        Console::line();
        Console::dim("Detection method:");
        Console::dim("  - Comment markers only (<!-- START_HEADER -->, <!-- END_HEADER -->)");
        Console::dim("  - Comment markers only (<!-- START_FOOTER -->, <!-- END_FOOTER -->)");
        Console::line();
        
        // Get HTML files
        $htmlFiles = FileManager::getHtmlFiles(Config::$frontDir);
        
        if (empty($htmlFiles)) {
            Console::error("ERROR: No HTML files found in front/ directory");
            return false;
        }
        
        // Prefer index.html as reference file
        $referenceFile = null;
        $filename = '';
        
        foreach ($htmlFiles as $file) {
            $basename = FileManager::getBasename($file);
            if (strtolower($basename) === 'index.html') {
                $referenceFile = $file;
                $filename = $basename;
                break;
            }
        }
        
        // If no index.html, use first file
        if ($referenceFile === null) {
            $referenceFile = $htmlFiles[0];
            $filename = FileManager::getBasename($referenceFile);
        }
        
        Console::info("Reference file: $filename");
        if (strtolower($filename) === 'index.html') {
            Console::dim("  (Using recommended file: index.html)");
        } else {
            Console::warning("  (Note: index.html not found, using first available file)");
        }
        Console::line();
        
        // Confirm before proceeding
        if (!Console::confirm("Do you want to continue?")) {
            Console::info("Cancelled");
            return false;
        }
        
        Console::line();
        Console::success("Starting component extraction...");
        Console::line();
        
        // Read HTML content
        $html = FileManager::readFile($referenceFile);
        
        if ($html === false) {
            Console::error("Failed to read reference file");
            return false;
        }
        
        // Extract and create Header
        $this->extractAndCreateHeader($html);
        
        // Extract and create Footer
        $this->extractAndCreateFooter($html);
        
        // Print statistics
        $this->printStats();
        
        return true;
    }
    
    /**
     * Extract Header component and create ust.php
     * 
     * Extracts content between <!-- START_HEADER --> and <!-- END_HEADER --> markers
     * Including the marker lines themselves
     * 
     * @param string $html Full HTML content
     * @return void
     */
    private function extractAndCreateHeader($html) {
        Console::info("Extracting Header component...");
        
        $headerContent = null;
        $method = '';
        
        // Extract content from START_HEADER to END_HEADER (inclusive)
        if (preg_match('/(<!--\s*START_HEADER\s*-->.*?<!--\s*END_HEADER\s*-->)/s', $html, $matches)) {
            $headerContent = trim($matches[1]);
            $method = 'comment markers (<!-- START_HEADER --> to <!-- END_HEADER -->)';
            Console::success("  ✓ Found Header using comment markers");
        }
        else {
            Console::error("  ✗ Could not find Header markers");
            Console::warning("  ! Please add <!-- START_HEADER --> and <!-- END_HEADER --> in your HTML");
            return;
        }
        
        if ($headerContent === null) {
            Console::error("  ✗ Could not extract Header");
            return;
        }
        
        $headerContent = trim($headerContent);
        
        // Convert links
        $result = LinkConverter::convertAllLinks($headerContent);
        $headerContent = $result['content'];
        $this->stats['links_converted'] += $result['linksConverted'];
        
        Console::dim("  Method: $method");
        Console::dim("  Size: " . strlen($headerContent) . " characters");
        
        // Create ust.php with existing PHP code preserved
        $this->createHeaderFile($headerContent);
    }
    
    /**
     * Extract Footer component and create alt.php
     * 
     * Extracts content between <!-- START_FOOTER --> and <!-- END_FOOTER --> markers
     * Including the marker lines themselves
     * 
     * @param string $html Full HTML content
     * @return void
     */
    private function extractAndCreateFooter($html) {
        Console::info("Extracting Footer component...");
        
        $footerContent = null;
        $method = '';
        
        // Extract content from START_FOOTER to END_FOOTER (inclusive)
        if (preg_match('/(<!--\s*START_FOOTER\s*-->.*?<!--\s*END_FOOTER\s*-->)/s', $html, $matches)) {
            $footerContent = trim($matches[1]);
            $method = 'comment markers (<!-- START_FOOTER --> to <!-- END_FOOTER -->)';
            Console::success("  ✓ Found Footer using comment markers");
        }
        else {
            Console::error("  ✗ Could not find Footer markers");
            Console::warning("  ! Please add <!-- START_FOOTER --> and <!-- END_FOOTER --> in your HTML");
            return;
        }
        
        if ($footerContent === null) {
            Console::error("  ✗ Could not extract Footer");
            return;
        }
        
        $footerContent = trim($footerContent);
        
        // Convert links
        $result = LinkConverter::convertAllLinks($footerContent);
        $footerContent = $result['content'];
        $this->stats['links_converted'] += $result['linksConverted'];
        
        Console::dim("  Method: $method");
        Console::dim("  Size: " . strlen($footerContent) . " characters");
        
        // Create alt.php with existing PHP code preserved
        $this->createFooterFile($footerContent);
    }
    
    /**
     * Create ust.php (Header) file
     * Preserves existing PHP database queries
     * 
     * @param string $content Header HTML content
     * @return void
     */
    private function createHeaderFile($content) {
        // Read existing ust.php to preserve PHP code
        $existingFile = Config::$bolumDir . 'ust.php';
        $phpCode = '';
        
        if (file_exists($existingFile)) {
            $existingContent = FileManager::readFile($existingFile);
            
            // Extract PHP code (everything before the first HTML tag or end of file)
            if (preg_match('/^(<\?php.*?\?>.*?)(?=<[a-zA-Z]|$)/s', $existingContent, $matches)) {
                $phpCode = $matches[1];
            }
        }
        
        // If no existing PHP code, use default header
        if (empty($phpCode)) {
            $phpCode = Config::getPhpFileHeader();
        }
        
        // Build complete file
        $fileContent = $phpCode . "\n" . $content . "\n";
        
        // Write file
        if (FileManager::writeFile($existingFile, $fileContent)) {
            Console::success("  ✓ Created: view/default/bolum/ust.php");
            $this->stats['components_created']++;
        } else {
            Console::error("  ✗ Failed to create ust.php");
        }
    }
    
    /**
     * Create alt.php (Footer) file
     * Preserves existing PHP database queries
     * 
     * @param string $content Footer HTML content
     * @return void
     */
    private function createFooterFile($content) {
        // Read existing alt.php to preserve PHP code
        $existingFile = Config::$bolumDir . 'alt.php';
        $phpCode = '';
        
        if (file_exists($existingFile)) {
            $existingContent = FileManager::readFile($existingFile);
            
            // Extract PHP code (everything before the first HTML tag or end of file)
            if (preg_match('/^(<\?php.*?\?>.*?)(?=<[a-zA-Z]|$)/s', $existingContent, $matches)) {
                $phpCode = $matches[1];
            }
        }
        
        // If no existing PHP code, use default header
        if (empty($phpCode)) {
            $phpCode = Config::getPhpFileHeader();
        }
        
        // Build complete file
        $fileContent = $phpCode . "\n" . $content . "\n";
        
        // Write file
        if (FileManager::writeFile($existingFile, $fileContent)) {
            Console::success("  ✓ Created: view/default/bolum/alt.php");
            $this->stats['components_created']++;
        } else {
            Console::error("  ✗ Failed to create alt.php");
        }
    }
    
    /**
     * Print extraction statistics
     * 
     * @return void
     */
    private function printStats() {
        Console::line();
        Console::statsBox("Extraction Statistics", [
            "Components Created" => $this->stats['components_created'],
            "Links Converted" => $this->stats['links_converted']
        ]);
        
        Console::success("Component extraction completed successfully! ✨");
        Console::line();
    }
    
    /**
     * Extract content by user-provided selector
     * 
     * Supports:
     * - Tag names: header, footer, nav, div
     * - Classes: .footer, .header, .top-bar
     * - IDs: #header, #footer
     * 
     * @param string $html Full HTML content
     * @param string $selector User-provided selector
     * @param string $componentName Name for error messages (Header/Footer)
     * @return string|null Extracted content or null if not found
     */
    private function extractBySelector($html, $selector, $componentName) {
        $selector = trim($selector);
        
        // Case 1: Class selector (.classname)
        if (strpos($selector, '.') === 0) {
            $className = substr($selector, 1);
            // Match opening tag with class, then find matching closing tag
            $pattern = '/<(\w+)[^>]*class="[^"]*' . preg_quote($className, '/') . '[^"]*"[^>]*>.*?<\/\1>/s';
            if (preg_match($pattern, $html, $matches)) {
                return $matches[0];
            }
        }
        // Case 2: ID selector (#idname)
        elseif (strpos($selector, '#') === 0) {
            $idName = substr($selector, 1);
            // Match opening tag with id, then find matching closing tag
            $pattern = '/<(\w+)[^>]*id="' . preg_quote($idName, '/') . '"[^>]*>.*?<\/\1>/s';
            if (preg_match($pattern, $html, $matches)) {
                return $matches[0];
            }
        }
        // Case 3: Tag name (header, footer, nav, etc.)
        else {
            $tagName = $selector;
            // Match complete tag
            $pattern = '/<' . preg_quote($tagName, '/') . '[^>]*>.*?<\/' . preg_quote($tagName, '/') . '>/s';
            if (preg_match($pattern, $html, $matches)) {
                return $matches[0];
            }
        }
        
        return null;
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
