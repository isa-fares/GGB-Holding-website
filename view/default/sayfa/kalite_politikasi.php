<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Page Configuration
$sayfa = "Kalite Politikasi";  // Page name
$baslik = $this->lang->header("Kalite Politikasi"); // Page title from translation file
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
                                <h1>Kalite Politikası</h1>
                                <section class="breadcrumb_section">
                                    <div class="row">
                                        <div class="breadcrumb_overlay">
                                            <div class="breadcrumb">
                                                <a href="/">Anasayfa </a>
                                                <a href="/">Kalite Politikası </a>
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
                                                <a href="<?= $this->BaseURL('sosyal_sorumluluk_politikasi', $lang, 1) ?>">Sosyal
                                                    Sorumluluk Politikası</a>
                                            </li>
                                            <li>
                                                <a href="<?= $this->BaseURL('cevre_politikasi', $lang, 1) ?>">Çevre Politikası</a>
                                            </li>
                                            <li>
                                                <a href="<?= $this->BaseURL('yolsuzluk_politikasi', $lang, 1) ?>">Yolsuzluk ve Rüşvet
                                                    Politikası</a>
                                            </li>
                                            <li>
                                                <a class="active" href="<?= $this->BaseURL('kalite_politikasi', $lang, 1) ?>">Kalite Politikası</a>
                                            </li>
                                            <li>
                                                <a href="<?= $this->BaseURL('isg_politikasi', $lang, 1) ?>">İSG Politikası</a>
                                            </li>

                                            <li>
                                                <a href="<?= $this->BaseURL('enerji_politikasi', $lang, 1) ?>">Enerji Politikası</a>
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
                                    <h3>Amaç</h3>
                                    <p>GGB Holding olarak; polyester iplik üretimi alanında sektörde öncü,
                                        güvenilir ve sürdürülebilir çözümler sunan bir firma olma hedefiyle faaliyet
                                        göstermekteyiz. Müşteri memnuniyetini temel alan yönetim anlayışımız
                                        doğrultusunda, <strong>ISO 9001:2015 Kalite Yönetim Sistemi</strong> standardına
                                        uygun bir yapı kurmayı, uygulamayı, sürdürmeyi ve sürekli iyileştirmeyi taahhüt
                                        ederiz.</p>

                                    <h3>Kapsam</h3>
                                    <p>Bu kalite politikası;</p>
                                    <ul>
                                        <li>Mevcut polyester iplik üretim tesisimizi ve gelecekteki yatırımlarımızı,
                                        </li>
                                        <li>GGB Holding’ın tüm çalışanlarını,</li>
                                        <li>Tedarikçiler, yükleniciler, taşeronlar ve diğer kuruluşlarla yapılan
                                            sözleşmelerde yer alan personel de dahil olmak üzere GGB Holding’ın tüm
                                            paydaşlarını kapsamaktadır.</li>
                                    </ul>

                                    <h3>Politika Ve Taahhütlerimiz</h3>
                                    <p>Faaliyet gösterdiğimiz tüm alanlarda;</p>
                                    <ul>
                                        <li>Entegre Yönetim Sistemlerini (ISO 9001, ISO 14001, ISO 45001 vb.) etkin bir
                                            şekilde uygulamayı,</li>
                                        <li>Topluma ve çevreye saygılı, örnek bir kuruluş olmayı,</li>
                                        <li>Müşterilerimizin mevcut ve gelecekteki ihtiyaçlarını anlayarak, kaliteli,
                                            güvenilir ve sürdürülebilir ürünler sunmayı,</li>
                                        <li>Ürün kalitesi, sağlanan hizmetler, operasyonların etkinliği ve çalışan
                                            faaliyetleri için sürekli iyileştirmeyi,</li>
                                        <li>Müşteri ve tedarikçilerimizle olan ilişkilerimizi karşılıklı memnuniyet,
                                            güven ve şeffaflık ilkeleri doğrultusunda yürütmeyi,</li>
                                        <li>Müşteri güvenini ve marka itibarını korumayı ve güçlendirmeyi,</li>
                                        <li>Ulusal ve uluslararası yasal şartlara ve müşteri taleplerine tam uyum
                                            sağlamayı,</li>
                                        <li>Kalite yönetim sistemimizi sürekli iyileştirerek, verimliliği ve rekabet
                                            gücümüzü artırmayı,</li>
                                        <li>Tüm çalışanlarımızın katılımıyla kalite bilincini yükseltmeyi ve
                                            çalışanlarımızın gelişimini desteklemeyi,</li>
                                        <li>Tedarikçilerimiz ve iş ortaklarımızla karşılıklı güven ve iş birliği
                                            içerisinde çalışarak kalite zincirini güçlendirmeyi,</li>
                                        <li>Verimlilik ve performansı artıracak iyileştirme fırsatlarını sürekli olarak
                                            değerlendirmeyi taahhüt ederiz.</li>
                                    </ul>

                                    <p>Bu ilkeleri ve hedefleri gerçekleştirmek için, referans standart olarak
                                        <strong>ISO 9001:2015 Kalite Yönetim Sistemi</strong> gerekliliklerini
                                        karşılamayı, uygulamayı ve geliştirmeyi firma olarak öncelikli taahhüdümüz kabul
                                        ederiz. Kaliteyi sadece nihai ürün değil, tüm iş süreçlerinin toplam sonucu
                                        olarak görmekteyiz.
                                    </p>

                                    <p>Bu politika, tüm çalışanlarımız tarafından anlaşılır, uygulanır ve sürekli
                                        iyileştirme prensibi ile geliştirilir. Bu bağlamda tüm çalışanlarımızın bu
                                        standardın kuruluşumuzdaki uygulamaları ve gerekliliklerini eksiksiz bir şekilde
                                        yerine getirmesini bekleriz.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
