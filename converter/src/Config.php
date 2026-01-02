<?php
/**
 * Configuration Class
 * 
 * Centralized configuration for the HTML to PHP converter.
 * All paths, settings, and conversion rules are defined here.
 * 
 * @package HtmlToPhpConverter
 * @version 1.0.0
 */

class Config {
    
    /**
     * Project root directory
     * Automatically detected based on converter location
     * 
     * @var string
     */
    public static $rootDir;
    
    /**
     * Source directory containing HTML files
     * Default: front/
     * 
     * @var string
     */
    public static $frontDir;
    
    /**
     * Destination directory for PHP files
     * Default: view/default/
     * 
     * @var string
     */
    public static $viewDir;
    
    /**
     * Directory for page components (Header, Footer, etc.)
     * Default: view/default/bolum/
     * 
     * @var string
     */
    public static $bolumDir;
    
    /**
     * Directory for page files
     * Default: view/default/sayfa/
     * 
     * @var string
     */
    public static $sayfaDir;
    
    /**
     * Directory for assets (CSS, JS, Images)
     * Default: view/default/assets/
     * 
     * @var string
     */
    public static $assetsDir;
    
    /**
     * Common asset folder names to look for
     * These are potential folders that might contain assets
     * The actual folders will be auto-detected from the front/ directory
     * 
     * @var array
     */
    public static $commonAssetFolders = [
        'css',
        'js',
        'images',
        'img',           // Alternative for images
        'assets',
        'font',
        'fonts',         // Alternative
        'icons',
        'icon',          // Alternative
        'webfonts',
        's',
        'media',
        'files',
        'downloads',
        'quform',        // Form library
        'plugins',       // Plugins folder
        'vendor',        // Vendor assets (not composer vendor)
        'libs',          // Libraries
        'library'        // Alternative
    ];
    
    /**
     * Folders to always exclude from copying
     * 
     * @var array
     */
    public static $excludeFolders = [
        '__MACOSX',
        '.git',
        'node_modules',
        '.vscode',
        '.idea'
    ];
    
    /**
     * Page link conversion map
     * Maps static HTML links to dynamic PHP function calls
     * 
     * @var array
     */
    public static $pageLinks = [
        'index.html' => "<?= \$this->BaseURL('index', \$lang, 1) ?>",
        'hakkimizda.html' => "<?= \$this->BaseURL('hakkimizda', \$lang, 1) ?>",
        'iletisim.html' => "<?= \$this->BaseURL('iletisim', \$lang, 1) ?>",
        'koleksiyonlar.html' => "<?= \$this->BaseURL('koleksiyonlar', \$lang, 1) ?>",
    ];
    
    /**
     * Asset path conversion patterns
     * Regex patterns for converting static asset paths to dynamic PHP
     * 
     * @var array
     */
    public static $assetPatterns = [
        '/href=["\'](?!http|#|\<\?)(css\/[^"\']*)["\']/' => 'href="<?=$assetURL?>$1"',
        '/src=["\'](?!http|https|\<\?)(js\/[^"\']*)["\']/' => 'src="<?=$assetURL?>$1"',
        '/src=["\'](?!http|https|\<\?)(images\/[^"\']*)["\']/' => 'src="<?=$assetURL?>$1"',
        '/href=["\'](?!http|#|\<\?)(font\/[^"\']*)["\']/' => 'href="<?=$assetURL?>$1"',
        '/href=["\'](?!http|#|\<\?)(icons\/[^"\']*)["\']/' => 'href="<?=$assetURL?>$1"',
    ];
    
    /**
     * Initialize configuration
     * Sets up all directory paths based on project root
     * 
     * @return void
     */
    public static function init() {
        // Set root directory (parent of converter folder)
        self::$rootDir = dirname(__DIR__, 1) . '/';
        
        // Set source directory
        self::$frontDir = self::$rootDir . '../front/';
        
        // Set view directories
        self::$viewDir = self::$rootDir . '../view/default/';
        self::$bolumDir = self::$viewDir . 'bolum/';
        self::$sayfaDir = self::$viewDir . 'sayfa/';
        self::$assetsDir = self::$viewDir . 'assets/';
    }
    
