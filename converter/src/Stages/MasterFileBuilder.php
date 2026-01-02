<?php

/**
 * Stage 3: Master File Creation with CSS & JS Links
 * 
 * This stage creates/updates master.php file by extracting CSS and JavaScript
 * links from the first and last parts of static HTML files.
 * 
 * Process:
 * 1. Read HTML file from front/ directory
 * 2. Extract CSS links from <head> section
 * 3. Extract JS scripts from bottom of <body>
 * 4. Update master.php with extracted links
 * 5. NO backup files created - direct write to master.php
 * 
 * @package HtmlToPhpConverter\Stages
 * @version 2.0.0
 */

class MasterFileBuilder
{

    /**
     * Statistics tracking
     * 
     * @var array
     */
    private $stats = [
        'css_files' => 0,
        'js_files' => 0
    ];

    /**
     * Collected CSS files
     * 
     * @var array
     */
    private $cssFiles = [];

    /**
     * Collected JS files
     * 
     * @var array
     */
    private $jsFiles = [];

    /**
     * Required JS files to always keep at the end
     * These are essential files that should never be removed
     * 
     * @var array
     */
    private $requiredJsFiles = [
        'js/jquery-migrate-3.3.2.min.js',
        'js/form.js',
        'js/sweetalert2@11.js'
    ];

    /**
     * Collected Favicon links
     * 
     * @var array
     */
    private $faviconLinks = [];

    /**
     * Execute Stage 5
     * 
     * @return bool True if successful, false otherwise
     */
    public function execute()
    {
        // Print stage header
        Console::header(
            "STAGE 3: Master File Builder",
            "Creating master.php with CSS/JS links"
        );

        Console::dim("Process:");
        Console::dim("  1. Extract CSS links from <head>");
        Console::dim("  2. Extract JS scripts from <body>");
        Console::dim("  3. Scan assets directory for additional files");
        Console::dim("  4. Update master.php with inc_file() calls");
        Console::line();

        // Get HTML files
        $htmlFiles = FileManager::getHtmlFiles(Config::$frontDir);

        if (empty($htmlFiles)) {
            Console::error("No HTML files found in front/ directory");
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
            Console::warning("  (index.html not found, using first available file)");
        }
        Console::line();

        // Confirm before proceeding
        if (!Console::confirm("Do you want to continue?")) {
            Console::info("Operation cancelled by user.");
            return false;
        }

        Console::line();
        Console::info("Starting extraction...");
        Console::line();

        // Read HTML content
        $html = FileManager::readFile($referenceFile);

        if ($html === false) {
            Console::error("ERROR: Failed to read reference file");
            return false;
        }

        // Extract CSS, JS from HTML
        $this->extractCssLinks($html);
        $this->extractJsLinks($html);
        // Skip Favicon extraction - leave favicon links as-is in master.php

        // Ask if user wants to scan assets directory for additional files
        Console::line();
        if (Console::confirm("Scan assets directory for additional CSS/JS files not in HTML?")) {
            $this->scanAssetsDirectory();
        }

        // Generate and display code
        $this->generateAndDisplayCode();

        // Print statistics
        $this->printStats();

        return true;
    }

    /**
     * Extract CSS links from HTML
     * 
     * @param string $html Full HTML content
     * @return void
     */
    private function extractCssLinks($html)
    {
        Console::info("Extracting CSS links...");

        // Pattern to match <link> tags with CSS files
        $pattern = '/<link[^>]+rel=["\']stylesheet["\'][^>]+href=["\']([^"\']+)["\'][^>]*>|<link[^>]+href=["\']([^"\']+)["\'][^>]+rel=["\']stylesheet["\'][^>]*>/i';

        preg_match_all($pattern, $html, $matches);

        // Get all CSS hrefs (from both capture groups)
        $cssHrefs = array_filter(array_merge($matches[1], $matches[2]));

        foreach ($cssHrefs as $href) {
            // Skip external URLs
            if (preg_match('/^(http|https|\/\/)/i', $href)) {
                continue;
            }

            // Clean the path
            $cleanPath = trim($href);

            // Remove 'assets/' prefix if exists (to avoid duplication with $assetURL)
            $cleanPath = preg_replace('/^assets\//', '', $cleanPath);

            // Add to collection if not already present
            if (!in_array($cleanPath, $this->cssFiles)) {
                $this->cssFiles[] = $cleanPath;
                $this->stats['css_files']++;
                Console::dim("  • Found: $cleanPath");
            }
        }

        Console::line();
    }

