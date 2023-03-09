<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Maintenance Mode","magicbox") ?></h6>
        </div>
        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can design the Maintenance Mode page as you wish with editor.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can add background image and color.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can set the background position and repeat.","magicbox")?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-select showHideSubElement" name="maintenance[status]" id="maintenance" subClassName="maintenanceHtml">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['maintenance']['status'] or $options['maintenance']['status'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="maintenance"><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Edit Maintaince Page") ?></h6>
        </div>
        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("o	You can design the Maintenance Mode page as you wish with editor.","magicbox")?></div>
                    </div>
                </div>
            </div>
            <div class="maintenanceHtml">
                <div class="container-mb">
                    <div class="row fixedRow">
                        <div class="col-12">
                            <?php 
                             $settings = array("textarea_name" => "maintenance[detail_html]");
                            wp_editor( $options['maintenance']['detail_html'], "maintenance_html",$settings );
                            ?>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-12">
                            <div class="form-check-switch my-4">
                                <div class="form-check">
                                    <label class="form-check-label" for="maintenance[background_fullsize]"><?php echo __("Set background as full screen","magicbox")?></label>
                                    <input class="form-check-input" type="checkbox"
                                           name="maintenance[background_fullsize]"
                                           id="maintenance[background_fullsize]"
                                        <?php echo $options['maintenance']['background_fullsize'] =="1"?"checked":""?>
                                           value="1" >
                                    <div class="form-info-normal ms-2" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Set the background image to full screen.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label" for="maintenance[vertical_align]"><?php echo __("Set as middle of page","magicbox")?></label>
                                    <input class="form-check-input" type="checkbox"
                                           name="maintenance[vertical_align]"
                                           id="maintenance[vertical_align]"
                                        <?php echo $options['maintenance']['vertical_align'] =="1"?"checked":""?>
                                           value="1" >
                                    <div class="form-info-normal ms-2" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Place the background image in the middle of the screen.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input class="form-control" name="maintenance[background_color]" id="maintenance_background_color" type="text" value="<?php echo $options['maintenance']['background_color']?>" >
                                <label class="input-group-text" for="maintenance_background_color"><?php echo __("Background Color","magicbox")?></label>
                                <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Set the maintenance page background color. For example rgba(145, 39, 39, 0.79) or #b70101","magicbox") ?>" style="right:40px;"><i class="fa-solid fa-info"></i></div>
                                <div class="form-color-box" data-input="maintenance_background_color"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input class="form-control" name="maintenance[color]" id="maintenance_color" type="text" value="<?php echo $options['maintenance']['color']?>" >
                                <label class="input-group-text" for="maintenance_color"><?php echo __("Color","magicbox")?></label>
                                <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Adjust the color of the maintenance page texts. For example rgba(145, 39, 39, 0.79) or #b70101","magicbox") ?>" style="right:40px;"><i class="fa-solid fa-info"></i></div>
                                <div class="form-color-box" data-input="maintenance_color"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-8">
                            <?php echo $theClass->magicBox->uploadForm("Background Image","maintenance[background_image]",$options['maintenance']['background_image'],'', __("Add a background image to the maintenance page.", "magicbox"));?>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-4">
                            <?php 
                             $bgPositions = array(
                                "center center",
                                "center top",
                                "center bottom",
                                "left top",
                                "left center",
                                "left bottom",
                                "right top",
                                "right center",
                                "right bottom"
                            );
                            ?>
                            <div class="form-group">
                                <select name="maintenance[background_position]" id="maintenance[background_position]" class="form-control">
                                    <?php foreach($bgPositions as $value) {?>
                                        <option <?php echo $options['maintenance']['background_position'] ==$value?"selected":""?> value="<?php echo $value?>"><?php echo magicbox_strUpDown($value,"capitalize")?></option>
                                    <?php }?>
                                </select>
                                <label class="form-label" for="maintenance[background_position]"><?php echo __("Background Position","magicbox")?></label>
                                <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Set the CSS background position.","magicbox") ?>" style="right:30px;"><i class="fa-solid fa-info"></i></div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <?php 
                             $bgRepeats = array(
                                "repeat",
                                "repeat-y",
                                "no-repeat"
                            );
                            ?>
                            <div class="form-group">
                                <select name="maintenance[background_repeat]" class="form-control" id="maintenance[background_repeat]">
                                    <?php foreach($bgRepeats as $value) {?>
                                        <option <?php echo $options['maintenance']['background_repeat'] ==$value?"selected":""?> value="<?php echo $value?>"><?php echo magicbox_strUpDown($value,"capitalize")?></option>
                                    <?php }?>
                                </select>
                                <label class="form-label" for="maintenance[background_repeat]"><?php echo __("Background Repeat","magicbox")?></label>
                                <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Set CSS background repeat.","magicbox") ?>" style="right:30px;"><i class="fa-solid fa-info"></i></div>
                            </div>
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

<style>
    #titlediv #title-prompt-text {
        font-size:unset;
    }
    #wp-content-editor-tools {
        background-color: transparent;
        background: transparent;
        background-image: none;
    }
</style>
<script>

    jQuery(document).ready( function () {
        jQuery('iframe').contents().find("#tinymce").css("background-color","transparent");
        setTimeout(function(){
            jQuery('#content_ifr').contents().find("#tinymce").css("background-color","transparent");
            jQuery('iframe').contents().find("#tinymce").css("background-color","transparent");
        }, 1000);
        setTimeout(function(){
            jQuery('#content_ifr').contents().find("#tinymce").css("background-color","transparent");
            jQuery('iframe').contents().find("#tinymce").css("background-color","transparent");
        }, 3000);
        setTimeout(function(){
            jQuery('#content_ifr').contents().find("#tinymce").css("background-color","transparent");
            jQuery('iframe').contents().find("#tinymce").css("background-color","transparent");
        }, 7000);
    });


    jQuery(document).on('click',".image_upload",(function () {
        var t = jQuery(this);
        var keyName = t.attr('key');
        var e = wp.media.editor.send.attachment;

        return wp.media.editor.send.attachment = function (i, r) {
            var s = '<img id="' + r.id + '" src="' + r.url + '" /><span class="removeImage" key="'+keyName+'">X</span>';

            jQuery('._'+keyName+' .image-thumbnail').html(s);
            jQuery('._'+keyName+' input').val(r.url);

            wp.media.editor.send.attachment = e;

        }, wp.media.editor.open(), !1

    }));

</script>
