<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */

// Page Configuration
$sayfa = "Sosyal Sorumluluk Politikasi";  // Page name
$baslik = $this->lang->header("Sosyal Sorumluluk Politikasi"); // Page title from translation file
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
                                <h1>Sosyal Sorumluluk Politikası</h1>
                                <section class="breadcrumb_section">
                                    <div class="row">
                                        <div class="breadcrumb_overlay">
                                            <div class="breadcrumb">
                                                <a href="/">Anasayfa </a>
                                                <a href="/">Sosyal Sorumluluk Politikası </a>
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
                                                <a href="<?= $this->BaseURL('sosyal_sorumluluk_politikasi', $lang, 1) ?>" class="active">Sosyal
                                                    Sorumluluk Politikası</a>
                                            </li>
                                            <li>
                                                <a href="<?= $this->BaseURL('cevre_politikasi', $lang, 1) ?>">Çevre Politikası</a>
                                            </li>
                                            <li>
                                                <a href="<?= $this->BaseURL('yolsuzluk_politikasi', $lang, 1) ?>">Yolsuzluk ve Rüşvet Politikası</a>
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
                                    <p>GGB Holding San. ve Tic. LTD. ŞTİ. olarak sunduğumuz tüm hizmetlerde insan
                                        odaklı bir yaklaşımı benimsemekte olup toplumsal sorumluluk bilinciyle hareket
                                        etmeyi taahhüt etmekteyiz. Bu politika ile sosyal sorumluluk anlayışımızı tüm
                                        faaliyetlerimize entegre ederek çevresel, sosyal ve ekonomik sürdürülebilirliğe
                                        katkı sağlamayı amaçlıyoruz. Sosyal sorumluluk bilincini yalnızca bir kurumsal
                                        yükümlülük değil, aynı zamanda yönetim anlayışımızın temel unsurlarından biri
                                        olarak kabul etmekte ve şirket kültürünün ayrılmaz bir parçası haline getirmeyi
                                        hedeflemekteyiz.</p>

                                    <h3>Kapsam</h3>
                                    <p>Bu sosyal sorumluluk politikası;</p>
                                    <ul>
                                        <li>Mevcut polyester iplik üretim tesisimizi ve gelecekteki yatırımlarımızı,
                                        </li>
                                        <li>GGB Holding’ın tüm çalışanlarını,</li>
                                        <li>Tedarikçiler, yükleniciler, taşeronlar ve diğer kuruluşlarla yapılan
                                            sözleşmelerde yer alan personel de dahil olmak üzere GGB Holding’ın tüm
                                            paydaşlarını kapsamaktadır.</li>
                                    </ul>

                                    <h3>Politika ve Taahhütlerimiz</h3>
                                    <p><strong>Faaliyet gösterdiğimiz tüm alanlarda;</strong></p>

                                    <h4>Çocuk İşçi Çalıştırmama</h4>
                                    <p>Şirketimiz kanun ve yönetmeliklerin belirlediği asgari yaş sınırını baz almış
                                        olup çocuk işçi çalıştırılmamaktadır. Çocukların sağlıklı bir şekilde
                                        gelişimlerini sürdürebilmeleri ve eğitim haklarına saygı duymak temel
                                        ilkelerimizdendir.</p>

                                    <h4>Örgütlenme Özgürlüğü ve Toplu Sözleşme Hakkına Saygı Gösterilmesi</h4>
                                    <p>Çalışanlarımızın sendikaya üye olma, temsilcileriyle iletişime geçme ve toplu
                                        sözleşme hakkına saygı duyar, demokratik haklarını özgürce kullanmalarını
                                        destekleriz.</p>

                                    <h4>Zorla ve Zorunlu Çalıştırma</h4>
                                    <p>Tüm iş ilişkilerimiz gönüllülük esasına dayalıdır. Hiçbir çalışanımız zorla
                                        çalıştırılmaz, iş sözleşmeleri özgür iradeyle yapılır.</p>

                                    <h4>Taciz ve Kötü Davranışın Önlenmesi</h4>
                                    <p>Çalışma ortamlarımızda her türlü sözlü, fiziksel veya psikolojik şiddet, taciz ve
                                        kötü davranışa sıfır tolerans politikası uygulanmaktadır. Huzurlu ve güvenli bir
                                        çalışma ortamı sağlamak temel sorumluluğumuzdur.</p>

                                    <h4>Çalışma Saatleri ve Ücretler</h4>
                                    <p>Çalışanlarımızın çalışma saatleri yürürlükteki kanun ve hükümlere göre uygulanır,
                                        fazla mesai çalışması zorlama olmadan gönüllülük esasına göre yapılır. Çalışma
                                        saatleri, fazla mesailer ve tüm ödemeler yürürlükteki yasal düzenlemelere uygun
                                        şekilde gerçekleştirilir. Ücretlendirme adil, zamanında ve şeffaf biçimde
                                        yapılır.</p>

                                    <h4>Ayrımcılık</h4>
                                    <p>Irk, din, dil, cinsiyet, yaş, engellilik durumu, politik düşünce ve benzeri
                                        hiçbir ayrım gözetmeksizin tüm çalışanlarımıza eşit fırsatlar sağlanır.</p>

                                    <h4>Dinlenme Günleri ve Tatiller</h4>
                                    <p>Çalışanlarımız yasal düzenlemelere uygun şekilde dinlenme süreleri ve tatil
                                        haklarından faydalandırılır.</p>

                                    <h4>İş Sağlığı ve Güvenliği</h4>
                                    <p>Çalışan sağlığını öncelik alan yönetim anlayışımız daha güvenli ve sağlıklı bir
                                        çalışma ortamı oluşturmayı ve meydana gelebilecek her türlü kaybı en aza
                                        indirmeyi hedefler. ISO 45001 İş Sağlığı ve Güvenliği Yönetim Sistemi
                                        standardını baz alarak iş sağlığı ve güvenliği açısından çalışanlara gerekli
                                        donanımları edindirmek için eğitimler verir, çalışma ortamı içerisinde alınan
                                        güvenlik önlemlerinin yanı sıra kişisel koruyucu donanımlar ile bunu destekler.
                                    </p>

                                    <h4>Çevrenin Korunması</h4>
                                    <p>Şirketimiz her türlü faaliyetlerinden doğabilecek çevresel etkileri değerlendirir
                                        ve bu etkileri en aza indirmeyi hedefler. Doğanın korunmasını ve çevre
                                        kirliliğini önlemeyi temel alır ve çalışanlarımızı da bu konuda gerekli
                                        eğitimlerle bilgilendiririz.</p>

                                    <h4>Eğitim</h4>
                                    <p>Çalışanlarımızın beceri ve yetkinlikleri, eğitim seviyeleri şirketimizin genel
                                        seviyesini belirler. Bu sebeple mesleki ve kişisel gelişimlerine katkı sağlama,
                                        iş sağlığı ve güvenliği, çevrenin korunması bilincini arttırmak için şirket içi
                                        ve şirket dışı eğitimler düzenlemeyi hedefleriz.</p>

                                    <h4>Yasal Uyum</h4>
                                    <p>Tüm yerel ve ulusal yasal düzenlemelere eksiksiz uyum sağlarız. Ürün ve
                                        hizmetlerimizin yasa dışı kullanımını önleyecek gerekli önlemleri alırız.</p>

                                    <h4>Etik İş Uygulamaları</h4>
                                    <p>Tüm ticari faaliyetlerimizde şeffaflık, dürüstlük ve adalet ilkelerine bağlı
                                        kalırız. Rüşvet, yolsuzluk ve çıkar çatışmalarına karşı sıfır tolerans
                                        politikası uygularız.</p>

                                    <h4>Tedarik Zincirinde Sorumluluk</h4>
                                    <p>Ürün ve hizmet tedarik ettiğimiz tüm iş ortaklarımızın da insan hakları, çevre
                                        koruma ve iş etiği ilkelerine uygun hareket etmesini bekleriz. Sorumlu tedarik
                                        anlayışıyla çalışırız.</p>

                                    <h4>Şikayetlerin Değerlendirilmesi ve Geri Bildirim Mekanizması</h4>
                                    <p>Çalışanlarımızın ve paydaşlarımızın her türlü şikâyet, öneri ve geri
                                        bildirimlerini açık bir şekilde iletebilecekleri sistemler oluştururuz. Bu geri
                                        bildirimler doğrultusunda iyileştirmeler yaparız.</p>

                                    <p><strong>GGB Holding</strong>, sosyal sorumluluk anlayışıyla hareket ederek
                                        çevreye, topluma ve ekonomiye duyarlı bir firma olmayı taahhüt eder. Toplumsal
                                        sorumluluk bilincini geliştirmek, çevresel etkileri minimize etmek ve adil,
                                        şeffaf ticaret anlayışını desteklemek bizim için en önemli önceliklerdendir.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
