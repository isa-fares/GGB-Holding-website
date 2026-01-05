<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Page Configuration
$sayfa = "Insan Kaynaklari";  // Page name
$baslik = $this->lang->header("Insan Kaynaklari"); // Page title from translation file

// Set page meta
$this->setPageMeta(
    "Insan Kaynaklari",
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
                <section style="padding-bottom: 80px;">
                    <div class="container">
                        <div class="row corporate_page">
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
                                    <!--
                                        <div class="widget_box wbx_1 bigNews">
                                            <a href="#">
                                                <img src="<?= $assetURL ?>img/slide4.jpg" alt="">
                                            </a>
                                            <a class="no_btn789" href="#"><strong>Yalıtımlı Sürme Profiller</strong></a>
                                            <p>Modern yapılarda enerji verimliliği ve konfor için özel olarak tasarlanmış
                                                yalıtımlı sürme profillerimiz, ısı ve ses yalıtımında üstün performans sunar.
                                                Özel tasarımı ve kaliteli malzemeleriyle uzun ömürlü kullanım sağlar.</p>
                                            <a href="#" class="donate_link789">Ürünü İnceleyin</a>
                                        </div>-->
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="corporate content-detail">
                                    <img src="<?= $assetURL ?>images/ik.jpg" alt="">
                                    <h2><?= $this->lang->genel('hr_page_title') ?></h2>

                                    <p>
                                        <?= $this->lang->genel('hr_content_paragraph1') ?>
                                    </p>

                                    <p>
                                        <?= $this->lang->genel('hr_content_paragraph2') ?>
                                    </p>

                                    <p>
                                        <?= $this->lang->genel('hr_content_paragraph3') ?>
                                    </p>

                                    <p>
                                        <?= $this->lang->genel('hr_content_paragraph4') ?>
                                    </p>

                                    <p>
                                        <?= $this->lang->genel('hr_content_paragraph5') ?>
                                    </p>

                                    <div style="display: flex;justify-content: center;">
                                        <a target="_blank"
                                            href="http://kariyer.net/firma-profil/kristal-mensucat-san-ve-tic-a-s-394460-455087"
                                            class="theme-btn style-one"><?= $this->lang->genel('hr_open_positions') ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
