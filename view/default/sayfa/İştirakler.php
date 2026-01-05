<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 * @var $id int
 * @var $katurl string
 */

// ---   Page Settings  ---
$table = "sayfa";
$categoryName = "İştirakler"; // Category name

// Get category pages
$istirakler_pages = $this->getCategoryPages($categoryName);

// Get current page data - if katurl parameter exists, get that specific page, otherwise get first page
$veri = null;
// Check for katurl parameter (for links like istirakler/kristal.html)
$katurl_param = isset($katurl) ? $katurl : "";
$current_page_url_clean = !empty($katurl_param) ? $katurl_param : null;

if ($current_page_url_clean && !empty($istirakler_pages)) {
    // Find the page by matching URL without numbers suffix
    // Database URLs contain numbers (e.g., kristal-1), but links are without numbers (e.g., kristal)
    foreach ($istirakler_pages as $p) {
        $p_url_clean = preg_replace('/-\d+$/', '', $p['url']);
        if ($p_url_clean == $current_page_url_clean) {
            $veri = $this->dbLangSelectRow($table, array("url" => $p['url']), "resim,banner");
            $current_page_url = $p['url']; // Store full URL (with numbers) for comparison
            break;
        }
    }
}

// If no specific page found, get the first page from category
if (!is_array($veri) && !empty($istirakler_pages)) {
    $first_page = $istirakler_pages[0];
    $veri = $this->dbLangSelectRow($table, array("url" => $first_page['url']), "resim,banner");
    $current_page_url = $first_page['url'];
}

// Check if page exists
if (!is_array($veri) || empty($veri)) {
    header("Location: " . $this->baseURL("hata", $lang, 1));
    exit;
}

$getID = $this->getID($veri);
$baslik = $this->temizle($veri["baslik"]);
$detay = htmlspecialchars_decode($veri["detay"]);
$ozet = $this->temizle($veri["ozet"]);
$kid = isset($veri["kid"]) ? $veri["kid"] : 0;

// Get page image
$boyut = $this->getimageinfo("sayfa", "", "big");
$resim = $this->dbResimAl($veri["resim"], "sayfa", $boyut);

// Get logo (banner) if exists
$logo = "";
if (!empty($veri["banner"])) {
    $logo_boyut = "600x300";
    $logo = $this->dbResimAl($veri["banner"], "sayfa", $logo_boyut);
}

// Set page meta data using setPageMeta function
$this->setPageMeta(
    $categoryName,  // Page name/key
    $baslik,  // Custom title (page title from database)
    $ozet,  // Custom description (page summary from database)
    null,  // Custom keywords (null = use default)
    "index, follow"  // Robots meta tag
);

if (!empty($resim)) {
    $this->ogResim = $resim;
} elseif (!empty($logo)) {
    $this->ogResim = $logo;
}

// Get category info for sidebar
$kategori_baslik = $categoryName;
$sidebar_pages = $istirakler_pages;

?>
<div id="">
    <div id="">
        <div class="line_wrap">
            <div class="line_item_one"></div>
            <div class="line_item"></div>
            <div class="line_item"></div>
            <div class="line_item"></div>
            <div class="line_item"></div>
        </div>
        <main>
            <section class="page_header177">
                <div class="container">
                    <div class="col-12">
                        <div>
                            <h1><?= $baslik ?></h1>
                            <section class="breadcrumb_section">
                                <div class="row">
                                    <div class="breadcrumb_overlay">
                                        <div class="breadcrumb">
                                            <a href="<?= $this->BaseURL($this->lang->link('index'), $lang, 1) ?>"><?= $this->lang->header('index') ?> </a>
                                            <a href="#"><?= $baslik ?> </a>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div>
                            <?= $this->ozetKisaca() ?>
                        </div>
                    </div>
                </div>
            </section>
            <section style="padding-bottom: 80px;">
                <div class="container">
                    <div class="row corporate_page">
                        <?php if (!empty($sidebar_pages) && count($sidebar_pages) > 0): ?>
                            <div class="col-lg-4 sidemenu119">
                                <div class="lister_sidebar">
                                    <div class="sub_menu wbx_1">
                                        <div class="CategorySubjects">
                                            <i></i>
                                            <?= $kategori_baslik ?>
                                        </div>
                                        <ul>
                                            <?php
                                            $istirakler_link = $this->lang->link('istirakler');
                                            foreach ($sidebar_pages as $sidebar_page):
                                                // Remove any numbers from end of URL (e.g., kristal-1 -> kristal)
                                                $sidebar_url_clean = preg_replace('/-\d+$/', '', $sidebar_page['url']);
                                                // Build URL: istirakler/page-url.html (without numbers)
                                                $sidebar_page_url = $this->BaseURL($istirakler_link . '/' . $sidebar_url_clean, $lang, 1);
                                                $is_active = ($sidebar_page['url'] == $current_page_url) ? 'active' : '';
                                            ?>
                                                <li>
                                                    <a href="<?= $sidebar_page_url ?>" class="<?= $is_active ?>"><?= $this->temizle($sidebar_page['baslik']) ?></a>
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
                                <div class="corporate content-detail">
                                    <?php if (!empty($logo)): ?>
                                        <div class="partner_logo">
                                            <div>
                                                <img src="<?= $logo ?>" alt="<?= $baslik ?> Logo">
                                            </div>
                                            <img src="<?= $resim ?>" alt="">
                                        </div>
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