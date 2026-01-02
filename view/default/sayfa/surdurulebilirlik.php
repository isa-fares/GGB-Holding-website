<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Page Configuration
$sayfa = "Surdurulebilirlik";  // Page name
$baslik = $this->lang->header("Surdurulebilirlik"); // Page title from translation file
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
                                <h1>Sürdürülebilirlik</h1>
                                <section class="breadcrumb_section">
                                    <div class="row">
                                        <div class="breadcrumb_overlay">
                                            <div class="breadcrumb">
                                                <a href="/">Anasayfa </a>
                                                <a href="/">Sürdürülebilirlik </a>
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
                                                <a href="<?= $this->BaseURL('belgeler', $lang, 1) ?>">Sertifika & Belgeler</a>
                                            </li>
                                            <li>
                                                <a href="<?= $this->BaseURL('surdurulebilirlik', $lang, 1) ?>" class="active">Sürdürülebilirlik</a>
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
                                    <img src="<?= $assetURL ?>images/sust.jpg" alt="">
                                    <h3>Sürdürülebilirlik Yaklaşımımız</h3>
                                    <p>GGB Holding olarak sürdürülebilirliği; çevresel, ekonomik ve sosyal boyutlarıyla
                                        bütünsel bir yönetim prensibi olarak ele alıyoruz. Üretimimiz boyunca doğal
                                        kaynakları verimli kullanmayı, çevresel etkileri azaltmayı ve uzun vadeli bir
                                        değer oluşturmayı temel hedefimiz kabul ediyoruz.</p>

                                    <h4>Çevresel Sürdürülebilirlik</h4>
                                    <ul>
                                        <li>Enerji performans göstergelerini (EnPI) düzenli olarak takip ediyor ve
                                            sürekli iyileştirme çalışmaları yürütüyoruz.</li>
                                        <li>Yeni yatırımlarımızda düşük enerji tüketimli, yüksek verimlilik sağlayan
                                            modern teknolojileri tercih ediyoruz.</li>
                                        <li>Üretim süreçlerinde karbon ayak izini azaltmaya yönelik projeler
                                            geliştiriyor ve sera gazı emisyonlarını minimum seviyeye indirmeyi
                                            hedefliyoruz.</li>
                                        <li>Kaynak kullanımını optimize ederek atık oluşumunu azaltıyor, çevresel
                                            etkileri sürekli kontrol altında tutuyoruz.</li>
                                    </ul>

                                    <h4>Enerji Yönetimi ve Verimlilik</h4>
                                    <ul>
                                        <li>Enerji yönetim sistemimizi ulusal mevzuat ve uluslararası standartlar
                                            doğrultusunda sürekli geliştiriyoruz.</li>
                                        <li>Temel çizgiyi (EnB) periyodik olarak gözden geçirerek enerji verimliliği
                                            odaklı projeleri hayata geçiriyoruz.</li>
                                        <li>Yenilenebilir enerji kaynaklarının üretim süreçlerimize entegre edilmesini
                                            destekliyoruz.</li>
                                        <li>Enerji verimli tasarım ve satın alma kriterlerini tüm makine, ekipman ve
                                            hizmet alımlarında önceliklendiriyoruz.</li>
                                    </ul>

                                    <h4>İnsan ve Toplum Odaklılık</h4>
                                    <ul>
                                        <li>Çalışanlarımızın enerji verimliliği ve sürdürülebilirlik konularındaki
                                            farkındalığını artırmak için düzenli eğitimler sağlıyoruz.</li>
                                        <li>Öneri mekanizmaları ile çalışan katılımını teşvik ediyor, iyileştirme
                                            süreçlerine aktif dahil olmalarını destekliyoruz.</li>
                                        <li>Tedarikçiler, taşeronlar ve diğer paydaşlarımızla şeffaf iletişim kurarak
                                            sürdürülebilirlik bilincini tüm ekosistemimize yaymayı amaçlıyoruz.</li>
                                    </ul>

                                    <h4>Gelecek Odaklı Üretim Anlayışı</h4>
                                    <ul>
                                        <li>Tüm yeni yatırımlarımızda çevreci teknolojileri ve enerji verimliliğini
                                            temel karar kriteri olarak görüyoruz.</li>
                                        <li>Sürdürülebilir üretimi geleceğe bırakacağımız en değerli miras olarak kabul
                                            ediyor, operasyonlarımızı bu vizyon doğrultusunda şekillendiriyoruz.</li>
                                        <li>Kurumsal sürdürülebilirlik hedeflerimizi düzenli olarak gözden geçiriyor ve
                                            performans değerlendirmelerini üst yönetim ile paylaşıyoruz.</li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
