<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Custom Login","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can customize the WordPress Admin panel login page and create a custom login pages for your administrators.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can change the login page logo.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can edit the login page background.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can customize the login page form and button.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can hide login page register, hide back url, hide privacy, Remember me features.","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="custom_login[status]" id="custom_login[status]">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['custom_login']['status'] or $options['custom_login']['status'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="custom_login[status]"><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Change Login Page Logo","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can change the login page logo.","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-md-6">
                        <?php echo $theClass->magicBox->uploadForm("Login Logo","custom_login[logo]",$options['custom_login']['logo'],'',__("Replace the WordPress logo on the login page. Max width 320px.","magicbox"));?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                        <?php echo $theClass->magicBox->uploadForm("Retina Logo","custom_login[retina_logo]",$options['custom_login']['retina_logo'],'',__("Replace the Retina WordPress logo on the login page. Please make sure you use the standard retina format of x2.","magicbox"));?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input class="form-control"
                                   name="custom_login[logo_width]"
                                   id="custom_login[logo_width]"
                                   value="<?php echo $options['custom_login']['logo_width']?>" placeholder=" ">
                            <label class="form-label" for="custom_login[logo_width]"><?php echo __("Logo Width","magicbox")?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Add a width to your Login Page Logo. Max width 320px.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input class="form-control"
                                   name="custom_login[logo_height]"
                                   id="custom_login[logo_height]"
                                   value="<?php echo $options['custom_login']['logo_height']?>" placeholder=" ">
                            <label class="input-group-text" for="custom_login[logo_height]"><?php echo __("Logo Height","magicbox")?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Add a height to your Login Page Logo.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Change Login Page Background","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can edit the login page background.","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                            <input class="form-control"
                                   name="custom_login[background_color]"
                                   id="custom_login_background_color"
                                   type="text"
                                   value="<?php echo $options['custom_login']['background_color']?>" placeholder=" ">
                            <label class="form-label" for="custom_login_background_color"><?php echo __("Background Color","magicbox")?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Background color for the login page. For example rgba (145, 39, 39, 0.79) or #b70101","magicbox") ?>" style="right:40px;"><i class="fa-solid fa-info"></i></div>
                            <div class="form-color-box" data-input="custom_login_background_color"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                        <?php echo $theClass->magicBox->uploadForm("Background Image","custom_login[background_image]",$options['custom_login']['background_image'],'',__("Add a background image to the login page.","magicbox"));?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                        <div class="form-check-switch my-3">
                            <div class="form-check">
                                <label class="form-check-label" for="custom_login[background_fullsize]"><?php echo __("Set background as full screen","magicbox")?></label>
                                <input class="form-check-input" type="checkbox"
                                       name="custom_login[background_fullsize]"
                                       id="custom_login[background_fullsize]"
                                    <?php echo $options['custom_login']['background_fullsize'] =="1"?"checked":""?>
                                       value="1" >
                                <div class="form-info-normal ms-2" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Stretch the background image to appear full screen.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6 col-lg-3">
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
                            <select name="custom_login[background_position]" id="custom_login[background_position]" class="form-control">
                                <?php foreach($bgPositions as $value) {?>
                                    <option <?php echo $options['custom_login']['background_position'] ==$value?"selected":""?> value="<?php echo $value?>"><?php echo magicbox_strUpDown($value,"capitalize")?></option>
                                <?php }?>
                            </select>
                            <label class="form-label" for="custom_login[background_position]"><?php echo __("Background Position","magicbox")?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Set the CSS background position.","magicbox") ?>" style="right:30px;"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <?php 
                         $bgRepeats = array(
                            "repeat",
                            "repeat-y",
                            "no-repeat"
                        );
                        ?>
                        <div class="form-group">
                            <select name="custom_login[background_repeat]" id="custom_login[background_repeat]" class="form-control">
                                <?php foreach($bgRepeats as $value) {?>
                                    <option <?php echo $options['custom_login']['background_repeat'] ==$value?"selected":""?> value="<?php echo $value?>"><?php echo magicbox_strUpDown($value,"capitalize")?></option>
                                <?php }?>
                            </select>
                            <label class="form-label" for="custom_login[background_repeat]"><?php echo __("Background Repeat","magicbox")?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Set the CSS background-repeat.","magicbox") ?>" style="right:30px;"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">

        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Change Buttons","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can customize the login page form.","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="container-mb">
                <div class="row fixedRow">

                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <input class="form-control"
                                   name="custom_login[form_background_color]"
                                   id="custom_login_form_background_color"
                                   type="text"
                                   value="<?php echo $options['custom_login']['form_background_color']?>" placeholder=" ">
                            <label class="form-label" for="custom_login_form_background_color"><?php echo __("Form Background Color","magicbox")?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Specify the background color of the login form. e.g rgba (145, 39, 39, 0.79) or #b70101","magicbox") ?>" style="right:40px;"><i class="fa-solid fa-info"></i></div>
                            <div class="form-color-box" data-input="custom_login_form_background_color"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <input class="form-control"
                                   name="custom_login[form_label_color]"
                                   id="custom_login_form_label_color"
                                   type="text"
                                   value="<?php echo $options['custom_login']['form_label_color']?>" placeholder=" ">
                            <label class="form-label" for="custom_login_form_label_color"><?php echo __("Form Label Color","magicbox")?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Specify the color of labels in login form e.g rgba (145, 39, 39, 0.79) or #b70101","magicbox") ?>" style="right:40px;"><i class="fa-solid fa-info"></i></div>
                            <div class="form-color-box" data-input="custom_login_form_label_color"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <input class="form-control"
                                   name="custom_login[form_border_radius]"
                                   id="custom_login[form_border_radius]"
                                   type="text"
                                   value="<?php echo $options['custom_login']['form_border_radius']?>" placeholder=" ">
                            <label class="form-label" for="custom_login[form_border_radius]"><?php echo __("Form Border Radius","magicbox")?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Specify the form border radius. E.g 4px.","magicbox") ?> "><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <input class="form-control"
                                   name="custom_login[form_button_color]"
                                   id="custom_login_form_button_color"
                                   type="text"
                                   value="<?php echo $options['custom_login']['form_button_color']?>" placeholder=" ">
                            <label class="form-label" for="custom_login_form_button_color"><?php echo __("Form Button Color","magicbox")?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Specify the color of button in login form e.g rgba (145, 39, 39, 0.79) or #b70101","magicbox") ?>" style="right:40px;"><i class="fa-solid fa-info"></i></div>
                            <div class="form-color-box" data-input="custom_login_form_button_color"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <input class="form-control"
                                   name="custom_login[form_button_hover_color]"
                                   id="custom_login_form_button_hover_color"
                                   type="text"
                                   value="<?php echo $options['custom_login']['form_button_hover_color']?>" placeholder=" ">
                            <label class="form-label" for="custom_login_form_button_hover_color"><?php echo __("Form Button Hover Color","magicbox")?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Specify the hover color of button in login form e.g rgba (145, 39, 39, 0.79) or #b70101","magicbox") ?>" style="right:40px;"><i class="fa-solid fa-info"></i></div>
                            <div class="form-color-box" data-input="custom_login_form_button_hover_color"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <input class="form-control"
                                   name="custom_login[form_button_text_color]"
                                   id="custom_login_form_button_text_color"
                                   type="text"
                                   value="<?php echo $options['custom_login']['form_button_text_color']?>" placeholder=" ">
                            <label class="form-label" for="custom_login_form_button_text_color"><?php echo __("Form Button Text Color","magicbox")?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Specify the color of text in button in login form e.g rgba (145, 39, 39, 0.79) or #b70101","magicbox") ?>" style="right:40px;"><i class="fa-solid fa-info"></i></div>
                            <div class="form-color-box" data-input="custom_login_form_button_text_color"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <input class="form-control"
                                   name="custom_login[form_button_text_hover_color]"
                                   id="custom_login_form_button_text_hover_color"
                                   type="text"
                                   value="<?php echo $options['custom_login']['form_button_text_hover_color']?>" placeholder=" ">
                            <label class="form-label" for="custom_login_form_button_text_hover_color"><?php echo __("Form Button Text Hover Color","magicbox")?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Specify the hover over the color of the text in the button on the login form e.g rgba (145, 39, 39, 0.79) or #b70101","magicbox") ?>" style="right:40px;"><i class="fa-solid fa-info"></i></div>
                            <div class="form-color-box" data-input="custom_login_form_button_text_hover_color"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <input class="form-control"
                                   name="custom_login[back_to_register_link_color]"
                                   id="custom_login_back_to_register_link_color"
                                   type="text"
                                   value="<?php echo $options['custom_login']['back_to_register_link_color']?>" placeholder=" ">
                            <label class="form-label" for="custom_login_back_to_register_link_color"><?php echo __("Back / Register Link Hover Color","magicbox")?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Specify the color of Back/Register link text e.g rgba (145, 39, 39, 0.79) or #b70101","magicbox") ?>" style="right:40px;"><i class="fa-solid fa-info"></i></div>
                            <div class="form-color-box" data-input="custom_login_back_to_register_link_color"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                            <input class="form-control"
                                   name="custom_login[privacy_policy_link_color]"
                                   id="custom_login_privacy_policy_link_color"
                                   type="text"
                                   value="<?php echo $options['custom_login']['privacy_policy_link_color']?>" placeholder=" ">
                            <label class="form-label" for="custom_login_privacy_policy_link_color"><?php echo __("Privacy Policy Link Color","magicbox")?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Specify the color of Privacy Policy link text e.g rgba (145, 39, 39, 0.79) or #b70101","magicbox") ?>" style="right:40px;"><i class="fa-solid fa-info"></i></div>
                            <div class="form-color-box" data-input="custom_login_privacy_policy_link_color"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">

        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Login Page Hide Elements","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can hide elements in login form.") ?></div>
                    </div>
                </div>
            </div>

            <div class="form-check-group">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox"
                           name="custom_login[hide_register_lost_url]"
                           id="custom_login[hide_register_lost_url]"
                        <?php echo $options['custom_login']['hide_register_lost_url'] =="1"?"checked":""?>
                           value="1" >
                    <label class="form-check-label" for="custom_login[hide_register_lost_url]"><span><?php echo __("Hide register and lost urls","magicbox")?></span></label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox"
                           name="custom_login[hide_back_url]"
                           id="custom_login[hide_back_url]"
                        <?php echo $options['custom_login']['hide_back_url'] =="1"?"checked":""?>
                           value="1" >
                    <label class="form-check-label" for="custom_login[hide_back_url]"><span><?php echo __("Hide back url","magicbox")?></span></label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox"
                           name="custom_login[hide_privacy_url]"
                           id="custom_login[hide_privacy_url]"
                        <?php echo $options['custom_login']['hide_privacy_url'] =="1"?"checked":""?>
                           value="1" >
                    <label class="form-check-label" for="custom_login[hide_privacy_url]"><span><?php echo __("Hide privacy url","magicbox")?></span></label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox"
                           name="custom_login[hide_remember_me]"
                           id="custom_login[hide_remember_me]"
                        <?php echo $options['custom_login']['hide_remember_me'] =="1"?"checked":""?>
                           value="1" >
                    <label class="form-check-label" for="custom_login[hide_remember_me]"><span><?php echo __("Hide 'Remember Me' option","magicbox")?></span></label>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button onclick="return false;" name="upsert" value="<?php echo  __("Update","magicbox") ?>" class="btn btn-success rounded-pill px-4 pageSaveButton"><i class="fa-solid fa-floppy-disk me-2"></i><?php echo  __("Update","magicbox") ?></button>
        </div>
    </div>
</form>


<script>

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

    jQuery(document).on("click", ".removeImage", (function () {
        var t = jQuery(this);
        var keyName = t.attr('key');
        jQuery('._'+keyName+' .image-thumbnail').html('');
        jQuery('._'+keyName+' input').val('');
    }));

</script>

