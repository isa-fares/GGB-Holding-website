<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Page Configuration
$sayfa = "Video Galeri";  // Page name
$baslik = $this->lang->header("Video Galeri"); // Page title from translation file

// Get all active videos (or videos from specific seri if needed)
$videos = $this->getVideos(null); // null = get all active videos

// Set page meta
$this->setPageMeta(
    "Video Galeri",
    $baslik,
    null  // No custom description
);

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
                            <p><?= $this->lang->genel('company_stats_description') ?></p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="blog-grid-page-ss pb-130" id="blogLister">
                <div class="container">
                    <div class="row">
                        <?php if (!empty($videos) && is_array($videos)): ?>
                            <?php foreach ($videos as $video): ?>
                                <?php
                                $video_baslik = $this->temizle($video['baslik']);
                                $video_adres = $this->temizle($video['adres']);
                                $video_embed = isset($video['embed']) ? $this->temizle($video['embed'], true) : '';
                                $video_resim = $this->dbResimAl($video['resim'], "video", "600,350", true);
                                
                                // Check if embed code exists, otherwise convert adres to iframe
                                $has_embed = !empty($video_embed);
                                
                                // If no embed, try to convert adres to iframe (for YouTube, Vimeo, etc.)
                                if (!$has_embed && !empty($video_adres)) {
                                    $video_adres = $this->convertVideoUrlToEmbed($video_adres);
                                }
                                ?>
                                <div class="col-md-12 col-lg-9" style="padding-bottom: 30px; margin: 0 auto;">
                                    <div class="single-services-content-box">
                                        <div class="video-title-box">
                                            <h5><?= $video_baslik ?></h5>
                                        </div>
                                        <div class="video-container">
                                            <?php if ($has_embed): ?>
                                                <!-- Use embed code directly -->
                                                <div class="video-embed-wrapper">
                                                    <?= $video_embed ?>
                                                </div>
                                            <?php elseif (!empty($video_adres)): ?>
                                                <!-- Use iframe from converted URL -->
                                                <div class="video-embed-wrapper">
                                                    <iframe src="<?= $video_adres ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </div>
                                            <?php else: ?>
                                                <!-- Fallback: show image with play button (opens in lightbox) -->
                                                <div class="video-presentation" style="background-image: url(<?= $video_resim ?>);">
                                                    <div class="overlay"></div>
                                                    <div class="presentation-box">
                                                        <a href="<?= $video_adres ?>" class="pulse" data-lity="">
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

        </main>