<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Page Configuration
$sayfa = "Iletisim";  // Page name
$baslik = $this->lang->header("Iletisim"); // Page title from translation file
$this->sayfaBaslik = $baslik . " - " . $this->ayarlar("title_" . $lang); // Title tag for browser tab
$this->ogBaslik = $this->sayfaBaslik;  // Open Graph title (for social media)
$this->ogUrl = $this->fullUrl;         // Open Graph URL (canonical)

?>
<div>
    <div>

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
                            <h1>İletişim</h1>
                            <section class="breadcrumb_section">
                                <div class="row">
                                    <div class="breadcrumb_overlay">
                                        <div class="breadcrumb">
                                            <a href="/">Anasayfa </a>
                                            <a href="/">İletişim </a>
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

            <section class="contact-ss pb-80">
                <div class="container">
                    <div class="row justify-content-center" id="contactItems">
                        <div class="col-lg-4 col-md-6 col-sm-12">

                            <div class="sasly-iconic-box style-twelve mb-30" data-aos="fade-up" data-aos-delay="10"
                                data-aos-duration="1300">
                                <div class="content">
                                    <h5>Genel Merkez</h5>
                                    <p>2. Organize Sanayi Bölgesi Celal Doğan Bulvarı No: 56 Başpınar / Gaziantep
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">

                            <div class="sasly-iconic-box style-twelve mb-30" data-aos="fade-up" data-aos-delay="15"
                                data-aos-duration="1600">
                                <div class="content">
                                    <h5>E-posta Adresi</h5>
                                    <p><a href="info@ggbholding.com.tr">info@ggbholding.com.tr</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">

                            <div class="sasly-iconic-box style-twelve mb-30" data-aos="fade-up" data-aos-delay="20"
                                data-aos-duration="1900">
                                <div class="content">
                                    <h5>Telefon</h5>
                                    <p><a href="tel:+903429099720">+90 (342) 909 97 20</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="contact-form-ss pb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">

                            <div class="section-content-box mb-50" data-aos="fade-right" data-aos-duration="1200">
                                <div class="section-title mb-30">
                                    <span class="sub-heading">Bizimle İletişime Geçin</span>
                                    <h3>GGB Holding ile
                                        Güçlü İş Birlikleri Kurun</h3>
                                </div>
                                <p data-aos="fade-up" data-aos-duration="1000">GGB Holding olarak; uzmanlığımız,
                                    deneyimimiz ve güçlü kurumsal yapımızla işletmenize değer katacak çözümler
                                    sunuyoruz.</p>
                            </div>
                        </div>
                        <div class="col-lg-8">

                            <div class="contact-wrapper mb-50" data-aos="fade-left" data-aos-duration="1400">
                                <h3>Bize Mesaj Gönderin</h3>
                                <p>Mail adresiniz gizli tutulur. Zorunlu alanlar * ile işaretlenmiştir.</p>
                                    <?php Form::Open(array(
                                        "class" => "iletisim-form contact-form",
                                        "method" => "post",
                                        "action" => $this->baseURL("ajax/iletisimForm", "tr", 1),
                                        "token" => true,
                                        "message" => array(
                                            ["no" => 1, "title" => $this->lang->iletisim("formsucces"), "status" => "success"],
                                            ["no" => 2, "title" => $this->lang->iletisim("formerror"), "status" => "error"],
                                            ["no" => 3, "title" => $this->lang->iletisim("formvalid"), "status" => "warning"],
                                        ),
                                        "lang" => $lang
                                    )); ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form_control" placeholder="Adınız*"
                                                    name="adi" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="email" class="form_control"
                                                    placeholder="E-posta Adresiniz*" name="email" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <textarea class="form_control" placeholder="Mesajınız*"
                                                    name="mesaj" rows="5" cols="8"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Güvenlik Kodu</label>
                                                <div class="captcha" style="display: flex; align-items: center; gap: 15px; margin-bottom: 10px;">
                                                    <img class="captcha_image" src="<?= $this->baseURL("ajax/getcaptchaimage", "tr", 1) ?>" style="cursor: pointer;">
                                                    <input type="text" minlength="6" class="form_control" name="captcha_value" maxlength="6" placeholder="Güvenlik Kodu*" required>
                                                </div>
                                                <small style="display: block; margin-top: 5px; color: #666;">* kodu değiştirmek için resmin üzerine tıklayın</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <button class="cmt-btn theme-btn style-one">Mesaj Gönder <i
                                                        class="far fa-angle-double-right"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <p class="form-message"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php Form::Close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="map-page-ss pb-130">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="map-box" data-aos="fade-up" data-aos-duration="1300">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2169.538380066529!2d37.29588981614091!3d37.151230910064996!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x152e1d0ae8db2d37%3A0x28c4f28a5a7ecba5!2sUSLU%20GROUP!5e0!3m2!1str!2str!4v1764151845245!5m2!1str!2str"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="cta-sb bg_cover p-r z-1" id="index_sust"
                style="background-image: url(<?= $assetURL ?>images/sust.jpg);">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-8">
                            <div class="section-content-box">
                                <div class="section-title text-white mb-55">
                                    <h2 class="text-anm">
                                        <span class="font-200">Sürdürülebilir Bir Gelecek ve</span> <br>
                                        Daha Yeşil Bir Dünya İçin Çalışıyoruz
                                    </h2>
                                </div>
                                <div class="cta-button" data-aos="fade-up" data-aos-duration="1200">
                                    <a href="<?= $this->BaseURL('surdurulebilirlik', $lang, 1) ?>" class="theme-btn style-one">
                                        Politikamız <i class="far fa-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>