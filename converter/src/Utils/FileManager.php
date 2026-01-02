<?php
/**
 * File Manager Utility Class
 * 
 * Handles all file and directory operations including:
 * - Reading/writing files
 * - Copying directories recursively
 * - Creating directories
 * - File searching and filtering
 * 
 * @package HtmlToPhpConverter\Utils
 * @version 1.0.0
 */

class FileManager {
    
    /**
     * Get all HTML files from a directory
     * Excludes __MACOSX and other system folders
     * 
     * @param string $directory Path to search
     * @return array Array of file paths
     */
    public static function getHtmlFiles($directory) {
        $files = glob($directory . '*.html');
        
        // Filter out unwanted files
        return array_filter($files, function($file) {
            return strpos($file, '__MACOSX') === false;
        });
    }
    
    /**
     * Copy entire directory recursively
     * Maintains folder structure and copies all files
     * 
     * @param string $source Source directory path
     * @param string $destination Destination directory path
     * @return int Number of files copied
     */
    public static function copyDirectory($source, $destination) {
        $fileCount = 0;
        
        // Create destination if it doesn't exist
        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }
        
        $dir = opendir($source);
        
        while (($file = readdir($dir)) !== false) {
            // Skip special directories and system folders
            if ($file != '.' && $file != '..' && $file != '__MACOSX') {
                $srcFile = $source . '/' . $file;
                $dstFile = $destination . '/' . $file;
                
                if (is_dir($srcFile)) {
                    // Recursively copy subdirectories
                    $fileCount += self::copyDirectory($srcFile, $dstFile);
                } else {
                    // Copy individual file
                    copy($srcFile, $dstFile);
                    $fileCount++;
                }
            }
        }
        
        closedir($dir);
        return $fileCount;
    }
    
    /**
     * Ensure directory exists, create if necessary
     * 
     * @param string $directory Path to directory
     * @return bool True if directory exists or was created
     */
    public static function ensureDirectory($directory) {
        if (!is_dir($directory)) {
            return mkdir($directory, 0755, true);
        }
        return true;
    }
    
    /**
     * Write content to file
     * Creates directory structure if needed
     * 
     * @param string $filePath Full path to file
     * @param string $content Content to write
     * @return bool True on success
     */
    public static function writeFile($filePath, $content) {
        // Ensure directory exists
        $directory = dirname($filePath);
        self::ensureDirectory($directory);
        
        // Write file
        return file_put_contents($filePath, $content) !== false;
    }
    
    /**
     * Write content to file safely with backup and validation
     * Creates backup, validates content, and restores on failure
     * 
     * @param string $filePath Full path to file
     * @param string $content Content to write
     * @return bool True on success
     */
    public static function writeFileSafely($filePath, $content) {
        // Ensure directory exists
        $directory = dirname($filePath);
        self::ensureDirectory($directory);
        
        $backupPath = null;
        
        // Create backup if file exists
        if (file_exists($filePath)) {
            $backupPath = $filePath . '.backup.' . date('YmdHis');
            if (!copy($filePath, $backupPath)) {
                return false; // Failed to create backup
            }
        }
        
        // Write content to temporary file first
        $tempPath = $filePath . '.tmp.' . uniqid();
        if (file_put_contents($tempPath, $content) === false) {
            return false; // Failed to write temp file
        }
        
        // Validate PHP syntax if it's a PHP file
        if (pathinfo($filePath, PATHINFO_EXTENSION) === 'php') {
            $output = [];
            $returnVar = 0;
            exec("php -l \"$tempPath\" 2>&1", $output, $returnVar);
            
            if ($returnVar !== 0) {
                // Syntax error - clean up and fail
                unlink($tempPath);
                return false;
            }
        }
        
        // Move temp file to final location
        if (rename($tempPath, $filePath)) {
            // Success - clean up backup if needed
            if ($backupPath && file_exists($backupPath)) {
                // Keep backup for safety, but you could delete it here
                // unlink($backupPath);
            }
            return true;
        } else {
            // Failed to move - restore from backup
            if ($backupPath && file_exists($backupPath)) {
                copy($backupPath, $filePath);
                unlink($backupPath);
            }
            if (file_exists($tempPath)) {
                unlink($tempPath);
            }
            return false;
        }
    }
    
    /**
     * Read file contents
     * 
     * @param string $filePath Full path to file
     * @return string|false File contents or false on failure
     */
    public static function readFile($filePath) {
        if (!file_exists($filePath)) {
            return false;
        }
        
        return file_get_contents($filePath);
    }
    
    /**
     * Check if file exists
     * 
     * @param string $filePath Full path to file
     * @return bool True if file exists
     */
    public static function fileExists($filePath) {
        return file_exists($filePath);
    }
    
    /**
     * Get file extension
     * 
     * @param string $filePath Full path to file
     * @return string File extension (without dot)
     */
    public static function getExtension($filePath) {
        return pathinfo($filePath, PATHINFO_EXTENSION);
    }
    
    /**
     * Get filename without extension
     * 
     * @param string $filePath Full path to file
     * @return string Filename without extension
     */
    public static function getFilenameWithoutExtension($filePath) {
        return pathinfo($filePath, PATHINFO_FILENAME);
    }
    
    /**
     * Get basename (filename with extension)
     * 
     * @param string $filePath Full path to file
     * @return string Filename with extension
     */
    public static function getBasename($filePath) {
        return basename($filePath);
    }
}
