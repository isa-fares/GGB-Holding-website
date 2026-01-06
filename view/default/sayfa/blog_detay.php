<?php

/**
 * Blog Detail Page - Clean Code Version
 * 
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 * @var $data array
 */

// ============================================
// DATA PREPARATION
// ============================================

// Get blog URL from katurl parameter
$blog_url = isset($data['katurl']) ? $data['katurl'] : (isset($_GET['katurl']) ? $_GET['katurl'] : '');

// Get blog post from database by URL
$blog = null;
if (!empty($blog_url)) {
    // Find blog by matching URL without numbers suffix
    $all_blogs = $this->dbLangSelect(
        "blog",
        "aktif = 1 AND sil = 0 AND baslik <> ''",
        "resim",
        "",
        "ORDER BY sira ASC, id DESC"
    );

    if (is_array($all_blogs)) {
        foreach ($all_blogs as $b) {
            $b_url_clean = preg_replace('/-\d+$/', '', $b['url']);
            if ($b_url_clean == $blog_url) {
                $blog = $this->dbLangSelectRow("blog", ["url" => $b['url']], "resim");
                break;
            }
        }
    }
}

// If still not found, try to get by ID (fallback)
if (!$blog || !is_array($blog) || empty($blog)) {
    $blog_id = isset($data['id']) ? intval($data['id']) : (isset($_GET['id']) ? intval($_GET['id']) : 0);
    if ($blog_id > 0) {
        $blog = $this->dbLangSelectRow("blog", ["id" => $blog_id, "master_id" => $blog_id], "resim");
    }
}

// Check if blog exists
if (!$blog || !is_array($blog) || empty($blog)) {
    header("Location: " . $this->BaseURL($this->lang->link('blog_liste'), $lang, 1));
    exit;
}

// Extract blog data
$blog_baslik = $this->temizle($blog['baslik']);
$blog_detay = isset($blog['detay']) ? htmlspecialchars_decode($blog['detay']) : '';
$blog_ozet = isset($blog['ozet']) ? $this->temizle($blog['ozet']) : '';
$blog_resim = $this->dbResimAl($blog['resim'], "blog", "1200,600", true);
$blog_tarih = isset($blog['tarih']) ? $this->gun_ay_yil($blog['tarih']) : '';

// Get blog ID for dosyalar table
$blog_id = (!empty($blog['master_id'])) ? intval($blog['master_id']) : intval($blog['id']);

// Get additional images from dosyalar table
// Note: dosyalar table has lang column directly, not a separate _lang table
// Sanitize language code for SQL query
$lang_safe = addslashes($lang);
$blog_Ek_Resimler = $this->sorgu(
    "SELECT * FROM dosyalar 
     WHERE type = 'blog' AND data_id = $blog_id 
     AND tur = 'resim' AND lang = '$lang_safe' AND sil <> 1 
     ORDER BY sira ASC, id DESC"
);

// Ensure it's an array
if (!is_array($blog_Ek_Resimler)) {
    $blog_Ek_Resimler = array();
}

// ============================================
// PAGE META DATA
// ============================================
$this->setPageMeta(
    "Blog Detay",
    $blog_baslik,
    $blog_ozet
);

// ============================================
// URL CONSTANTS
// ============================================
$blog_url_clean = preg_replace('/-\d+$/', '', $blog['url']);
$blog_page_url = $this->BaseURL($this->lang->link('blog_liste') . '/' . $blog_url_clean, $lang, 1);

$urls = [
    'blog_liste' => $this->BaseURL($this->lang->link('blog_liste'), $lang, 1),
    'current_page' => isset($this->fullUrl) ? $this->fullUrl : $blog_page_url,
];

// ============================================
// SHARE DATA
// ============================================
$share_message = urlencode($this->lang->genel('blog_share_message'));
$current_url = urlencode($urls['current_page']);

// Get additional images from dosyalar table (if not already fetched)
if (empty($blog_Ek_Resimler) || !is_array($blog_Ek_Resimler)) {
    $blog_Ek_Resimler = $this->sorgu("SELECT * FROM dosyalar 
        WHERE type = 'blog' 
        AND tur = 'resim' 
        AND data_id = $blog_id
        AND sil <> 1
        AND lang = '$lang_safe'
        AND aktif = 1
        ORDER BY sira ASC");

    if (!is_array($blog_Ek_Resimler)) {
        $blog_Ek_Resimler = array();
    }
}

$blog_Ek_Resimler_img = (!empty($blog_Ek_Resimler[0]['dosya']))
    ? $this->dbResimAl($blog_Ek_Resimler[0]['dosya'], "blog", "1172x0", true)
    : '';
?>
<main>
    <!-- ============================================
                    PAGE HERO SECTION
                    ============================================ -->
    <section class="page-hero-ss" style="padding: 100px 0px 40px !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-content text-center">
                        <h3 class="page-title">
                            <a href="<?= $urls['blog_liste'] ?>">
                                <i class="fa-regular fa-arrow-left"></i>
                                <?= $this->lang->genel('blog_other_posts') ?>
                            </a><br>
                            <?= $blog_baslik ?>
                        </h3>
                        <ul class="breadcrumb-link">
                            <?php if (!empty($blog_tarih)): ?>
                                <li><?= $blog_tarih ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
                    BLOG DETAILS SECTION
                    ============================================ -->
    <section class="blog-details-ss pb-80">
        <div class="container">
            <div class="blog-details-wrapper">
                <div class="row" style="justify-content: center;">
                    <div class="col-md-9">
                        <div class="blog-post-main mb-70">
                            <div class="blog-post-item">
                                <?php if (!empty($blog_Ek_Resimler[0]['dosya'])): ?>
                                    <div class="post-thumbnail">
                                        <img src="<?= $blog_Ek_Resimler_img ?>" alt="<?= $blog_baslik ?>">
                                    </div>
                                <?php endif; ?>

                                <div class="content-detail">
                                    <?php if (!empty($blog_detay)): ?>
                                        <?= $blog_detay ?>
                                    <?php else: ?>
                                        <p><?= $blog_ozet ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Social Share -->
                            <div class="entry-footer">
                                <div class="social-share">
                                    <span><?= $this->lang->genel('blog_share') ?></span>
                                    <a target="_blank"
                                        href="https://twitter.com/intent/tweet?text=<?= $share_message ?>&url=<?= $current_url ?>">
                                        <i class="fa-brands fa-x-twitter"></i>
                                    </a>
                                    <a target="_blank"
                                        href="https://www.linkedin.com/sharing/share-offsite/?url=<?= $current_url ?>">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                    <a target="_blank"
                                        href="https://www.facebook.com/sharer/sharer.php?u=<?= $current_url ?>">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                    <a target="_blank"
                                        href="https://api.whatsapp.com/send?text=<?= $share_message ?>%20<?= $current_url ?>">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>