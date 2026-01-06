<?php

/**
 * @var $this FrontClass|Loader object
 * @var $lang string
 * @var $assetURL string
 * @var $page string
 */
?>
<!-- START_FOOTER -->
<footer class="footer35">
    <div class="footer_pattern" style="background-size: cover; background-repeat: no-repeat;"></div>
    <div class="container" style="background-size: cover; background-repeat: no-repeat;">
        <div class="footer_inner" style="background-size: cover; background-repeat: no-repeat;">
            <div class="ft_left" style="background-size: cover; background-repeat: no-repeat;">
                <div><img src="<?= $assetURL ?>images/header_logo.png" alt=""></div>
                <p><?= $this->ayarlar('adres_merkez') ?><br><br><a
                        href="<?= $this->linkTelefon() ?>"><?= $this->ayarlar('telefon_merkez') ?></a><br><a href="<?= $this->linkEmail() ?>"><?= $this->ayarlar('email_merkez') ?></a></p>
                <div style="background-size: cover; background-repeat: no-repeat;">
                    <h3><?= $this->lang->footer('follow_us') ?></h3>
                    <ul class="social_list">
                        <?= $this->getSocialList() ?>
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
                                        <li><a href="<?= $this->BaseURL($this->lang->link('politikalar') . '/kalite-politikasi', $lang, 1) ?>"><i class="fa fa-angle-right"></i><?= $this->lang->footer('quality_policy') ?></a></li>
                                        <li><a href="<?= $this->BaseURL($this->lang->link('politikalar') . '/isg-politikasi', $lang, 1) ?>"><i class="fa fa-angle-right"></i><?= $this->lang->footer('production_policy') ?></a></li>
                                        <li><a href="<?= $this->BaseURL($this->lang->link('foto_galeri'), $lang, 1) ?>"><i class="fa fa-angle-right"></i><?= $this->lang->footer('multimedia') ?></a></li>
                                        <li><a href="<?= $this->BaseURL($this->lang->link('istirakler'), $lang, 1) ?>"><i class="fa fa-angle-right"></i><?= $this->lang->footer('our_affiliates') ?></a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="footer-list">
                                <li>
                                    <h6><?= $this->lang->footer('corporate') ?></h6>
                                </li>
                                <li>
                                    <ul>
                                        <li><a href="<?= $this->BaseURL($this->lang->link('kurumsal') . '/hakkimizda', $lang, 1) ?>"><i class="fa fa-angle-right"></i><?= $this->lang->footer('about_us') ?></a></li>
                                        <li><a href="<?= $this->BaseURL($this->lang->link('kurumsal') . '/sertifika-belgelerimiz', $lang, 1) ?>"><i class="fa fa-angle-right"></i><?= $this->lang->footer('certificates_documents') ?></a></li>
                                        <li><a href="<?= $this->BaseURL($this->lang->link('politikalar') . '/surdurulebilirlik', $lang, 1) ?>"><i class="fa fa-angle-right"></i><?= $this->lang->footer('sustainability_policy') ?></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom" style="background-size: cover; background-repeat: no-repeat;">
            <p><?= $this->getFooterCopy() ?></p>
            <div style="background-size: cover; background-repeat: no-repeat;">
                <a href="https://www.vemedya.com/" target="_blank" class="koolay_sign"><img
                        src="https://www.diyatekgroup.com/view/default/assets/img/vemedya.svg"></a>
            </div>
        </div>
    </div>
</footer>
<!-- END_FOOTER -->