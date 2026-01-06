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
$blog_Ek_Resimler = $this->dbLangSelect(
    "dosyalar", 
    "type = 'blog' AND data_id = $blog_id", 
    "dosya", 
    "", 
    "ORDER BY sira ASC", 
    false, 
    null
);

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
$urls = [
    'blog_liste' => $this->BaseURL($this->lang->link('blog_liste'), $lang, 1),
];

// ============================================
// SHARE DATA
// ============================================
$share_message = urlencode($this->lang->genel('blog_share_message'));
$current_url = 'window.location.href';

?>
<div id="smooth-wrapper">
    <div id="smooth-content">
        <div class="line_wrap">
            <div class="line_item_one"></div>
            <div class="line_item"></div>
            <div class="line_item"></div>
            <div class="line_item"></div>
            <div class="line_item"></div>
        </div>

        <main>
            <!-- ============================================
                 PAGE HERO SECTION
                 ============================================ -->
            <section class="page-hero-ss">
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
                                        <?php if (!empty($blog_resim)): ?>
                                            <div class="post-thumbnail">
                                                <img src="<?= $blog_resim ?>" alt="<?= $blog_baslik ?>">
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
                                               href="https://twitter.com/intent/tweet?text=<?= $share_message ?>&url=" 
                                               onclick="this.href+= encodeURIComponent(window.location.href)">
                                                <i class="fa-brands fa-x-twitter"></i>
                                            </a>
                                            <a target="_blank" 
                                               href="https://www.linkedin.com/sharing/share-offsite/?url=" 
                                               onclick="this.href+= encodeURIComponent(window.location.href)">
                                                <i class="fa-brands fa-linkedin-in"></i>
                                            </a>
                                            <a target="_blank" 
                                               href="https://www.facebook.com/sharer/sharer.php?u=" 
                                               onclick="this.href+= encodeURIComponent(window.location.href)">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </a>
                                            <a target="_blank" 
                                               href="https://api.whatsapp.com/send?text=<?= $share_message ?>:%20" 
                                               onclick="this.href+= encodeURIComponent(window.location.href)">
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
    </div>
</div>
