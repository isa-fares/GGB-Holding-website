<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 * @var $data array
 */

// Get blog URL from katurl parameter (e.g., blog/yesil-enerjiyle-gelecege-yatirim-ggb-holding-in-vizyonu)
$blog_url = isset($data['katurl']) ? $data['katurl'] : (isset($_GET['katurl']) ? $_GET['katurl'] : '');

// Get blog post from database by URL
$blog = null;
if (!empty($blog_url)) {
    // Find blog by matching URL without numbers suffix
    // Database URLs contain numbers (e.g., yesil-enerjiyle-gelecege-yatirim-ggb-holding-in-vizyonu-1)
    // but links are without numbers (e.g., yesil-enerjiyle-gelecege-yatirim-ggb-holding-in-vizyonu)
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
    // Redirect to blog list if not found
    header("Location: " . $this->BaseURL($this->lang->link('blog_liste'), $lang, 1));
    exit;
}

// Extract blog data
$blog_baslik = $this->temizle($blog['baslik']);
$blog_detay = isset($blog['detay']) ? htmlspecialchars_decode($blog['detay']) : '';
$blog_ozet = isset($blog['ozet']) ? $this->temizle($blog['ozet']) : '';
$blog_resim = $this->dbResimAl($blog['resim'], "blog", "1200,600", true);
$blog_tarih = isset($blog['tarih']) ? $this->gun_ay_yil($blog['tarih']) : '';
$blog_liste_url = $this->BaseURL($this->lang->link('blog_liste'), $lang, 1);

// Get blog ID for dosyalar table
// dosyalar table stores data_id as the main blog ID (from blog table, not blog_lang)
// If master_id exists, use it; otherwise use id (for Turkish language)
$blog_id = (!empty($blog['master_id'])) ? intval($blog['master_id']) : intval($blog['id']);

// Get additional images from dosyalar table for current blog only
//dbLangSelect($table, $kosul = "", $resimler = "", $limit = "", $order = "", $showSql = false, $group = null)
$blog_Ek_Resimler = $this->dbLangSelect("dosyalar", "type = 'blog' AND data_id = $blog_id", "dosya", "", "ORDER BY sira ASC", false, null);
// Set page meta
$this->setPageMeta(
    "Blog Detay",
    $blog_baslik,
    $blog_ozet
);
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

                <section class="page-hero-ss">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="page-content text-center">
                                    <h3 class="page-title">
                                        <a href="<?= $blog_liste_url ?>">
                                            <i class="fa-regular fa-arrow-left"></i><?= $this->lang->genel('blog_other_posts') ?>
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
                                        <div class="entry-footer">
                                            <div class="social-share">
                                                <span><?= $this->lang->genel('blog_share') ?></span>
                                                <?php $share_message = urlencode($this->lang->genel('blog_share_message')); ?>
                                                <a target="_blank" href="https://twitter.com/intent/tweet?text=<?= $share_message ?>&url=" onclick="this.href+= encodeURIComponent(window.location.href)"><i class="fa-brands fa-x-twitter"></i></a>
                                                <a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=" onclick="this.href+= encodeURIComponent(window.location.href)"><i class="fa-brands fa-linkedin-in"></i></a>
                                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=" onclick="this.href+= encodeURIComponent(window.location.href)"><i class="fa-brands fa-facebook-f"></i></a>
                                                <a target="_blank" href="https://api.whatsapp.com/send?text=<?= $share_message ?>:%20" onclick="this.href+= encodeURIComponent(window.location.href)"><i class="fa-brands fa-whatsapp"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </main>
