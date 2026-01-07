<?php

/**
 * Homepage Template - Clean Code Version
 * 
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// ============================================
// PAGE CONFIGURATION
// ============================================
$this->setPageMeta(
    "Anasayfa",
    null,
    null,
    null,
    "index, follow"
);

// ============================================
// HELPER FUNCTIONS (Inline - $this is available in included file scope)
// ============================================


// ============================================
// DATA PREPARATION
// ============================================

// Get category pages for partners section
$isitirakler_sayfalar = $this->getCategoryPages("İştirakler");

// Get latest blog posts (limit 3)
$blogs = $this->dbLangSelect(
    "blog",
    "aktif = 1 AND sil = 0 AND baslik <> ''",
    "resim",
    "LIMIT 3",
    "ORDER BY sira ASC"
);

// ============================================
// URL CONSTANTS
// ============================================
$urls = [
    'istirakler' => $this->BaseURL($this->lang->link('istirakler'), $lang, 1),
    'kurumsal' => $this->BaseURL($this->lang->link('kurumsal'), $lang, 1),
    'blog_liste' => $this->BaseURL($this->lang->link('blog_liste'), $lang, 1),
    'politikalar' => $this->BaseURL($this->lang->link('politikalar'), $lang, 1),
];

// ============================================
// IMAGE ASSETS
// ============================================
$images = [
    'hero' => $assetURL . 'images/hero-img1.jpg',
    'about' => $assetURL . 'images/ia.jpg',
    'sustainability' => $assetURL . 'images/sust.jpg',
];

?>
<!-- END_HEADER -->
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
                 HERO SECTION
                 ============================================ -->
            <section class="hero-sb">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7">
                            <div class="hero-content">
                                <span class="sub-heading">
                                    <i class="far fa-arrow-right"></i>
                                    <?= $this->lang->index('hero_subheading') ?>
                                </span>
                                <h1 class="split">
                                    <span class="font-200"><?= $this->lang->index('hero_title_1') ?></span>
                                    <span class="font-400"><?= $this->lang->index('hero_title_2') ?></span>
                                    <span class="font-700"><?= $this->lang->index('hero_title_3') ?></span>
                                </h1>
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="hero-content">
                                <div class="text-box" data-aos="fade-down" data-aos-duration="1800">
                                    <p><?= $this->lang->index('hero_description') ?></p>
                                    <a href="<?= $urls['istirakler'] ?>" class="theme-btn style-two">
                                        <?= $this->lang->index('hero_cta') ?>
                                        <i class="far fa-angle-double-right"></i>
                                    </a>
                                </div>
                                <div class="hero-image" data-aos="fade-up" data-aos-duration="2000">
                                    <img src="<?= $images['hero'] ?>" alt="hero img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ============================================
                 VALUES SECTION
                 ============================================ -->
            <section class="what-we-sb">
                <div class="wrapper primary-bg pt-60 pb-100">
                    <div class="animated-big-text pb-75">
                        <div class="headline-wrap style-one">
                            <span class="marquee-wrap">
                                <span class="marquee-inner left">
                                    <span class="marquee-item"><b><?= $this->lang->index('values_marquee') ?></b></span>
                                    <span class="marquee-item"><b><?= $this->lang->index('values_marquee') ?></b></span>
                                </span>
                                <span class="marquee-inner left">
                                    <span class="marquee-item"><b><?= $this->lang->index('values_marquee') ?></b></span>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title style-one text-white text-center mb-60"
                                    data-aos="fade-up" data-aos-duration="1500">
                                    <span class="sub-heading">
                                        <i class="far fa-arrow-right"></i>
                                        <?= $this->lang->index('values_subheading') ?>
                                    </span>
                                    <h2 class="text-anm">
                                        <span class="font-200"><?= $this->lang->index('values_title_1') ?></span>
                                        <?= $this->lang->index('values_title_2') ?>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <!-- Value Box 1 -->
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="sasly-info-box style-one mb-30" data-aos="fade-up">
                                    <div class="content">
                                        <div class="number">01</div>
                                        <h4 class="title"><?= $this->lang->index('value_1_title') ?></h4>
                                        <p><?= $this->lang->index('value_1_desc') ?></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Value Box 2 -->
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="sasly-info-box style-one mb-30"
                                    data-aos="fade-up" data-aos-duration="1800">
                                    <div class="content">
                                        <div class="number">02</div>
                                        <h4 class="title"><?= $this->lang->index('value_2_title') ?></h4>
                                        <p><?= $this->lang->index('value_2_desc') ?></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Value Box 3 -->
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="sasly-info-box style-one mb-30"
                                    data-aos="fade-up" data-aos-duration="2100">
                                    <div class="content">
                                        <div class="number">03</div>
                                        <h4 class="title"><?= $this->lang->index('value_3_title') ?></h4>
                                        <p><?= $this->lang->index('value_3_desc') ?></p>
                                    </div>
                                </div>
                            </div>
                            <!-- CTA Button -->
                            <div class="col-12" id="jj_theme">
                                <a href="<?= $urls['kurumsal'] ?>"
                                    class="theme-btn style-two"
                                    data-aos="fade-up"
                                    data-aos-duration="1800">
                                    <?= $this->lang->index('values_cta') ?>
                                    <i class="far fa-angle-double-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ============================================
                 ABOUT SECTION
                 ============================================ -->
            <section class="about-sb pt-130 pb-75">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title style-one mb-60" style="margin-left: 0">
                                <span class="sub-heading">
                                    <i class="far fa-arrow-right"></i>
                                    <?= $this->lang->index('about_subheading') ?>
                                </span>
                                <h2 class="text-anm">
                                    <span class="font-200"><?= $this->lang->index('about_title_1') ?></span>
                                    <?= $this->lang->index('about_title_2') ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="section-content-box style-one mb-55">
                                <div class="experience-box mb-60" data-aos="fade-up">
                                    <div class="number">55+</div>
                                    <div class="duration">
                                        <?= $this->lang->index('about_experience_label') ?>
                                    </div>
                                </div>
                                <?= $this->kisaca() ?>
                                <div class="row">
                                    <div class="col-12" data-aos="fade-up">
                                        <ul class="check-list style-one mb-0">
                                            <li>
                                                <i class="fas fa-badge-check"></i>
                                                <?= $this->lang->index('about_list_1') ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-12" data-aos="fade-up">
                                        <ul class="check-list style-one">
                                            <li>
                                                <i class="fas fa-badge-check"></i>
                                                <?= $this->lang->index('about_list_2') ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="about-button" data-aos="fade-up">
                                    <a href="<?= $urls['kurumsal'] ?>" class="theme-btn style-two">
                                        <?= $this->lang->index('about_cta') ?>
                                        <i class="far fa-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="section-image-box mb-55">
                                <div class="ia_overlay">
                                    <span><?= $this->lang->index('about_overlay_text') ?></span>
                                    <img src="<?= $images['about'] ?>"
                                        class="rounded-3 translate-img"
                                        alt="GGB Holding Hakkımızda">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="animated-big-text">
                    <div class="headline-wrap style-two">
                        <span class="marquee-wrap">
                            <span class="marquee-inner left">
                                <span class="marquee-item"><b><?= $this->lang->index('marquee_innovation') ?></b></span>
                                <span class="marquee-item"><b><?= $this->lang->index('marquee_quality') ?></b></span>
                                <span class="marquee-item"><b><?= $this->lang->index('marquee_trust') ?></b></span>
                            </span>
                            <span class="marquee-inner left">
                                <span class="marquee-item"><b><?= $this->lang->index('marquee_innovation') ?></b></span>
                                <span class="marquee-item"><b><?= $this->lang->index('marquee_quality') ?></b></span>
                                <span class="marquee-item"><b><?= $this->lang->index('marquee_trust') ?></b></span>
                            </span>
                        </span>
                    </div>
                </div>
            </section>

            <!-- ============================================
                 PARTNERS SECTION
                 ============================================ -->
            <section class="core-features-sb">
                <div class="features-wrapper main-gray-bg pt-130 pb-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title style-one text-center mb-60">
                                    <span class="sub-heading">
                                        <i class="far fa-arrow-right"></i>
                                        <?= $this->lang->index('partners_subheading') ?>
                                    </span>
                                    <h2 class="text-anm">
                                        <span class="font-200"><?= $this->lang->index('partners_title_1') ?></span>
                                        <?= $this->lang->index('partners_title_2') ?>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach ($isitirakler_sayfalar as $sayfa) :
                                // Prepare partner data
                                $istirakler_link = $this->lang->link('istirakler');
                                $page_url_clean = preg_replace('/-\d+$/', '', $sayfa['url']);
                                $partnerUrl = $this->BaseURL($istirakler_link . '/' . $page_url_clean, $lang, 1);
                                $partnerTitle = $sayfa['baslik'];
                                $partnerDescription = $sayfa['ozet'];
                                $partnerImage = $this->dbResimAl($sayfa['resim'], "sayfa", "600,400");
                                $partnerLogo = $this->dbResimAl($sayfa['banner'], "sayfa", "600,300");

                                // Format title into two words
                                $baslik_words = explode(" ", $partnerTitle);
                                $titleWords = [
                                    'first' => $baslik_words[0] ?? '',
                                    'second' => $baslik_words[1] ?? ''
                                ];
                            ?>
                                <div class="col-md-6">
                                    <div class="sasly-card-item style-one mb-30"
                                        data-aos="fade-up"
                                        data-aos-duration="1300">
                                        <div class="content-box">
                                            <div class="content">
                                                <h5>
                                                    <?= $titleWords['first'] ?>
                                                    <span><?= $titleWords['second'] ?></span>
                                                </h5>
                                                <p><?= $partnerDescription ?></p>
                                            </div>
                                        </div>
                                        <div class="thumbnail" style="max-height: none">
                                            <a href="<?= $partnerUrl ?>" class="partner_logo">
                                                <img src="<?= $partnerImage ?>" alt="<?= $partnerTitle ?>">
                                                <div>
                                                    <img src="<?= $partnerLogo ?>" alt="<?= $partnerTitle ?>">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ============================================
                 BLOG SECTION
                 ============================================ -->
            <section class="blogs-sb pt-130 pb-50" id="indexBlog">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title text-center mb-120">
                                <span class="sub-heading">
                                    <i class="far fa-arrow-right"></i>
                                    <?= $this->lang->index('blog_subheading') ?>
                                </span>
                                <h2 class="text-anm">
                                    <span class="font-200"><?= $this->lang->index('blog_title_1') ?></span><br>
                                    <?= $this->lang->index('blog_title_2') ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <?php foreach ($blogs as $blog) :
                            // Prepare blog data
                            $blogTitle = $blog['baslik'];
                            $blogDescription = $blog['ozet'];
                            $blogImage = $this->dbResimAl($blog['resim'], "blog", "390,360");
                            $blog_link = $this->lang->link('blog_liste');
                            $blog_url_clean = preg_replace('/-\d+$/', '', $blog['url']);
                            $blogUrl = $this->BaseURL($blog_link . '/' . $blog_url_clean, $lang, 1);
                            $blogDate = $this->gun_ay_yil($blog['tarih']);
                        ?>
                            <div class="col-xl-4 col-md-6">
                                <div class="blog-post-item style-one mb-80"
                                    data-aos="fade-up"
                                    data-aos-duration="1200">
                                    <div class="post-thumbnail">
                                        <a href="<?= $blogUrl ?>">
                                            <img src="<?= $blogImage ?>" alt="<?= $blogTitle ?>">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <div class="post-meta style-one">
                                            <span class="date">
                                                <a href="<?= $blogUrl ?>"><?= $blogDate ?></a>
                                            </span>
                                        </div>
                                        <h4 class="title">
                                            <a href="<?= $blogUrl ?>">
                                                <?= $blogTitle ?>
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-cta text-center" data-aos="fade-up" data-aos-duration="1200">
                                <a href="<?= $urls['blog_liste'] ?>" class="theme-btn style-one">
                                    <?= $this->lang->index('blog_cta') ?>
                                    <i class="far fa-angle-double-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ============================================
                 SUSTAINABILITY CTA SECTION
                 ============================================ -->
            <section class="cta-sb bg_cover p-r z-1"
                id="index_sust"
                style="background-image: url(<?= $images['sustainability'] ?>);">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-8">
                            <div class="section-content-box">
                                <div class="section-title text-white mb-55">
                                    <h2 class="text-anm">
                                        <span class="font-200"><?= $this->lang->index('sustainability_title_1') ?></span><br>
                                        <?= $this->lang->index('sustainability_title_2') ?>
                                    </h2>
                                </div>
                                <div class="cta-button" data-aos="fade-up" data-aos-duration="1200">
                                    <a href="<?= $urls['politikalar'] ?>" class="theme-btn style-one">
                                        <?= $this->lang->index('sustainability_cta') ?>
                                        <i class="far fa-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- START_FOOTER -->