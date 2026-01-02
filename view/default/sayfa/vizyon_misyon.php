<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Page Configuration
$sayfa = "Vizyon Misyon";  // Page name
$baslik = $this->lang->header("Vizyon Misyon"); // Page title from translation file
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
                                <h1>Vizyon & Misyonumuz</h1>
                                <section class="breadcrumb_section">
                                    <div class="row">
                                        <div class="breadcrumb_overlay">
                                            <div class="breadcrumb">
                                                <a href="/">Anasayfa </a>
                                                <a href="/">Vizyon & Misyonumuz </a>
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
                                                <a href="<?= $this->BaseURL('vizyon_misyon', $lang, 1) ?>" class="active">Vizyon & Misyonumuz</a>
                                            </li>
                                            <li>
                                                <a href="<?= $this->BaseURL('belgeler', $lang, 1) ?>">Sertifika & Belgeler</a>
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
                                    <img src="<?= $assetURL ?>images/vismis.jpg" alt="">
                                    <h3>Vizyon</h3>
                                    <p>Polyester ipliği üretiminde Türkiye'nin ve bölgenin öncü markası olarak,
                                        sürdürülebilir üretim standartlarını belirleyen, yenilikçi teknolojileri sektöre
                                        kazandıran ve müşteri memnuniyetinde referans gösterilen bir şirket olmak
                                        vizyonumuzdur. Çevre dostu üretim süreçleri, AR-GE odaklı gelişim ve
                                        uluslararası kalite standartlarıyla, geleceğin tekstil sektörünü bugünden
                                        şekillendiren global bir oyuncu olarak konumlanmayı hedefliyoruz.</p>
                                    <h3>Misyon</h3>
                                    <p>Tekstil sektörünün güvenilir tedarikçisi olarak, yüksek kaliteli polyester halı
                                        ipliği üretiminde çevre duyarlılığını teknolojik yenilikçilikle birleştiriyoruz.
                                        Müşterilerimizin ihtiyaçlarına özel çözümler geliştirerek, sürdürülebilir üretim
                                        anlayışı ve kesintisiz hizmet kalitesiyle sektöre değer katmayı misyon
                                        ediniyoruz. Üretimden teslimat sürecine kadar her aşamada mükemmeliyeti
                                        hedefleyerek, iş ortaklarımızın başarısına katkıda bulunmayı önceliğimiz olarak
                                        görüyoruz.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
