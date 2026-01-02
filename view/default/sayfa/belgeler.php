<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Page Configuration
$sayfa = "Belgeler";  // Page name
$baslik = $this->lang->header("Belgeler"); // Page title from translation file
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
                                <h1>Sertifikalarımız</h1>
                                <section class="breadcrumb_section">
                                    <div class="row">
                                        <div class="breadcrumb_overlay">
                                            <div class="breadcrumb">
                                                <a href="/">Anasayfa </a>
                                                <a href="/">Sertifikalarımız </a>
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
                                                <a href="<?= $this->BaseURL('kurumsal', $lang, 1) ?>">Hakkımızda</a>
                                            </li>
                                            <li>
                                                <a href="<?= $this->BaseURL('vizyon_misyon', $lang, 1) ?>">Vizyon & Misyonumuz</a>
                                            </li>
                                            <li>
                                                <a href="<?= $this->BaseURL('belgeler', $lang, 1) ?>" class="active">Sertifika & Belgeler</a>
                                            </li>
                                            <li>
                                                <a href="<?= $this->BaseURL('surdurulebilirlik', $lang, 1) ?>">Sürdürülebilirlik</a>
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
                                    <img src="<?= $assetURL ?>images/cert.jpg" alt="" style="width: auto;">
                                    <h4>Güvenimizi <strong>Belgelerle Destekliyoruz</strong></h4>
                                    <p>GGB Holding olarak kalite, güvenilirlik ve sürdürülebilirlik anlayışımızı
                                        yalnızca sözle değil,
                                        sahip olduğumuz ulusal ve uluslararası <strong>sertifikalarla</strong> da
                                        kanıtlıyoruz.</p>
                                </div>
                                <section class="team-page-ss mt-50" id="cert_page">
                                    <div class="col-12">
                                        <div class="section-title mb-50" data-aos="fade-right" data-aos-duration="1000">
                                            <h2 class=""><span class="font-200">Sertifika &</span><br> Belgelerimiz</h2>
                                        </div>
                                        <div class="row" id="rgp_row">
                                            <div class="col-xl-4 col-lg-6 col-sm-6">
                                                <div class="team-item style-one" data-aos="fade-up"
                                                    data-aos-duration="1000">
                                                    <div class="member-image">
                                                        <a href="<?= $assetURL ?>images/belge/1.jpg" data-fancybox="cert">
                                                            <img src="<?= $assetURL ?>images/belge/1.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="member-info">
                                                        <span class="position">OEKO-TEX® Standard 100 Sertifikası</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-sm-6">
                                                <div class="team-item style-one" data-aos="fade-up"
                                                    data-aos-duration="1100">
                                                    <div class="member-image">
                                                        <a href="<?= $assetURL ?>images/belge/2.jpg" data-fancybox="cert">
                                                            <img src="<?= $assetURL ?>images/belge/2.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="member-info">
                                                        <span class="position">OEKO-TEX® Standard 100 – Class I
                                                            Sertifikası</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-sm-6">
                                                <div class="team-item style-one" data-aos="fade-up"
                                                    data-aos-duration="1100">
                                                    <div class="member-image">
                                                        <a href="<?= $assetURL ?>images/belge/9.jpg" data-fancybox="cert">
                                                            <img src="<?= $assetURL ?>images/belge/9.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="member-info">
                                                        <span class="position">OEKO-TEX STANDARD 100 Sertifikası</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-sm-6">
                                                <div class="team-item style-one" data-aos="fade-up"
                                                    data-aos-duration="1200">
                                                    <div class="member-image">
                                                        <a href="<?= $assetURL ?>images/belge/3.jpg" data-fancybox="cert">
                                                            <img src="<?= $assetURL ?>images/belge/3.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="member-info">
                                                        <span class="position">ISO 45001:2018 – İş Sağlığı ve Güvenliği
                                                            Yönetim Sistemi Sertifikası</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-sm-6">
                                                <div class="team-item style-one" data-aos="fade-up"
                                                    data-aos-duration="1300">
                                                    <div class="member-image">
                                                        <a href="<?= $assetURL ?>images/belge/4.jpg" data-fancybox="cert">
                                                            <img src="<?= $assetURL ?>images/belge/4.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="member-info">
                                                        <span class="position">ISO 14001:2015 – Çevre Yönetim Sistemi
                                                            Sertifikası</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-sm-6">
                                                <div class="team-item style-one" data-aos="fade-up"
                                                    data-aos-duration="1300">
                                                    <div class="member-image">
                                                        <a href="<?= $assetURL ?>images/belge/5.jpg" data-fancybox="cert">
                                                            <img src="<?= $assetURL ?>images/belge/5.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="member-info">
                                                        <span class="position">ISO 9001:2015 – Kalite Yönetim Sistemi
                                                            Sertifikası</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-sm-6">
                                                <div class="team-item style-one" data-aos="fade-up"
                                                    data-aos-duration="1300">
                                                    <div class="member-image">
                                                        <a href="<?= $assetURL ?>images/belge/6.jpg" data-fancybox="cert">
                                                            <img src="<?= $assetURL ?>images/belge/6.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="member-info">
                                                        <span class="position">Recycled Claim Standard (RCS) Uyum
                                                            Sertifikası</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-sm-6">
                                                <div class="team-item style-one" data-aos="fade-up"
                                                    data-aos-duration="1300">
                                                    <div class="member-image">
                                                        <a href="<?= $assetURL ?>images/belge/7.jpg" data-fancybox="cert">
                                                            <img src="<?= $assetURL ?>images/belge/7.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="member-info">
                                                        <span class="position"> Recycled Claim Standard (RCS V2.0) Ürün
                                                            Detay Sertifikası</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-sm-6">
                                                <div class="team-item style-one" data-aos="fade-up"
                                                    data-aos-duration="1300">
                                                    <div class="member-image">
                                                        <a href="<?= $assetURL ?>images/belge/8.jpg" data-fancybox="cert">
                                                            <img src="<?= $assetURL ?>images/belge/8.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="member-info">
                                                        <span class="position">GRS (V4.0) ve RCS (V2.0) Tesis Uyum
                                                            Sertifikası</span>
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
