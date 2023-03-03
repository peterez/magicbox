<form method="post" class="theForm theForm-<?php echo sanitize_text_field($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":sanitize_text_field($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("White Label","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can hide the content you do not want on the Admin Panel.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can hide Admin Bar, Help Box, Update Messages, WordPress Logo and links, WordPress Version Check on the Admin panel.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can change the WordPress Admin Page title.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can change the WordPress logo.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can choose which user roles your arrangements will apply to.","magicbox")?></div>
                    </div>
                </div>
            </div>
            <div class="container-mb">
                <div class="row fixedRow gy-2 align-items-center">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="white_label[status]" id="white_label[status]">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['white_label']['status'] or $options['white_label']['status'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="white_label[status]"><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Hide Contents") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can hide the content you do not want on the Admin Panel","magicbox")?></div>
                    </div>
                </div>
            </div>
            <div class="container-mb">
                <div class="row fixedRow gy-2 align-items-center">
                    <div class="col-lg-4">
                        <div class="form-check-switch block">
                            <div class="form-check">
                                <label class="form-check-label" for="white_label[hide_front_admin_bar]"><?php echo __("Hide front-end admin bar","magicbox")?><div class="form-info-normal ms-2" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Disable the admin bar on the front-end.","magicbox") ?>"><i class="fa-solid fa-info"></i></div></label>
                                <input class="form-check-input" type="checkbox"
                                       name="white_label[hide_front_admin_bar]"
                                       id="white_label[hide_front_admin_bar]"
                                    <?php echo $options['white_label']['hide_front_admin_bar'] =="1"?"checked":""?>
                                       value="1" >
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-lg-4">
                        <div class="form-check-switch block">
                            <div class="form-check">
                                <label class="form-check-label" for="white_label[hide_admin_help_box]"><?php echo __("Hide Help Box","magicbox")?><div class="form-info-normal ms-2" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Hide the help tab that appears on the top right.","magicbox") ?>"><i class="fa-solid fa-info"></i></div></label>
                                <input class="form-check-input" type="checkbox"
                                       name="white_label[hide_admin_help_box]"
                                       id="white_label[hide_admin_help_box]"
                                    <?php echo $options['white_label']['hide_admin_help_box'] =="1"?"checked":""?>
                                       value="1" >
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-lg-4">
                        <div class="form-check-switch block">
                            <div class="form-check">
                                <label class="form-check-label" for="white_label[hide_admin_screen_options]"><?php echo __("Hide Screen Options","magicbox")?><div class="form-info-normal ms-2" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Hide the screen options on the top right.","magicbox") ?>"><i class="fa-solid fa-info"></i></div></label>
                                <input class="form-check-input" type="checkbox"
                                       name="white_label[hide_admin_screen_options]"
                                       id="white_label[hide_admin_screen_options]"
                                    <?php echo $options['white_label']['hide_admin_screen_options'] =="1"?"checked":""?>
                                       value="1" >
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-lg-4">
                        <div class="form-check-switch block">
                            <div class="form-check">
                                <label class="form-check-label" for="white_label[hide_admin_nag_messages]"><?php echo __("Hide Nag Update Messages","magicbox")?><div class="form-info-normal ms-2" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Hide nag messages.","magicbox") ?>"><i class="fa-solid fa-info"></i></div></label>
                                <input class="form-check-input" type="checkbox"
                                       name="white_label[hide_admin_nag_messages]"
                                       id="white_label[hide_admin_nag_messages]"
                                    <?php echo $options['white_label']['hide_admin_nag_messages'] =="1"?"checked":""?>
                                       value="1" >
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-lg-4">
                        <div class="form-check-switch block">
                            <div class="form-check">
                                <label class="form-check-label" for="white_label[hide_logo_and_links]"><?php echo __("Hide WordPress Logos and Links","magicbox")?><div class="form-info-normal ms-2" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Hide WordPress logo and hide WordPress.org links.","magicbox") ?>"><i class="fa-solid fa-info"></i></div></label>
                                <input class="form-check-input" type="checkbox"
                                       name="white_label[hide_logo_and_links]"
                                       id="white_label[hide_logo_and_links]"
                                    <?php echo $options['white_label']['hide_logo_and_links'] =="1"?"checked":""?>
                                       value="1" >
                            </div>

                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-lg-4"><div class="form-check-switch block">
                            <div class="form-check">
                                <label class="form-check-label" for="white_label[disable_wp_version_check]"><?php echo __("Disable WordPress Version Check","magicbox")?><div class="form-info-normal ms-2" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Hide the WordPress version number that appears in the footer.","magicbox") ?>"><i class="fa-solid fa-info"></i></div></label>
                                <input class="form-check-input" type="checkbox"
                                       name="white_label[disable_wp_version_check]"
                                       id="white_label[disable_wp_version_check]"
                                    <?php echo $options['white_label']['disable_wp_version_check'] =="1"?"checked":""?>
                                       value="1" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Change Admin Panel Title","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can change the WordPress Admin Page title.","magicbox")?></div>
                    </div>
                </div>
            </div>
            <div class="container-mb">
                <div class="row fixedRow gy-2 align-items-center">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input class="form-control"
                                   name="white_label[custom_title]"
                                   id="white_label[custom_title]"
                                   value="<?php echo $options['white_label']['custom_title']?>" placeholder=" ">
                            <label class="form-label" for="white_label[custom_title]"><?php echo __("Custom Title","magicbox")?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Replace WordPress in the admin page titles.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Change Wordpress Logo","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can change the WordPress logo.","magicbox")?></div>
                    </div>
                </div>
            </div>
            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-12">
                        <?php echo $theClass->magicBox->uploadForm("Admin Bar Logo","white_label[admin_bar_logo]",$options['white_label']['admin_bar_logo'],'', __("Change the WordPress logo in the admin bar. Max height 20px", "magicbox"));?>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <input class="form-control"
                                   name="white_label[admin_bar_logo_url]"
                                   id="white_label[admin_bar_logo_url]"
                                   value="<?php echo $options['white_label']['admin_bar_logo_url']?>" placeholder=" ">
                            <label class="form-label" for="white_label[admin_bar_logo_url]"><?php echo __("Logo Url","magicbox")?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Change the WordPress admin bar logo URL.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <input class="form-control"
                                   name="white_label[admin_bar_logo_alt_text]"
                                   id="white_label[admin_bar_logo_alt_text]"
                                   value="<?php echo $options['white_label']['admin_bar_logo_alt_text']?>" placeholder=" ">
                            <label class="form-label" for="white_label[admin_bar_logo_alt_text]"><?php echo __("Logo Alt Text","magicbox")?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Change the 'WordPress' sub text.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <input class="form-control"
                                   name="white_label[admin_bar_howdy_text]"
                                   id="white_label[admin_bar_howdy_text]"
                                   value="<?php echo $options['white_label']['admin_bar_howdy_text']?>" placeholder=" ">
                            <label class="form-label" for="white_label[admin_bar_howdy_text]"><?php echo __("Howdy Text","magicbox")?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Add a space to completely remove it from the admin bar. Or replace it with something like: 'Hi, hello'","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Select Roles","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can choose which user roles your arrangements will apply to.","magicbox")?></div>
                    </div>
                </div>
            </div>
            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-12">
                        <div class="form-check-group">
                            <?php foreach ($theClass->magicBox->getUserRoles() as $key => $item) { ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                           name="white_label[user_roles][<?php echo  $key ?>]"
                                           id="white_label[user_roles][<?php echo  $key ?>]"
                                        <?php echo  $options['white_label']['user_roles'][$key] == "1" ? "checked" : "" ?>
                                           value="1">
                                    <label class="form-check-label"
                                           for="white_label[user_roles][<?php echo  $key ?>]"><span><?php echo  $item ?></span></label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a>
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

