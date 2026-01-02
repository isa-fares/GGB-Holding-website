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
$sayfa = "projeler";
$title = $sayfa;
$baslik = $this->lang->genel($title);
$this->sayfaBaslik = $baslik." - ".$this->ayarlar("title_".$lang);

$table = 'proje';

$kosul = " baslik <> '' and aktif = 1 ";

$kid = intval(Request::GETURL("kid", null));
$q = $this->kirlet($this->koru(htmlentities(Request::GETURL("q", null))));
if(!empty($kid)){
    $kat = $this->dbLangSelectRow('proje_kategori', ['id'=>$kid, 'master_id'=>$kid]);
}

if (!empty($q)) $kosul.=" and (baslik LIKE '%".$q."%' or detay LIKE '%".$q."%' )";
if (!empty($kid)) $kosul.=" and kid = ".$kid;


$toplam  = $this->dbLangSelect($table, $kosul);
list($gecerli, $sayfaLimit, $toplamSayfa, $sayfa) = $this->sayfalama($toplam);
$data  = $this->dbLangSelect($table, $kosul, "resim", "LIMIT $gecerli, $sayfaLimit", "ORDER BY tarih DESC");
?>






