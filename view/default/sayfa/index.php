<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */?>
<?php
$slayt = $this->slayt();
$rakamlar = $this->dbLangSelect("rakam", "aktif = 1", "resim");
$haberler  = $this->dbLangSelect("haber", "aktif = 1  and baslik <> ''", "resim", "LIMIT 20");
$duyurular  = $this->dbLangSelect("duyuru", "aktif = 1  and baslik <> ''", "resim", "LIMIT 20");
?>