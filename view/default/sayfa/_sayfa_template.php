<?php

/**
 * Generic Page Template - Clean Code Version
 * 
 * This template is used for dynamic pages from the database
 * 
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 * @var $id int
 * @var $katurl string
 */

// ============================================
// PAGE CONFIGURATION
// ============================================
$table = "sayfa";

// ============================================
// DATA PREPARATION
// ============================================

// Get page data from database based on URL
// Try to find page with exact URL first
$veri = $this->dbLangSelectRow($table, array("url" => $page), "resim");

// If not found, try to find by matching without numbers at the end
if (!is_array($veri) || empty($veri)) {
    // Get all pages to search
    $all_pages = $this->dbLangSelect(
        $table, 
        "aktif = 1 and baslik <> ''", 
        "", 
        "", 
        "ORDER BY sira ASC"
    );
    
    if (is_array($all_pages)) {
        foreach ($all_pages as $p) {
            $p_url_clean = preg_replace('/-\d+$/', '', $p['url']);
            if ($p_url_clean == $page) {
                $veri = $this->dbLangSelectRow($table, array("url" => $p['url']), "resim");
                break;
            }
        }
    }
}

// Check if page exists
if (!is_array($veri) || empty($veri)) {
    header("Location: " . $this->baseURL("hata", $lang, 1));
    exit;
}

// Extract page data
$getID = $this->getID($veri);
$baslik = $this->temizle($veri["baslik"]);
$detay = htmlspecialchars_decode($veri["detay"]);
$ozet = $this->temizle($veri["ozet"]);
$kid = isset($veri["kid"]) ? $veri["kid"] : 0;

// Get page image
$boyut = $this->getimageinfo("sayfa", "", "big");
$resim = $this->dbResimAl($veri["resim"], "sayfa", $boyut);

// ============================================
// PAGE META DATA
// ============================================
$this->setPageMeta(
    $page,      // Page name/key (URL from database)
    $baslik,    // Custom title (page title from database)
    $ozet,      // Custom description (page summary from database)
    null,       // Custom keywords (null = use default)
    "index, follow"  // Robots meta tag
);

if (!empty($resim)) {
    $this->ogResim = $resim;
}

// ============================================
// SIDEBAR DATA PREPARATION
// ============================================
$kategori_baslik = "";
$sidebar_pages = array();

if ($kid > 0) {
    // Get category name (always in Turkish for consistency)
    $originalLang = $this->pageLang;
    $this->pageLang = "tr";
    $kategori = $this->dbLangSelectRow("sayfakategori", ["id" => $kid]);
    $this->pageLang = $originalLang;
    
    if ($kategori && isset($kategori["baslik"])) {
        $kategori_baslik = $kategori["baslik"];
        
        // Get all pages from same category for sidebar
        $sidebar_pages = $this->dbLangSelect(
            "sayfa",
            "aktif = 1 and baslik <> '' and kid = " . $kid,
            "",
            "",
            "ORDER BY sira ASC"
        );
        
        if (!is_array($sidebar_pages)) {
            $sidebar_pages = array();
        }
    }
}

// ============================================
// URL CONSTANTS
// ============================================
$urls = [
    'index' => $this->BaseURL($this->lang->link('index'), $lang, 1),
];

?>
<div id="">
    <div id="">
        <main>
            <!-- ============================================
                 PAGE HEADER SECTION
                 ============================================ -->
            <section class="page_header177">
                <div class="container">
                    <div class="col-12">
                        <div>
                            <h1><?= $baslik ?></h1>
                            <section class="breadcrumb_section">
                                <div class="row">
                                    <div class="breadcrumb_overlay">
                                        <div class="breadcrumb">
                                            <a href="<?= $urls['index'] ?>">
                                                <?= $this->lang->header('index') ?>
                                            </a>
                                            <a href="#"><?= $baslik ?></a>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div>
                            <?php if (!empty($ozet)): ?>
                                <p><?= $ozet ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ============================================
                 PAGE CONTENT SECTION
                 ============================================ -->
            <section style="padding-bottom: 80px;">
                <div class="container">
                    <div class="row corporate_page">
                        <?php if (!empty($sidebar_pages) && count($sidebar_pages) > 0): ?>
                            <!-- Sidebar -->
                            <div class="col-lg-4 sidemenu119">
                                <div class="lister_sidebar">
                                    <div class="sub_menu wbx_1">
                                        <div class="CategorySubjects">
                                            <i></i>
                                            <?= $kategori_baslik ?>
                                        </div>
                                        <ul>
                                            <?php foreach ($sidebar_pages as $sidebar_page): 
                                                // Prepare sidebar link
                                                $sidebar_url_clean = preg_replace('/-\d+$/', '', $sidebar_page['url']);
                                                $sidebar_url = $this->lang->link($sidebar_url_clean);
                                                $sidebar_page_url = $this->BaseURL($sidebar_url, $lang, 1);
                                                $is_active = ($sidebar_page['url'] == $page) ? 'active' : '';
                                                $sidebar_title = $this->temizle($sidebar_page['baslik']);
                                                ?>
                                                <li>
                                                    <a href="<?= $sidebar_page_url ?>" class="<?= $is_active ?>">
                                                        <?= $sidebar_title ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                        <?php else: ?>
                            <div class="col-lg-12">
                        <?php endif; ?>
                                <!-- Main Content -->
                                <div class="corporate content-detail">
                                    <?php if (!empty($resim)): ?>
                                        <img src="<?= $resim ?>" alt="<?= $baslik ?>">
                                    <?php endif; ?>
                                    
                                    <?= $detay ?>
                                </div>
                            </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>