    /**
     * Extract JS script links from HTML
     * 
     * @param string $html Full HTML content
     * @return void
     */
    private function extractJsLinks($html)
    {
        Console::info("Extracting JavaScript links...");

        // Pattern to match <script> tags with src attribute
        $pattern = '/<script[^>]+src=["\']([^"\']+)["\'][^>]*><\/script>/i';

        preg_match_all($pattern, $html, $matches);

        foreach ($matches[1] as $src) {
            // Skip external URLs
            if (preg_match('/^(http|https|\/\/)/i', $src)) {
                continue;
            }

            // Clean the path
            $cleanPath = trim($src);

            // Remove 'assets/' prefix if exists (to avoid duplication with $assetURL)
            $cleanPath = preg_replace('/^assets\//', '', $cleanPath);

            // Skip if it's one of the required files (we'll add them at the end)
            if (in_array($cleanPath, $this->requiredJsFiles)) {
                continue;
            }

            // Add to collection if not already present
            if (!in_array($cleanPath, $this->jsFiles)) {
                $this->jsFiles[] = $cleanPath;
                $this->stats['js_files']++;
                Console::dim("  • Found: $cleanPath");
            }
        }

        Console::line();
    }

    /**
     * Extract favicon links from HTML
     * 
     * @param string $html Full HTML content
     * @return void
     */
    private function extractFaviconLinks($html)
    {
        Console::info("Extracting Favicon links...");

        // Pattern to match favicon/icon link tags
        $pattern = '/<link[^>]*rel=["\'](?:shortcut\s+)?icon["\'][^>]*>/i';

        preg_match_all($pattern, $html, $matches);

        foreach ($matches[0] as $linkTag) {
            // Extract href attribute
            if (preg_match('/href=["\']([^"\']+)["\']/i', $linkTag, $hrefMatch)) {
                $href = $hrefMatch[1];

                // Skip external URLs
                if (preg_match('/^(http|https|\/\/)/i', $href)) {
                    continue;
                }

                // Clean the path and remove 'assets/' prefix
                $cleanPath = preg_replace('/^assets\//', '', trim($href));

                // Replace only the FIRST href in the tag with PHP variable (replace only once)
                $phpTag = preg_replace(
                    '/href=["\']([^"\']+)["\']/i',
                    'href="<?=$assetURL?>' . $cleanPath . '"',
                    $linkTag,
                    1  // Replace only first occurrence
                );

                // Add to collection if not already present
                if (!in_array($phpTag, $this->faviconLinks)) {
                    $this->faviconLinks[] = $phpTag;
                    Console::dim("  • Found: $cleanPath");
                }
            }
        }

        Console::line();
    }

    /**
     * Generate and display PHP code for master.php
     * 
     * @return void
     */
    private function generateAndDisplayCode()
    {
        Console::line();
        Console::separator();
        Console::success("Generated PHP Code for master.php:");
        Console::separator();
        Console::line();

        // Generate CSS inc_file code
        $cssCode = '';
        if (!empty($this->cssFiles)) {
            echo Console::COLOR_CYAN . "<!-- CSS Files -->\n" . Console::COLOR_RESET;
            $cssCode .= "<?php\n";
            $cssCode .= "\$this->inc_file(\"css\", array(\n";

            foreach ($this->cssFiles as $index => $cssFile) {
                $comma = ($index < count($this->cssFiles) - 1) ? ',' : '';
                $cssCode .= "    \"$cssFile\"$comma\n";
            }

            $cssCode .= "));\n";
            $cssCode .= "?>";

            echo $cssCode . "\n\n";
        }

        // Generate JS inc_file code
        $jsCode = '';
        if (!empty($this->jsFiles)) {
            echo Console::COLOR_CYAN . "<!-- JavaScript Files -->\n" . Console::COLOR_RESET;
            $jsCode .= "<?php\n";
            $jsCode .= "\$this->inc_file(\"script\", array(\n";

            // Add extracted files first
            foreach ($this->jsFiles as $index => $jsFile) {
                $jsCode .= "    \"$jsFile\",\n";
            }

            // Add required files at the end
            foreach ($this->requiredJsFiles as $index => $requiredFile) {
                $comma = ($index < count($this->requiredJsFiles) - 1) ? ',' : '';
                $jsCode .= "    \"$requiredFile\"$comma\n";
            }

            $jsCode .= "));\n";
            $jsCode .= "?>";

            echo $jsCode . "\n";
        }

        Console::line();
        Console::separator();
        Console::line();

        // Ask if user wants to update master.php
        if (Console::confirm("Do you want to update master.php automatically?")) {
            $this->updateMasterFile($cssCode, $jsCode);
        } else {
            Console::info("Skipped. You can manually copy the code above into master.php");
        }

        Console::line();
    }

