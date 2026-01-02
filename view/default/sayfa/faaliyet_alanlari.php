<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Page Configuration
$sayfa = "Faaliyet Alanlari";  // Page name
$baslik = $this->lang->header("Faaliyet Alanlari"); // Page title from translation file
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
                                <h1>Faaliyet<br>Alanlarımız</h1>
                                <section class="breadcrumb_section">
                                    <div class="row">
                                        <div class="breadcrumb_overlay">
                                            <div class="breadcrumb">
                                                <a href="/">Anasayfa </a>
                                                <a href="/">Faaliyet Alanlarımız </a>
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
                                            Faaliyetler
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="#boya">Tekstil Kimyasalları</a>
                                            </li>
                                            <li>
                                                <a href="#polyester">Polyester İplik Tedariki ve Üretimi</a>
                                            </li>
                                            <li>
                                                <a href="#ithalat">İthalat ve İhracat</a>
                                            </li>
                                            <li>
                                                <a href="#arge">Ar-Ge Üretim ve Entegre Sanayi Çözümleri</a>
                                            </li>
                                            <li>
                                                <a href="#insaat">İnşaat ve Mobilya Sektörü Çözümleri</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="corporate content-detail">
                                    <div id="boya" class="activity_sec">
                                        <img src="<?= $assetURL ?>images/textile.jpg" alt="">
                                        <h3>Tekstil Kimyasalları</h3>
                                        <p><strong>1980’lerden itibaren Gaziantep’in hızla büyüyen halı ve tekstil
                                                sektörlerinin ihtiyaçlarını karşılayan GGB Holding, sektöre yönelik
                                                latex (yapıştırıcı), kimyasal ve destek ürünlerinin uzman
                                                tedarikçisidir. Halı üreticilerine yüksek performanslı ürünler sunarken,
                                                tekstil alanında da yenilikçi çözümlerle sektöre güç katmaya devam
                                                ediyoruz.</strong></p>
                                        <p>Ayrıca GGB Holding, entegre üretim yetkinliğini iplik boyama alanındaki
                                            uzmanlığıyla daha da güçlendirmektedir. Dope-dyed teknolojisiyle yüksek renk
                                            dayanımına sahip iplikler üretilirken, özel taleplere uygun geniş renk
                                            kartelasıyla halı ve tekstil üreticilerine hızlı, kaliteli ve sürdürülebilir
                                            çözümler sunulmaktadır. Renk hassasiyeti, standart tutarlılığı ve ileri
                                            işlem teknolojileri sayesinde, sektörde güvenilen bir iplik boyama partneri
                                            olarak öne çıkıyoruz.</p>
                                    </div>
                                    <div id="polyester" class="activity_sec">
                                        <img src="<?= $assetURL ?>images/polyester.jpg" alt="">
                                        <h3>Polyester İplik Tedariki ve Üretimi</h3>
                                        <p><strong>2006 yılında başlayan polyester iplik tedariği, bugün entegre üretim
                                                tesislerimizle çok daha ileri bir boyuta taşınmıştır.</strong></p>
                                        <p>Dope-dyed teknolojisi ve yüzlerce özel renkten oluşan geniş kartelamız ile
                                            FDY, DTY, POY, 3D shaggy, tekstürize, micro polyester, simli ve melanj iplik
                                            üretimleri gerçekleştiriyoruz. Kristal Mensucat’ın bünyemize katılmasıyla
                                            birlikte üretim kapasitemiz ve Ar-Ge kabiliyetimiz önemli ölçüde
                                            güçlenmiştir.</p>
                                    </div>
                                    <div id="ithalat" class="activity_sec">
                                        <img src="<?= $assetURL ?>images/konteyner.jpg" alt="">
                                        <h3>İthalat ve İhracat</h3>
                                        <p><strong>2005’ten itibaren mobilya, deri, halı ve inşaat sektörlerine yönelik
                                                ithalat faaliyetleri başlarken, genişleyen ürün gamı ve operasyonel
                                                kabiliyetlerimiz ile ihracat alanında da aktif bir yapı
                                                kazanılmıştır.</strong></p>
                                        <p>Holding, kalite standartlarından ödün vermeden birçok ülkeye ürün sağlayan
                                            güvenilir bir uluslararası ticaret markasıdır.</p>
                                    </div>
                                    <div id="arge" class="activity_sec">
                                        <img src="<?= $assetURL ?>images/arge.jpg" alt="">
                                        <h3>Ar-Ge</h3>
                                        <p><strong>Uslu Group’un 2015 sonrası yapılanmasıyla birlikte üretim
                                                tesislerimizde Ar-Ge çalışmaları hız kazanmış, iplik büküm, renklendirme
                                                ve özel üretim teknolojileri geliştirilmiştir.</strong></p>
                                        <p>GGB Holding; inovasyon, kalite, sürdürülebilir üretim ve yüksek verimlilik
                                            odaklı sanayi çözümleriyle sektörlere değer katan entegre bir üretim vizyonu
                                            sunmaktadır.</p>
                                    </div>
                                    <div id="insaat" class="activity_sec">
                                        <img src="<?= $assetURL ?>images/insaat.jpg" alt="">
                                        <h3>İnşaat ve Mobilya Sektörü Çözümleri</h3>
                                        <p><strong>Uzun yıllara dayanan tedarik uzmanlığımız, inşaat ve mobilya
                                                sektörlerinde ihtiyaç duyulan teknik ürünlerin ve özel çözümlerin
                                                sunulmasıyla genişlemiştir.</strong></p>
                                        <p>Kaliteli malzeme tedariği, sürdürülebilir üretim anlayışı ve güçlü iş
                                            ortaklıklarıyla bu sektörlerde güvenilir çözüm ortağı olmaya devam ediyoruz.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
