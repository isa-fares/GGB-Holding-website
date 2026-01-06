<?php

/**
 * Blog List Page - Clean Code Version
 * 
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// ============================================
// PAGE CONFIGURATION
// ============================================
$sayfa = "Blog Liste";
$baslik = $this->lang->header("Blog Liste");

// ============================================
// DATA PREPARATION
// ============================================

// Get all blog posts (without limit for pagination)
$all_blogs = $this->dbLangSelect(
    "blog",
    "aktif = 1 AND sil = 0 AND baslik <> ''",
    "resim",
    "",
    "ORDER BY sira ASC, id DESC"
);

// Pagination setup
$sayfaLimit = 3; // Number of posts per page
list($gecerli, $sayfaLimit, $toplamSayfa, $sayfa, $showlist) = $this->sayfalama($all_blogs, $sayfaLimit);

// Get paginated blogs
$blogs = $this->dbLangSelect(
    "blog",
    "aktif = 1 AND sil = 0 AND baslik <> ''",
    "resim",
    "LIMIT $gecerli, $sayfaLimit",
    "ORDER BY sira ASC, id DESC"
);

// ============================================
// PAGE META DATA
// ============================================
$this->setPageMeta(
    "Blog Liste",
    $baslik,
    null
);

// ============================================
// URL CONSTANTS
// ============================================
$urls = [
    'index' => $this->BaseURL($this->lang->link('index'), $lang, 1),
    'blog_liste' => $this->BaseURL($this->lang->link('blog_liste'), $lang, 1),
];

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
                 BLOG GRID SECTION
                 ============================================ -->
            <section class="blog-grid-page-ss pb-130" id="blogLister">
                <div class="container">
                    <div class="row">
                        <?php if (!empty($blogs) && is_array($blogs)): ?>
                            <?php foreach ($blogs as $blog): 
                                // Prepare blog data
                                $blog_title = $blog['baslik'];
                                $blog_description = isset($blog['ozet']) ? $blog['ozet'] : '';
                                $blog_image = $this->dbResimAl($blog['resim'], "blog", "390,360", true);
                                $blog_url_clean = preg_replace('/-\d+$/', '', $blog['url']);
                                $blog_url = $this->BaseURL($this->lang->link('blog_liste') . '/' . $blog_url_clean, $lang, 1);
                                $blog_date = $this->gun_ay_yil($blog['tarih']);
                                $blog_title_clean = $this->temizle($blog_title);
                                ?>
                                <div class="col-xl-4 col-md-6 col-sm-12">
                                    <div class="blog-post-item style-three" data-aos="fade-up" data-aos-duration="1200">
                                        <div class="post-thumbnail">
                                            <a href="<?= $blog_url ?>">
                                                <img src="<?= $blog_image ?>" alt="<?= $blog_title_clean ?>">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <div class="post-meta style-one">
                                                <span class="date">
                                                    <a href="<?= $blog_url ?>"><?= $blog_date ?></a>
                                                </span>
                                            </div>
                                            <h4 class="title">
                                                <a href="<?= $blog_url ?>">
                                                    <?= $blog_title_clean ?>
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-12">
                                <div class="alert alert-info text-center">
                                    <p><?= $this->lang->genel('no_blog_posts_message') ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Pagination -->
                    <?php if ($toplamSayfa > 1): ?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="sasly-pagination text-center mt-30">
                                    <?php
                                    $this->sayfalamaButon(array(
                                        "toplamSayfa" => $toplamSayfa,
                                        "sayfa" => $sayfa,
                                        "pageURL" => $urls['blog_liste'],
                                    ));
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </main>
    </div>
</div>
