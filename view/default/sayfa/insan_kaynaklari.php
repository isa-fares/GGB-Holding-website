<?php

/**
 * Human Resources Page - Clean Code Version
 * 
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// ============================================
// PAGE CONFIGURATION
// ============================================
$sayfa = "Insan Kaynaklari";
$baslik = $this->lang->header("Insan Kaynaklari");

// ============================================
// PAGE META DATA
// ============================================
$this->setPageMeta(
    "Insan Kaynaklari",
    $baslik,
    null
);

// ============================================
// URL CONSTANTS
// ============================================
$urls = [
    'index' => $this->BaseURL($this->lang->link('index'), $lang, 1),
];

// ============================================
// IMAGE ASSETS
// ============================================
$images = [
    'hr' => $assetURL . 'images/ik.jpg',
];

// ============================================
// EXTERNAL LINKS
// ============================================
$external_links = [
    'career_net' => 'http://kariyer.net/firma-profil/kristal-mensucat-san-ve-tic-a-s-394460-455087',
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
                        <!-- Sidebar -->
                        <div class="col-lg-4 sidemenu119">
                            <div class="lister_sidebar">
                                <div class="sub_menu wbx_1">
                                    <div class="CategorySubjects">
                                        <i></i>
                                        <?= $this->lang->header('Kurumsal') ?>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="#"><?= $this->lang->genel('hr_ggb_holding') ?></a>
                                        </li>
                                        <li>
                                            <a href="#"><?= $this->lang->header('Sertifika Belgelerimiz') ?></a>
                                        </li>
                                        <li>
                                            <a href="#"><?= $this->lang->header('Sürdürülebilirlik') ?></a>
                                        </li>
                                        <li>
                                            <a href="#"><?= $this->lang->header('Sosyal Sorumluluk Politikasi') ?></a>
                                        </li>
                                        <li>
                                            <a href="#"><?= $this->lang->header('Yonetim Kurulu') ?></a>
                                        </li>
                                        <li>
                                            <a href="#"><?= $this->lang->header('Kalite Politikasi') ?></a>
                                        </li>
                                        <li>
                                            <a href="#"><?= $this->lang->genel('hr_production_policy') ?></a>
                                        </li>
                                        <li>
                                            <a class="active" href="#"><?= $baslik ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Main Content -->
                        <div class="col-lg-8">
                            <div class="corporate content-detail">
                                <img src="<?= $images['hr'] ?>" alt="">
                                <h2><?= $this->lang->genel('hr_page_title') ?></h2>

                                <p><?= $this->lang->genel('hr_content_paragraph1') ?></p>
                                <p><?= $this->lang->genel('hr_content_paragraph2') ?></p>
                                <p><?= $this->lang->genel('hr_content_paragraph3') ?></p>
                                <p><?= $this->lang->genel('hr_content_paragraph4') ?></p>
                                <p><?= $this->lang->genel('hr_content_paragraph5') ?></p>

                                <div style="display: flex;justify-content: center;">
                                    <a target="_blank"
                                       href="<?= $external_links['career_net'] ?>"
                                       class="theme-btn style-one">
                                        <?= $this->lang->genel('hr_open_positions') ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>