    /**
     * Update master.php file with CSS, JS, and Favicon links
     * 
     * @param string $cssCode Generated CSS inc_file code
     * @param string $jsCode Generated JS inc_file code
     * @return void
     */
    private function updateMasterFile($cssCode, $jsCode)
    {
        $masterFile = Config::$viewDir . 'master.php';

        if (!file_exists($masterFile)) {
            Console::error("master.php file not found at: $masterFile");
            return;
        }

        Console::info("Updating master.php...");

        // Read current content
        $content = FileManager::readFile($masterFile);

        if ($content === false) {
            Console::error("Failed to read master.php");
            return;
        }

        $updated = false;

        // Skip Favicon processing - leave favicon links unchanged in master.php

        // ========== UPDATE CSS ARRAY ==========
        // Pattern to find: $this->inc_file("css", array( ... ));
        // We need to add files inside the array, not replace the whole block

        $cssPattern = '/(\$this->inc_file\s*\(\s*"css"\s*,\s*array\s*\(\s*)(.*?)(\s*\)\s*\)\s*;)/s';

        if (preg_match($cssPattern, $content, $cssMatch)) {
            // Build new array content with existing + new files
            $newCssArray = '';
            foreach ($this->cssFiles as $index => $cssFile) {
                $comma = ($index < count($this->cssFiles) - 1) ? ',' : '';
                $newCssArray .= "\n    \"$cssFile\"$comma";
            }
            $newCssArray .= "\n";

            // Replace the array content
            $newCssBlock = $cssMatch[1] . $newCssArray . $cssMatch[3];
            $content = preg_replace($cssPattern, $newCssBlock, $content, 1);

            Console::success("  ✓ Updated CSS files in existing inc_file()");
            $updated = true;
        } else {
            Console::warning("  ! Could not find CSS inc_file section");
        }

        // ========== UPDATE JS ARRAY (the one BEFORE </body>) ==========
        // Find all inc_file("script") occurrences
        $jsPattern = '/(\$this->inc_file\s*\(\s*"script"\s*,\s*array\s*\(\s*)(.*?)(\s*\)\s*\)\s*;)/s';

        if (preg_match_all($jsPattern, $content, $jsMatches, PREG_SET_ORDER | PREG_OFFSET_CAPTURE)) {
            // Get the LAST match (the one before </body>)
            $lastJsMatch = end($jsMatches);

            // Build new array content with extracted files first, then required files at the end
            $newJsArray = '';

            // Add extracted files first
            foreach ($this->jsFiles as $jsFile) {
                $newJsArray .= "\n    \"$jsFile\",";
            }

            // Add required files at the end
            foreach ($this->requiredJsFiles as $index => $requiredFile) {
                $comma = ($index < count($this->requiredJsFiles) - 1) ? ',' : '';
                $newJsArray .= "\n    \"$requiredFile\"$comma";
            }

            $newJsArray .= "\n";

            // Build the new block
            $newJsBlock = $lastJsMatch[1][0] . $newJsArray . $lastJsMatch[3][0];

            // Replace only the last occurrence
            $offset = $lastJsMatch[0][1];
            $length = strlen($lastJsMatch[0][0]);
            $content = substr_replace($content, $newJsBlock, $offset, $length);

            Console::success("  ✓ Updated JS files in existing inc_file()");
            $updated = true;
        } else {
            Console::warning("  ! Could not find JS inc_file section");
        }

        if (!$updated) {
            Console::error("  ✗ Could not update master.php - no suitable insertion points found");
            return;
        }

        // Write directly without backup - user requested no backups
        if (FileManager::writeFile($masterFile, $content)) {
            Console::success("  ✓ master.php updated successfully!");

            // Clean duplicate <?php tags if any
            $this->cleanDuplicatePhpTags($masterFile);
        } else {
            Console::error("  ✗ Failed to write to master.php");
        }
    }

    /**
     * Validate PHP syntax of content
     * 
     * @param string $content PHP content to validate
     * @return bool True if syntax is valid
     */
    private function validatePhpSyntax($content)
    {
        // Write to temporary file for validation
        $tempFile = sys_get_temp_dir() . '/master_temp_' . uniqid() . '.php';
        file_put_contents($tempFile, $content);

        // Check syntax
        $output = [];
        $returnVar = 0;
        exec("php -l \"$tempFile\" 2>&1", $output, $returnVar);

        // Clean up temp file
        if (file_exists($tempFile)) {
            unlink($tempFile);
        }

        return $returnVar === 0;
    }

