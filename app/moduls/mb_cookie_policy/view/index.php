<?php 
 $positions = array(
    "bottom" => __("Bottom of Site","magicbox"),
    "top" => __("Top of Site","magicbox"),

);
$elementPositions = array(
    "fixed" => __("Fixed","magicbox"),
    "absolute" => __("Absolute","magicbox")
);

?>
<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
    <div class="card bg-light">

        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Cookie Policy Options","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can add a title and description to the cookie notification.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can customize the appearance of the pop-up notification.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can edit the cookie confirmation button design.","magicbox")?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="cookie_policy[status]" id="cookie_policy[status]">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['cookie_policy']['status'] or $options['cookie_policy']['status'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="cookie_policy[status]"><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Cookie Policy Content","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can add a title and description to the cookie notice.","magicbox")?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control" id="cookie_policy[title]" maxlength="650" name="cookie_policy[title]" value="<?php echo $options['cookie_policy']['title']?>" placeholder=" "/>
                            <label class="form-label" for="cookie_policy[title]"><?php echo  __("Title","magicbox") ?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Specify the cookie policy title.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea name="cookie_policy[text_html]" class="form-control" id="cookie_policy[text_html]" maxlength="1000" placeholder=" "><?php echo $options['cookie_policy']['text_html']?></textarea>
                            <label class="form-label" for="cookie_policy[text_html]"><?php echo  __("Text","magicbox") ?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Specify the content of the cookie policy.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Cookie Policy Design","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem rounded-1"><?php echo __("You can customize the appearance of the cookie notification.","magicbox")?></div>
                    </div>
                </div>
            </div>

            <div class="row fixedRow">
                <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-select" id="cookie_policy[position]" name="cookie_policy[position]">
                            <?php foreach ($positions as $key => $value) { ?>
                                <option
                                        value="<?php echo  $key ?>"<?php if ($key == $options['cookie_policy']['position']) {
                                    echo "selected";
                                } ?>><?php echo  $value ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="cookie_policy[position]"><?php echo  __("Position","magicbox") ?></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Determine the position of the Cookie Policy.","magicbox") ?>" style="right:30px;"><i class="fa-solid fa-info"></i></div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-select" name="cookie_policy[element]" id="cookie_policy[element]">
                            <?php foreach ($elementPositions as $key => $value) { ?>
                                <option
                                        value="<?php echo  $key ?>"<?php if ($key == $options['cookie_policy']['element']) {
                                    echo "selected";
                                } ?>><?php echo  $value ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="cookie_policy[element]"><?php echo  __("Element Status","magicbox") ?></label>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-md-3">
                    <div class="form-group">
                        <input class="form-control" id="cookie_policy[padding_top]" name="cookie_policy[padding_top]"
                               value="<?php echo $options['cookie_policy']['padding_top']==""?"10px":$options['cookie_policy']['padding_top']?>" placeholder=" "/>
                        <label class="form-label" for="cookie_policy[padding_top]"><?php echo  __("Padding Top","magicbox") ?></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Add a top padding to the Cookie Policy Area.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <input class="form-control" id="cookie_policy[padding_right]" name="cookie_policy[padding_right]"
                               value="<?php echo $options['cookie_policy']['padding_right']==""?"10px":$options['cookie_policy']['padding_right']?>" placeholder=" "/>
                        <label class="form-label" for="cookie_policy[padding_right]"><?php echo  __("Padding Right","magicbox") ?></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Add a correct padding to the Cookie Policy Area.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <input class="form-control" id="cookie_policy[padding_bottom]" name="cookie_policy[padding_bottom]"
                               value="<?php echo $options['cookie_policy']['padding_bottom']==""?"10px":$options['cookie_policy']['padding_bottom']?>" placeholder=" "/>
                        <label class="form-label" for="cookie_policy[padding_bottom]"><?php echo  __("Padding Bottom","magicbox") ?></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Add a bottom padding to the Cookie Policy Area.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <input class="form-control" id="cookie_policy[padding_left]" name="cookie_policy[padding_left]"
                               value="<?php echo $options['cookie_policy']['padding_left']==""?"10px":$options['cookie_policy']['padding_left']?>" placeholder=" "/>
                        <label class="form-label" for="cookie_policy[padding_left]"><?php echo  __("Padding Left","magicbox") ?></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Add a left padding to the Cookie Policy Area.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-md-3">
                    <div class="form-group">
                        <input class="form-control" id="cookie_policy[margin_top]" name="cookie_policy[margin_top]"
                               value="<?php echo  ($options['cookie_policy']['margin_top']) ?>" placeholder=" "/>
                        <label class="form-label" for="cookie_policy[margin_top]"><?php echo  __("Margin Top","magicbox") ?></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Add a top margin to the Cookie Policy Area.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <input class="form-control" id="cookie_policy[margin_right]" name="cookie_policy[margin_right]"
                               value="<?php echo  ($options['cookie_policy']['margin_right']) ?>" placeholder=" "/>
                        <label class="form-label" for="cookie_policy[margin_right]"><?php echo  __("Margin Right","magicbox") ?></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Add right margin to Cookie Policy Area.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <input class="form-control" id="cookie_policy[margin_bottom]" name="cookie_policy[margin_bottom]"
                               value="<?php echo  ($options['cookie_policy']['margin_bottom']) ?>" placeholder=" "/>
                        <label class="form-label" for="cookie_policy[margin_bottom]"><?php echo  __("Margin Bottom","magicbox") ?></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Add a bottom margin to the Cookie Policy Area.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <input class="form-control" id="cookie_policy[margin_left]" name="cookie_policy[margin_left]"
                               value="<?php echo  ($options['cookie_policy']['margin_left']) ?>" placeholder=" "/>
                        <label class="form-label" for="cookie_policy[margin_left]"><?php echo  __("Margin Left","magicbox") ?></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Add left margin to Cookie Policy Area.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-md-4 col-xl-4 col-xxl-2">
                    <div class="form-group">
                        <input class="form-control" id="cookie_policy_buttons_color" type="text" name="cookie_policy[buttons_color]"
                               value="<?php echo $options['cookie_policy']['buttons_color']==""?"#666666":$options['cookie_policy']['buttons_color']?>" placeholder=" "/>
                        <label class="form-label" for="cookie_policy[buttons_color]"><?php echo  __("Buttons Color","magicbox") ?></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Color of button in Cookie Policy.","magicbox") ?>" style="right=40px;"><i class="fa-solid fa-info"></i></div>
                        <div class="form-color-box" data-input="cookie_policy_buttons_color"></div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-4 col-xxl-2">
                    <div class="form-group">
                        <input class="form-control" id="cookie_policy_buttons_background" type="text" name="cookie_policy[buttons_background]"
                               value="<?php echo $options['cookie_policy']['buttons_background']=="#f9f9f9"?"":$options['cookie_policy']['buttons_background']?>" placeholder=" "/>
                        <label class="form-label" for="cookie_policy_buttons_background"><?php echo  __("Buttons Background","magicbox") ?></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Color of button background in Cookie Policy.","magicbox") ?>" style="right=40px;"><i class="fa-solid fa-info"></i></div>
                        <div class="form-color-box" data-input="cookie_policy_buttons_background"></div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-4 col-xxl-2">
                    <div class="form-group">
                        <input class="form-control" id="cookie_policy[buttons_radius]" name="cookie_policy[buttons_radius]"
                               value="<?php echo $options['cookie_policy']['buttons_radius']==""?"3px":$options['cookie_policy']['buttons_radius']?>" placeholder=" "/>
                        <label class="form-label" for="cookie_policy[buttons_radius]"><?php echo  __("Buttons Radius","magicbox") ?></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Radius of button in Cookie Policy.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-6 col-xxl-3">
                    <div class="form-group">
                        <input class="form-control" id="cookie_policy[buttons_padding]" name="cookie_policy[buttons_padding]"
                               value="<?php echo $options['cookie_policy']['buttons_padding']==""?"5px 10px":$options['cookie_policy']['buttons_padding']?>" placeholder=" "/>
                        <label class="form-label" for="cookie_policy[buttons_padding]"><?php echo  __("Buttons Padding","magicbox") ?></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Filling in the buttons in the Cookie Policy","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-6 col-xxl-3">
                    <div class="form-group">
                        <input class="form-control" id="cookie_policy[buttons_margin]" name="cookie_policy[buttons_margin]"
                               value="<?php echo $options['cookie_policy']['buttons_margin']==""?"0px 10px":$options['cookie_policy']['buttons_margin']?>" placeholder=" "/>
                        <label class="form-label" for="cookie_policy[buttons_margin]"><?php echo  __("Buttons Margin","magicbox") ?></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Margins of buttons in Cookie Policy.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" id="cookie_policy[extra_button_name]" name="cookie_policy[extra_button_name]"
                               value="<?php echo  ($options['cookie_policy']['extra_button_name']) ?>" placeholder=" "/>
                        <label class="form-label" for="cookie_policy[extra_button_name]"><?php echo  __("Extra Button Name","magicbox") ?></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Add Extra Button.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" id="cookie_policy[extra_button_link]" name="cookie_policy[extra_button_link]"
                               value="<?php echo  ($options['cookie_policy']['extra_button_link']) ?>" placeholder=" "/>
                        <label class="form-label" for="cookie_policy[extra_button_link]"><?php echo  __("Extra Button Link","magicbox") ?></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Enter the link of the button you added.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" id="cookie_policy_background" name="cookie_policy[background]"
                               value="<?php echo $options['cookie_policy']['background']==""?"#666666":$options['cookie_policy']['background']?>" placeholder=" "/>
                        <label class="form-label" for="cookie_policy_background"><?php echo  __("Background","magicbox") ?></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Set the background color of the cookie policy area.","magicbox") ?>" style="right:40px;"><i class="fa-solid fa-info"></i></div>
                        <div class="form-color-box" data-input="cookie_policy_background"></div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" id="cookie_policy_color" name="cookie_policy[color]"
                               value="<?php echo $options['cookie_policy']['color']==""?"#ffffff":$options['cookie_policy']['color']?>" placeholder=" "/>
                        <label class="form-label" for="cookie_policy_color"><?php echo  __("Color","magicbox") ?></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Set the color of the text in the cookie policy.","magicbox") ?>" style="right:40px;"><i class="fa-solid fa-info"></i></div>
                        <div class="form-color-box" data-input="cookie_policy_color"></div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <input class="form-control" id=""cookie_policy[font_family] name="cookie_policy[font_family]"
                               value="<?php echo  $options['cookie_policy']['font_family'] ?>" placeholder=" "/>
                        <label class="form-label" for="cookie_policy[font_family]"><?php echo  __("Font Family","magicbox") ?></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Specify the font family.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <input class="form-control" id="cookie_policy[font_size]" name="cookie_policy[font_size]"
                               value="<?php echo  empty($options['cookie_policy']['font_size'])==true?"14px":$options['cookie_policy']['font_size'] ?>" placeholder=" "/>
                        <label class="form-label" for="cookie_policy[font_size]"><?php echo  __("Font Size","magicbox") ?></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Set the size of the text in the cookie policy.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a>
        </div>
    </div>
</form>

