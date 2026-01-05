<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Page Configuration
$sayfa = "Blog Liste";  // Page name
$baslik = $this->lang->header("Blog Liste"); // Page title from translation file

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

// Set page meta
$this->setPageMeta(
    "Blog Liste",
    $baslik,
    null
);

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
                                    <p><?= $this->ozetKisaca() ?></p>
                                </div>
                            </div>
                        </div>
                    </section>
                    
                    <section class="blog-grid-page-ss pb-130" id="blogLister">
                        <div class="container">
                            <div class="row">
                                <?php if (!empty($blogs) && is_array($blogs)): ?>
                                    <?php foreach ($blogs as $blog): ?>
                                        <?php
                                        $baslik = $blog['baslik'];
                                        $ozet = isset($blog['ozet']) ? $blog['ozet'] : '';
                                        $resim = $this->dbResimAl($blog['resim'], "blog", "390,360", true);
                                        // Remove -id suffix from URL (e.g., yesil-enerjiyle-gelecege-yatirim-ggb-holding-in-vizyonu-1 -> yesil-enerjiyle-gelecege-yatirim-ggb-holding-in-vizyonu)
                                        $blog_url_clean = preg_replace('/-\d+$/', '', $blog['url']);
                                        $url = $this->BaseURL('blog/' . $blog_url_clean, $lang, 1);
                                        $tarih = $this->gun_ay_yil($blog['tarih']);
                                        ?>
                                        <div class="col-xl-4 col-md-6 col-sm-12">
                                            <div class="blog-post-item style-three" data-aos="fade-up" data-aos-duration="1200">
                                                <div class="post-thumbnail">
                                                    <a href="<?= $url ?>">
                                                        <img src="<?= $resim ?>" alt="<?= $this->temizle($baslik) ?>">
                                                    </a>
                                                </div>
                                                <div class="post-content">
                                                    <div class="post-meta style-one">
                                                        <span class="date"><a href="<?= $url ?>"><?= $tarih ?></a></span>
                                                    </div>
                                                    <h4 class="title">
                                                        <a href="<?= $url ?>">
                                                            <?= $this->temizle($baslik) ?>
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
                    
                            <?php if ($toplamSayfa > 1): ?>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="sasly-pagination text-center mt-30">
                                            <?php
                                            $blog_liste_url = $this->BaseURL($this->lang->link('blog_liste'), $lang, 1);
                                            $this->sayfalamaButon(array(
                                                "toplamSayfa" => $toplamSayfa,
                                                "sayfa" => $sayfa,
                                                "pageURL" => $blog_liste_url,
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </section>                    

                </main>
