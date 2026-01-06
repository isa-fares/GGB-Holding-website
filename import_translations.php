<?php
/**
 * Import Translations from Language Files to Database
 * 
 * This script imports all translations from include/lang/{lang}/{file}.php files
 * into the ceviri table in the database.
 * 
 * Usage: Access this file directly via browser or command line
 * Example: http://localhost/ggb/import_translations.php
 */

// Start session and include required files
if(session_id() === "") session_start();
ob_start();

include(__DIR__.'/vendor/autoload.php');
include(__DIR__.'/include/Smap.php');
include(__DIR__.'/include/Functions.php');
include(__DIR__.'/include/Request.php');
include(__DIR__.'/include/Ayarlar.php');
include(__DIR__.'/include/Database.php');

// Initialize settings
$ayarlar = new \AdminPanel\Ayarlar(__DIR__.'/include');

// Initialize database connection
$dbConn = new \Database\Data($ayarlar);

// Check if running from command line or browser
$isCLI = php_sapi_name() === 'cli';

// Function to output messages
function output($message, $type = 'info') {
    global $isCLI;
    if ($isCLI) {
        echo $message . "\n";
    } else {
        $color = 'info';
        if ($type === 'success') $color = 'success';
        if ($type === 'error') $color = 'danger';
        if ($type === 'warning') $color = 'warning';
        echo '<div class="alert alert-' . $color . '">' . htmlspecialchars($message) . '</div>';
    }
}

// Function to clean string
function kirlet($str) {
    return addslashes(htmlspecialchars(trim($str)));
}

// Function to get database name
function getDbName($dbConn) {
    $config = include(__DIR__.'/include/ayarlar/database.php');
    $local = $config['pdo']['local'];
    return $local['dbname'];
}

// Function to ensure category exists
function ensureCategoryExists($dbConn, $table, $categoryName) {
    $existing = $dbConn->tekSorgu(
        "SELECT * FROM `{$table}` WHERE `baslik` = '" . kirlet($categoryName) . "'"
    );
    
    if (!is_array($existing)) {
        // Check if 'aktif' column exists
        $dbname = getDbName($dbConn);
        $knt = $dbConn->tekSorgu(
            "SELECT COUNT(*) as tp FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '{$table}' AND COLUMN_NAME = 'aktif' AND table_schema = '{$dbname}'"
        );
        
        $insertData = array('baslik' => kirlet($categoryName));
        
        // Only add 'aktif' if column exists
        if (isset($knt['tp']) && $knt['tp'] > 0) {
            $insertData['aktif'] = 1;
        }
        
        $dbConn->insert($table, $insertData);
        return true;
    }
    return false;
}

// Function to get all language files
function getLanguageFiles($settings) {
    $langFiles = array();
    $langDir = __DIR__ . '/include/lang/';
    $languages = $settings->lang('lang');
    
    // Get all language directories
    foreach ($languages as $lang => $title) {
        $langPath = $langDir . $lang;
        if (is_dir($langPath)) {
            $files = scandir($langPath);
            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..' && pathinfo($file, PATHINFO_EXTENSION) === 'php') {
                    $fileName = pathinfo($file, PATHINFO_FILENAME);
                    if (!isset($langFiles[$fileName])) {
                        $langFiles[$fileName] = array();
                    }
                    $langFiles[$fileName][$lang] = $langPath . '/' . $file;
                }
            }
        }
    }
    
    return $langFiles;
}

// Function to import a single language file
function importLanguageFile($dbConn, $table, $settings, $fileName, $filePaths, $overwrite = true) {
    $result = array(
        'success' => 0,
        'updated' => 0,
        'inserted' => 0,
        'errors' => array()
    );
    
    // Ensure category exists
    ensureCategoryExists($dbConn, 'ceviri_kategori', $fileName);
    
    // Read all language files for this file
    $translations = array();
    foreach ($filePaths as $lang => $filePath) {
        if (file_exists($filePath)) {
            $data = include $filePath;
            if (is_array($data)) {
                foreach ($data as $key => $value) {
                    if (!isset($translations[$key])) {
                        $translations[$key] = array();
                    }
                    $translations[$key][$lang] = $value;
                }
            }
        }
    }
    
    // Insert/Update translations in database
    $dbname = getDbName($dbConn);
    foreach ($translations as $key => $langValues) {
        try {
            // Check if translation exists
            $existing = $dbConn->tekSorgu(
                "SELECT * FROM `{$table}` WHERE `key` = '" . kirlet($key) . "' AND `kid` = '" . kirlet($fileName) . "'"
            );
            
            $post = array(
                '`key`' => kirlet($key),
                '`kid`' => kirlet($fileName),
            );
            
            // Add language columns if they don't exist
            foreach ($settings->lang('lang') as $dil => $title) {
                $knt = $dbConn->tekSorgu(
                    "SELECT COUNT(*) as tp FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '{$table}' AND COLUMN_NAME = '{$dil}' AND table_schema = '{$dbname}'"
                );
                
                if ($knt["tp"] == 0) {
                    $dbConn->manualSql("ALTER TABLE {$table} ADD COLUMN `{$dil}` TEXT");
                }
                
                // Set translation value
                $value = isset($langValues[$dil]) ? $langValues[$dil] : '';
                $post["`{$dil}`"] = kirlet($value);
            }
            
            if (is_array($existing) && $overwrite) {
                // Update existing
                $dbConn->update($table, $post, $existing['id']);
                $result['updated']++;
            } else if (!is_array($existing)) {
                // Insert new
                $dbConn->insert($table, $post);
                $result['inserted']++;
            } else {
                // Skip if exists and overwrite is false
                continue;
            }
            
            $result['success']++;
        } catch (\Exception $e) {
            $result['errors'][] = "Hata ({$key}): " . $e->getMessage();
        }
    }
    
    return $result;
}

