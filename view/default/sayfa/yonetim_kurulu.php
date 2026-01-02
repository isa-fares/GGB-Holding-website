<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Page Configuration
$sayfa = "Yonetim Kurulu";  // Page name
$baslik = $this->lang->header("Yonetim Kurulu"); // Page title from translation file
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
                                <h1>Yönetim Kurulu</h1>
                                <section class="breadcrumb_section">
                                    <div class="row">
                                        <div class="breadcrumb_overlay">
                                            <div class="breadcrumb">
                                                <a href="/">Anasayfa </a>
                                                <a href="/">Yönetim Kurulu </a>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div>
                                <p><strong>2 sektör ve 1.000'e</strong> yakın çalışanımızla üretmeye ve değer yaratmaya
                                    devam ediyoruz.</p>
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
                                            Kurumsal
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="#" class="active">GGB Holding</a>
                                            </li>
                                            <li>
                                                <a href="#">Sertifika & Belgeler</a>
                                            </li>
                                            <li>
                                                <a href="#">Sürdürülebilirlik</a>
                                            </li>
                                            <li>
                                                <a href="#">Sosyal Sorumluluk</a>
                                            </li>
                                            <li>
                                                <a href="#">Yönetim Kurulu</a>
                                            </li>
                                            <li>
                                                <a href="#">Kalite Politikası</a>
                                            </li>
                                            <li>
                                                <a href="#">Üretim Politikası</a>
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
                                    <img src="<?= $assetURL ?>images/fevzi_uslu.jpg" alt="" style="width: auto;">
                                    <h4>Kurucumuz <strong>Fevzi Uslu</strong></h4>
                                    <p>1970 yılında boya ustası olarak başladığı
                                        meslek hayatında 15 m²'lik küçük bir nalbur dükkanı açarak ticarete adım
                                        atmıştır. Azmi ve becerisi sayesinde işletme zamanla gelişmiş ve toptan boya
                                        satışı alanında önemli bir konuma ulaşmıştır.</p>
                                </div>
                                <section class="team-page-ss mt-50">
                                    <div class="col-12">
                                        <div class="section-title mb-50" data-aos="fade-right" data-aos-duration="1000">
                                            <h2 class=""><span class="font-200">GGB Holding</span><br>Yönetim Kurulumuz
                                            </h2>
                                        </div>
                                        <div class="row" id="rgp_row">
                                            <div class="col-xl-4 col-lg-6 col-sm-6">
                                                <div class="team-item style-one" data-aos="fade-up"
                                                    data-aos-duration="1000">
                                                    <div class="member-image">
                                                        <img src="<?= $assetURL ?>images/user.png" alt="">
                                                    </div>
                                                    <div class="member-info">
                                                        <h4 class="title"><a href="#">Ahmet Kocabıyık</a></h4>
                                                        <span class="position">Yönetim Kurulu Başkanı</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-sm-6">
                                                <div class="team-item style-one" data-aos="fade-up"
                                                    data-aos-duration="1100">
                                                    <div class="member-image">
                                                        <img src="<?= $assetURL ?>images/user.png" alt="">
                                                    </div>
                                                    <div class="member-info">
                                                        <h4 class="title"><a href="#">Sercan Seveli</a></h4>
                                                        <span class="position">Yönetim Kurulu Başkan Yardımcısı</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-sm-6">
                                                <div class="team-item style-one" data-aos="fade-up"
                                                    data-aos-duration="1200">
                                                    <div class="member-image">
                                                        <img src="<?= $assetURL ?>images/user.png" alt="">
                                                    </div>
                                                    <div class="member-info">
                                                        <h4 class="title"><a href="#">Mercan Özmen</a></h4>
                                                        <span class="position">Yönetim Kurulu Üyesi</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-sm-6">
                                                <div class="team-item style-one" data-aos="fade-up"
                                                    data-aos-duration="1300">
                                                    <div class="member-image">
                                                        <img src="<?= $assetURL ?>images/user.png" alt="">
                                                    </div>
                                                    <div class="member-info">
                                                        <h4 class="title"><a href="#">Mehmet Hamedi</a></h4>
                                                        <span class="position">Yönetim Kurulu Üyesi</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
