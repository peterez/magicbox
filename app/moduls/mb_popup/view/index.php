<script>
    var isMirrorred = {};
    var codeMirrorVals = {};
</script>
<form method="post" class="theForm theForm-<?php echo sanitize_text_field($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":sanitize_text_field($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Popup","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can edit the popup content with the editor.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can edit the appearance of the popup.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can add javascript tracking tags to your popup.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can choose how many times and how long the popup will appear.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can select the pages you want the popup to open.","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-12 col-lg-4">
                        <div class="input-group">
                            <select class="form-select" name="popup[status]" id="popup[status]">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['popup']['status'] or $options['popup']['status'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="input-group-text" for="popup[status]"><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Popup Content","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can add automatic popups to your website","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <?php 
             $settings = array( 'textarea_name' => 'popup[popup_html]');
            wp_editor($options['popup']['popup_html'], "popup_popup_html",$settings);
            ?>
        </div>
    </div>

    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Popup Options","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can add automatic popups to your website","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="row fixedRow">
                <div class="col-lg-4 col-xxl-3">
                    <div class="form-group">
                        <?php 
                         $closes = array(
                            "1" => __("Just width close button","magicbox"),
                            "2" => __("Close button & Focusout popup"),
                        );
                        ?>
                        <select name="popup[close_type]" class="form-control" id="popup[close_type]">
                            <?php foreach ($closes as $key => $value) { ?>
                                <option <?php echo  $options['popup']['close_type'] == $key ? "selected" : "" ?>
                                        value="<?php echo  $key ?>"><?php echo  $value ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="popup[close_type]"><?php echo  __("Repeat","magicbox") ?></label>
                    </div>
                </div>

                <div class="col-lg-4 col-xxl-3">
                    <div class="form-group">
                        <?php 
                         $repeats = array(
                            "1" => __("One Time","magicbox"),
                            "2" => __("Everytime","magicbox"),
                        );
                        ?>
                        <select name="popup[repeat]" class="form-control" id="popup[repeat]">
                            <?php foreach ($repeats as $key => $value) { ?>
                                <option <?php echo  $options['popup']['repeat'] == $key ? "selected" : "" ?>
                                        value="<?php echo  $key ?>"><?php echo  $value ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="popup[repeat]"><?php echo  __("Repeat","magicbox") ?></label>
                    </div>
                </div>

                <div class="col-lg-4 col-xxl-3">
                    <div class="form-group">
                        <input  class="form-control" name="popup[zindex]" id="popup[zindex]"
                                value="<?php echo $options['popup']['zindex']==""?"999":$options['popup']['zindex'] ?>" placeholder=" "/>
                        <label class="form-label" for="popup[zindex]"><?php echo  __("Z-index","magicbox") ?></label>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-4 col-xxl-3">
                    <div class="form-group">
                        <?php 
                         $posisions = array(
                            "1" => __("Center","magicbox"),
                            "6" => __("Top Center","magicbox"),
                            "2" => __("Left Top","magicbox"),
                            "3" => __("Right Top","magicbox"),
                            "4" => __("Left Bottom","magicbox"),
                            "5" => __("Right Bottom","magicbox"),
                        );
                        ?>
                        <select name="popup[position]" class="form-control" id="popup[position]">
                            <?php foreach ($posisions as $key => $value) { ?>
                                <option <?php echo  $options['popup']['position'] == $key ? "selected" : "" ?>
                                        value="<?php echo  $key ?>"><?php echo  $value ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="popup[position]"><?php echo  __("Position","magicbox") ?></label>
                    </div>
                </div>
                <div class="col-lg-4 col-xxl-3">
                    <div class="form-group">
                        <select name="popup[transparent_background]" class="form-control" id="popup[transparent_background]">
                            <?php foreach ($yesNo as $key => $value) { ?>
                                <option <?php echo  $options['popup']['transparent_background'] == $key ? "selected" : "" ?>
                                        value="<?php echo  $key ?>"><?php echo  $value ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="popup[transparent_background]"><?php echo  __("Transparent Background","magicbox") ?></label>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-4 col-xxl-3">
                    <div class="form-group">
                        <input  class="form-control" name="popup[min_width]" id="popup[min_width]"
                                value="<?php echo $options['popup']['min_width']==""?"200px":$options['popup']['min_width']?>" placeholder=" "/>
                        <label class="form-label" for="popup[min_width]"><?php echo  __("Min Width","magicbox") ?></label>
                        <span class="form-info" data-mb="pop" data-mb-title="<?php echo  __("Min Width","magicbox") ?>" data-mb-content="<?php echo  __("Min width content area","magicbox") ?>"><i class="fa-solid fa-info"></i></span>
                    </div>
                </div>
                <div class="col-lg-4 col-xxl-3">
                    <div class="form-group">
                        <input  class="form-control" name="popup[min_height]" id="popup[min_height]"
                                value="<?php echo $options['popup']['min_height']==""?"120px":$options['popup']['min_height']?>" placeholder=" "/>
                        <label class="form-label" for="popup[min_height]"><?php echo  __("Min Height","magicbox") ?></label>
                        <span class="form-info" data-mb="pop" data-mb-title="<?php echo  __("Min Height","magicbox") ?>" data-mb-content="<?php echo  __("Min height content area","magicbox") ?>"><i class="fa-solid fa-info"></i></span>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-3 col-xxl-3">
                    <div class="form-group">
                        <input  class="form-control" name="popup[top]" id="popup[top]"
                                value="<?php echo  ($options['popup']['top']) == "" ? "5%" : ($options['popup']['top']) ?>" placeholder=" "/>
                        <label class="form-label" for="popup[top]"><?php echo  __("Top","magicbox") ?></label>
                    </div>
                </div>
                <div class="col-md-3 col-xxl-3">
                    <div class="form-group">
                        <input  class="form-control" name="popup[right]" id="popup[right]"
                                value="<?php echo  ($options['popup']['right']) == "" ? "3%" : ($options['popup']['right']) ?>" placeholder=" "/>
                        <label class="form-label" for="popup[right]"><?php echo  __("Right","magicbox") ?></label>
                    </div>
                </div>
                <div class="col-md-3 col-xxl-3">
                    <div class="form-group">
                        <input  class="form-control" name="popup[bottom]" id="popup[bottom]"
                                value="<?php echo  ($options['popup']['bottom']) == "" ? "5%" : ($options['popup']['bottom']) ?>" placeholder=" "/>
                        <label class="form-label" for="popup[bottom]"><?php echo  __("Bottom","magicbox") ?></label>
                    </div>
                </div>
                <div class="col-md-3 col-xxl-3">
                    <div class="form-group">
                        <input class="form-control" name="popup[left]" id="popup[left]"
                               value="<?php echo  ($options['popup']['left']) == "" ? "3%" : ($options['popup']['left']) ?>" placeholder=" "/>
                        <label class="form-label" for="popup[left]"><?php echo  __("Left","magicbox") ?></label>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-6 col-xxl-3">
                    <div class="form-group">
                        <input type="number" min="0" class="form-control" name="popup[open_popup_delay]" id="popup[open_popup_delay]"
                               value="<?php echo  intval($options['popup']['open_popup_delay']) ?>" placeholder=" "/>
                        <label class="form-label" for="popup[open_popup_delay]"><?php echo  __("Wait Second For Open Popup","magicbox") ?></label>
                        <span class="form-info" data-mb="pop" data-mb-title="<?php echo  __("Wait Second For Open Popup","magicbox") ?>" data-mb-content="<?php echo  __("Delay time for open popup","magicbox") ?>"><i class="fa-solid fa-info"></i></span>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-3">
                    <div class="form-group">
                        <input type="number" min="0" class="form-control" name="popup[close_button_delay]" id="popup[close_button_delay]"
                               value="<?php echo  intval($options['popup']['close_button_delay']) ?>" placeholder=" "/>
                        <label class="form-label" for="popup[close_button_delay]"><?php echo  __("Wait Second For Close Button","magicbox") ?></label>
                        <span class="form-info" data-mb="pop" data-mb-title="<?php echo  __("Wait Second For Close Button","magicbox") ?>" data-mb-content="<?php echo  __("Delay time for close button","magicbox") ?>"><i class="fa-solid fa-info"></i></span>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-3">
                    <div class="form-group">
                        <input type="number" min="0" class="form-control" name="popup[auto_close_delay]" id="popup[auto_close_delay]"
                               value="<?php echo  intval($options['popup']['auto_close_delay']) ?>" placeholder=" "/>
                        <label class="form-label" for="popup[auto_close_delay]"><?php echo  __("Auto Close Second","magicbox") ?></label>
                        <span class="form-info" data-mb="pop" data-mb-title="<?php echo  __("Auto Close Second","magicbox") ?>" data-mb-content="<?php echo  __("Delay time for auto close. It's never close if you set as zero ( 0 )","magicbox") ?>"><i class="fa-solid fa-info"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Javascript Hooks","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can add automatic popups to your website","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="row fixedRow">
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea name="popup[javascript_hook_open_popup]" id="popup_javascript_hook_open_popup" placeholder="" class="form-control"><?php echo $options['popup']['javascript_hook_open_popup']?></textarea>
                        <label class="form-label" for="popup_javascript_hook_open_popup"><?php echo  __("When open popup","magicbox") ?> <small>(<?php echo __('Without &lt;script&gt; tag',"magicbox")?>)</small></label>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea name="popup[javascript_hook_close_popup]" id="popup_javascript_hook_close_popup" placeholder="" class="form-control"><?php echo $options['popup']['javascript_hook_close_popup']?></textarea>
                        <label class="form-label" for="popup_javascript_hook_close_popup"><?php echo  __("When close popup","magicbox") ?><small>(<?php echo __('Without &lt;script&gt; tag',"magicbox")?>)</small></label>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea name="popup[custom_js]" id="popup_custom_js" placeholder="" class="form-control"><?php echo $options['popup']['custom_js']?></textarea>
                        <label class="form-label" for="popup_custom_js"><?php echo  __("Custom JS","magicbox") ?> <small>(<?php echo __('Without &lt;script&gt; tag',"magicbox")?>)</small></label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Choose Pages","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can add automatic popups to your website","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="row fixedRow">
                <div class="col-12">
                    <div class="mb-3">
                        <div class="form-check-group">
                            <?php $postTypes = $theClass->magicBox->postTypes();
                            foreach ($postTypes as $key => $value) {
                                ?>
                                <div class="form-check">
                                    <input class="form-check-input" <?php echo $options['popup']['type'][$value['name']] == "1"?"checked":""?> type="checkbox" name="popup[type][<?php echo $value['name']?>]" value="1" id="_<?php echo $value['name']?>">
                                    <label class="form-check-label" for="_<?php echo $value['name']?>">
                                        <span><?php echo  $value['label'] ?></span>
                                    </label>
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

    setAsCodeMirror("popup_javascript_hook_open_popup","text/typescript-jsx");
    setAsCodeMirror("popup_javascript_hook_close_popup","text/typescript-jsx");
    setAsCodeMirror("popup_custom_js","text/typescript-jsx");

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
