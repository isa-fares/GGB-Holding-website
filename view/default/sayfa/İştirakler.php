<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Page Configuration
$sayfa = "Kristal";  // Page name
$baslik = $this->lang->header("Kristal"); // Page title from translation file
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
                                <h1>Kristal Mensucat</h1>
                                <section class="breadcrumb_section">
                                    <div class="row">
                                        <div class="breadcrumb_overlay">
                                            <div class="breadcrumb">
                                                <a href="/">Anasayfa </a>
                                                <a href="/">Kristal Mensucat </a>
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
                                            İştirakler
                                        </div>
                                        <ul>
                                            <li>
                                                <a class="active" href="<?= $this->BaseURL('kristal', $lang, 1) ?>">Kristal Mensucat</a>
                                            </li>
                                            <li>
                                                <a href="<?= $this->BaseURL('guven', $lang, 1) ?>">Güven Boya</a>
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
                                    <div class="partner_logo">
                                        <div>
                                            <img src="<?= $assetURL ?>images/kristal_logo.jpg" alt="">
                                        </div>
                                        <img src="<?= $assetURL ?>images/a1.jpg" alt="">
                                    </div>

                                    <p>
                                        <strong>GGB Holding</strong>, kurucumuz Fevzi Uslu’nun azmi ve aile değerleri
                                        üzerine inşa edilmiş köklü geçmişinden güç alır.
                                        Küçük bir nalbur dükkanından uluslararası ölçekte üretim yapan bir yapıya
                                        dönüşürken,
                                        en büyük sermayemizin <strong>insan kaynağımız</strong> olduğuna inandık.
                                        Çalışanlarımızın yeteneklerini keşfetmek,
                                        geliştirmek ve kariyer yolculuklarında onların yanında olmak İnsan Kaynakları
                                        politikamızın temelini oluşturur.
                                    </p>

                                    <p>
                                        Kurumsallaşma sürecimiz, <strong>şeffaflık</strong>, <strong>adil
                                            yönetim</strong> ve güçlü bir iletişim kültürünü beraberinde getirmiştir.
                                        Eğitim ve gelişim programlarımız; üretimden Ar-Ge’ye, satıştan lojistiğe kadar
                                        tüm birimlerimizin
                                        yetkinliklerini yükseltmek için özel olarak hazırlanmıştır. Böylece
                                        çalışanlarımızın hem bireysel hedeflerine
                                        hem de GGB Holding’in yenilikçi vizyonuna katkı sunmasını destekliyoruz.
                                    </p>

                                    <p>
                                        Aile şirketi köklerinden gelen dayanışma ruhunu modern yönetim anlayışıyla
                                        birleştiriyor;
                                        <strong>iş-yaşam dengesi</strong>, güvenli çalışma ortamı ve adil ücret
                                        politikalarını önceliğimiz kabul ediyoruz.
                                        Farklı kültürlerden gelen çalışanlarımızı zenginliğimiz olarak görüyor,
                                        kapsayıcı ve çeşitliliği destekleyen bir çalışma ortamı sunmaya özen
                                        gösteriyoruz.
                                    </p>

                                    <p>
                                        Grubumuzun büyümesiyle paralel olarak yeni roller, uzmanlık alanları ve kariyer
                                        fırsatları ortaya çıkıyor.
                                        İnsan Kaynakları olarak <strong>yetenek kazanımı</strong>, <strong>performans
                                            yönetimi</strong> ve
                                        <strong>yetenek geliştirme</strong> süreçlerimizi stratejik bir yaklaşımla
                                        yürütüyor;
                                        iç terfi sistemimizi güçlü bir şekilde destekliyoruz. Çünkü biliyoruz ki
                                        çalışanlarımızın başarısı,
                                        sürdürülebilir büyümemizin temelidir.
                                    </p>

                                    <p>
                                        Siz de güvenilirlik, üretkenlik ve yenilikçilik ilkeleriyle şekillenen bir
                                        çalışma ortamında yer almak isterseniz,
                                        GGB Holding ailesine katılmak için bizimle iletişime geçebilirsiniz.
                                        Birlikte daha güçlü bir geleceğe yürümeyi sabırsızlıkla bekliyoruz.
                                    </p>

                                    <div style="display: flex;justify-content: center;">
                                        <a target="_blank" href="#" class="theme-btn style-one">Web Sitesini Ziyaret
                                            Edin</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
