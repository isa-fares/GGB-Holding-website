<?php
/**
 * Link Converter Utility Class
 * 
 * Handles conversion of static HTML links to dynamic PHP function calls.
 * Processes both page links and asset links (CSS, JS, Images, etc.)
 * 
 * @package HtmlToPhpConverter\Utils
 * @version 1.0.0
 */

class LinkConverter {
    
    /**
     * Convert static page links to dynamic PHP
     * 
     * Transforms links like:
     *   "index.html" → "<?= $this->BaseURL('index', $lang, 1) ?>"
     *   "hakkimizda.html" → "<?= $this->BaseURL('hakkimizda', $lang, 1) ?>"
     * 
     * Excludes:
     *   - External links (http://, https://)
     *   - Email links (mailto:)
     *   - Phone links (tel:)
     *   - Anchors (#)
     *   - JavaScript (javascript:)
     * 
     * @param string $content HTML/PHP content to process
     * @return string Content with converted links
     */
    public static function convertPageLinks($content) {
        $linksConverted = 0;
        
        // Pattern to find all <a href="..."> tags
        $pattern = '/<a\s+([^>]*?)href=(["\'])([^"\']+)\2([^>]*?)>/i';
        
        $content = preg_replace_callback($pattern, function($matches) use (&$linksConverted) {
            $beforeHref = $matches[1];
            $quote = $matches[2];
            $url = $matches[3];
            $afterHref = $matches[4];
            
            // Skip if already converted
            if (strpos($url, '<?=') !== false || strpos($url, '<?php') !== false) {
                return $matches[0];
            }
            
            // Skip external links, special protocols, and anchors
            if (preg_match('/^(http|https|mailto:|tel:|javascript:|#|\/\/)/i', $url)) {
                return $matches[0];
            }
            
            // Convert .html links
            if (preg_match('/^([a-zA-Z0-9_-]+)\.html$/i', $url, $urlMatch)) {
                $pageName = $urlMatch[1];
                $newUrl = "<?= \$this->BaseURL('$pageName', \$lang, 1) ?>";
                $linksConverted++;
                return "<a {$beforeHref}href={$quote}{$newUrl}{$quote}{$afterHref}>";
            }
            
            // Return unchanged
            return $matches[0];
        }, $content);
        
        return $content;
    }
    
    /**
     * Convert static asset paths to dynamic PHP
     * 
     * Transforms paths like:
     *   src="assets/images/logo.png" → src="<?=$assetURL?>images/logo.png"
     *   src="assets/imgs/photo.jpg" → src="<?=$assetURL?>imgs/photo.jpg"
     *   src="css/style.css" → src="<?=$assetURL?>css/style.css"
     *   data-background="img/bg.jpg" → data-background="<?=$assetURL?>img/bg.jpg"
     * 
     * Handles: images, videos, CSS, JS, fonts, etc.
     * 
     * @param string $content HTML/PHP content to process
     * @return string Content with converted asset paths
     */
    public static function convertAssetLinks($content) {
        // Pattern for src= attributes (images, videos, scripts)
        $srcPattern = '/(src|poster)=(["\'])(?!http|https|\/\/|<?=|<?php)([^"\']+)\2/i';
        
        $content = preg_replace_callback($srcPattern, function($matches) {
            $attr = $matches[1];
            $quote = $matches[2];
            $path = $matches[3];
            
            // Remove 'assets/' prefix if exists
            $cleanPath = preg_replace('/^assets\//', '', $path);
            
            return "{$attr}={$quote}<?= \$assetURL ?>{$cleanPath}{$quote}";
        }, $content);
        
        // Pattern for data-* attributes (data-background, data-src, data-image, etc.)
        $dataPattern = '/(data-(?:background|src|image|poster|thumb|thumbnail|video|lazy))=(["\'])(?!http|https|\/\/|<?=|<?php)([^"\']+\.(?:jpg|jpeg|png|gif|svg|webp|ico|bmp|mp4|webm|ogg))\2/i';
        
        $content = preg_replace_callback($dataPattern, function($matches) {
            $attr = $matches[1];
            $quote = $matches[2];
            $path = $matches[3];
            
            // Remove 'assets/' prefix if exists
            $cleanPath = preg_replace('/^assets\//', '', $path);
            
            return "{$attr}={$quote}<?= \$assetURL ?>{$cleanPath}{$quote}";
        }, $content);
        
        // Pattern for href= attributes (CSS, fonts, images, etc.) - excluding page links
        $hrefPattern = '/href=(["\'])(?!http|https|\/\/|#|mailto:|tel:|javascript:|<?=|<?php)([^"\']+\.(?:css|woff|woff2|ttf|eot|otf|jpg|jpeg|png|gif|svg|webp|ico|bmp|pdf|zip|rar))\1/i';
        
        $content = preg_replace_callback($hrefPattern, function($matches) {
            $quote = $matches[1];
            $path = $matches[2];
            
            // Remove 'assets/' prefix if exists
            $cleanPath = preg_replace('/^assets\//', '', $path);
            
            return "href={$quote}<?= \$assetURL ?>{$cleanPath}{$quote}";
        }, $content);
        
        return $content;
    }
    
    /**
     * Convert all links (both pages and assets)
     * 
     * @param string $content HTML/PHP content to process
     * @return array Array with [content, linksConverted]
     */
    public static function convertAllLinks($content) {
        $originalContent = $content;
        
        // Convert page links
        $content = self::convertPageLinks($content);
        
        // Convert asset links
        $content = self::convertAssetLinks($content);
        
        // Count total conversions (rough estimate)
        $linksConverted = substr_count($content, '<?=') - substr_count($originalContent, '<?=');
        
        return [
            'content' => $content,
            'linksConverted' => max(0, $linksConverted)
        ];
    }
    
    /**
     * Extract and convert links in a specific section of HTML
     * 
     * @param string $html Full HTML content
     * @param string $startPattern Pattern marking section start
     * @param string $endPattern Pattern marking section end
     * @return string Extracted and converted section
     */
    public static function extractAndConvertSection($html, $startPattern, $endPattern) {
        $startPos = strpos($html, $startPattern);
        $endPos = strpos($html, $endPattern, $startPos);
        
        if ($startPos === false || $endPos === false) {
            return '';
        }
        
        // Extract section
        $section = substr($html, $startPos, $endPos - $startPos + strlen($endPattern));
        
        // Convert links
        $result = self::convertAllLinks($section);
        
        return $result['content'];
    }
}