// Start HTML output if not CLI
if (!$isCLI) {
    ?>
    <!DOCTYPE html>
    <html lang="tr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Import Translations</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                padding: 20px;
                background-color: #f5f5f5;
            }
            .container {
                max-width: 900px;
                background: white;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }
            h1 {
                color: #333;
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1><i class="bi bi-download"></i> Import Translations</h1>
    <?php
}

// Get parameters
$importType = isset($_GET['type']) ? $_GET['type'] : 'all';
$selectedFiles = isset($_GET['files']) ? explode(',', $_GET['files']) : array();
$overwrite = isset($_GET['overwrite']) ? (int)$_GET['overwrite'] : 1;

// Check if import should run
$runImport = isset($_GET['run']) || $isCLI;

if ($runImport) {
    output("Starting import process...", 'info');
    
    $langFiles = getLanguageFiles($ayarlar);
    $filesToImport = array();
    
    if ($importType === 'all' || empty($selectedFiles)) {
        $filesToImport = array_keys($langFiles);
        output("Importing all files: " . implode(', ', $filesToImport), 'info');
    } else {
        $filesToImport = array_intersect($selectedFiles, array_keys($langFiles));
        output("Importing selected files: " . implode(', ', $filesToImport), 'info');
    }
    
    $totalResults = array(
        'success' => 0,
        'updated' => 0,
        'inserted' => 0,
        'errors' => array()
    );
    
    foreach ($filesToImport as $file) {
        if (!isset($langFiles[$file])) {
            output("File not found: {$file}", 'warning');
            continue;
        }
        
        output("Processing file: {$file}.php", 'info');
        
        $result = importLanguageFile($dbConn, 'ceviri', $ayarlar, $file, $langFiles[$file], $overwrite);
        
        $totalResults['success'] += $result['success'];
        $totalResults['updated'] += $result['updated'];
        $totalResults['inserted'] += $result['inserted'];
        
        if (!empty($result['errors'])) {
            $totalResults['errors'] = array_merge($totalResults['errors'], $result['errors']);
        }
        
        output("  - Success: {$result['success']}, Updated: {$result['updated']}, Inserted: {$result['inserted']}", 'success');
        
        // Regenerate language files from database
        if (method_exists($ayarlar, 'ceviriDosyaYaz')) {
            $ayarlar->ceviriDosyaYaz($file);
            output("  - Regenerated language files for: {$file}", 'info');
        }
    }
    
    output("", 'info');
    output("=== Import Complete ===", 'info');
    output("Total processed: " . $totalResults['success'], 'success');
    output("Updated: " . $totalResults['updated'], 'info');
    output("Inserted: " . $totalResults['inserted'], 'info');
    
    if (!empty($totalResults['errors'])) {
        output("Errors: " . count($totalResults['errors']), 'error');
        foreach ($totalResults['errors'] as $error) {
            output("  - " . $error, 'error');
        }
    }
    
} else {
    // Show file list and options
    $langFiles = getLanguageFiles($ayarlar);
    
    output("Available language files:", 'info');
    output("", 'info');
    
    if (empty($langFiles)) {
        output("No language files found in include/lang/ directory.", 'warning');
    } else {
        foreach ($langFiles as $file => $langs) {
            output("  - {$file}.php (Languages: " . implode(', ', array_keys($langs)) . ")", 'info');
        }
        
        output("", 'info');
        output("To import all files, access:", 'info');
        output("  " . (isset($_SERVER['HTTP_HOST']) ? 'http://' . $_SERVER['HTTP_HOST'] : '') . $_SERVER['SCRIPT_NAME'] . "?run=1", 'info');
        output("", 'info');
        output("To import specific files:", 'info');
        output("  " . (isset($_SERVER['HTTP_HOST']) ? 'http://' . $_SERVER['HTTP_HOST'] : '') . $_SERVER['SCRIPT_NAME'] . "?run=1&type=selected&files=genel,index,faaliyet,footer,iletisim,link,form,katalog", 'info');
        output("", 'info');
        output("Options:", 'info');
        output("  ?run=1 - Run import", 'info');
        output("  &type=all - Import all files (default)", 'info');
        output("  &type=selected&files=genel,index,faaliyet,footer,iletisim,link,form,katalog - Import specific files", 'info');
        output("  &overwrite=1 - Overwrite existing (default: 1)", 'info');
        output("", 'info');
        output("Available translation files:", 'info');
        output("  - genel.php (General translations)", 'info');
        output("  - index.php (Homepage translations)", 'info');
        output("  - faaliyet.php (Activities page translations)", 'info');
        output("  - footer.php (Footer translations)", 'info');
        output("  - iletisim.php (Contact page translations)", 'info');
        output("  - link.php (URL/SEO link translations)", 'info');
        output("  - form.php (Form translations)", 'info');
        output("  - katalog.php (Catalog translations)", 'info');
        output("  - header.php (Header/Menu translations - use import_header.php)", 'info');
    }
}

if (!$isCLI) {
    ?>
        </div>
    </body>
    </html>
    <?php
}

ob_end_flush();

