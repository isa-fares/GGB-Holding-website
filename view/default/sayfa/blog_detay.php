<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Page Configuration
$sayfa = "Blog Detay";  // Page name
$baslik = $this->lang->header("Blog Detay"); // Page title from translation file
$this->sayfaBaslik = $baslik . " - " . $this->ayarlar("title_" . $lang); // Title tag for browser tab
$this->ogBaslik = $this->sayfaBaslik;  // Open Graph title (for social media)
$this->ogUrl = $this->fullUrl;         // Open Graph URL (canonical)

?>
<div id="smooth-wrapper">
        <div id="smooth-content">

            <div class="line_wrap">
                <div class="line_item_one"></div>
                <div class="line_item"></div>
                <div class="line_item"></div>
                <div class="line_item"></div>
                <div class="line_item"></div>
            </div>

            <main>

                <section class="page-hero-ss">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="page-content text-center">
                                    <h3 class="page-title"><a href="#"><i class="fa-regular fa-arrow-left"></i>Diğer bloglar</a><br>Yeşil Enerjiyle Geleceğe Yatırım: GGB Holding’in Vizyonu</h3>
                                    <ul class="breadcrumb-link">
                                        <li>24 Aralık, 2025</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="blog-details-ss pb-80">
                    <div class="container">

                        <div class="blog-details-wrapper">
                            <div class="row" style="justify-content: center;">
                                <div class="col-md-9">

                                    <div class="blog-post-main mb-70">
                                        <div class="blog-post-item">
                                            <div class="post-thumbnail">
                                                <img src="<?= $assetURL ?>images/vismis.jpg" alt="Post Thumbnail">
                                            </div>
                                            <div class="content-detail">
                                                <h3>Neden Yeşil Enerji?</h3>
                                                <p>Küresel ölçekte enerji ihtiyacının artması, şirketleri sürdürülebilir
                                                    çözümler geliştirmeye zorluyor. Fosil yakıtların giderek yetersiz
                                                    kalması ve çevreyi olumsuz etkilemesi, yenilenebilir enerji
                                                    yatırımlarını zorunlu hale getiriyor. GGB Holding, bu dönüşümün
                                                    sadece bir trend değil, geleceğin temel gerekliliği olduğunun
                                                    bilinciyle hareket ediyor.</p>
                                                <ul>
                                                    <li>Daha düşük karbon salımı</li>
                                                    <li>Uzun vadede daha düşük maliyetler</li>
                                                    <li>Enerji güvenliği ve bağımsızlığı</li>
                                                    <li>Çevresel sürdürülebilirliğe katkı</li>
                                                </ul>

                                                <h3>GGB Holding’in Yenilenebilir Enerji Stratejisi</h3>
                                                <p>GGB Holding’in enerji vizyonu, doğanın sunduğu kaynakları en verimli,
                                                    en yenilikçi ve en sorumlu şekilde kullanmaya dayanıyor. Şirket,
                                                    teknolojiyi ve çevre bilincini aynı noktada buluşturarak güçlü bir
                                                    enerji modeli oluşturmayı amaçlıyor.</p>
                                                <p>Yatırımların temel yapı taşları şunlardır:</p>
                                                <ul>
                                                    <li><strong>Güneş Enerjisi:</strong> Verimli paneller ve geniş
                                                        ölçekli arazi yatırımları.</li>
                                                    <li><strong>Rüzgâr Enerjisi:</strong> Yeni nesil türbinlerle
                                                        artırılmış üretim kapasitesi.</li>
                                                    <li><strong>Enerji Depolama:</strong> Kesintisiz tedarik için akıllı
                                                        depolama sistemleri.</li>
                                                    <li><strong>Ar-Ge Çalışmaları:</strong> Geleceğin enerji
                                                        teknolojilerine yatırım.</li>
                                                </ul>

                                                <h3>Ekonomik ve Çevresel Kazanımlar</h3>
                                                <p>Yeşil enerji yatırımları yalnızca çevreyi korumakla kalmaz; ekonomik
                                                    açıdan da güçlü bir katma değer sunar. GGB Holding bu süreci bir
                                                    bütünden değerlendirerek, hem ülke ekonomisine hem kendi yatırım
                                                    portföyüne uzun vadeli fayda oluşturuyor.</p>
                                                <ul>
                                                    <li>Daha düşük operasyon maliyetleri</li>
                                                    <li>Enerji arzında istikrar</li>
                                                    <li>Yeni iş alanları ve istihdam artışı</li>
                                                    <li>Doğal kaynakların korunması</li>
                                                </ul>

                                                <h3>GGB Holding’in Gelecek Vizyonu</h3>
                                                <p>GGB Holding için yeşil enerji bir tercih değil; nesiller arası bir
                                                    sorumluluk. Şirket, bugünün yatırımlarını yarının ihtiyaçlarını
                                                    karşılayacak şekilde tasarlıyor. Daha temiz, daha güçlü, daha
                                                    sürdürülebilir bir enerji modeliyle hem sektöre yön veriyor hem de
                                                    topluma örnek bir değer oluşturuyor.</p>
                                                <p>Geleceğin enerjisi yenilenebilir kaynaklarda. GGB Holding ise bu
                                                    geleceğin mimarları arasında yer alıyor.</p>

                                            </div>
                                        </div>
                                        <div class="entry-footer">
                                            <div class="social-share">
                                                <span>Paylaş:</span>
                                                <a target="_blank" href="https://twitter.com/intent/tweet?text=Bu%20makaleyi%20okumanızı%20öneririm&url=" onclick="this.href+= encodeURIComponent(window.location.href)"><i class="fa-brands fa-x-twitter"></i></a>
                                                <a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=" onclick="this.href+= encodeURIComponent(window.location.href)"><i class="fa-brands fa-linkedin-in"></i></a>
                                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=" onclick="this.href+= encodeURIComponent(window.location.href)"><i class="fa-brands fa-facebook-f"></i></a>
                                                <a target="_blank" href="https://api.whatsapp.com/send?text=Bu%20makaleyi%20okumanızı%20öneririm:%20" onclick="this.href+= encodeURIComponent(window.location.href)"><i class="fa-brands fa-whatsapp"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </main>
