<?php
/**
 * Import New Translations to Database
 * 
 * This script imports the newly created translation files (index, faaliyet, footer, iletisim)
 * into the ceviri table in the database.
 * 
 * Usage: Access this file directly via browser
 * Example: http://localhost/ggb/import_new_translations.php
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
        <title>Import New Translations</title>
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
            <h1><i class="bi bi-download"></i> Import New Translations</h1>
    <?php
}

// Files to import
$filesToImport = array('index', 'faaliyet', 'footer', 'iletisim');

output("Starting import process for new translation files...", 'info');
output("Files to import: " . implode(', ', $filesToImport), 'info');
output("", 'info');

$langDir = __DIR__ . '/include/lang/';
$languages = $ayarlar->lang('lang');

$totalResults = array(
    'success' => 0,
    'updated' => 0,
    'inserted' => 0,
    'errors' => array()
);

foreach ($filesToImport as $fileName) {
    // Get all language files for this file
    $filePaths = array();
    foreach ($languages as $lang => $title) {
        $langPath = $langDir . $lang . '/' . $fileName . '.php';
        if (file_exists($langPath)) {
            $filePaths[$lang] = $langPath;
        }
    }
    
    if (empty($filePaths)) {
        output("File not found: {$fileName}.php", 'warning');
        continue;
    }
    
    output("Processing file: {$fileName}.php", 'info');
    output("  Languages found: " . implode(', ', array_keys($filePaths)), 'info');
    
    $result = importLanguageFile($dbConn, 'ceviri', $ayarlar, $fileName, $filePaths, true);
    
    $totalResults['success'] += $result['success'];
    $totalResults['updated'] += $result['updated'];
    $totalResults['inserted'] += $result['inserted'];
    
    if (!empty($result['errors'])) {
        $totalResults['errors'] = array_merge($totalResults['errors'], $result['errors']);
    }
    
    output("  ✓ Success: {$result['success']}, Updated: {$result['updated']}, Inserted: {$result['inserted']}", 'success');
    
    // Regenerate language files from database
    if (method_exists($ayarlar, 'ceviriDosyaYaz')) {
        $ayarlar->ceviriDosyaYaz($fileName);
        output("  ✓ Regenerated language files for: {$fileName}", 'info');
    }
    
    output("", 'info');
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

if (!$isCLI) {
    output("", 'info');
    output('<a href="adminpanel/?cmd=ceviri/liste" class="btn btn-primary">View All Translations in Admin Panel</a>', 'info');
    ?>
        </div>
    </body>
    </html>
    <?php
}

ob_end_flush();