    /**
     * Get PHP file header template
     * Standard header for all generated PHP files
     * 
     * @param string $filename Page filename (without extension)
     * @return string
     */
    public static function getPhpFileHeader($filename = '') {
        $header = "<?php\n\n";
        $header .= "/**\n";
        $header .= " * @var \$this FrontClass|Loader object\n";
        $header .= " * @var \$lang string\n";
        $header .= " * @var \$assetURL string\n";
        $header .= " * @var \$page string\n";
        $header .= " */\n\n";
        
        // Add SEO settings for all pages except index
        if (!empty($filename) && $filename !== 'index') {
            // Convert filename to Title Case (first letter of each word uppercase)
            $pageTitle = ucwords(str_replace(['-', '_'], ' ', $filename));
            
            $header .= "// Page Configuration\n";
            $header .= "\$sayfa = \"$pageTitle\";  // Page name\n";
            $header .= "\$baslik = \$this->lang->header(\"$pageTitle\"); // Page title from translation file\n";
            $header .= "\$this->sayfaBaslik = \$baslik . \" - \" . \$this->ayarlar(\"title_\" . \$lang); // Title tag for browser tab\n";
            $header .= "\$this->ogBaslik = \$this->sayfaBaslik;  // Open Graph title (for social media)\n";
            $header .= "\$this->ogUrl = \$this->fullUrl;         // Open Graph URL (canonical)\n";
            $header .= "\n";
        }
        
        $header .= "?>\n";
        return $header;
    }
    
    /**
     * Auto-detect asset folders in front/ directory
     * Returns only folders that actually exist and are not excluded
     * 
     * @return array List of asset folder names found
     */
    public static function detectAssetFolders() {
        $foundFolders = [];
        
        if (!is_dir(self::$frontDir)) {
            return $foundFolders;
        }
        
        // Get all items in front/ directory
        $items = scandir(self::$frontDir);
        
        foreach ($items as $item) {
            // Skip special directories
            if ($item === '.' || $item === '..') {
                continue;
            }
            
            $fullPath = self::$frontDir . $item;
            
            // Check if it's a directory
            if (!is_dir($fullPath)) {
                continue;
            }
            
            // Skip excluded folders
            if (in_array($item, self::$excludeFolders)) {
                continue;
            }
            
            // Check if it's a common asset folder OR contains asset files
            if (in_array(strtolower($item), array_map('strtolower', self::$commonAssetFolders)) 
                || self::isFolderContainingAssets($fullPath)) {
                $foundFolders[] = $item;
            }
        }
        
        return $foundFolders;
    }
    
    /**
     * Check if a folder contains asset files (images, css, js, etc.)
     * Smart detection: checks files directly + inside subfolders
     * 
     * @param string $folderPath Full path to folder
     * @return bool True if folder contains assets
     */
    private static function isFolderContainingAssets($folderPath) {
        $assetExtensions = [
            'css', 'scss', 'sass', 'less',        // Styles
            'js', 'ts', 'jsx', 'tsx',             // Scripts
            'jpg', 'jpeg', 'png', 'gif', 'svg',   // Images
            'webp', 'ico', 'bmp',                 // Images
            'woff', 'woff2', 'ttf', 'eot', 'otf', // Fonts
            'mp4', 'webm', 'ogg', 'mp3',          // Media
            'pdf', 'doc', 'docx', 'zip'           // Files
        ];
        
        // Check files in root of folder
        $files = scandir($folderPath);
        
        foreach ($files as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }
            
            $fullPath = $folderPath . '/' . $file;
            
            // If it's a file, check extension
            if (is_file($fullPath)) {
                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if (in_array($ext, $assetExtensions)) {
                    return true;
                }
            }
            
            // If it's a subfolder with known asset names (css, js, images, etc.)
            if (is_dir($fullPath)) {
                $folderName = strtolower($file);
                if (in_array($folderName, ['css', 'js', 'images', 'img', 'fonts', 'font', 'icons'])) {
                    return true;
                }
            }
        }
        
        return false;
    }
}

// Initialize configuration on load
Config::init();