    /**
     * Clean duplicate <?php tags and fix common issues
     * 
     * @param string $filePath Path to file to clean
     * @return void
     */
    private function cleanDuplicatePhpTags($filePath)
    {
        $content = FileManager::readFile($filePath);
        if ($content === false) return;

        $originalContent = $content;

        // Remove duplicate <?php tags (multiple consecutive ones)
        $content = preg_replace('/(<\?php\s*\n\s*){2,}/', "<?php\n", $content);

        // Fix spacing issues around PHP tags
        $content = preg_replace('/\?>\s*\n\s*\n\s*<\?php/', "?>\n\n<?php", $content);

        // Remove empty PHP blocks
        $content = preg_replace('/<\?php\s*\?>/s', '', $content);

        if ($content !== $originalContent) {
            FileManager::writeFile($filePath, $content);
            Console::info("  • Cleaned duplicate PHP tags and formatting");
        }
    }

    /**
     * Print extraction statistics
     * 
     * @return void
     */
    private function printStats()
    {
        Console::statsBox("Extraction Statistics", [
            "CSS Files Found" => $this->stats['css_files'],
            "JS Files Found" => $this->stats['js_files'],
            "Total Files" => ($this->stats['css_files'] + $this->stats['js_files'])
        ]);

        Console::success("Links extraction completed successfully! ✨");
        Console::line();
    }

    /**
     * Scan assets directory for CSS and JS files
     * Recursively finds all CSS/JS files in subdirectories
     * 
     * @return void
     */
    private function scanAssetsDirectory()
    {
        Console::line();
        Console::info("Scanning assets directory for additional files...");

        // Check if we should scan front/ or view/default/assets/
        $assetsPath = Config::$assetsDir;

        // If assets directory doesn't exist yet, scan front/ directory
        if (!is_dir($assetsPath)) {
            $assetsPath = Config::$frontDir;
            Console::dim("  (Scanning front/ directory)");
        } else {
            Console::dim("  (Scanning view/default/assets/ directory)");
        }

        if (!is_dir($assetsPath)) {
            Console::warning("  ! Assets directory not found");
            return;
        }

        // Scan for CSS files
        $foundCss = $this->scanForFiles($assetsPath, ['css']);
        foreach ($foundCss as $file) {
            // Remove assets directory prefix
            $relativePath = str_replace($assetsPath, '', $file);
            $relativePath = ltrim($relativePath, '/\\');

            // Remove 'assets/' prefix if exists
            $relativePath = preg_replace('/^assets\//', '', $relativePath);

            // Normalize path separators
            $relativePath = str_replace('\\', '/', $relativePath);

            if (!in_array($relativePath, $this->cssFiles)) {
                $this->cssFiles[] = $relativePath;
                $this->stats['css_files']++;
                Console::dim("  • Added: $relativePath");
            }
        }

        // Scan for JS files
        $foundJs = $this->scanForFiles($assetsPath, ['js']);
        foreach ($foundJs as $file) {
            // Remove assets directory prefix
            $relativePath = str_replace($assetsPath, '', $file);
            $relativePath = ltrim($relativePath, '/\\');

            // Remove 'assets/' prefix if exists
            $relativePath = preg_replace('/^assets\//', '', $relativePath);

            // Normalize path separators
            $relativePath = str_replace('\\', '/', $relativePath);

            if (!in_array($relativePath, $this->jsFiles)) {
                $this->jsFiles[] = $relativePath;
                $this->stats['js_files']++;
                Console::dim("  • Added: $relativePath");
            }
        }

        Console::line();
    }

    /**
     * Recursively scan directory for files with specific extensions
     * 
     * @param string $dir Directory to scan
     * @param array $extensions File extensions to look for (without dot)
     * @return array Array of file paths
     */
    private function scanForFiles($dir, $extensions)
    {
        $files = [];

        if (!is_dir($dir)) {
            return $files;
        }

        $items = scandir($dir);

        foreach ($items as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }

            $path = $dir . DIRECTORY_SEPARATOR . $item;

            if (is_dir($path)) {
                // Recursively scan subdirectories
                $files = array_merge($files, $this->scanForFiles($path, $extensions));
            } else {
                // Check if file has matching extension
                $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                if (in_array($ext, $extensions)) {
                    $files[] = $path;
                }
            }
        }

        return $files;
    }

    /**
     * Get statistics
     * 
     * @return array Statistics array
     */
    public function getStats()
    {
        return $this->stats;
    }
}
