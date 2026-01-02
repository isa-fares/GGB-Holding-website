<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Page Configuration
$sayfa = "Foto Galeri";  // Page name
$baslik = $this->lang->header("Foto Galeri"); // Page title from translation file
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
                                    <h1>Foto Galeri</h1>
                                    <section class="breadcrumb_section">
                                        <div class="row">
                                            <div class="breadcrumb_overlay">
                                                <div class="breadcrumb">
                                                    <a href="/">Anasayfa </a>
                                                    <a href="/">Foto Galeri </a>
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
                                            <a href="<?= $assetURL ?>images/gallery/1.jpeg" data-fancybox="gallery">
                                                <img src="<?= $assetURL ?>images/gallery/1.jpeg" >
                                            </a>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="col-xl-4 col-md-6 col-sm-12">
                                    <div class="blog-post-item style-three" data-aos="fade-up" data-aos-duration="1200">
                                        <div class="post-thumbnail">
                                            <a href="<?= $assetURL ?>images/gallery/2.jpeg" data-fancybox="gallery">
                                                <img src="<?= $assetURL ?>images/gallery/2.jpeg" >
                                            </a>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="col-xl-4 col-md-6 col-sm-12">
                                    <div class="blog-post-item style-three" data-aos="fade-up" data-aos-duration="1200">
                                        <div class="post-thumbnail">
                                            <a href="<?= $assetURL ?>images/gallery/3.jpeg" data-fancybox="gallery">
                                                <img src="<?= $assetURL ?>images/gallery/3.jpeg" >
                                            </a>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="col-xl-4 col-md-6 col-sm-12">
                                    <div class="blog-post-item style-three" data-aos="fade-up" data-aos-duration="1200">
                                        <div class="post-thumbnail">
                                            <a href="<?= $assetURL ?>images/gallery/4.jpeg" data-fancybox="gallery">
                                                <img src="<?= $assetURL ?>images/gallery/4.jpeg" >
                                            </a>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="col-xl-4 col-md-6 col-sm-12">
                                    <div class="blog-post-item style-three" data-aos="fade-up" data-aos-duration="1200">
                                        <div class="post-thumbnail">
                                            <a href="<?= $assetURL ?>images/gallery/5.jpeg" data-fancybox="gallery">
                                                <img src="<?= $assetURL ?>images/gallery/5.jpeg" >
                                            </a>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="col-xl-4 col-md-6 col-sm-12">
                                    <div class="blog-post-item style-three" data-aos="fade-up" data-aos-duration="1200">
                                        <div class="post-thumbnail">
                                            <a href="<?= $assetURL ?>images/gallery/6.jpeg" data-fancybox="gallery">
                                                <img src="<?= $assetURL ?>images/gallery/6.jpeg" >
                                            </a>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="col-xl-4 col-md-6 col-sm-12">
                                    <div class="blog-post-item style-three" data-aos="fade-up" data-aos-duration="1200">
                                        <div class="post-thumbnail">
                                            <a href="<?= $assetURL ?>images/gallery/7.jpeg" data-fancybox="gallery">
                                                <img src="<?= $assetURL ?>images/gallery/7.jpeg" >
                                            </a>
                                        </div>
                                    </div>
                                </div>
                    
                            </div>
                        </div>
                    </section>

                </main>
