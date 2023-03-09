    <form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Captcha Settings","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can add Captcha verification to member login, member registration, comment, contact form sections of your website.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can prevent actions such as unnecessary member registration and malicious login attempts.","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="captcha[status]" id="captcha[status]">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['captcha']['status'] or $options['captcha']['status'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="captcha[status]"><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Google Captcha Settings","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem back"><b><?php echo  __("Take Key","magicbox") ?></b> : <a href="https://www.google.com/recaptcha/admin/create">https://www.google.com/recaptcha/admin/create</a></div>
                        <div class="infoItem back"><b><?php echo  __("Info","magicbox") ?></b> : <a href="https://developers.google.com/recaptcha">https://developers.google.com/recaptcha</a></div>
                    </div>
                </div>
            </div>
            <div class="alert alert-custom alert-light-warning " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("Register your domain first, get required keys from Google (reCAPTCHA v2 or reCAPTCHA v3) and save them below.","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="captcha[google_key]" value="<?php echo  $options['captcha']['google_key'] ?>" id="google_captcha_key" class="form-control" placeholder=" ">
                            <label class="form-label" for="google_captcha_key"><?php echo  __("Google Captcha Site Key","magicbox") ?></label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="captcha[google_secret]" id="google_captcha_secret" value="<?php echo  $options['captcha']['google_secret'] ?>" class="form-control" placeholder=" ">
                            <label class="form-label" for="google_captcha_secret"><?php echo  __("Google Captcha Secret Key","magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Choose Areas","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("Select the areas where you want the Captcha to appear.","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="captcha[login]" id="captchaLogin">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['captcha']['login'] or $options['captcha']['login'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="captchaLogin"><?php echo  __("Enable captcha for login page.","magicbox") ?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Login Page","magicbox") ?>" style="right:30px;"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="captcha[register]" id="captchaRegister">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['captcha']['register'] or $options['captcha']['register'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="captchaRegister"><?php echo  __("Register Page","magicbox") ?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Enable captcha for register page.","magicbox") ?>" style="right:30px;"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="captcha[lostpassword]" id="captchaLostPassword">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['captcha']['lostpassword'] or $options['captcha']['lostpassword'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="captchaLostPassword"><?php echo  __("Lost Password","magicbox") ?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Enable captcha for Lost Password.","magicbox") ?>" style="right:30px;"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="captcha[comment]" id="captchaComment">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['captcha']['comment'] or $options['captcha']['comment'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="captchaComment"><?php echo  __("Comment Page","magicbox") ?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Enable captcha for the comment page.","magicbox") ?>" style="right:30px;"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a>
        </div>
    </div>
</form>
