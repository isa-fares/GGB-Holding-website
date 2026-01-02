<?php
/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 * @var $id int
 * @var $katurl string
 */
// ---   Page Settings  ---
$table = "sayfa";
$sayfa = "kurumsal";
$type = Request::GETURL("type", null);
if ($type == "subpage"){
    $table = "alt_sayfa";
}

$this->langZorunluSayfa($id, $table, $sayfa, "aktif = 1 and kid = 1 and baslik <> ''");
$veri = $this->dbLangSelectRow($table,array("id"=>$id, "master_id"=>$id), "resim");
$getID = $this->getID($veri);
$baslik = $this->temizle($veri["baslik"]);
$detay = $this->temizle($veri["detay"]);
$kurumsal = $this->dbLangSelect($table, "aktif = 1 and kid = 1 and baslik <> ''");
$this->sayfaBaslik = $this->temizle($veri["baslik"])." - ".$this->ayarlar("title_".$lang);
$boyut = $this->getimageinfo("sayfa", "", "big");
$ek_boyut = $this->getimageinfo("sayfa", "", "ek");
$resim = $this->dbResimAl($veri["resim"],"sayfa", $boyut);
$sidebar = $this->dbLangSelect("sayfa", "aktif = 1  and baslik <> '' and kid = 1");
//$resimler = $this->sorgu("SELECT *, baslik as baslik_tr FROM dosyalar WHERE type = 'sayfa' and tur = 'resim' and aktif = 1 and data_id = $getID and sil <> 1 ORDER BY sira ASC");
$baslik_2 = $this->temizle($veri["baslik_2"]);

$belgeler = $this->sorgu("SELECT * FROM dosyalar WHERE type = 'sayfa' AND tur = 'resim' AND aktif = 1 AND data_id = '9' ORDER BY sira ASC");

if (empty($type)){
    $alt_sayfalar = $this->dbLangSelect('alt_sayfa', 'aktif = 1 and kid = '.$id);
}

if (!empty($resim)){
    $this->ogResim = $resim;
}

$this->ogBaslik = $this->sayfaBaslik;
$this->ogUrl = $this->fullUrl;

?>

