<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Page Configuration
$sayfa = "Blog Liste";  // Page name
$baslik = $this->lang->header("Blog Liste"); // Page title from translation file
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
                                    <h1>Blog</h1>
                                    <section class="breadcrumb_section">
                                        <div class="row">
                                            <div class="breadcrumb_overlay">
                                                <div class="breadcrumb">
                                                    <a href="/">Anasayfa </a>
                                                    <a href="/">Blog </a>
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
                    
                    <section class="blog-grid-page-ss pb-130" id="blogLister">
                        <div class="container">
                            <div class="row">
                    
                                <div class="col-xl-4 col-md-6 col-sm-12">
                                    <div class="blog-post-item style-three" data-aos="fade-up" data-aos-duration="1200">
                                        <div class="post-thumbnail">
                                            <a href="<?= $this->BaseURL('blog_detay', $lang, 1) ?>">
                                                <img src="<?= $assetURL ?>images/blog/blog-grid1.jpg" alt="GGB Holding İnşaat Projeleri">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <div class="post-meta style-one">
                                                <span class="date"><a href="<?= $this->BaseURL('blog_detay', $lang, 1) ?>">Aralık 4, 2025</a></span>
                                            </div>
                                            <h4 class="title"><a href="<?= $this->BaseURL('blog_detay', $lang, 1) ?>">GGB Holding: Geleceğin Şehirlerini İnşa Ediyor</a></h4>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="col-xl-4 col-md-6 col-sm-12">
                                    <div class="blog-post-item style-three" data-aos="fade-up" data-aos-duration="1200">
                                        <div class="post-thumbnail">
                                            <a href="<?= $this->BaseURL('blog_detay', $lang, 1) ?>">
                                                <img src="<?= $assetURL ?>images/blog/blog-grid2.jpg" alt="GGB Holding Enerji Yatırımları">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <div class="post-meta style-one">
                                                <span class="date"><a href="<?= $this->BaseURL('blog_detay', $lang, 1) ?>">Aralık 4, 2025</a></span>
                                            </div>
                                            <h4 class="title"><a href="<?= $this->BaseURL('blog_detay', $lang, 1) ?>">Yeşil Enerjiyle Geleceğe Yatırım: GGB Holding’in Vizyonu</a></h4>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="col-xl-4 col-md-6 col-sm-12">
                                    <div class="blog-post-item style-three" data-aos="fade-up" data-aos-duration="1200">
                                        <div class="post-thumbnail">
                                            <a href="<?= $this->BaseURL('blog_detay', $lang, 1) ?>">
                                                <img src="<?= $assetURL ?>images/blog/blog-grid3.jpg" alt="GGB Holding Gayrimenkul">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <div class="post-meta style-one">
                                                <span class="date"><a href="<?= $this->BaseURL('blog_detay', $lang, 1) ?>">Aralık 4, 2025</a></span>
                                            </div>
                                            <h4 class="title"><a href="<?= $this->BaseURL('blog_detay', $lang, 1) ?>">Konfor ve Lüksün Buluşma Noktası: GGB Holding’in Gayrimenkul Projeleri</a></h4>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="col-xl-4 col-md-6 col-sm-12">
                                    <div class="blog-post-item style-three" data-aos="fade-up" data-aos-duration="1200">
                                        <div class="post-thumbnail">
                                            <a href="<?= $this->BaseURL('blog_detay', $lang, 1) ?>">
                                                <img src="<?= $assetURL ?>images/blog/blog-grid4.jpg" alt="GGB Holding Turizm">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <div class="post-meta style-one">
                                                <span class="date"><a href="<?= $this->BaseURL('blog_detay', $lang, 1) ?>">Aralık 4, 2025</a></span>
                                            </div>
                                            <h4 class="title"><a href="<?= $this->BaseURL('blog_detay', $lang, 1) ?>">Türkiye’nin Turizm Potansiyelini Keşfedin: GGB Holding’in Öncülüğü</a></h4>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="col-xl-4 col-md-6 col-sm-12">
                                    <div class="blog-post-item style-three" data-aos="fade-up" data-aos-duration="1200">
                                        <div class="post-thumbnail">
                                            <a href="<?= $this->BaseURL('blog_detay', $lang, 1) ?>">
                                                <img src="<?= $assetURL ?>images/blog/blog-grid5.jpg" alt="GGB Holding Tarım">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <div class="post-meta style-one">
                                                <span class="date"><a href="<?= $this->BaseURL('blog_detay', $lang, 1) ?>">Aralık 4, 2025</a></span>
                                            </div>
                                            <h4 class="title"><a href="<?= $this->BaseURL('blog_detay', $lang, 1) ?>">Sürdürülebilir Tarımın Öncüsü: GGB Holding’in Yenilikçi Yaklaşımı</a></h4>
                                        </div>
                                    </div>
                                </div>
                    
                            </div>
                    
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="sasly-pagination text-center mt-30">
                                        <ul>
                                            <li><a href="#" class="active">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#"><i class="far fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>                    

                </main>
