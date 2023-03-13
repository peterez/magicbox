<?php 
 $targets = array("1" => __("Users","magicbox"), "2" => __("Manuel","magicbox"));
?>
<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo esc_attr($_REQUEST['method'])==""?"index":esc_attr($_REQUEST['method'])?>">
    <div class="card bg-light">

        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Bulk Mail","magicbox") ?></h6>
        </div>

        <div class="card-body">

            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can make your mail design with the following editor","magicbox")?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select mailTarget" name="bulk_mail[target]" id="bulk_mail[target]">
                                <?php foreach ($targets as $key => $value) { ?>
                                    <option
                                            value="<?php echo  esc_attr($key) ?>"<?php if ($key == $theClass->options['bulk_mail']['target']){
                                        echo "selected";
                                    } ?>><?php echo  esc_attr($value) ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="bulk_mail[target]"><?php echo  __("Target","magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-check-group userRoles">
                <?php foreach ($theClass->userRoles as $role => $item) { ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="bulk_mail[role][<?php echo $role; ?>]" type="checkbox" <?php echo $theClass->options['bulk_mail']['role'][$role] == "1"? "checked" : "" ?> id="role_<?php echo $role; ?>" value="1">
                        <label class="form-check-label" for="role_<?php echo $role; ?>"><span><?php echo esc_attr($item['name']); ?></span></label>
                    </div>
                <?php } ?>
            </div>


            <div class="manuelMailArea" style="display:none;">
                <div class="form-group">
                    <textarea class="form-control" style="min-height:300px" placeholder=" " name="bulk_mail[mails]" id="bulk_mail[mails]"><?php echo  $theClass->options['bulk_mail']['mails'] ?></textarea>
                    <label class="form-label" for="bulk_mail[mails]"><?php echo  __("Mails","magicbox") ?> <small>(mail1@mail.com|<?php echo __("Name","magicbox") ?>|<?php echo __("Username","magicbox") ?>&#13;&#10;mailpattern2@mail.com|<?php echo __("Name Lastname","magicbox") ?>&#13;&#10;mailpattern3@mail.com&#13;&#10;mail4@mail.com)</small></label>
                </div>

            </div>
            <div class="form-group">
                <input class="form-control" value="<?php echo  $theClass->options['bulk_mail']['subject'] ?>" name="bulk_mail[subject]" id="bulk_mail[subject]" placeholder=" ">
                <label class="form-label" for="bulk_mail[subject]"><?php echo  __("Subject","magicbox") ?></label>
            </div>

            <?php 
             $settings = array( 'textarea_name' => 'bulk_mail[body]');
            wp_editor($theClass->options['bulk_mail']['body'], "bulk_mail_body",$settings);
            ?>

            <div class="alert alert-custom alert-light-primary mt-3" role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can use some special tags","magicbox") ?></div>
                        <a href="javascript:;" class="infoItem"><?php echo __("For example : <b>-name-</b> tag for User Name, <b>-mail-</b> tag for User Mail, <b>-username-</b> for Username","magicbox") ?></a>
                    </div>
                </div>
            </div>


            <?php if ($_GET['id'] != ""){ ?>
                <div class="alert alert-custom alert-light-danger mt-3" role="alert">
                    <div class="alert-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
                    <div class="alert-text">
                        <div class="w-100 d-flex flex-wrap gap-2">
                            <div class="infoItem"><?php echo __("It's only displaying, you can't edit campign","magicbox") ?></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="card-footer">
            <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a>
        </div>

    </div>



</form>
<?php if ($_GET['id'] == ""){ ?>
<style>
    #titlediv #title-prompt-text {
        font-size: unset;
    }

    #wp-content-editor-tools {
        background-color: transparent;
        background: transparent;
        background-image: none;
    }
</style>
<script>





    jQuery(document).on('change', '.mailTarget', function () {

        val=jQuery(this).val();

        if (val == "2") {
            jQuery('.manuelMailArea').show(0);
            jQuery('.userRoles').hide(0);
            jQuery('.manuelMailArea').show(0);

        } else {
            jQuery('.manuelMailArea').hide(0);
            jQuery('.userRoles').show(0);
            jQuery('.manuelMailArea').hide(0);
        }

    });

    jQuery(document).ready(function () {

        jQuery('iframe').contents().find("#tinymce").css("background-color", "transparent");
        setTimeout(function () {
            jQuery('#content_ifr').contents().find("#tinymce").css("background-color", "transparent");
            jQuery('iframe').contents().find("#tinymce").css("background-color", "transparent");
        }, 1000);
        setTimeout(function () {
            jQuery('#content_ifr').contents().find("#tinymce").css("background-color", "transparent");
            jQuery('iframe').contents().find("#tinymce").css("background-color", "transparent");
        }, 3000);
        setTimeout(function () {
            jQuery('#content_ifr').contents().find("#tinymce").css("background-color", "transparent");
            jQuery('iframe').contents().find("#tinymce").css("background-color", "transparent");
        }, 7000);

    });
</script>
<?php } ?>