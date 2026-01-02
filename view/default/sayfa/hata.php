<?php
/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */
// Page / SEO
$sayfa  = "Hata";
$baslik = "404 - Sayfa Bulunamadı";
$this->sayfaBaslik = $baslik." - ".$this->ayarlar("title_".$lang);
$this->ogBaslik    = $this->sayfaBaslik;
$this->ogUrl       = $this->fullUrl;
?>

<div class="error-404-wrapper">
	<div class="error-404-inner">
		<div class="error-404-image-wrapper">
			<img src="<?=$assetURL?>404.png" alt="404" class="error-404-image">
		</div>
		<p class="error-404-text">Aradığınız sayfa bulunamadı.</p>

		<div class="error-404-buttons">
			<a href="<?=$this->baseURL('index', $lang, 1)?>" class="error-404-btn primary">Anasayfa</a>
			<a href="javascript:history.back(-1)" class="error-404-btn secondary">Geri Dön</a>
		</div>
	</div>
</div>

<style>
.error-404-wrapper {
	min-height: calc(100vh - 200px);
	display: flex;
	align-items: center;
	justify-content: center;
	text-align: center;
	background-color: #ffffff;
}

.error-404-inner {
	padding: 20px;
}

.error-404-image-wrapper {
	margin-bottom: 15px;
}

.error-404-image {
	max-width: 60%;
	width: 100%;
	height: auto;
}

.error-404-text {
	font-size: 40px;
	margin: 0 0 25px;
	color: #555;
}

.error-404-buttons {
	display: inline-flex;
	gap: 12px;
	flex-wrap: wrap;
	justify-content: center;
}

.error-404-btn {
	display: inline-block;
	padding: 10px 22px;
	border-radius: 4px;
	font-size: 30px;
	font-weight: 600;
	text-decoration: none;
	border: 1px solid transparent;
}

.error-404-btn.primary {
	background-color: #007bff;
	border-color: #007bff;
	color: #fff;
}

.error-404-btn.secondary {
	background-color: #ffffff;
	border-color: #007bff;
	color: #007bff;
}

.error-404-btn.primary:hover {
	background-color: #0056b3;
	border-color: #0056b3;
	color: #fff;
}

.error-404-btn.secondary:hover {
	background-color: #007bff;
	color: #fff;
}

@media (max-width: 575px) {
	.error-404-code {
		font-size: 80px;
	}

	.error-404-text {
		font-size: 18px;
	}
}
</style>