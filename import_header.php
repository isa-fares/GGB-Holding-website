<?php
/**
 * Import Header Translations to Database
 * 
 * This script imports header translations from include/lang/{lang}/header.php files
 * into the ceviri table in the database.
 * 
 * Usage: Access this file directly via browser
 * Example: http://localhost/ggb/import_header.php
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
include(__DIR__.'/adminpanel/system/Settings.php');

// Initialize settings
$ayarlar = new \AdminPanel\Ayarlar(__DIR__.'/include');
$dbConn = new \Database\Data($ayarlar);
$settings = new \AdminPanel\Settings($ayarlar);

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
function ensureCategoryExists($dbConn, $categoryName) {
    $existing = $dbConn->tekSorgu(
        "SELECT * FROM `ceviri_kategori` WHERE `baslik` = '" . kirlet($categoryName) . "'"
    );
    
    if (!is_array($existing)) {
        $dbname = getDbName($dbConn);
        $knt = $dbConn->tekSorgu(
            "SELECT COUNT(*) as tp FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'ceviri_kategori' AND COLUMN_NAME = 'aktif' AND table_schema = '{$dbname}'"
        );
        
        $insertData = array('baslik' => kirlet($categoryName));
        
        if (isset($knt['tp']) && $knt['tp'] > 0) {
            $insertData['aktif'] = 1;
        }
        
        $dbConn->insert('ceviri_kategori', $insertData);
        return true;
    }
    return false;
}

// Start HTML output
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Header Translations</title>
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
        <h1><i class="bi bi-download"></i> Import Header Translations</h1>
        <?php

$fileName = 'header';
$langDir = __DIR__ . '/include/lang/';
$languages = $ayarlar->lang('lang');
$filePaths = array();

// Get all language files for header
foreach ($languages as $lang => $title) {
    $langPath = $langDir . $lang . '/' . $fileName . '.php';
    if (file_exists($langPath)) {
        $filePaths[$lang] = $langPath;
        echo '<div class="alert alert-info">Found: ' . $lang . '/header.php</div>';
    }
}

if (empty($filePaths)) {
    echo '<div class="alert alert-danger">No header.php files found!</div>';
} else {
    // Ensure category exists
    ensureCategoryExists($dbConn, $fileName);
    echo '<div class="alert alert-success">Category "header" ensured in database</div>';
    
    // Read all language files
    $translations = array();
    foreach ($filePaths as $lang => $filePath) {
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
    
    echo '<div class="alert alert-info">Found ' . count($translations) . ' translation keys</div>';
    
    // Insert/Update translations in database
    $dbname = getDbName($dbConn);
    $results = array(
        'success' => 0,
        'updated' => 0,
        'inserted' => 0,
        'errors' => array()
    );
    
    foreach ($translations as $key => $langValues) {
        try {
            // Check if translation exists
            $existing = $dbConn->tekSorgu(
                "SELECT * FROM `ceviri` WHERE `key` = '" . kirlet($key) . "' AND `kid` = '" . kirlet($fileName) . "'"
            );
            
            $post = array(
                '`key`' => kirlet($key),
                '`kid`' => kirlet($fileName),
            );
            
            // Add language columns if they don't exist
            foreach ($languages as $dil => $title) {
                $knt = $dbConn->tekSorgu(
                    "SELECT COUNT(*) as tp FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'ceviri' AND COLUMN_NAME = '{$dil}' AND table_schema = '{$dbname}'"
                );
                
                if (isset($knt['tp']) && $knt['tp'] == 0) {
                    $dbConn->manualSql("ALTER TABLE ceviri ADD COLUMN `{$dil}` TEXT");
                }
                
                // Set translation value
                $value = isset($langValues[$dil]) ? $langValues[$dil] : '';
                $post["`{$dil}`"] = kirlet($value);
            }
            
            if (is_array($existing)) {
                // Update existing
                $dbConn->update('ceviri', $post, $existing['id']);
                $results['updated']++;
            } else {
                // Insert new
                $dbConn->insert('ceviri', $post);
                $results['inserted']++;
            }
            
            $results['success']++;
        } catch (\Exception $e) {
            $results['errors'][] = "Error ({$key}): " . $e->getMessage();
        }
    }
    
    // Regenerate language files from database
    if (method_exists($settings, 'ceviriDosyaYaz')) {
        try {
            $settings->ceviriDosyaYaz($fileName);
            echo '<div class="alert alert-success">Regenerated language files from database</div>';
        } catch (\Exception $e) {
            echo '<div class="alert alert-warning">Warning: Could not regenerate language files: ' . htmlspecialchars($e->getMessage()) . '</div>';
        }
    }
    
    // Show results
    echo '<div class="alert alert-success">';
    echo '<h4><i class="bi bi-check-circle"></i> Import Complete!</h4>';
    echo '<p><strong>Total processed:</strong> ' . $results['success'] . '</p>';
    echo '<p><strong>Updated:</strong> ' . $results['updated'] . '</p>';
    echo '<p><strong>Inserted:</strong> ' . $results['inserted'] . '</p>';
    echo '</div>';
    
    if (!empty($results['errors'])) {
        echo '<div class="alert alert-warning">';
        echo '<h4>Errors:</h4><ul>';
        foreach ($results['errors'] as $error) {
            echo '<li>' . htmlspecialchars($error) . '</li>';
        }
        echo '</ul></div>';
    }
    
    echo '<a href="../adminpanel/?cmd=ceviri/liste&kid=header" class="btn btn-primary">View in Admin Panel</a>';
}

?>
    </div>
</body>
</html>
<?php
ob_end_flush();
?>

