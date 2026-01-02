<?php /**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */
?>
<!-- START_HEADER -->
    <div class="offcanvas__overlay"></div>

    <header class="header-area header-one">
        <div class="header-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="top-left">
                            <span><i class="fas fa-envelope"></i><a
                                    href="mailto:support@gmail.com">info@ggbholding.com</a></span>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="top-right">
                            <ul class="top-nav-link">
                                <li><a href="#"><i class="fa-light fa-globe"></i> EN</a></li>
                            </ul>
                            <ul class="social-link">
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-x-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-navigation">
            <div class="nav-inner-menu">
                <div class="primary-menu">
                    <div class="site-branding">
                        <a href="<?= $this->BaseURL('index', $lang, 1) ?>" class="brand-logo"><img src="<?= $assetURL ?>images/header_logo.png"
                                alt="GGB Logo"></a>
                    </div>
                    <div class="sasly-nav-menu">
                        <div class="sasly-menu-top justify-content-between">
                            <div class="site-branding">
                                <a href="<?= $this->BaseURL('index', $lang, 1) ?>" class="brand-logo"><img src="<?= $assetURL ?>images/header_logo.png"
                                        alt="GGB Logo"></a>
                            </div>
                            <div class="navbar-close">
                                <i class="far fa-times"></i>
                            </div>
                        </div>
                        <nav class="main-menu">
                            <ul>
                                <li class="menu-item has-children"><a href="#">Kurumsal</a>
                                    <ul class="sub-menu">
                                        <li><a href="<?= $this->BaseURL('kurumsal', $lang, 1) ?>">Hakkımızda</a></li>
                                        <li><a href="<?= $this->BaseURL('belgeler', $lang, 1) ?>">Sertifika & Belgelerimiz</a></li>
                                        <li><a href="<?= $this->BaseURL('vizyon_misyon', $lang, 1) ?>">vizyon & Misyonumuz</a></li>
                                        <li><a href="<?= $this->BaseURL('surdurulebilirlik', $lang, 1) ?>">Sürdürülebilirlik</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item has-children"><a href="#">Politikalar</a>
                                    <ul class="sub-menu">
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
                                            <a href="<?= $this->BaseURL('enerji_politikasi', $lang, 1) ?>">Enerji Politikası</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item"><a href="<?= $this->BaseURL('faaliyet_alanlari', $lang, 1) ?>">Faaliyet Alanları</a></li>
                                <li class="menu-item"><a href="<?= $this->BaseURL('insan_kaynaklari', $lang, 1) ?>">İnsan Kaynakları</a></li>
                                <li class="menu-item has-children"><a href="#">İştirakler</a>
                                    <ul class="sub-menu">
                                        <li><a href="<?= $this->BaseURL('kristal', $lang, 1) ?>">Kristal Tekstil</a></li>
                                        <li><a href="<?= $this->BaseURL('guven', $lang, 1) ?>">Güven Boya</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item has-children"><a href="#">Multimedya</a>
                                    <ul class="sub-menu">
                                        <li><a href="<?= $this->BaseURL('foto_galeri', $lang, 1) ?>">Foto Galeri</a></li>
                                        <li><a href="#">Video Galeri</a></li>
                                        <li><a href="<?= $this->BaseURL('blog_liste', $lang, 1) ?>">Blog</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <div class="sasly-nav-button mt-20 d-block d-md-none">
                            <a href="<?= $this->BaseURL('iletisim', $lang, 1) ?>" class="theme-btn style-one">İletişim<i
                                    class="far fa-angle-double-right"></i></a>
                        </div>
                        <div class="sasly-menu-bottom mt-50 d-block d-lg-none">
                            <h5>Bizi Takip Edin</h5>
                            <ul class="social-link">
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="nav-right-item">
                        <div class="nav-button d-none d-md-block">
                            <a href="<?= $this->BaseURL('iletisim', $lang, 1) ?>" class="theme-btn style-one">İletişim<i
                                    class="far fa-angle-double-right"></i></a>
                        </div>
                        <div class="navbar-toggler">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END_HEADER -->
