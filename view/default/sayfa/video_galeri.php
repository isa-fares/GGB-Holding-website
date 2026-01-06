<?php

/**
 * Video Gallery Page - Clean Code Version
 * 
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// ============================================
// PAGE CONFIGURATION
// ============================================
$sayfa = "Video Galeri";
$baslik = $this->lang->header("Video Galeri");

// ============================================
// DATA PREPARATION
// ============================================

// Get all active videos
$videos = $this->getVideos(null); // null = get all active videos

// ============================================
// PAGE META DATA
// ============================================
$this->setPageMeta(
    "Video Galeri",
    $baslik,
    null
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
        <div class="line_wrap">
            <div class="line_item_one"></div>
            <div class="line_item"></div>
            <div class="line_item"></div>
            <div class="line_item"></div>
            <div class="line_item"></div>
        </div>

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
                            <p><?= $this->ozetKisaca() ?></p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ============================================
                 VIDEO GALLERY SECTION
                 ============================================ -->
            <section class="blog-grid-page-ss pb-130" id="blogLister">
                <div class="container">
                    <div class="row">
                        <?php if (!empty($videos) && is_array($videos)): ?>
                            <?php foreach ($videos as $video): 
                                // Prepare video data
                                $video_title = $this->temizle($video['baslik']);
                                $video_address = $this->temizle($video['adres']);
                                $video_embed = isset($video['embed']) ? $this->temizle($video['embed'], true) : '';
                                $video_image = $this->dbResimAl($video['resim'], "video", "600,350", true);
                                
                                // Check if embed code exists
                                $has_embed = !empty($video_embed);
                                
                                // If no embed, try to convert adres to iframe
                                if (!$has_embed && !empty($video_address)) {
                                    $video_address = $this->convertVideoUrlToEmbed($video_address);
                                }
                                ?>
                                <div class="col-md-12 col-lg-9" style="padding-bottom: 30px; margin: 0 auto;">
                                    <div class="single-services-content-box">
                                        <div class="video-title-box">
                                            <h5><?= $video_title ?></h5>
                                        </div>
                                        <div class="video-container">
                                            <?php if ($has_embed): ?>
                                                <!-- Use embed code directly -->
                                                <div class="video-embed-wrapper">
                                                    <?= $video_embed ?>
                                                </div>
                                            <?php elseif (!empty($video_address)): ?>
                                                <!-- Use iframe from converted URL -->
                                                <div class="video-embed-wrapper">
                                                    <iframe src="<?= $video_address ?>" 
                                                            frameborder="0" 
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                                            allowfullscreen>
                                                    </iframe>
                                                </div>
                                            <?php else: ?>
                                                <!-- Fallback: show image with play button -->
                                                <div class="video-presentation" style="background-image: url(<?= $video_image ?>);">
                                                    <div class="overlay"></div>
                                                    <div class="presentation-box">
                                                        <a href="<?= $video_address ?>" class="pulse" data-lity="">
                                                            <i class="fas fa-play"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-12">
                                <div class="alert alert-info text-center">
                                    <p><?= $this->lang->genel('no_videos_message') ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>

<style>
.video-container {
    background: #000;
    border-radius: 8px;
    overflow: hidden;
    position: relative;
}

.video-embed-wrapper {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 aspect ratio */
    height: 0;
    overflow: hidden;
}

.video-embed-wrapper iframe,
.video-embed-wrapper embed,
.video-embed-wrapper object {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
}

.video-presentation {
    height: 350px !important;
    background-size: cover;
    background-position: center;
    position: relative;
    border-radius: 8px;
    overflow: hidden;
}

.video-presentation .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3);
}

.presentation-box {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
}

.presentation-box .pulse {
    display: inline-block;
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 50%;
    text-align: center;
    line-height: 80px;
    color: #d10613;
    font-size: 30px;
    transition: all 0.3s ease;
}

.presentation-box .pulse:hover {
    background: #d10613;
    color: #fff;
    transform: scale(1.1);
}

.video-title-box {
    padding: 15px 10px;
    text-align: left;
    background: #fff;
    border-top: 1px solid #f1f1f1;
}

.video-title-box h5 {
    margin: 0;
    font-size: 20px;
    font-weight: 600;
    color: #333;
    line-height: 1.4;
}

.single-services-content-box:hover .video-title-box h5 {
    color: #d10613;
}
</style>
