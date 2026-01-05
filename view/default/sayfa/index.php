<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Page Configuration - Set Meta Tags automatically
$this->setPageMeta(
    "Anasayfa",  // Page name/key
    null,  // Custom title (null = use from lang->header)
    null,  // Custom description (null = use default from ayarlar)
    null,  // Custom keywords (null = use default from ayarlar)
    "index, follow"  // Robots meta tag
);


$isitirakler_sayfalar = $this->getCategoryPages("İştirakler");
$blogs = $this->dbLangSelect(
    "blog",
    "aktif = 1 AND sil = 0 AND baslik <> ''",
    "resim",
    "LIMIT 3",
    "ORDER BY sira ASC"
);


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
                <section class="hero-sb">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7">
                                <div class="hero-content">
                                    <span class="sub-heading"><i class="far fa-arrow-right"></i><?= $this->lang->index('hero_subheading') ?></span>
                                    <h1 class="split"><span class="font-200"><?= $this->lang->index('hero_title_1') ?></span><span
                                            class="font-400"><?= $this->lang->index('hero_title_2') ?></span> <span class="font-700"><?= $this->lang->index('hero_title_3') ?></span></h1>
                                </div>
                            </div>
                            <div class="col-xl-5">
                                <div class="hero-content">
                                    <div class="text-box" data-aos="fade-down" data-aos-duration="1800">
                                        <p><?= $this->lang->index('hero_description') ?></p>
                                        <a href="#" class="theme-btn style-two"><?= $this->lang->index('hero_cta') ?><i
                                                class="far fa-angle-double-right"></i></a>
                                    </div>
                                    <div class="hero-image" data-aos="fade-up" data-aos-duration="2000">
                                        <img src="<?= $assetURL ?>images/hero-img1.jpg" alt="hero img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
                                    <div class="section-title style-one text-white text-center mb-60" data-aos="fade-up"
                                        data-aos-duration="1500">
                                        <span class="sub-heading"><i class="far fa-arrow-right"></i><?= $this->lang->index('values_subheading') ?></span>
                                        <h2 class="text-anm"><span class="font-200"><?= $this->lang->index('values_title_1') ?></span> <?= $this->lang->index('values_title_2') ?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-xl-4 col-md-6 col-sm-12">
                                    <div class="sasly-info-box style-one mb-30" data-aos="fade-up">
                                        <div class="content">
                                            <div class="number">01</div>
                                            <h4 class="title"><?= $this->lang->index('value_1_title') ?></h4>
                                            <p><?= $this->lang->index('value_1_desc') ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-sm-12">
                                    <div class="sasly-info-box style-one mb-30" data-aos="fade-up"
                                        data-aos-duration="1800">
                                        <div class="content">
                                            <div class="number">02</div>
                                            <h4 class="title"><?= $this->lang->index('value_2_title') ?></h4>
                                            <p><?= $this->lang->index('value_2_desc') ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-sm-12">
                                    <div class="sasly-info-box style-one mb-30" data-aos="fade-up"
                                        data-aos-duration="2100">
                                        <div class="content">
                                            <div class="number">03</div>
                                            <h4 class="title"><?= $this->lang->index('value_3_title') ?></h4>
                                            <p><?= $this->lang->index('value_3_desc') ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12" id="jj_theme">
                                    <a href="<?= $this->BaseURL('kurumsal', $lang, 1) ?>" class="theme-btn style-two" data-aos="fade-up"
                                        data-aos-duration="1800"><?= $this->lang->index('values_cta') ?><i
                                            class="far fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="about-sb pt-130 pb-75">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-title style-one mb-60" style="margin-left: 0">
                                    <span class="sub-heading"><i class="far fa-arrow-right"></i><?= $this->lang->index('about_subheading') ?></span>
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
                                    <?=  $this->kisaca() ?>
                                    <div class="row">
                                        <div class="col-12" data-aos="fade-up">
                                            <ul class="check-list style-one mb-0">
                                                <li><i class="fas fa-badge-check"></i><?= $this->lang->index('about_list_1') ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-12" data-aos="fade-up">
                                            <ul class="check-list style-one">
                                                <li><i class="fas fa-badge-check"></i><?= $this->lang->index('about_list_2') ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="about-button" data-aos="fade-up">
                                        <a href="<?= $this->BaseURL('kurumsal', $lang, 1) ?>" class="theme-btn style-two"><?= $this->lang->index('about_cta') ?> <i
                                                class="far fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="section-image-box mb-55">
                                    <div class="ia_overlay">
                                        <span><?= $this->lang->index('about_overlay_text') ?></span>
                                        <img src="<?= $assetURL ?>images/ia.jpg" class="rounded-3 translate-img"
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

                <section class="core-features-sb">
                    <div class="features-wrapper main-gray-bg pt-130 pb-100">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title style-one text-center mb-60">
                                        <span class="sub-heading"><i
                                                class="far fa-arrow-right"></i><?= $this->lang->index('partners_subheading') ?></span>
                                        <h2 class="text-anm"><span class="font-200"><?= $this->lang->index('partners_title_1') ?></span> <?= $this->lang->index('partners_title_2') ?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <?php foreach ($isitirakler_sayfalar as $sayfa) : 
                                    $link = $this->lang->link($sayfa['url']);
                                    $url = $this->BaseURL($link, $lang, 1);
                                    $ozet = $sayfa['ozet'];
                                    $resim = $this->dbResimAl($sayfa['resim'], "sayfa", "600,400");
                                    $logo = $this->dbResimAl($sayfa['banner'], "sayfa", "600,300");
                                    $baslik = $sayfa['baslik'];
                                    //baslik tow words extract word1 - word2
                                    $baslik_words = explode(" ", $baslik);
                                    $baslik_words_1 = $baslik_words[0];
                                    $baslik_words_2 = $baslik_words[1];
                                    ?>
                                <div class="col-md-6">
                                    <div class="sasly-card-item style-one mb-30" data-aos="fade-up"
                                        data-aos-duration="1300">
                                        <div class="content-box">
                                            <div class="content">
                                                <h5><?= $baslik_words_1 ?> <span><?= $baslik_words_2 ?? '' ?></span></h5>
                                                <p><?= $ozet ?></p>
                                            </div>
                                        </div>
                                        <div class="thumbnail" style="max-height: none">
                                            <a href="<?= $url ?>" class="partner_logo">
                                                <img src="<?= $resim ?>" alt="<?= $baslik ?>">
                                                <div>
                                                    <img src="<?= $logo ?>" alt="<?= $baslik ?>">
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
                <section class="blogs-sb pt-130 pb-50" id="indexBlog">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title text-center mb-120">
                                    <span class="sub-heading"><i class="far fa-arrow-right"></i><?= $this->lang->index('blog_subheading') ?></span>
                                    <h2 class="text-anm"><span class="font-200"><?= $this->lang->index('blog_title_1') ?></span><br><?= $this->lang->index('blog_title_2') ?>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">

                            <!-- Blogs -->
                            <?php foreach ($blogs as $blog) :
                                $baslik = $blog['baslik'];
                                $ozet = $blog['ozet'];
                                $resim = $this->dbResimAl($blog['resim'], "blog", "390,360");
                                // Remove -id suffix from URL (e.g., yesil-enerjiyle-gelecege-yatirim-ggb-holding-in-vizyonu-1 -> yesil-enerjiyle-gelecege-yatirim-ggb-holding-in-vizyonu)
                                $blog_url_clean = preg_replace('/-\d+$/', '', $blog['url']);
                                $url = $this->BaseURL('blog/' . $blog_url_clean, $lang, 1);
                                //first word Eylül  second word 28, third word 2024 by turkish format
                                $tarih = $this->gun_ay_yil($blog['tarih']);
                                


                            ?>
                            <div class="col-xl-4 col-md-6">
                                <div class="blog-post-item style-one mb-80" data-aos="fade-up" data-aos-duration="1200">
                                    <div class="post-thumbnail">
                                        <a href="<?= $url ?>">
                                            <img src="<?= $resim ?>" alt="<?= $baslik ?>">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <div class="post-meta style-one">
                                            <span class="date"><a href="<?= $url ?>"><?= $tarih ?></a></span>
                                        </div>
                                        <h4 class="title">
                                            <a href="<?= $url ?>">
                                                <?= $baslik ?>
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
                                    <a href="<?= $this->BaseURL($this->lang->link('blog_liste'), $lang, 1) ?>" class="theme-btn style-one">
                                        <?= $this->lang->index('blog_cta') ?> <i class="far fa-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="cta-sb bg_cover p-r z-1" id="index_sust"
                    style="background-image: url(<?= $assetURL ?>images/sust.jpg);">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-8">
                                <div class="section-content-box">
                                    <div class="section-title text-white mb-55">
                                        <h2 class="text-anm">
                                            <span class="font-200"><?= $this->lang->index('sustainability_title_1') ?></span> <br>
                                            <?= $this->lang->index('sustainability_title_2') ?>
                                        </h2>
                                    </div>
                                    <div class="cta-button" data-aos="fade-up" data-aos-duration="1200">
                                        <a href="<?= $this->BaseURL('surdurulebilirlik', $lang, 1) ?>" class="theme-btn style-one">
                                            <?= $this->lang->index('sustainability_cta') ?> <i class="far fa-angle-double-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
     <!-- START_FOOTER -->
