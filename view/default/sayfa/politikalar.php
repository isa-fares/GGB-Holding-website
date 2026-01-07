<?php

/**
 * Policies Pages Template - Clean Code Version
 * 
 * This template handles category pages like politikalar/cevre-politikasi.html
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
$categoryName = "Politikalar";

// ============================================
// DATA PREPARATION
// ============================================

// Get category pages
$politikalar_pages = $this->getCategoryPages($categoryName);

// Get current page data - if katurl parameter exists, get that specific page, otherwise get first page
$veri = null;
$katurl_param = isset($katurl) ? $katurl : "";
$current_page_url_clean = !empty($katurl_param) ? $katurl_param : null;

if ($current_page_url_clean && !empty($politikalar_pages)) {
    // Find the page by matching URL without numbers suffix
    foreach ($politikalar_pages as $p) {
        $p_url_clean = preg_replace('/-\d+$/', '', $p['url']);
        if ($p_url_clean == $current_page_url_clean) {
            $veri = $this->dbLangSelectRow($table, array("url" => $p['url']), "resim");
            $current_page_url = $p['url'];
            break;
        }
    }
}

// If no specific page found, get the first page from category
if (!is_array($veri) && !empty($politikalar_pages)) {
    $first_page = $politikalar_pages[0];
    $veri = $this->dbLangSelectRow($table, array("url" => $first_page['url']), "resim");
    $current_page_url = $first_page['url'];
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
    $categoryName,
    $baslik,
    $ozet,
    null,
    "index, follow"
);

if (!empty($resim)) {
    $this->ogResim = $resim;
}

// ============================================
// SIDEBAR DATA
// ============================================
$kategori_baslik = $categoryName;
$sidebar_pages = $politikalar_pages;

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
                            <p><?= $this->ozetKisaca() ?></p>
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
                                            <?php 
                                            $politikalar_link = $this->lang->link('politikalar');
                                            foreach ($sidebar_pages as $sidebar_page): 
                                                // Prepare sidebar link
                                                $sidebar_url_clean = preg_replace('/-\d+$/', '', $sidebar_page['url']);
                                                $sidebar_page_url = $this->BaseURL($politikalar_link . '/' . $sidebar_url_clean, $lang, 1);
                                                $is_active = ($sidebar_page['url'] == $current_page_url) ? 'active' : '';
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
