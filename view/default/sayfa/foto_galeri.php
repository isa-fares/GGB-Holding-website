<?php

/**
 * Photo Gallery Page - Clean Code Version
 * 
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// ============================================
// PAGE CONFIGURATION
// ============================================
$sayfa = "Foto Galeri";

// ============================================
// DATA PREPARATION
// ============================================

// Get gallery data by baslik
$galeri_data = $this->getGaleriByBaslik("Foto Galeri");

// Set page title and meta
if ($galeri_data && isset($galeri_data['galeri']['baslik'])) {
    $baslik = $galeri_data['galeri']['baslik'];
} else {
    $baslik = $this->lang->header("Foto Galeri");
}

// Initialize photos array if gallery not found
$fotos = ($galeri_data && isset($galeri_data['fotos'])) ? $galeri_data['fotos'] : array();

// ============================================
// PAGE META DATA
// ============================================
$this->setPageMeta(
    "Foto Galeri",
    ($galeri_data && isset($galeri_data['galeri']['baslik'])) ? $galeri_data['galeri']['baslik'] : null,
    ($galeri_data && isset($galeri_data['galeri']['ozet'])) ? $galeri_data['galeri']['ozet'] : null
);

// ============================================
// URL CONSTANTS
// ============================================
$urls = [
    'index' => $this->BaseURL($this->lang->link('index'), $lang, 1),
];

?>
<div id="">
    <div id="">
        <main>
            <!-- ============================================
                 PAGE HEADER SECTION
                 ============================================ -->
            <section class="page_header177">
                <div class="container">
                    <div class="col-12">
                        <div>
                            <h1><?= $baslik ?></h1>
                            <section class="breadcrumb_section">
                                <div class="row">
                                    <div class="breadcrumb_overlay">
                                        <div class="breadcrumb">
                                            <a href="<?= $urls['index'] ?>">
                                                <?= $this->lang->header('index') ?>
                                            </a>
                                            <a href="#"><?= $baslik ?></a>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div>
                            <?php if ($galeri_data && isset($galeri_data['galeri']['ozet']) && !empty($galeri_data['galeri']['ozet'])): ?>
                                <p><?= $galeri_data['galeri']['ozet'] ?></p>
                            <?php else: ?>
                                <p><?= $this->ozetKisaca() ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- ============================================
                 GALLERY GRID SECTION
                 ============================================ -->
            <section class="blog-grid-page-ss pb-130" id="blogLister">
                <div class="container">
                    <div class="row">
                        <?php if (!empty($fotos)): ?>
                            <?php foreach ($fotos as $foto): 
                                // Prepare photo data
                                $photo_thumb = $this->dbResimAl($foto['dosya'], "galeri", "1600,0", true);
                                $photo_full = $this->dbResimAl($foto['dosya'], "galeri", "1600,0", true);
                                $photo_title = ($lang != "tr" && isset($foto["baslik_$lang"]) && !empty($foto["baslik_$lang"])) 
                                    ? $foto["baslik_$lang"] 
                                    : (isset($foto['baslik']) ? $foto['baslik'] : '');
                                $photo_title_clean = $this->temizle($photo_title);
                                ?>
                                <div class="col-xl-4 col-md-6 col-sm-12">
                                    <div class="blog-post-item style-three" data-aos="fade-up" data-aos-duration="1200">
                                        <div class="post-thumbnail">
                                            <a href="<?= $photo_full ?>" 
                                               data-fancybox="gallery" 
                                               data-caption="<?= $photo_title_clean ?>">
                                                <img src="<?= $photo_thumb ?>" alt="<?= $photo_title_clean ?>">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-12">
                                <div class="alert alert-info text-center">
                                    <p><?= $this->lang->genel('no_photos_message') ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>
