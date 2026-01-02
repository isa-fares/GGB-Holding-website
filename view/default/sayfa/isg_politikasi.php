<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Page Configuration
$sayfa = "Isg Politikasi";  // Page name
$baslik = $this->lang->header("Isg Politikasi"); // Page title from translation file
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
                                <h1>İSG Politikası</h1>
                                <section class="breadcrumb_section">
                                    <div class="row">
                                        <div class="breadcrumb_overlay">
                                            <div class="breadcrumb">
                                                <a href="/">Anasayfa </a>
                                                <a href="/">İSG Politikası </a>
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
                                                <a href="<?= $this->BaseURL('kalite_politikasi', $lang, 1) ?>">Kalite Politikası</a>
                                            </li>
                                            <li>
                                                <a class="active" href="<?= $this->BaseURL('isg_politikasi', $lang, 1) ?>">İSG Politikası</a>
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
                                    <p>GGB Holding olarak, polyester iplik üretiminde faaliyet gösteren büyük
                                        ölçekli bir kuruluş olmanın sorumluluğuyla, çalışanlarımızın sağlığı ve
                                        güvenliğini öncelikli değerimiz olarak görmekteyiz. İşle ilgili yaralanmaların
                                        ve meslek hastalıklarının önlenmesi amacıyla tüm faaliyetlerimizde güvenli ve
                                        sağlıklı çalışma koşulları sağlamayı taahhüt ederiz. Bu politika, kuruluşumuzun
                                        faaliyet alanına, ölçeğine, bağlamına ve iş sağlığı ve güvenliği (İSG) risk ve
                                        fırsatlarının doğasına uygun olarak hazırlanmıştır.</p>

                                    <h3>Kapsam</h3>
                                    <p>Bu iş sağlığı ve güvenliği politikası;</p>
                                    <ul>
                                        <li>Mevcut polyester iplik üretim tesisimizi ve gelecekteki tüm yatırımları,
                                        </li>
                                        <li>GGB Holding bünyesinde görev alan tüm çalışanları,</li>
                                        <li>Tedarikçiler, yükleniciler, taşeronlar ve diğer kuruluşlarla yapılan
                                            sözleşmelerde yer alan personel de dahil olmak üzere GGB Holding’ın tüm
                                            paydaşlarını kapsamaktadır.</li>
                                    </ul>

                                    <h3>Politika Ve Taahhütlerimiz</h3>
                                    <p>Faaliyet gösterdiğimiz tüm alanlarda:</p>
                                    <ul>
                                        <li>Tüm iş sağlığı ve güvenliği uygulamalarımız, yürürlükteki ulusal mevzuata ve
                                            ilgili standartlara tam uyum içerisinde yürütülür.</li>
                                        <li>Olası iş kazaları ve meslek hastalıklarının önüne geçmek için tehlikeler
                                            tanımlanır, riskler analiz edilir ve uygun önleyici tedbirler almayı
                                            amaçlarız.</li>
                                        <li>İSG hedeflerinin belirlenmesi için sistematik ve ölçülebilir bir çerçeve
                                            oluştururuz.</li>
                                        <li>İSG yönetim sistemini sürekli gözden geçirip, gelişen teknoloji ve
                                            uygulamalara uyum sağlayarak sürekli iyileştirmeyi hedefleriz.</li>
                                        <li>Gerekli kaynakları (eğitim, ekipman, koruyucu donanım, teknik ve yönetsel
                                            destek) sağlayarak güvenli çalışma ortamları sunarız.</li>
                                        <li>Tüm çalışanlara, görevleri doğrultusunda ihtiyaç duydukları iş sağlığı ve
                                            güvenliği eğitimleri düzenli olarak verilir. Bu sayede İSG bilincinin
                                            oluşması ve sürdürülmesi sağlanır.</li>
                                        <li>Çalışanlarımızın iş sağlığı ve güvenliği konularında görüş ve önerileri
                                            alınır, katılımları teşvik edilir. Açık iletişim ortamını destekleriz.</li>
                                        <li>Olası acil durumlara karşı hazırlıklı olunması için senaryolar oluşturulur,
                                            tatbikatlar yapılır ve düzenli ekipman kontrolleri ile olası kazalar
                                            önlenmeye çalışılır.</li>
                                        <li>İş yerinde bulunan tüm taşeron çalışanları ve ziyaretçilerin de iş sağlığı
                                            ve güvenliği kurallarına uymasını sağlarız.</li>
                                    </ul>

                                    <p>GGB Holding San. ve Tic. Ltd. Şti. olarak, tüm çalışanlarımızın sağlıklı ve
                                        güvenli bir ortamda çalışmasını sağlamak, iş kazalarını ve meslek hastalıklarını
                                        önlemek en temel önceliğimizdir. Bu doğrultuda ihtiyaç duyulan tüm kaynaklar,
                                        eğitimler ve teknik altyapılar eksiksiz olarak sağlanacak ve sürdürülebilir bir
                                        İSG kültürü oluşturulacaktır.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
