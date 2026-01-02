<?php /**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Get pages for each category using the helper function
// This function automatically handles language switching and returns pages in current language
$kurumsal_sayfalar = $this->getCategoryPages("Kurumsal");
$politikalar_sayfalar = $this->getCategoryPages("Politikalar");
$isitirakler_sayfalar = $this->getCategoryPages("İştirakler");
$insan_kaynaklari_sayfalar = $this->getCategoryPages("İnsan Kaynakları");

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
                                <?php
                                /**
                                 * Language Toggle Button
                                 * 
                                 * This code creates a language switcher that toggles between Turkish (tr) and English (en)
                                 * - If current language is Turkish: shows "EN" button to switch to English
                                 * - If current language is English: shows "TR" button to switch to Turkish
                                 * - Maintains the same page when switching languages
                                 */
                                
                                // Get current language (default to Turkish if not set)
                                $currentLang = ($lang == "tr") ? "tr" : "en";
                                
                                // Determine the toggle language (opposite of current)
                                $toggleLang = ($currentLang == "tr") ? "en" : "tr";
                                
                                // Set the button text based on toggle language
                                $toggleLangText = ($currentLang == "tr") ? "EN" : "TR";
                                
                                // Get current page name to maintain same page when switching language
                                // If page is not set, default to index page
                                $currentPage = isset($page) ? $page : "index";
                                
                                // Convert page key to SEO-friendly link using lang->link()
                                // This ensures the link works with both Turkish and English names
                                $currentPageLink = $this->lang->link($currentPage);
                                
                                // Build the language switch URL using BaseURL method
                                // BaseURL($url, $lang, $uzanti) - uzanti=1 adds .html extension
                                $langSwitchUrl = $this->BaseURL($currentPageLink, $toggleLang, 1);
                                
                                // Set tooltip text based on target language
                                $tooltipText = ($toggleLang == "en") ? "Switch to English" : "Switch to Turkish";
                                ?>
                                <li>
                                    <a href="<?= $langSwitchUrl ?>" title="<?= $tooltipText ?>">
                                        <i class="fa-light fa-globe"></i> <?= $toggleLangText ?>
                                    </a>
                                </li>
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
                        <a href="<?= $this->BaseURL($this->lang->link('index'), $lang, 1) ?>" class="brand-logo"><img src="<?= $assetURL ?>images/header_logo.png"
                                alt="GGB Logo"></a>
                    </div>
                    <div class="sasly-nav-menu">
                        <div class="sasly-menu-top justify-content-between">
                            <div class="site-branding">
                                <a href="<?= $this->BaseURL($this->lang->link('index'), $lang, 1) ?>" class="brand-logo"><img src="<?= $assetURL ?>images/header_logo.png"
                                        alt="GGB Logo"></a>
                            </div>
                            <div class="navbar-close">
                                <i class="far fa-times"></i>
                            </div>
                        </div>
                        <nav class="main-menu">
                            <ul>
                                <li class="menu-item has-children"><a href="#"><?= $this->lang->header('Kurumsal') ?></a>
                                    <ul class="sub-menu">
                                        <?php foreach ($kurumsal_sayfalar as $sayfa) {
                                            $link = $this->lang->link($sayfa['url']);
                                            $url = $this->BaseURL($link, $lang, 1); 
                                            $baslik = $sayfa['baslik'];
                                        ?>
                                            <li>
                                                <a href="<?= $url ?>"><?= $baslik ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li class="menu-item has-children"><a href="#"><?= $this->lang->header('Politikalar') ?></a>
                                    <ul class="sub-menu">
                                        <?php foreach ($politikalar_sayfalar as $sayfa) {
                                            $link = $this->lang->link($sayfa['url']);
                                            $url = $this->BaseURL($link, $lang, 1); 
                                            $baslik = $sayfa['baslik'];
                                        ?>
                                            <li>
                                                <a href="<?= $url ?>"><?= $baslik ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li class="menu-item"><a href="<?= $this->BaseURL($this->lang->link('faaliyet_alanlari'), $lang, 1) ?>"><?= $this->lang->header('Faaliyet Alanlari') ?></a></li>
                                <li class="menu-item"><a href="<?= $this->BaseURL($this->lang->link('insan_kaynaklari'), $lang, 1) ?>"><?= $this->lang->header('Insan Kaynaklari') ?></a></li>
                                <li class="menu-item has-children"><a href="#"><?= $this->lang->header('İştirakler') ?></a>
                                    <ul class="sub-menu">
                                        <?php foreach ($isitirakler_sayfalar as $sayfa) {
                                            $link = $this->lang->link($sayfa['url']);
                                            $url = $this->BaseURL($link, $lang, 1); 
                                            $baslik = $sayfa['baslik'];
                                        ?>
                                            <li>
                                                <a href="<?= $url ?>"><?= $baslik ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li class="menu-item has-children"><a href="#"><?= $this->lang->header('Multimedya') ?></a>
                                    <ul class="sub-menu">
                                        <li><a href="<?= $this->BaseURL($this->lang->link('foto_galeri'), $lang, 1) ?>"><?= $this->lang->header('Foto Galeri') ?></a></li>
                                        <li><a href="#">Video Galeri</a></li>
                                        <li><a href="<?= $this->BaseURL($this->lang->link('blog_liste'), $lang, 1) ?>"><?= $this->lang->header('Blog Liste') ?></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <div class="sasly-nav-button mt-20 d-block d-md-none">
                            <a href="<?= $this->BaseURL($this->lang->link('iletisim'), $lang, 1) ?>" class="theme-btn style-one"><?= $this->lang->header('İletişim') ?><i
                                    class="far fa-angle-double-right"></i></a>
                        </div>
                        <div class="sasly-menu-bottom mt-50 d-block d-lg-none">
                            <h5><?= $this->lang->header('Bizi Takip Edin') ?></h5>
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
                            <a href="<?= $this->BaseURL($this->lang->link('iletisim'), $lang, 1) ?>" class="theme-btn style-one"><?= $this->lang->header('İletişim') ?><i
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
