<form method="post" class="theForm theForm-<?php echo sanitize_text_field($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":sanitize_text_field($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Redirects","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("When you activate the plugin, everything will be configured for you automatically and SSL will be enabled.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("The entire site will move to HTTPS using your SSL certificate.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("It works with any SSL certificate also you can redirect your website to other websites.","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="alert alert-custom alert-light-warning " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("Do not change this option too much so that the SEO of your website is not adversely affected.","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-select" name="redirect[status]" id="redirect[status]">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['redirect']['status'] or $options['redirect']['status'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="redirect[status]"><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Settings","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php 
                             $sslOrNonSsl = array(
                                "1" => __("Redirect to HTTPS","magicbox"),
                                "2" => __("Redirect HTTP","magicbox"),
                            );
                            ?>
                            <select class="form-select" name="redirect[ssl]" id="redirect[ssl]">
                                <option value="0"><?php echo __("Don't Touch")?></option>
                                <?php foreach ($sslOrNonSsl as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['redirect']['ssl']) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="redirect[ssl]"><?php echo  __("Force SSL","magicbox") ?></label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <?php 
                             $wwwOrNonWww = array(
                                "1" => __("Redirect to WWW","magicbox"),
                                "2" => __("Redirect NON-WWWW"),
                            );
                            ?>
                            <select class="form-select" name="redirect[www]" id="redirect[www]">
                                <option value="0"><?php echo __("Don't Touch")?></option>
                                <?php foreach ($wwwOrNonWww as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['redirect']['www']) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="redirect[www]"><?php echo  __("Force WWW","magicbox") ?></label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php 
                             $redirectAnother = array(
                                "1" => __("Redirect","magicbox"),
                                "2" => __("No","magicbox"),
                                "3" => __("Redirect Full Path","magicbox"),
                            );
                            ?>
                            <select class="form-select redirectAnother" name="redirect[another]" id="redirect[another]">
                                <?php foreach ($redirectAnother as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['redirect']['another'] or $options['redirect']['another'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for=""redirect[another]><?php echo  __("Redirect Another Website","magicbox") ?></label>
                        </div>
                    </div>

                    <div class="col-md-6 redirectAnotherValue" style="display:<?php echo  $options['redirect']['another'] !=2 ? "block" : "none" ?>">
                        <div class="form-group">
                            <input type="text" name="redirect[another_website]" id="redirect[another_website]" value="<?php echo $options['redirect']['another_website']?>" class="form-control " placeholder=" "/>
                            <label class="form-label" for="redirect[another_website]"><?php echo __("Redirect Url","magicbox")?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button onclick="return false;" name="upsert" value="<?php echo  __("Update","magicbox") ?>" class="btn btn-success rounded-pill px-4 pageSaveButton"><i class="fa-solid fa-floppy-disk me-2"></i><?php echo  __("Update","magicbox") ?></button>
        </div>
    </div>
</form>

<script>

    jQuery(document).on('change', '.redirectAnother', function () {
        if (jQuery(this).val() == 2) {
            jQuery('.redirectAnotherValue').hide(0);
        } else {
            jQuery('.redirectAnotherValue').show(0);
        }
    });



</script>