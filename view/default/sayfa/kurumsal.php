<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Page Configuration
$sayfa = "Kurumsal";  // Page name
$baslik = $this->lang->header("Kurumsal"); // Page title from translation file
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
                                <h1>Hakkımızda</h1>
                                <section class="breadcrumb_section">
                                    <div class="row">
                                        <div class="breadcrumb_overlay">
                                            <div class="breadcrumb">
                                                <a href="/">Anasayfa </a>
                                                <a href="/">Hakkımızda </a>
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
                                                <a href="<?= $this->BaseURL('kurumsal', $lang, 1) ?>" class="active">Hakkımızda</a>
                                            </li>
                                            <li>
                                                <a href="<?= $this->BaseURL('vizyon_misyon', $lang, 1) ?>">Vizyon & Misyonumuz</a>
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
                                    <img src="https://images.unsplash.com/photo-1509130298739-651801c76e96?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                        alt="">
                                    <p>Kurucumuz <strong>Fevzi Uslu</strong>, 1970 yılında boya ustası olarak başladığı
                                        meslek hayatında 15 m²'lik küçük bir nalbur dükkanı açarak ticarete adım
                                        atmıştır. Azmi ve becerisi sayesinde işletme zamanla gelişmiş ve toptan boya
                                        satışı alanında önemli bir konuma ulaşmıştır.</p>

                                    <h4>1980'lerin Gelişimi</h4>
                                    <p>1980'li yıllarda Gaziantep’te halı sektörünün gelişmesiyle birlikte, sektörün
                                        ihtiyaç duyduğu <strong>latex (yapıştırıcı)</strong> ürünlerinin tedarikine
                                        başlanmış; ayrıca Marshall Boya bayiliği üstlenilerek inşaat, halı ve tekstil
                                        sektörlerinde faaliyetler genişletilmiştir.</p>

                                    <h4>1982 — Aile Katılımı</h4>
                                    <p>1982 yılında <strong>Bülent</strong> ve <strong>Beyhan Uslu</strong> işletmeye
                                        katılmış ve şirket, Doğu ve Güneydoğu Anadolu bölgelerinde boya, halı ve tekstil
                                        sektörlerine yönelik ürün tedarikini hızla artırmıştır.</p>

                                    <h4>2000 — Kurumsallaşma</h4>
                                    <p>2000 yılına gelindiğinde işletme kurumsallaşarak <strong>Gaziantep Güven
                                            Boya</strong> adıyla ticari hayatına devam etmiştir.</p>

                                    <h4>2005 ve Sonrası</h4>
                                    <p>2005 yılında mobilya, deri ve inşaat sektörlerine yönelik bazı ürünlerin ithalatı
                                        yapılarak şirket ihracat ve ithalat faaliyetlerine başlamıştır. 2006 yılından
                                        itibaren halı sektörüne <strong>polyester iplik (FDY, DTY, POY)</strong>
                                        tedariği yapılmaya başlanmıştır.</p>

                                    <h4>Polyester İplik Üretimi</h4>
                                    <p>Dope-dyed olarak alınan ürünler ve 34'ü standart olmak üzere yüzlerce renkten
                                        oluşan özel renk kartelasıyla FDY, DTY, POY, 3D shaggy, tekstürize, micro
                                        polyester, simli ve melanj iplikleri entegre tesislerde üretilmektedir.</p>

                                    <h4>2015 — Uslu Group Yapılanması</h4>
                                    <p>2015 yılı itibariyle Uslu Group, üç şirket ile inşaat, halı, tekstil ve mobilya
                                        sektörlerinde hizmet vermeye başlamış; iplik üretim ve büküm tesisini kurarak
                                        Ar-Ge çalışmalarını artırmıştır.</p>

                                    <h4>2024 — Yeni Yatırım</h4>
                                    <p>2024 yılında <strong>Kristal Mensucat</strong> bünyeye katılmış ve son
                                        teknolojiyle donatılmış büyük bir iplik üretim tesisi yatırımı yapılmıştır.</p>

                                    <h4>Zaman Çizelgesi</h4>
                                    <ul>
                                        <li><strong>1970:</strong> İlk nalbur dükkanı açıldı.</li>
                                        <li><strong>1982:</strong> Aile üyeleri katıldı.</li>
                                        <li><strong>2000:</strong> Kurumsallaşma.</li>
                                        <li><strong>2005:</strong> İthalat ve ihracata adım.</li>
                                        <li><strong>2006:</strong> Polyester iplik tedariği.</li>
                                        <li><strong>2015:</strong> Uslu Group yapısının oluşması.</li>
                                        <li><strong>2024:</strong> Kristal Mensucat yatırımı.</li>
                                    </ul>

                                    <p><strong>Bugün Uslu Group</strong>, tedarik ettiği tüm sektörlerde güvenilirliği,
                                        öncülüğü ve istikrarlı yapısı ile öne çıkmaktadır. Hedefimiz, şirketimizi ve
                                        ülkemizi her geçen gün daha ileriye taşımaktır.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
