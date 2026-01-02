<?php
/**
 * Stage 4: Assets Migration & Link Conversion
 * 
 * This stage handles the migration of static assets (CSS, JS, Images, Fonts)
 * from the front/ directory and converts all links and image paths.
 * 
 * Process:
 * 1. Identify asset folders to copy (css, js, images, font, icons, etc.)
 * 2. Copy folders recursively to view/default/assets/
 * 3. Convert static links to dynamic PHP calls
 * 4. Convert image paths to use $assetURL
 * 5. Report statistics
 * 
 * @package HtmlToPhpConverter\Stages
 * @version 2.0.0
 */

class AssetMigrator {
    
    /**
     * Statistics tracking
     * 
     * @var array
     */
    private $stats = [
        'folders_copied' => 0,
        'files_copied' => 0
    ];
    
    /**
     * Execute Stage 4
     * 
     * @return bool True if successful, false otherwise
     */
    public function execute() {
        // Print stage header
        Console::line();
        Console::line();
        Console::header(
            "HTML to PHP Converter - STAGE 4",
            "Assets Migration & Link Conversion"
        );
        
        Console::success("Starting Stage 4: Assets Migration & Link Conversion...");
        Console::line();
        
        // Auto-detect asset folders
        $assetFolders = Config::detectAssetFolders();
        
        if (empty($assetFolders)) {
            Console::warning("No asset folders detected in front/ directory");
            Console::line();
            return false;
        }
        
        // Filter out 'assets' folder to avoid duplication
        // If 'assets' folder exists, we'll copy its contents directly
        $hasAssetsFolder = false;
        $filteredFolders = [];
        
        foreach ($assetFolders as $folder) {
            if (strtolower($folder) === 'assets') {
                $hasAssetsFolder = true;
            } else {
                $filteredFolders[] = $folder;
            }
        }
        
        // Show detected folders
        Console::info("Detected " . count($assetFolders) . " asset folder(s):");
        foreach ($assetFolders as $folder) {
            if (strtolower($folder) === 'assets') {
                Console::dim("  - $folder/ (will copy contents only)");
            } else {
                Console::dim("  - $folder/");
            }
        }
        Console::line();
        
        // Confirm before copying
        if (!Console::confirm("Copy these folders to view/default/assets/?")) {
            Console::info("Stage 4 cancelled.");
            Console::line();
            return false;
        }
        
        Console::line();
        
        // Check if assets directory already exists with files
        $assetsExists = is_dir(Config::$assetsDir);
        if ($assetsExists) {
            $existingFiles = count(glob(Config::$assetsDir . '*'));
            if ($existingFiles > 0) {
                Console::info("Note: view/default/assets/ already contains $existingFiles item(s)");
                Console::dim("  Existing files will be preserved, new files will be merged");
                Console::line();
            }
        }
        
        // Ensure assets directory exists
        FileManager::ensureDirectory(Config::$assetsDir);
        
        // If 'assets' folder exists in front/, copy its CONTENTS directly
        if ($hasAssetsFolder) {
            $this->copyAssetsContents();
        }
        
        // Copy other asset folders normally
        foreach ($filteredFolders as $folder) {
            $this->copyAssetFolder($folder);
        }
        
        // Print statistics
        $this->printStats();
        
        return true;
    }
    
    /**
     * Copy contents of 'assets' folder directly (not the folder itself)
     * This prevents view/default/assets/assets/ duplication
     * 
     * @return void
     */
    private function copyAssetsContents() {
        $sourcePath = Config::$frontDir . 'assets/';
        
        if (!is_dir($sourcePath)) {
            return;
        }
        
        Console::info("Copying contents of: assets/ (avoiding duplication)");
        
        // Get all items inside assets folder
        $items = scandir($sourcePath);
        $totalFiles = 0;
        $foldersCount = 0;
        
        foreach ($items as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }
            
            $sourceItemPath = $sourcePath . $item;
            $destItemPath = Config::$assetsDir . $item;
            
            if (is_dir($sourceItemPath)) {
                // Copy subfolder
                $fileCount = FileManager::copyDirectory($sourceItemPath, $destItemPath);
                if ($fileCount > 0) {
                    Console::dim("  ✓ Copied $fileCount files from assets/$item/");
                    $totalFiles += $fileCount;
                    $foldersCount++;
                }
            } else {
                // Copy individual file
                if (copy($sourceItemPath, $destItemPath)) {
                    $totalFiles++;
                }
            }
        }
        
        if ($totalFiles > 0) {
            Console::success("  ✓ Copied $totalFiles files from assets/ ($foldersCount subfolders)");
            $this->stats['folders_copied'] += $foldersCount;
            $this->stats['files_copied'] += $totalFiles;
        }
    }
    
    /**
     * Copy a single asset folder
     * 
     * @param string $folderName Name of folder to copy (e.g., 'css', 'js')
     * @return void
     */
    private function copyAssetFolder($folderName) {
        $sourcePath = Config::$frontDir . $folderName;
        $destPath = Config::$assetsDir . $folderName;
        
        // Check if source folder exists
        if (!is_dir($sourcePath)) {
            Console::dim("  Skipping: $folderName/ (not found)");
            return;
        }
        
        Console::info("Copying: $folderName/");
        
        // Copy directory recursively
        $fileCount = FileManager::copyDirectory($sourcePath, $destPath);
        
        if ($fileCount > 0) {
            Console::success("  ✓ Copied $fileCount files from $folderName/");
            $this->stats['folders_copied']++;
            $this->stats['files_copied'] += $fileCount;
        } else {
            Console::dim("  Empty folder: $folderName/");
        }
    }
    
    /**
     * Print migration statistics
     * 
     * @return void
     */
    private function printStats() {
        Console::line();
        Console::statsBox("Stage 4 - Migration Complete", [
            "Folders Copied" => $this->stats['folders_copied'],
            "Total Files" => $this->stats['files_copied']
        ]);
        
        Console::success("Assets migrated successfully! ✨");
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
