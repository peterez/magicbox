<script>
    var isMirrorred = {};
    var codeMirrorVals = {};
</script>
<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Tracking Codes","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can add Google webmaster, Analytics, Search Console, Yandex Metrica, Microsoft Clarity, Facebook Pixel, Google Tag Manager, OneSignal activation codes to your website.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can view and edit all tracking codes from a single page.","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="container-mb">
                <div class="row fixedRow">
                    <?php foreach ($magicBox->headCodeManagerCodes as $slugName => $name) { ?>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <select class="form-select showHideSubElement" name="tracking_codes[<?php echo  $slugName ?>]" id="tracking_codes[<?php echo  $slugName ?>]" subClassName="<?php echo $slugName; ?>Html">
                                    <?php foreach ($activePassive as $key => $value) { ?>
                                        <option
                                                value="<?php echo  $key ?>"<?php if ($key == $options['tracking_codes'][$slugName] or $options['tracking_codes'][$slugName] == "" and $key == 2){
                                            echo "selected";
                                        } ?>><?php echo  $value ?></option>
                                    <?php } ?>
                                </select>
                                <label class="form-label" for="tracking_codes[<?php echo  $slugName ?>]"><?php echo  $name ?></label>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-12">
                            <div class="form-group <?php echo $slugName; ?>Html" style="display:<?php echo  $options['tracking_codes'][$slugName] == "1"? "block" : "none" ?>">
                                <div class="form-group">
                                    <textarea name="tracking_codes[<?php echo $slugName ?>_html]" id="tracking_codes_<?php echo $slugName ?>_html" class="form-control"><?php echo  $options['tracking_codes'][$slugName . '_html'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <script>
                            setAsCodeMirror("tracking_codes_<?php echo $slugName ?>_html");
                        </script>

                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a>
        </div>
    </div>
</form>

<script>

    jQuery(document).on('change', '.showHideSubElement', function () {
        attr=jQuery(this).attr('subClassName');
        if (jQuery(this).val() == 1) {
            jQuery('.' + attr).show(0);
        } else {
            jQuery('.' + attr).hide(0);
        }
    });

</script>