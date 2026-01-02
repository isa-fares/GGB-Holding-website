<?php
/**
 * Console Utility Class
 * 
 * Provides colored terminal output and user interaction helpers.
 * Handles all CLI formatting, prompts, and visual elements.
 * 
 * @package HtmlToPhpConverter\Utils
 * @version 1.0.0
 */

class Console {
    
    /**
     * ANSI color codes for terminal output
     */
    const COLOR_RESET = "\033[0m";
    const COLOR_RED = "\033[1;31m";
    const COLOR_GREEN = "\033[1;32m";
    const COLOR_YELLOW = "\033[1;33m";
    const COLOR_BLUE = "\033[1;34m";
    const COLOR_CYAN = "\033[1;36m";
    const COLOR_GRAY = "\033[1;90m";
    
    /**
     * Print success message (green)
     * 
     * @param string $message Message to display
     * @return void
     */
    public static function success($message) {
        echo self::COLOR_GREEN . $message . self::COLOR_RESET . "\n";
    }
    
    /**
     * Print info message (blue)
     * 
     * @param string $message Message to display
     * @return void
     */
    public static function info($message) {
        echo self::COLOR_BLUE . $message . self::COLOR_RESET . "\n";
    }
    
    /**
     * Print warning message (yellow)
     * 
     * @param string $message Message to display
     * @return void
     */
    public static function warning($message) {
        echo self::COLOR_YELLOW . $message . self::COLOR_RESET . "\n";
    }
    
    /**
     * Print error message (red)
     * 
     * @param string $message Message to display
     * @return void
     */
    public static function error($message) {
        echo self::COLOR_RED . $message . self::COLOR_RESET . "\n";
    }
    
    /**
     * Print gray/dimmed message
     * 
     * @param string $message Message to display
     * @return void
     */
    public static function dim($message) {
        echo self::COLOR_GRAY . $message . self::COLOR_RESET . "\n";
    }
    
    /**
     * Print completion message with icon (green)
     * 
     * @param string $message Message to display
     * @return void
     */
    public static function complete($message) {
        echo self::COLOR_GREEN . "✓ $message" . self::COLOR_RESET . "\n";
    }
    
    /**
     * Print a simple header
     * 
     * @param string $title Main title
     * @param string $subtitle Subtitle (optional)
     * @return void
     */
    public static function header($title, $subtitle = '') {
        echo "\n";
        echo self::COLOR_CYAN . str_repeat("=", 60) . self::COLOR_RESET . "\n";
        echo self::COLOR_CYAN . $title . self::COLOR_RESET . "\n";
        
        if ($subtitle) {
            echo self::COLOR_GRAY . $subtitle . self::COLOR_RESET . "\n";
        }
        
        echo self::COLOR_CYAN . str_repeat("=", 60) . self::COLOR_RESET . "\n";
        echo "\n";
    }
    
    /**
     * Print a statistics summary
     * 
     * @param string $title Box title
     * @param array $stats Associative array of statistics [label => value]
     * @return void
     */
    public static function statsBox($title, $stats) {
        echo "\n";
        echo self::COLOR_CYAN . $title . self::COLOR_RESET . "\n";
        echo self::COLOR_GRAY . str_repeat("-", 40) . self::COLOR_RESET . "\n";
        
        foreach ($stats as $label => $value) {
            echo "  " . $label . ": " . self::COLOR_GREEN . $value . self::COLOR_RESET . "\n";
        }
        
        echo "\n";
    }
    
    /**
     * Print an info list
     * 
     * @param string $title Box title
     * @param array $items Array of items to display
     * @return void
     */
    public static function infoBox($title, $items) {
        echo "\n";
        echo self::COLOR_CYAN . $title . self::COLOR_RESET . "\n";
        echo self::COLOR_GRAY . str_repeat("-", 40) . self::COLOR_RESET . "\n";
        
        foreach ($items as $item) {
            echo "  " . $item . "\n";
        }
        
        echo "\n";
    }
    
    /**
     * Prompt user for yes/no confirmation
     * Accepts: y, yes, n, no
     * 
     * @param string $message Question to ask
     * @return bool True if user confirms, false otherwise
     */
    public static function confirm($message) {
        echo "\n" . self::COLOR_YELLOW . "$message (y/n): " . self::COLOR_RESET;
        $handle = fopen("php://stdin", "r");
        $line = fgets($handle);
        fclose($handle);
        
        $answer = strtolower(trim($line));
        return ($answer === 'y' || $answer === 'yes');
    }
    
    /**
     * Print a simple line separator
     * 
     * @return void
     */
    public static function separator() {
        echo self::COLOR_GRAY . str_repeat("-", 60) . self::COLOR_RESET . "\n";
    }
    
    /**
     * Print an empty line
     * 
     * @return void
     */
    public static function line() {
        echo "\n";
    }
}
