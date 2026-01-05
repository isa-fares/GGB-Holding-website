<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Page Configuration
$sayfa = "Foto Galeri";  // Page name

// Get gallery data by baslik
$galeri_data = $this->getGaleriByBaslik("Foto Galeri");

// Set page title and meta
if ($galeri_data && isset($galeri_data['galeri']['baslik'])) {
    $baslik = $galeri_data['galeri']['baslik'];
} else {
    $baslik = $this->lang->header("Foto Galeri");
}

$this->setPageMeta(
    "Foto Galeri",
    ($galeri_data && isset($galeri_data['galeri']['baslik'])) ? $galeri_data['galeri']['baslik'] : null,
    ($galeri_data && isset($galeri_data['galeri']['ozet'])) ? $galeri_data['galeri']['ozet'] : null
);

// Initialize photos array if gallery not found
$fotos = ($galeri_data && isset($galeri_data['fotos'])) ? $galeri_data['fotos'] : array();

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
                                    <h1><?= $baslik ?></h1>
                                    <section class="breadcrumb_section">
                                        <div class="row">
                                            <div class="breadcrumb_overlay">
                                                <div class="breadcrumb">
                                                    <a href="<?= $this->BaseURL($this->lang->link('index'), $lang, 1) ?>"><?= $this->lang->header('index') ?> </a>
                                                    <a href="#"><?= $baslik ?> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div>
                                    <?php if ($galeri_data && isset($galeri_data['galeri']['ozet']) && !empty($galeri_data['galeri']['ozet'])): ?>
                                        <p><?= $galeri_data['galeri']['ozet'] ?></p>
                                    <?php else: ?>
                                        <p><strong>2 sektör ve 1.000'e</strong> yakın çalışanımızla üretmeye ve değer yaratmaya devam ediyoruz.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                    
                    <section class="blog-grid-page-ss pb-130" id="blogLister">
                        <div class="container">
                            <div class="row">
                                <?php if (!empty($fotos)): ?>
                                    <?php foreach ($fotos as $foto): ?>
                                        <?php
                                        $resim_thumb = $this->dbResimAl($foto['dosya'], "galeri", "1600,0", true);
                                        $resim_full = $this->dbResimAl($foto['dosya'], "galeri", "1600,0", true);
                                        $foto_baslik = ($lang != "tr" && isset($foto["baslik_$lang"]) && !empty($foto["baslik_$lang"])) ? $foto["baslik_$lang"] : (isset($foto['baslik']) ? $foto['baslik'] : '');
                                        ?>
                                        <div class="col-xl-4 col-md-6 col-sm-12">
                                            <div class="blog-post-item style-three" data-aos="fade-up" data-aos-duration="1200">
                                                <div class="post-thumbnail">
                                                    <a href="<?= $resim_full ?>" data-fancybox="gallery" data-caption="<?= $this->temizle($foto_baslik) ?>">
                                                        <img src="<?= $resim_thumb ?>" alt="<?= $this->temizle($foto_baslik) ?>">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="col-12">
                                        <div class="alert alert-info text-center">
                                            <p><?= $this->lang->genel('urun-foto') ?? 'Henüz fotoğraf eklenmemiş.' ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>

                </main>
