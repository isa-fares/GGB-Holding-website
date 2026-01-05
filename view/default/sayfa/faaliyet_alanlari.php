<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Page Configuration
$sayfa = "Faaliyet Alanlari";  // Page name
$baslik = $this->lang->header("Faaliyet Alanlari"); // Page title from translation file
$this->sayfaBaslik = $baslik . " - " . $this->ayarlar("title_" . $lang); // Title tag for browser tab
$this->ogBaslik = $this->sayfaBaslik;  // Open Graph title (for social media)
$this->ogUrl = $this->fullUrl;         // Open Graph URL (canonical)

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
                            <h1><?= $this->lang->faaliyet('page_title_1') ?><br><?= $this->lang->faaliyet('page_title_2') ?></h1>
                            <section class="breadcrumb_section">
                                <div class="row">
                                    <div class="breadcrumb_overlay">
                                        <div class="breadcrumb">
                                            <a href="/"><?= $this->lang->faaliyet('breadcrumb_home') ?> </a>
                                            <a href="/"><?= $this->lang->faaliyet('breadcrumb_activities') ?> </a>
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
                                        <?= $this->lang->faaliyet('sidebar_title') ?>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="#boya"><?= $this->lang->faaliyet('activity_1') ?></a>
                                        </li>
                                        <li>
                                            <a href="#polyester"><?= $this->lang->faaliyet('activity_2') ?></a>
                                        </li>
                                        <li>
                                            <a href="#ithalat"><?= $this->lang->faaliyet('activity_3') ?></a>
                                        </li>
                                        <li>
                                            <a href="#arge"><?= $this->lang->faaliyet('activity_4') ?></a>
                                        </li>
                                        <li>
                                            <a href="#insaat"><?= $this->lang->faaliyet('activity_5') ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="corporate content-detail">
                                <div id="boya" class="activity_sec">
                                    <img src="<?= $assetURL ?>images/textile.jpg" alt="">
                                    <h3><?= $this->lang->faaliyet('activity_1_title') ?></h3>
                                    <p><strong><?= $this->lang->faaliyet('activity_1_desc_1') ?></strong></p>
                                    <p><?= $this->lang->faaliyet('activity_1_desc_2') ?></p>
                                </div>
                                <div id="polyester" class="activity_sec">
                                    <img src="<?= $assetURL ?>images/polyester.jpg" alt="">
                                    <h3><?= $this->lang->faaliyet('activity_2_title') ?></h3>
                                    <p><strong><?= $this->lang->faaliyet('activity_2_desc_1') ?></strong></p>
                                    <p><?= $this->lang->faaliyet('activity_2_desc_2') ?></p>
                                </div>
                                <div id="ithalat" class="activity_sec">
                                    <img src="<?= $assetURL ?>images/konteyner.jpg" alt="">
                                    <h3><?= $this->lang->faaliyet('activity_3_title') ?></h3>
                                    <p><strong><?= $this->lang->faaliyet('activity_3_desc_1') ?></strong></p>
                                    <p><?= $this->lang->faaliyet('activity_3_desc_2') ?></p>
                                </div>
                                <div id="arge" class="activity_sec">
                                    <img src="<?= $assetURL ?>images/arge.jpg" alt="">
                                    <h3><?= $this->lang->faaliyet('activity_4_title') ?></h3>
                                    <p><strong><?= $this->lang->faaliyet('activity_4_desc_1') ?></strong></p>
                                    <p><?= $this->lang->faaliyet('activity_4_desc_2') ?></p>
                                </div>
                                <div id="insaat" class="activity_sec">
                                    <img src="<?= $assetURL ?>images/insaat.jpg" alt="">
                                    <h3><?= $this->lang->faaliyet('activity_5_title') ?></h3>
                                    <p><strong><?= $this->lang->faaliyet('activity_5_desc_1') ?></strong></p>
                                    <p><?= $this->lang->faaliyet('activity_5_desc_2') ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>