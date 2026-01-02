<?php /**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */ ?>
<?php
$kurumsal  = $this->dbLangSelect("sayfa","aktif = 1 and baslik <> '' and kid = 1");
$mevzuat  = $this->dbLangSelect("sayfa","aktif = 1 and baslik <> '' and kid = 2");
$ahilik  = $this->dbLangSelect("sayfa","aktif = 1 and baslik <> '' and kid = 3");
$kurumsal_kimlik = $this->dbLangSelectRow('sayfa', ['id'=>2, 'master_id'=>22]);
?>

<!-- START_FOOTER -->
            <footer class="footer35">
                <div class="footer_pattern" style="background-size: cover; background-repeat: no-repeat;"></div>
                <div class="container" style="background-size: cover; background-repeat: no-repeat;">
                    <div class="footer_inner" style="background-size: cover; background-repeat: no-repeat;">
                        <div class="ft_left" style="background-size: cover; background-repeat: no-repeat;">
                            <div><img src="<?= $assetURL ?>images/header_logo.png" alt=""></div>
                            <p>2. Organize Sanayi Bölgesi Celal Doğan Bulvarı No: 56 Başpınar / Gaziantep<br><br><a
                                    href="#">0 (342) 909 97 20</a><br><a href="#">info@ggbholding.com</a></p>
                            <div style="background-size: cover; background-repeat: no-repeat;">
                                <h3>Takip Edin</h3>
                                <ul class="social_list">
                                    <li>
                                        <a href="#" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ft_right" style="background-size: cover; background-repeat: no-repeat;">
                            <div class="row" style="background-size: cover; background-repeat: no-repeat;">
                                <div class="col-lg-7 col-md-12"
                                    style="background-size: cover; background-repeat: no-repeat;">
                                    <div class="footer_links_overlay"
                                        style="background-size: cover; background-repeat: no-repeat;">
                                        <ul class="footer-list">
                                            <li>
                                                <h6>Kolay Erişim</h6>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Kalite
                                                            Politikası</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Üretim
                                                            Politikası</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Multimedya</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>İştiraklerimiz</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <ul class="footer-list">
                                            <li>
                                                <h6>Kurumsal</h6>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Hakkımızda</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Sertifika &
                                                            Belgelerimiz</a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>Sürdürülebilirlik
                                                            Politikası</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer_bottom" style="background-size: cover; background-repeat: no-repeat;">
                        <p>@
                            <script>document.write(/\d{4}/.exec(Date())[0])</script> GGB Holding
                        </p>
                        <div style="background-size: cover; background-repeat: no-repeat;">
                            <a href="#" target="_blank" class="koolay_sign"><img
                                    src="https://www.diyatekgroup.com/view/default/assets/img/vemedya.svg"></a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- END_FOOTER -->
