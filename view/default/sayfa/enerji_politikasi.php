<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Page Configuration
$sayfa = "Enerji Politikasi";  // Page name
$baslik = $this->lang->header("Enerji Politikasi"); // Page title from translation file
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
                                <h1>Enerji Politikası</h1>
                                <section class="breadcrumb_section">
                                    <div class="row">
                                        <div class="breadcrumb_overlay">
                                            <div class="breadcrumb">
                                                <a href="/">Anasayfa </a>
                                                <a href="/">Enerji Politikası </a>
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
                                                <a href="<?= $this->BaseURL('isg_politikasi', $lang, 1) ?>">İSG Politikası</a>
                                            </li>

                                            <li>
                                                <a class="active" href="<?= $this->BaseURL('enerji_politikasi', $lang, 1) ?>">Enerji Politikası</a>
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
                                    <p>Bu politika, GGB Holding firmamızın iplik üretim faaliyetlerinde enerji
                                        performansını sürekli iyileştirmesini, enerji verimliliğini artırmasını ve
                                        sürdürülebilir üretim hedeflerine ulaşmasını sağlamak amacıyla hazırlanmıştır.
                                    </p>

                                    <h3>Kapsam</h3>
                                    <p>Bu enerji politikası;</p>
                                    <ul>
                                        <li>Mevcut polyester iplik üretim tesisimizi ve gelecekteki tüm yatırımları,
                                        </li>
                                        <li>GGB Holding bünyesinde görev alan tüm çalışanları,</li>
                                        <li>Tedarikçiler, yükleniciler, taşeronlar ve diğer kuruluşlarla yapılan
                                            sözleşmelerde yer alan personel de dahil olmak üzere GGB Holding’ın tüm
                                            paydaşlarını kapsamaktadır.</li>
                                    </ul>

                                    <h3>Politika ve Taahhütlerimiz</h3>
                                    <p>Faaliyet gösterdiğimiz polyester (POY/FDY) iplik, polyester tekstürize iplik,
                                        iplik bükümü, Masterbatch boya alanlarında:</p>

                                    <ul>
                                        <li><strong>Enerji Verimliliği ve Performans:</strong> Üretim kapasitesi,
                                            prosesler ve destekleyici tesisler için enerji performans göstergeleri
                                            (EnPI) belirler, temel çizgiyi (EnB) sürekli gözden geçirir ve enerji
                                            verimliliğini artırmaya yönelik projeler uygularız.</li>

                                        <li><strong>Sürdürülebilirlik:</strong> Enerji tüketimini azaltarak sera gazı
                                            emisyonlarını düşürmeyi, çevresel etkileri en aza indirmeyi ve sürekli
                                            iyileştirmeyi hedefleriz. Bu amaçla ilgili KPI’lar (anahtar performans
                                            göstergeleri) belirlenmiş olup düzenli olarak üst yönetime raporlanmakta ve
                                            performans takibi yapılmaktadır.</li>

                                        <li><strong>Yenilikçi Teknolojiler:</strong> Enerji tasarrufu sağlayacak
                                            teknolojilerin ve yenilenebilir enerji kaynaklarının kullanımını destekler,
                                            Ar-Ge ve modernizasyon projelerinde enerji verimliliğini temel kriterlerden
                                            biri kabul ederiz. Yeni kurulmuş bir firma olmamız ve tüm ekipmanlarımızı
                                            son teknolojiyle seçmemizin temelinde de bu yaklaşım bulunmaktadır.</li>

                                        <li><strong>Yasal ve Diğer Yükümlülükler:</strong> Ulusal mevzuat, uluslararası
                                            standartlar, müşteri gereklilikleri ve sektörel yükümlülükler de dahil olmak
                                            üzere tüm enerji ile ilgili şartlara tam uyumu taahhüt ederiz.</li>

                                        <li><strong>Katılım ve Farkındalık:</strong> Enerji yönetim sistemi hedeflerinin
                                            gerçekleştirilmesi için gerekli mali, teknik ve insan kaynağını sağlamayı
                                            üst yönetim olarak taahhüt ederiz. Ayrıca çalışanlarımızı enerji verimliliği
                                            konusunda bilinçlendirir, öneri mekanizmaları aracılığıyla sürece aktif
                                            katılımlarını teşvik ederiz.</li>

                                        <li><strong>Enerji Verimli Satın Alma ve Tasarım:</strong> Yeni makinelerin,
                                            ekipmanların ve hizmetlerin satın alınmasında enerji verimliliğini
                                            önceliklendiririz. Üretim süreçlerinde enerji verimliliğini destekleyen
                                            tasarımları uygularız.</li>

                                        <li><strong>Paydaş Katılımı ve İletişim:</strong> Enerji politikamız tüm
                                            çalışanlarımıza duyurulur, anlaşılır kılınır ve ilgili tarafların erişimine
                                            açılır. Çalışanlarımızın enerji verimliliği konusundaki farkındalıklarını
                                            artıracak eğitimler düzenlenir.</li>

                                        <li><strong>Sürekli İyileştirme:</strong> Enerji yönetim sistemi performansını
                                            Yönetim Gözden Geçirme toplantılarında ve bakım ile üretim süreçlerine
                                            ilişkin düzenli değerlendirmelerde ele alır; sürekli iyileştirme için
                                            gerekli kaynakları sağlarız.</li>
                                    </ul>

                                    <p>Bu politika tüm çalışanlarımız tarafından uygulanır, ilgili taraflara açıktır ve
                                        kuruluşumuzun sürdürülebilir üretim vizyonunun bir parçasıdır.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
