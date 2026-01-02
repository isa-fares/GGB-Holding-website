<?php Form::Open(array(
    "class" => "iletisim-form",
    "method" => "post",
    "action" => $this->baseURL("ajax/iletisimForm", "tr", 1),
    "token" => true,
    "message" => array(
        ["no" => 1, "title" => $this->lang->iletisim("formsucces"), "status" => "success"],
        ["no" => 2, "title" => $this->lang->iletisim("formerror"), "status" => "error"],
        ["no" => 3, "title" => $this->lang->iletisim("formvalid"), "status" => "warning"],
    ),
    "lang" => $lang
)); ?>
<div class="    ">
            <input type="text" name="adi" required>
            <input type="email"  name="email" required>
            <input type="text" name="tel">
            <input type="text" name="konu">
            <textarea name="mesaj"></textarea>
            <div class="form-group">
                <label class="master">Güvenlik Kodu</label>
                <div class="captcha">
                    <img class="captcha_image" src="<?= $this->baseURL("ajax/getcaptchaimage", "tr", 1) ?>">
                    <input type="text" minlength="6" class="form-control contact-one__form-input" name="captcha_value" maxlength="6" required>
                </div>
                <small>* kodu değiştirmek için resmin üzerine tıklayın</small>

            </div>
        <button class="cmt-btn" type="submit">Gönder</button>

    </div>
</div>
<?php Form::Close(); ?>