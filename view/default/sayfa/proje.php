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
$table = "proje";
$sayfa = "proje";
$this->langZorunluSayfa($id, $table, $sayfa, "aktif = 1");
$veri = $this->dbLangSelectRow($table, array("id"=>$id, "master_id"=>$id), "resim");
$getID = $this->getID($veri);
$baslik = $this->temizle($veri["baslik"]);
$boyut = $this->getimageinfo($table);

$resim = $this->dbResimAl($veri["resim"], $sayfa, $boyut);
$this->sayfaBaslik = $this->temizle($veri["baslik"])." - ".$this->ayarlar("title_".$lang);

$proje_kat = $this->dbLangSelectRow('proje_kategori', ['id'=>$veri['kid'], 'master_id'=>$veri['kid']]);

$kosul = ($lang == "tr") ? "id <> $getID" : "master_id <> ".$veri["master_id"];
$kosul.= " and aktif = 1 and baslik <> ''";
$limit = 5;
$diger = $this->dbLangSelect($table, $kosul, "resim", "LIMIT $limit", "ORDER BY tarih DESC, sira ASC");
$toplam = @count($diger);

$this->ogResim = $resim;
$this->ogBaslik = $baslik;
$this->ogUrl = $this->fullUrl;

?>