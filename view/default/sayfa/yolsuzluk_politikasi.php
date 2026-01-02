<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Page Configuration
$sayfa = "Yolsuzluk Politikasi";  // Page name
$baslik = $this->lang->header("Yolsuzluk Politikasi"); // Page title from translation file
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
                                <h1>Yolsuzluk ve Rüşvet Politikası</h1>
                                <section class="breadcrumb_section">
                                    <div class="row">
                                        <div class="breadcrumb_overlay">
                                            <div class="breadcrumb">
                                                <a href="/">Anasayfa </a>
                                                <a href="/">Yolsuzluk ve Rüşvet Politikası </a>
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
                <section style="padding-bottom: 80px;">
                    <div class="container">
                        <div class="row corporate_page">
                            <div class="col-lg-4 sidemenu119">
                                <div class="lister_sidebar">
                                    <div class="sub_menu wbx_1">
                                        <div class="CategorySubjects">
                                            <i></i>
                                            Kurumsal
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="<?= $this->BaseURL('sosyal_sorumluluk_politikasi', $lang, 1) ?>">Sosyal
                                                    Sorumluluk Politikası</a>
                                            </li>
                                            <li>
                                                <a href="<?= $this->BaseURL('cevre_politikasi', $lang, 1) ?>">Çevre Politikası</a>
                                            </li>
                                            <li>
                                                <a class="active" href="<?= $this->BaseURL('yolsuzluk_politikasi', $lang, 1) ?>">Yolsuzluk ve Rüşvet
                                                    Politikası</a>
                                            </li>
                                            <li>
                                                <a href="<?= $this->BaseURL('kalite_politikasi', $lang, 1) ?>">Kalite Politikası</a>
                                            </li>
                                            <li>
                                                <a href="<?= $this->BaseURL('isg_politikasi', $lang, 1) ?>">İSG Politikası</a>
                                            </li>

                                            <li>
                                                <a href="<?= $this->BaseURL('enerji_politikasi', $lang, 1) ?>">Enerji Politikası</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--
                                        <div class="widget_box wbx_1 bigNews">
                                            <a href="#">
                                                <img src="<?= $assetURL ?>img/slide4.jpg" alt="">
                                            </a>
                                            <a class="no_btn789" href="#"><strong>Yalıtımlı Sürme Profiller</strong></a>
                                            <p>Modern yapılarda enerji verimliliği ve konfor için özel olarak tasarlanmış
                                                yalıtımlı sürme profillerimiz, ısı ve ses yalıtımında üstün performans sunar.
                                                Özel tasarımı ve kaliteli malzemeleriyle uzun ömürlü kullanım sağlar.</p>
                                            <a href="#" class="donate_link789">Ürünü İnceleyin</a>
                                        </div>-->
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="corporate content-detail">
                                    <h3>Amaç</h3>
                                    <p>Bu politika, GGB Holding bünyesinde her türlü yolsuzluk, rüşvet, çıkar
                                        çatışması ve etik dışı davranışlara karşı sıfır tolerans politikası
                                        uygulanmasını sağlamak amacıyla oluşturulmuştur.</p>

                                    <h3>Kapsam</h3>
                                    <p>Bu politika;</p>
                                    <ul>
                                        <li>GGB Holding tüm çalışanlarını,</li>
                                        <li>Tedarikçiler, yükleniciler, taşeronlar ve diğer kuruluşlarla yapılan
                                            sözleşmelerde yer alan personel de dahil olmak üzere GGB Holding’ın tüm
                                            paydaşlarını kapsamaktadır.</li>
                                    </ul>

                                    <p>Rüşvet ve Yolsuzlukla Mücadele Politikasının uygulanması ve güncellenmesi üst
                                        yönetimin yetki, görev ve sorumluluğundadır.</p>

                                    <p><strong>Yolsuzluk:</strong> Bir kişi veya yetkili bir pozisyona emanet edilen bir
                                        kuruluş tarafından yasadışı çıkarlar elde etmek veya kendi çıkarı için gücü
                                        kötüye kullanmak amacıyla gerçekleştirilen bir sahtekârlık biçimi veya suçtur.
                                    </p>

                                    <p><strong>Rüşvet:</strong> Bir kişinin, görevinin ifası ile ilgili bir işi yapması,
                                        yaptırması, yapmaması, hızlandırması, yavaşlatması amacıyla doğrudan veya
                                        aracılar vasıtasıyla menfaat temini, teklif veya vaat edilmesi; talep veya kabul
                                        edilmesi, bunlara aracılık edilmesi gibi yollarla görevinin gereklerine aykırı
                                        davranması için bir başka kişiyle vardığı anlaşma çerçevesinde çıkar
                                        sağlamasıdır.</p>

                                    <p>Rüşvet ve yolsuzluk pek çok farklı şekilde gerçekleştirilebilir. Bunlar;</p>
                                    <ul>
                                        <li>Nakit ya da maddi menfaat temini</li>
                                        <li>Değerli hediye, ağırlama veya seyahat teklifleri</li>
                                        <li>Komisyon ödemeleri veya danışmanlık adı altında yapılan örtülü ödemeler</li>
                                        <li>Gerçek olmayan kayıtlar, sahte belgeler, tahrifat</li>
                                        <li>Görev yetkisinin kötüye kullanılması</li>
                                        <li>Siyasi katkılar, bağışlar, kolaylaştırıcı ödemeler</li>
                                    </ul>

                                    <h3>Rüşvet Ve Yolsuzluk Eylemleri İçin Başlıca Risk Alanları</h3>
                                    <p>Şirket ilgili yasa, düzenlemelere ve ilkelere daima tam uyumu hedefler ve amacı
                                        ne olursa olsun hiçbir rüşvet ve yolsuzluk eylemine tolerans göstermez. Rüşvet
                                        ile şirketten hizmet almak isteyen ve hizmet talep eden üçüncü taraflarla iş
                                        ilişkisinin devam ettirilmemesi esastır. Rüşvet ve yolsuzluk eylemlerinin
                                        gerçekleşebileceği başlıca risk alanları aşağıda detaylı olarak
                                        tanımlanmaktadır:</p>

                                    <h4>Hediye</h4>
                                    <p>Hediye; iş ilişkisinde bulunan kişiler ya da müşteriler arasında maddi çıkar
                                        sağlama amacı gütmeden teşekkür veya ticari nezaket icabı verilen üründür.
                                        Şirketçe üçüncü şahıslara verilen her türlü hediye açıkça ve iyi niyet
                                        çerçevesinde verilmektedir. Karşı taraflardan kabul edilen hediyeler için de
                                        aynı şartlar geçerlidir.</p>

                                    <h4>Ağırlama</h4>
                                    <p>Ticari iletişim ağı kurma ve ticari ilişkilerin geliştirilmesi kapsamında
                                        müşteriler, tedarikçiler, taşeronlar, danışmanlar, denetçiler ve ticari ilişki
                                        içinde bulunulan firmalara ağırlama teklif edilebilir. Şirket, üçüncü şahıslara
                                        sunduğu ağırlamayı iyi niyet çerçevesinde, açıkça ve koşulsuzca teklif
                                        etmektedir.</p>
                                    <p>Bu politikada belirtilen hususlara uyumlu olsa dahi, çıkar çatışmasına yol
                                        açabilecek veya bu şekilde algılanabilecek durumlara sebebiyet verebilecek
                                        ağırlama teklifleri ve hediyeler sunulmamakta veya kabul edilmemektedir.</p>

                                    <h4>Bağış</h4>
                                    <p>Şirket faaliyetlerinin devamı ile ilgili veya şirket yararına olabilecek hizmet
                                        alımı ve verimi aşamasında herhangi bir kararın etkilenmesi için hiçbir özel
                                        şirket, devlet yetkilisine veya siyasi parti adayına kurumsal ya da kişisel bir
                                        ödeme yapılmaması, hediye verilmemesi, yardım veya bağışta bulunulmaması
                                        esastır.</p>

                                    <h4>Kolaylaştırma Ödemeleri</h4>
                                    <p>Bu politikanın kapsamında yer alan kişi ve kuruluşların, devlet kurumları ile
                                        rutin bir işlemi ya da süreci (izin ve ruhsat almak, belge temin etmek vb.)
                                        güvenceye almak veya hızlandırmak için kolaylaştırma ödemeleri teklif edilmez.
                                    </p>

                                    <h4>Kayıtların Tutulması</h4>
                                    <p>Şirketin muhasebe ve kayıt sistemi ile ilgili uymak zorunda olduğu hususlar yasal
                                        düzenlemeler, etik kurallar ve çalışma ilkeleri ile düzenlenmiş olup; üçüncü
                                        şahıslarla ilişkilere ait her türlü hesap, fatura ve belgenin eksiksiz, kesin ve
                                        güvenilir şekilde kayda geçirilmesi ve muhafaza edilmesi gerekmektedir. Herhangi
                                        bir işleme ilişkin muhasebe ya da benzer ticari kayıtlar üzerinde tahrifat
                                        yapılmamalı ve gerçekler saptırılmamalıdır.</p>

                                    <h3>Politika İhlalleri Ve Yaptırımlar</h3>
                                    <p>Yolsuzluk ve rüşvet politikası tüm GGB Holding çalışanlarına duyurulmuş ve
                                        herkesin kolay erişebileceği bir klasöre eklenmiştir. Bir çalışan ya da Kristal
                                        Mensucat adına hareket eden bir kişinin bu politikaya aykırı davranış
                                        sergilediği yönünde görüş ya da şüphe var ise üst yönetime bilgilendirme
                                        yapılmalıdır.</p>
                                    <p>Yolsuzluk veya rüşvet olayını iyi niyet çerçevesinde şeffaf bir şekilde bildiren
                                        kişiye durumu rapor ettiği için herhangi bir kötü muamelede bulunulmasına izin
                                        verilmez.</p>

                                    <p><strong>GGB Holding</strong> olarak faaliyetlerimizin her aşamasında etik
                                        değerlere bağlı kalacağımızı, rüşvet ve yolsuzlukla mücadeleyi sadece bir yasal
                                        zorunluluk değil, aynı zamanda kurumsal kültürümüzün temel bir unsuru olarak
                                        gördüğümüzü taahhüt ederiz. Tüm çalışanlarımız, iş ortaklarımız ve
                                        paydaşlarımızın da bu politikaya uymalarını bekleriz.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
