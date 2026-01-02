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
                                <h3><?= $this->lang->footer('follow_us') ?></h3>
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
                                                <h6><?= $this->lang->footer('quick_access') ?></h6>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i><?= $this->lang->footer('quality_policy') ?></a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i><?= $this->lang->footer('production_policy') ?></a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i><?= $this->lang->footer('multimedia') ?></a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i><?= $this->lang->footer('our_affiliates') ?></a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <ul class="footer-list">
                                            <li>
                                                <h6><?= $this->lang->footer('corporate') ?></h6>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i><?= $this->lang->footer('about_us') ?></a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i><?= $this->lang->footer('certificates_documents') ?></a></li>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i><?= $this->lang->footer('sustainability_policy') ?></a></li>
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
