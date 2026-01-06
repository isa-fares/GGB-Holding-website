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
                                    href="<?= $this->linkEmail() ?>"><?= $this->ayarlar('email_merkez') ?></a></span>
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
                                 * - Maintains the same page and katurl when switching languages
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
                                
                                // Get katurl parameter if exists (for category pages like kurumsal/hakkimizda.html)
                                $currentKaturl = isset($_GET['katurl']) ? $_GET['katurl'] : '';
                                
                                // Convert page key to SEO-friendly link using lang->link() with target language
                                // We need to use the target language's link() method, so we temporarily switch language context
                                $tempLang = $this->lang;
                                $targetLangObj = new \Lang($toggleLang);
                                $targetPageLink = $targetLangObj->link($currentPage);
                                
                                // Build the language switch URL
                                // If katurl exists, append it to the page link (e.g., kurumsal/hakkimizda)
                                if (!empty($currentKaturl)) {
                                    $fullLink = $targetPageLink . '/' . $currentKaturl;
                                } else {
                                    $fullLink = $targetPageLink;
                                }
                                
                                // Build the language switch URL using BaseURL method
                                // BaseURL($url, $lang, $uzanti) - uzanti=1 adds .html extension
                                $langSwitchUrl = $this->BaseURL($fullLink, $toggleLang, 1);
                                
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
                                <?= $this->getSocialList() ?>
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
                                        <?php 
                                        $kurumsal_link = $this->lang->link('kurumsal');
                                        foreach ($kurumsal_sayfalar as $sayfa) {
                                            $page_url = $sayfa['url'];
                                            // Remove any numbers from end of URL (e.g., hakkimizda-1 -> hakkimizda, sertifika-2 -> sertifika)
                                            $page_url_clean = preg_replace('/-\d+$/', '', $page_url);
                                            // Build URL: kurumsal/page-url.html (without numbers)
                                            $url = $this->BaseURL($kurumsal_link . '/' . $page_url_clean, $lang, 1);
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
                                        <?php 
                                        $politikalar_link = $this->lang->link('politikalar');
                                        foreach ($politikalar_sayfalar as $sayfa) {
                                            $page_url = $sayfa['url'];
                                            // Remove numbers from end of URL (e.g., cevre-politikasi-1 -> cevre-politikasi)
                                            $page_url_clean = preg_replace('/-\d+$/', '', $page_url);
                                            // Build URL: politikalar/page-url.html (without numbers)
                                            $url = $this->BaseURL($politikalar_link . '/' . $page_url_clean, $lang, 1);
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
                                        <?php 
                                        $istirakler_link = $this->lang->link('istirakler');
                                        foreach ($isitirakler_sayfalar as $sayfa) {
                                            $page_url = $sayfa['url'];
                                            // Remove numbers from end of URL (e.g., kristal-1 -> kristal)
                                            $page_url_clean = preg_replace('/-\d+$/', '', $page_url);
                                            // Build URL: istirakler/page-url.html (without numbers)
                                            $url = $this->BaseURL($istirakler_link . '/' . $page_url_clean, $lang, 1);
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
                                        <li><a href="<?= $this->BaseURL($this->lang->link('video_galeri'), $lang, 1) ?>"><?= $this->lang->header('Video Galeri') ?></a></li>
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
                                <?= $this->getSocialList() ?>
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

<?php
$blog_url = isset($data['katurl']) ? $data['katurl'] : (isset($_GET['katurl']) ? $_GET['katurl'] : '');

// Show line_wrap on all pages except index
if ($page != "index") : ?>
    <div id="">
    <div id="">
        <div class="line_wrap">
            <div class="line_item_one"></div>
            <div class="line_item"></div>
            <div class="line_item"></div>
            <div class="line_item"></div>
            <div class="line_item"></div>
        </div>
    <?php endif; ?>