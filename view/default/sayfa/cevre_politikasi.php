<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Page Configuration
$sayfa = "Cevre Politikasi";  // Page name
$baslik = $this->lang->header("Cevre Politikasi"); // Page title from translation file
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
                                <h1>Çevre Politikası</h1>
                                <section class="breadcrumb_section">
                                    <div class="row">
                                        <div class="breadcrumb_overlay">
                                            <div class="breadcrumb">
                                                <a href="/">Anasayfa </a>
                                                <a href="/">Çevre Politikası </a>
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
                                                <a class="active" href="<?= $this->BaseURL('cevre_politikasi', $lang, 1) ?>">Çevre Politikası</a>
                                            </li>
                                            <li>
                                                <a href="<?= $this->BaseURL('yolsuzluk_politikasi', $lang, 1) ?>">Yolsuzluk ve Rüşvet Politikası</a>
                                            </li>
                                            <li>
                                                <a href="<?= $this->BaseURL('kalite_politikasi', $lang, 1) ?>">Kalite Politikası</a>
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
                                    <p>GGB Holding San. ve Tic. Ltd. Şti. olarak, Gaziantep Organize Sanayi
                                        Bölgesi’nde faaliyet gösteren büyük ölçekli bir polyester iplik üreticisiyiz.
                                        Faaliyetlerimizin çevresel etkilerinin bilincindeyiz. Bu doğrultuda,
                                        sürdürülebilir üretim ilkeleri doğrultusunda hareket ederek doğal kaynakların
                                        etkin kullanımını sağlamak, çevreye duyarlı üretim süreçleri geliştirmek ve
                                        çevre üzerindeki zararlı etkilerimizi azaltmak temel hedefimizdir.</p>
                                    <p>Bu politika ile, ISO 14001:2015 Çevre Yönetim Sistemi standartlarını esas alarak,
                                        tüm süreçlerimizde çevre koruma bilincini sistematik bir yapıya kavuşturmayı,
                                        çevresel performansımızı sürekli iyileştirmeyi ve sürdürülebilir kalkınmaya
                                        katkı sağlamayı amaçlıyoruz.</p>

                                    <h3>Kapsam</h3>
                                    <p>Bu çevre politikası;</p>
                                    <ul>
                                        <li>Mevcut polyester iplik üretim tesisimizi ve gelecekteki yatırımlarımızı,
                                        </li>
                                        <li>GGB Holding’ın tüm çalışanlarını,</li>
                                        <li>Tedarikçiler, yükleniciler, taşeronlar ve diğer kuruluşlarla yapılan
                                            sözleşmelerde yer alan personel de dahil olmak üzere GGB Holding’ın tüm
                                            paydaşlarını kapsamaktadır.</li>
                                    </ul>

                                    <h3>Politika ve Taahhütlerimiz</h3>

                                    <h4>Yasal Standartlara Uyum</h4>
                                    <p>Tüm ulusal çevre mevzuatına ve ISO 14001, GRS (Global Recycled Standard) gibi
                                        ilgili uluslararası standartlara tam uyum sağlarız.</p>

                                    <h4>Sürekli İyileştirme</h4>
                                    <p>ISO 14001 Çevre Yönetim Sistemini etkin bir şekilde uygular, performansımızı
                                        düzenli olarak gözden geçirerek sistemimizi sürekli geliştirmeyi hedefleriz.</p>

                                    <h4>Atık Yönetimi ve Kaynak Verimliliği</h4>
                                    <p>Üretim süreçlerinde oluşan atıkları minimuma indirmeyi, hammadde ve doğal kaynak
                                        kullanımını optimize etmeyi hedefleriz.</p>

                                    <h4>Enerji Verimliliği</h4>
                                    <p>Enerji tasarrufunu öncelik olarak kabul eder, yüksek verimliliğe sahip ekipmanlar
                                        ve prosesler kullanarak enerji tüketimimizi azaltırız.</p>

                                    <h4>Geri Dönüşüm ve Bertaraf</h4>
                                    <p>İşletmemizde oluşan tüm atıkların mevzuata uygun olarak bertaraf edilmesi için
                                        lisanslı firmalarla çalışır; mümkün olan her durumda geri dönüşüme katkı
                                        sağlamayı hedefleriz. Tehlikeli ve tehlikesiz atıklar için yaptığımız geçici
                                        depolama alanını tüm yasal şartlara uygun şekilde inşa ederek atık sızıntısı
                                        kaynaklı çevre kirliliğini önlemeyi amaçlarız.</p>

                                    <h4>Çalışan Katılımı ve Eğitim</h4>
                                    <p>Çalışanlarımıza çevre bilincini kazandırmak amacıyla düzenli eğitimler vermeyi ve
                                        çevreye duyarlı bir yaklaşım geliştirmelerini sağlamak için bu sürece aktif
                                        katılımlarını teşvik ederiz.</p>

                                    <h4>Kaynak ve Bütçe Tahsisi</h4>
                                    <p>Çevre yönetim sistemimizin etkin şekilde uygulanması için gerekli kaynak ve
                                        bütçeyi sağlar, sistemin sürdürülebilirliğini güvence altına alırız.</p>

                                    <h4>İletişim ve Şeffaflık</h4>
                                    <p>Çevre politikamızı tüm çalışanlarımıza ve paydaşlarımıza açık şekilde iletir, iç
                                        ve dış iletişim kanallarıyla anlaşılır ve erişilebilir olmasını sağlarız.</p>

                                    <p><strong>GGB Holding</strong> olarak çevre yönetim sistemini tüm süreçlerinde
                                        benimseyerek, çevresel sorumluluğunu yerine getirmeyi, doğal kaynakları verimli
                                        kullanmayı ve üretim süreçlerinin çevresel etkilerini minimize etmeyi taahhüt
                                        etmektedir. Bu politika, ISO 14001 Çevre Yönetim Sistemi standartlarına uygun
                                        olarak belirlenmiş olup, tüm çalışanlarımız ve tedarikçilerimiz için rehber
                                        niteliğindedir.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
