<?php
$openLink = array("_blank" => __("Open New Page", "magicbox"), "_self" => __("Open Current Page", "magicbox"), "_parent" => __("Open Parent Page", "magicbox"),);

$rels = array("nofollow" => "Nofollow", "dofollow" => "Dofollow", "muse" => "Muse",);

$liDisplay = array("block" => __("Block", "magicbox"), "inline-block" => __("Inline Block", "magicbox"), "inline" => __("Inline", "magicbox"),);

$iconSets = array("cb1" => __("Set 1", "magicbox"), "cb2" => __("Set 2", "magicbox"),);

$socials = array("facebook" => __("Facebook", "magicbox"), "twitter" => __("Twitter", "magicbox"), "facebookmessenger" => __("Facebook Messenger", "magicbox"), "instagram" => __("Instagram", "magicbox"), "linkedin" => __("Linkedin", "magicbox"), "pinterest" => __("Pinterest", "magicbox"), "whatsapp" => __("Whatsapp", "magicbox"), "telegram" => __("Telegram", "magicbox"), "tumblr" => __("Tumblr", "magicbox"), "youtube" => __("Youtube", "magicbox"), "googlemaps" => __("Google Maps", "magicbox"), "onlyfans" => __("OnlyFans", "magicbox"), "vkontakte" => __("Vkontakte", "magicbox"), "tiktok" => __("TikTok", "magicbox"), "wechat" => __("WeChat", "magicbox"), "reddit" => __("Reddit", "magicbox"), "vimeo" => __("Vimeo", "magicbox"), "vimeo" => __("Vimeo", "magicbox"), "dailymotion" => __("Dailymotion", "magicbox"), "twitch" => __("Twitch", "magicbox"), "discord" => __("Discord", "magicbox"), "behance" => __("Behance", "magicbox"), "dribbble" => __("Dribbble", "magicbox"), "tencentqq" => __("Tencent QQ", "magicbox"), "viber" => __("Viber", "magicbox"), "medium" => __("Medium", "magicbox"), "blogspot" => __("Blogspot", "magicbox"), "wordpress" => __("Wordpress", "magicbox"),

                 "phone"    => __("Phone", "magicbox"), "mail" => __("Mail", "magicbox"), "other" => __("Other", "magicbox"));

$textPositions = array("inline" => __("Inline", "magicbox"), "bottom" => __("Bottom", "magicbox"), "top" => __("Top", "magicbox"));

$openingEffects = array("show" => __("Show", "magicbox"), "fadeIn" => __("Fade", "magicbox"), "slideDown" => __("Slide", "magicbox"));

$hoverEffects = array("1" => __("Zoom Icon", "magicbox"), /* imaj büyültme */
                      "2" => __("Zoom Icon & Display Text", "magicbox"), /* imaj büyültme ve yazı gösterme */
                      "3" => __("Margin Right-Left", "magicbox"), /* imajın sağını solunu genişletme */
                      "4" => __("Margin Top-Bottom", "magicbox"), /* imajın altını üsünü genişletme */);



?>
<form method="post" class="theForm theForm-<?php echo sanitize_text_field($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":sanitize_text_field($_REQUEST['method'])?>">
<div class="card bg-light">

    <div class="card-header">
        <h6 class="my-0"><?php echo __("Contact Button Settings", "magicbox") ?></h6>
    </div>

    <div class="card-body">
        <div class="alert alert-custom alert-light-primary " role="alert">
            <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
            <div class="alert-text">
                <div class="w-100 d-flex flex-wrap gap-2">
                    <div class="infoItem"><?php echo __("You can add contact icons such as Facebook, Instagram, phone, mail.", "magicbox") ?></div>
                    <div class="infoItem"><?php echo __("You can show the contact buttons at the top, right, bottom positions of your page.", "magicbox") ?></div>
                    <div class="infoItem"><?php echo __("You can adjust the settings of the buttons as you wish.", "magicbox") ?></div>
                    <div class="infoItem"><?php echo __("You can change the opening type of the dialog.", "magicbox") ?></div>
                    <div class="infoItem"><?php echo __("You can specify whether the communication widget is displayed on or off.", "magicbox") ?></div>
                    <div class="infoItem"><?php echo __("You can show the communication widget on any page of your site.", "magicbox") ?></div>
                </div>
            </div>
        </div>

        <div class="container-mb">
            <div class="row fixedRow">
                <div class="col-lg-4">
                    <div class="input-group">
                        <select class="form-select" name="contact_buttons[status]" id="contact_buttons[status]">
                            <?php foreach ($activePassive as $key => $value) { ?>
                                <option
                                    value="<?php echo $key ?>"<?php if ($key == $options['contact_buttons']['status'] or $options['contact_buttons']['status'] == "" and $key == 2){
                                    echo "selected";
                                } ?>><?php echo $value ?></option>
                            <?php } ?>
                        </select>
                        <label class="input-group-text" for="contact_buttons[status]"><?php echo __("Status", "magicbox") ?></label>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<div class="card bg-light">

    <div class="card-header">
        <h6 class="my-0"><?php echo __("Contact Buttons", "magicbox") ?></h6>
    </div>
    <div class="card-body">
        <div class="alert alert-custom alert-light-primary " role="alert">
            <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
            <div class="alert-text">
                <div class="w-100 d-flex flex-wrap gap-2">
                    <div class="infoItem"><?php echo __("You can add the addresses of pages such as phone, Whatsapp, Skype, Instagram, Youtube to your Web Page", "magicbox") ?></div>
                </div>
            </div>
        </div>
        <div class="container-mb">
            <div class="row fixedRow">
                <div class="col-12">
                    <div class="addHere allButtons">
                        <?php foreach ($options['contact_buttons']['buttons'] as $uniq => $item) { ?>

                            <div class="socialItem item_<?php echo $uniq ?>">
                                <div class="row fixedRow align-items-center">
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <select class="form-control iconSelector"
                                                    name="contact_buttons[buttons][<?php echo $uniq ?>][type]" id="contact_buttons[buttons][<?php echo $uniq ?>][type]" data-uniq="<?php echo $uniq ?>">
                                                <?php foreach ($socials as $key => $value) { ?>
                                                    <option <?php echo $item['type'] == $key? "selected" : "" ?>
                                                        value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                <?php } ?>
                                            </select>
                                            <label for="contact_buttons[buttons][<?php echo $uniq ?>][type]" class="form-label"><?php echo __("Icon", "magicbox") ?></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 text-center icon">
                                        <img src="<?php echo $GLOBALS{'_mb_icon_url_'} ?>/social/cb1/<?php echo $item['type']; ?>.png" height="30px">
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <input type="text" name="contact_buttons[buttons][<?php echo $uniq ?>][url]" value="<?php echo $item['url'] ?>" id="contact_buttons[buttons][<?php echo $uniq ?>][url]" placeholder=" " class="form-control url"/>
                                            <label for="contact_buttons[buttons][<?php echo $uniq ?>][url]" class="form-label"><?php echo __("Url", "magicbox") ?> (<?php echo __("Required", "magicbox") ?>)</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input type="text" name="contact_buttons[buttons][<?php echo $uniq ?>][name]" id="contact_buttons[buttons][<?php echo $uniq ?>][name]" value="<?php echo $item['name'] ?>" placeholder=" " class="form-control name"/>
                                            <label for="contact_buttons[buttons][<?php echo $uniq ?>][name]" class="form-label"><?php echo __("Name", "magicbox") ?> (<?php echo __("Optional", "magicbox") ?>)</label>
                                        </div>

                                    </div>
                                    <div class="col-lg-1">
                                        <div class="remove btn btn-danger removeButton" data-uniq="<?php echo $uniq ?>">
                                            <i class="fa-solid fa-xmark"></i></div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="card bg-light">
    <div class="card-header">
        <h6 class="my-0"><?php echo __("Contact Widget Settings", "magicbox") ?></h6>
    </div>

    <div class="card-body">
        <div class="alert alert-custom alert-light-primary " role="alert">
            <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
            <div class="alert-text">
                <div class="w-100 d-flex flex-wrap gap-2">
                    <div class="infoItem"><?php echo __("You can add the addresses of pages such as phone, Whatsapp, Skype, Instagram, Youtube to your Web Page", "magicbox") ?></div>
                </div>
            </div>
        </div>
        <div class="container-mb">
            <div class="row fixedRow">
                <div class="col-lg-4">
                    <div class="input-group">
                        <select class="form-select" name="contact_buttons[position]" id="contact_buttons[position]">
                            <?php foreach ($theClass->buttonPositions as $key => $value) { ?>
                                <option
                                    value="<?php echo $key ?>"<?php if ($key == $options['contact_buttons']['position']){
                                    echo "selected";
                                } ?>><?php echo $value ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="contact_buttons[position]"><?php echo __("Positions", "magicbox") ?></label>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" placeholder=" " name="contact_buttons[z_index]"
                               value="<?php echo $options['contact_buttons']['z_index'] ?>" class="form-control" id="contact_buttons[z_index]"/>
                        <label class="form-label" for="contact_buttons[z_index]"><?php echo __("Z-Index", "magicbox") ?></label>

                        <div class="form-info" data-mb="pop" data-mb-title="<?php echo __("Z-Index", "magicbox") ?>" data-mb-content="30px, 5rem, 10pt <?php echo __("Etc", "magicbox") ?>">
                            <i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-12"><h3 class="innerTitle"><?php echo __("Margin Settings", "magicbox") ?></h3></div>

                <div class="clearfix"></div>

                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" placeholder=" "
                               name="contact_buttons[margin_left]" value="<?php echo $options['contact_buttons']['margin_left'] == ""? "15px" : $options['contact_buttons']['margin_left'] ?>"
                               class="form-control" id="contact_buttons[margin_left]"/>
                        <label class="form-label" for="contact_buttons[margin_left]"><?php echo __("Margin Left", "magicbox") ?></label>

                        <div class="form-info" data-mb="pop" data-mb-title="<?php echo __("Margin Left", "magicbox") ?>" data-mb-content="30px, 5rem, 10pt <?php echo __("Etc", "magicbox") ?>">
                            <i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" placeholder=" "
                               name="contact_buttons[margin_right]" value="<?php echo $options['contact_buttons']['margin_right'] == ""? "15px" : $options['contact_buttons']['margin_right'] ?>"
                               class="form-control" id="contact_buttons[margin_right]"/>
                        <label class="form-label" for="contact_buttons[margin_right]"><?php echo __("Margin Right", "magicbox") ?></label>

                        <div class="form-info" data-mb="pop" data-mb-title="<?php echo __("Margin Right", "magicbox") ?>" data-mb-content="30px, 5rem, 10pt <?php echo __("Etc", "magicbox") ?>">
                            <i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" placeholder=" "
                               name="contact_buttons[margin_top]" value="<?php echo $options['contact_buttons']['margin_top'] == ""? "15px" : $options['contact_buttons']['margin_top'] ?>"
                               class="form-control" id="contact_buttons[margin_top]"/>
                        <label class="form-label" for="contact_buttons[margin_top]"><?php echo __("Margin Top", "magicbox") ?></label>

                        <div class="form-info" data-mb="pop" data-mb-title="<?php echo __("Margin Top", "magicbox") ?>" data-mb-content="30px, 5rem, 10pt <?php echo __("Etc", "magicbox") ?>">
                            <i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" placeholder=" "
                               name="contact_buttons[margin_bottom]" value="<?php echo $options['contact_buttons']['margin_bottom'] == ""? "15px" : $options['contact_buttons']['margin_bottom'] ?>"
                               class="form-control" id="contact_buttons[margin_bottom]"/>
                        <label class="form-label" for="contact_buttons[margin_bottom]"><?php echo __("Margin Bottom", "magicbox") ?></label>

                        <div class="form-info" data-mb="pop" data-mb-title="<?php echo __("Margin Bottom", "magicbox") ?>" data-mb-content="30px, 5rem, 10pt <?php echo __("Etc", "magicbox") ?>">
                            <i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-12"><h3 class="innerTitle"><?php echo __("Padding Settings", "magicbox") ?></h3></div>

                <div class="clearfix"></div>

                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" placeholder=" "
                               name="contact_buttons[padding_left]" value="<?php echo $options['contact_buttons']['padding_left'] == ""? "15px" : $options['contact_buttons']['padding_left'] ?>"
                               class="form-control" id="contact_buttons[padding_left]"/>
                        <label class="form-label" for="contact_buttons[padding_left]"><?php echo __("Padding Left", "magicbox") ?></label>

                        <div class="form-info" data-mb="pop" data-mb-title="<?php echo __("Padding Left", "magicbox") ?>" data-mb-content="30px, 5rem, 10pt <?php echo __("Etc", "magicbox") ?>">
                            <i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" placeholder=" "
                               name="contact_buttons[padding_right]" value="<?php echo $options['contact_buttons']['padding_right'] == ""? "15px" : $options['contact_buttons']['padding_right'] ?>"
                               class="form-control" id="contact_buttons[padding_right]"/>
                        <label class="form-label" for="contact_buttons[padding_right]"><?php echo __("Padding Right", "magicbox") ?></label>

                        <div class="form-info" data-mb="pop" data-mb-title="<?php echo __("Padding Right", "magicbox") ?>" data-mb-content="30px, 5rem, 10pt <?php echo __("Etc", "magicbox") ?>">
                            <i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" placeholder=" "
                               name="contact_buttons[padding_top]" value="<?php echo $options['contact_buttons']['padding_top'] == ""? "15px" : $options['contact_buttons']['padding_top'] ?>"
                               class="form-control" id="contact_buttons[padding_top]"/>
                        <label class="form-label" for="contact_buttons[padding_top]"><?php echo __("Padding Top", "magicbox") ?></label>

                        <div class="form-info" data-mb="pop" data-mb-title="<?php echo __("Padding Top", "magicbox") ?>" data-mb-content="30px, 5rem, 10pt <?php echo __("Etc", "magicbox") ?>">
                            <i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" placeholder=" "
                               name="contact_buttons[padding_bottom]" value="<?php echo $options['contact_buttons']['padding_bottom'] == ""? "15px" : $options['contact_buttons']['padding_bottom'] ?>"
                               class="form-control" id="contact_buttons[padding_bottom]"/>
                        <label class="form-label" for="contact_buttons[padding_bottom]"><?php echo __("Padding Bottom", "magicbox") ?></label>

                        <div class="form-info" data-mb="pop" data-mb-title="<?php echo __("Padding Bottom", "magicbox") ?>" data-mb-content="30px, 5rem, 10pt <?php echo __("Etc", "magicbox") ?>">
                            <i class="fa-solid fa-info"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card bg-light">
    <div class="card-header">
        <h6 class="my-0"><?php echo __("Button Settings", "magicbox") ?></h6>
    </div>

    <div class="card-body">
        <div class="alert alert-custom alert-light-primary " role="alert">
            <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
            <div class="alert-text">
                <div class="w-100 d-flex flex-wrap gap-2">
                    <div class="infoItem"><?php echo __("You can add the addresses of pages such as phone, Whatsapp, Skype, Instagram, Youtube to your Web Page", "magicbox") ?></div>
                </div>
            </div>
        </div>
        <div class="container-mb">
            <div class="row fixedRow">
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text" placeholder=" "
                               name="contact_buttons[item_margin]" value="<?php echo $options['contact_buttons']['item_margin'] == ""? "5px" : $options['contact_buttons']['item_margin'] ?>"
                               class="form-control" id="contact_buttons[item_margin]"/>
                        <label class="form-label" for="contact_buttons[item_margin]"><?php echo __("Buttons Margin", "magicbox") ?></label>

                        <div class="form-info" data-mb="pop" data-mb-title="<?php echo __("Buttons Margin", "magicbox") ?>" data-mb-content="30px, 5rem, 10pt <?php echo __("Etc", "magicbox") ?>">
                            <i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="input-group">
                        <select class="form-select" name="contact_buttons[item_display]" id="contact_buttons[item_display]">
                            <?php foreach ($liDisplay as $key => $value) { ?>
                                <option
                                    value="<?php echo $key ?>"<?php if ($key == $options['contact_buttons']['item_display']){
                                    echo "selected";
                                } ?>><?php echo $value ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="contact_buttons[item_display]"><?php echo __("Buttons List Style", "magicbox") ?></label>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text" placeholder=" "
                               name="contact_buttons[font_size]" value="<?php echo $options['contact_buttons']['font_size'] ?>"
                               class="form-control" id="contact_buttons[font_size]"/>
                        <label class="form-label" for="contact_buttons[font_size]"><?php echo __("Font Size", "magicbox") ?></label>

                        <div class="form-info" data-mb="pop" data-mb-title="<?php echo __("Font Size", "magicbox") ?>" data-mb-content="30px, 5rem, 10pt <?php echo __("Etc", "magicbox") ?>">
                            <i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-lg-4">
                    <div class="input-group">
                        <input type="text" placeholder=" " name="contact_buttons[width]"
                               value="<?php echo $options['contact_buttons']['width'] ?>" class="form-control" id="contact_buttons[width]"/>
                        <label class="form-label" for="contact_buttons[width]"><?php echo __("Buttons Width", "magicbox") ?></label>

                        <div class="form-info" data-mb="pop" data-mb-title="<?php echo __("Buttons Width", "magicbox") ?>" data-mb-content="30px, 5rem, 10pt <?php echo __("Etc", "magicbox") ?>">
                            <i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="input-group">
                        <input type="text" placeholder=" " name="contact_buttons[height]"
                               value="<?php echo $options['contact_buttons']['height'] ?>" class="form-control" id="contact_buttons[height]"/>
                        <label class="form-label" for="contact_buttons[height]"><?php echo __("Buttons Height", "magicbox") ?></label>

                        <div class="form-info" data-mb="pop" data-mb-title="<?php echo __("Buttons Height", "magicbox") ?>" data-mb-content="30px, 5rem, 10pt <?php echo __("Etc", "magicbox") ?>">
                            <i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="input-group">
                        <select class="form-select" name="contact_buttons[text_position]" id="contact_buttons[text_position]">
                            <?php foreach ($textPositions as $key => $value) { ?>
                                <option
                                    value="<?php echo $key ?>"<?php if ($key == $options['contact_buttons']['text_position']){
                                    echo "selected";
                                } ?>><?php echo $value ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="contact_buttons[target]"><?php echo __("Text Position", "magicbox") ?></label>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-lg-4">
                    <div class="input-group">
                        <select class="form-select" name="contact_buttons[target]" id="contact_buttons[target]">
                            <?php foreach ($openLink as $key => $value) { ?>
                                <option
                                    value="<?php echo $key ?>"<?php if ($key == $options['contact_buttons']['target']){
                                    echo "selected";
                                } ?>><?php echo $value ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="contact_buttons[target]"><?php echo __("Target", "magicbox") ?></label>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="input-group">
                        <select class="form-select" name="contact_buttons[rel]" id="contact_buttons[rel]">
                            <?php foreach ($rels as $key => $value) { ?>
                                <option
                                    value="<?php echo $key ?>"<?php if ($key == $options['contact_buttons']['rel'] and $key == 2){
                                    echo "selected";
                                } ?>><?php echo $value ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="contact_buttons[rel]"><?php echo __("Rel Tag", "magicbox") ?></label>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="input-group">
                        <select class="form-select iconSet" name="contact_buttons[icon_set]" id="contact_buttons[icon_set]">
                            <?php foreach ($iconSets as $key => $value) { ?>
                                <option
                                    value="<?php echo $key ?>"<?php if ($key == $options['contact_buttons']['icon_set']){
                                    echo "selected";
                                } ?>><?php echo $value ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="contact_buttons[icon_set]"><?php echo __("Icon Set", "magicbox") ?></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card bg-light">
    <div class="card-header">
        <h6 class="my-0"><?php echo __("Effects Setting", "magicbox") ?></h6>
    </div>

    <div class="card-body">
        <div class="alert alert-custom alert-light-primary " role="alert">
            <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
            <div class="alert-text">
                <div class="w-100 d-flex flex-wrap gap-2">
                    <div class="infoItem"><?php echo __("You can add the addresses of pages such as phone, Whatsapp, Skype, Instagram, Youtube to your Web Page", "magicbox") ?></div>
                </div>
            </div>
        </div>
        <div class="container-mb">
            <div class="row fixedRow">
                <div class="col-lg-4">
                    <div class="input-group">
                        <select class="form-select" name="contact_buttons[opening_effect]" id="contact_buttons[opening_effect]">
                            <?php foreach ($openingEffects as $key => $value) { ?>
                                <option
                                    value="<?php echo $key ?>"<?php if ($key == $options['contact_buttons']['opening_effect']){
                                    echo "selected";
                                } ?>><?php echo $value ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="contact_buttons[opening_effect]"><?php echo __("Opening Effects", "magicbox") ?></label>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="input-group">
                        <input type="text" placeholder=" " name="contact_buttons[opening_effect_delay]"
                               value="<?php echo $options['contact_buttons']['opening_effect_delay'] ?>" class="form-control" id="contact_buttons[opening_effect_delay]"/>
                        <label class="form-label mbJustNumeric" for="contact_buttons[opening_effect_delay]"><?php echo __("Opening Effect Speed", "magicbox") ?></label>

                        <div class="form-info" data-mb="pop" data-mb-title="<?php echo __("Opening Effect Speed", "magicbox") ?>" data-mb-content="250, 2000 <?php echo __("Etc", "magicbox") ?>">
                            <i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="input-group">
                        <input type="text" placeholder=" " name="contact_buttons[opening_effect_speed]"
                               value="<?php echo $options['contact_buttons']['opening_effect_speed'] ?>" class="form-control" id="contact_buttons[opening_effect_speed]"/>
                        <label class="form-label mbJustNumeric" for="contact_buttons[opening_effect_speed]"><?php echo __("Opening Effect Speed", "magicbox") ?></label>

                        <div class="form-info" data-mb="pop" data-mb-title="<?php echo __("Opening Effect Speed", "magicbox") ?>" data-mb-content="250, 2000 <?php echo __("Etc", "magicbox") ?>">
                            <i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-lg-4">
                    <div class="input-group">
                        <select class="form-select" placeholder=" " name="contact_buttons[hover_effect]" id="contact_buttons[hover_effect]">
                            <?php foreach ($hoverEffects as $key => $value) { ?>
                                <option
                                    value="<?php echo $key ?>"<?php if ($key == $options['contact_buttons']['hover_effect']){
                                    echo "selected";
                                } ?>><?php echo $value ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="contact_buttons[hover_effect]"><?php echo __("Hover Effects", "magicbox") ?></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card bg-light">

    <div class="card-header">
        <h6 class="my-0"><?php echo __("Fab Settings", "magicbox") ?></h6>
    </div>

    <div class="card-body">
        <div class="alert alert-custom alert-light-primary " role="alert">
            <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
            <div class="alert-text">
                <div class="w-100 d-flex flex-wrap gap-2">
                    <div class="infoItem"><?php echo __("You can add the addresses of pages such as phone, Whatsapp, Skype, Instagram, Youtube to your Web Page", "magicbox") ?></div>
                </div>
            </div>
        </div>
        <div class="container-bg">
            <div class="row fixedRow">
                <div class="col-lg-3">
                    <div class="input-group">
                        <?php
                        /*
                       foreach ($activePassive as $key => $value) {
                           ?>
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" <?php echo  $options['contact_buttons']['fab'] == $key? "checked" : "" ?> type="checkbox" name="contact_buttons[fab]" value="<?php echo $key?>" id="fab_<?php echo  $key ?>">
                               <label class="form-check-label" for="fab_<?php echo  $key ?>">
                                   <?php echo  $value ?>
                               </label>
                           </div>

                       <?php } */
                        ?>

                        <div class="form-check-switch">
                            <div class="form-check">
                                <label class="form-check-label" for="fab_1"><?php echo __("Active", "magicbox") ?></label>
                                <input class="form-check-input" <?php echo $options['contact_buttons']['fab'] == 1? "checked" : "" ?> type="checkbox" name="contact_buttons[fab]" value="1" id="fab_1>">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <input class="form-control" id="contact_buttons_fab_background" type="text" name="contact_buttons[fab_background]" value="<?php echo $options['contact_buttons']['fab_background'] ?>" placeholder=" ">
                        <label class="form-label" for="contact_buttons_fab_background"><?php echo __("Fab Button Background", "magicbox") ?></label>

                        <div class="form-color-box" data-input="contact_buttons_fab_background"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card bg-light">
    <div class="card-header">
        <h6 class="my-0"><?php echo __("Choose Pages", "magicbox") ?></h6>
    </div>
    <div class="card-body">

        <div class="alert alert-custom alert-light-primary " role="alert">
            <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
            <div class="alert-text">
                <div class="w-100 d-flex flex-wrap gap-2">
                    <div class="infoItem"><?php echo __("You can add automatic contact buttons to your website","magicbox")?></div>
                </div>
            </div>
        </div>


        <div class="form-check-group">
            <?php $postTypes = $theClass->magicBox->postTypes();
            foreach ($postTypes as $key => $value) {
                ?>
                <div class="form-check">
                    <input class="form-check-input" <?php echo $options['contact_buttons']['type'][$value['name']] == "1"? "checked" : "" ?> type="checkbox" name="contact_buttons[type][<?php echo $value['name'] ?>]" value="1" id="_<?php echo $value['name'] ?>">
                    <label class="form-check-label" for="_<?php echo $value['name'] ?>">
                        <span><?php echo $value['label'] ?></span>
                    </label>
                </div>

            <?php } ?>
        </div>
    </div>

    <div class="card-footer">
        <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a>
    </div>
</div>

</form>

<div class="copyThat" style="display:none">

    <div class="socialItem item_####">
        <div class="row fixedRow align-items-center">
            <div class="col-lg-2">
                <div class="form-group">
                    <select class="form-control iconSelector" name="contact_buttons[buttons][####][type]" id="contact_buttons[buttons][####][type]" data-uniq="####">
                        <option value=""><?php echo __("Choose", "magicbox") ?></option>
                        <?php foreach ($socials as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php } ?>
                    </select>
                    <label for="contact_buttons[buttons][####][type]" class="form-label"><?php echo __("Icon", "magicbox") ?></label>
                </div>

            </div>

            <div class="col-lg-1 text-center icon">

            </div>
            <div class="col-lg-5">
                <div class="form-group">
                    <input type="text" name="contact_buttons[buttons][####][url]" id="contact_buttons[buttons][####][url]" placeholder=" " class="form-control url"/>
                    <label for="contact_buttons[buttons][####][url]" class="form-label"><?php echo __("Url", "magicbox") ?> (<?php echo __("Required", "magicbox") ?>)</label>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <input type="text" name="contact_buttons[buttons][####][name]" id="contact_buttons[buttons][####][name]" placeholder=" " class="form-control name"/>
                    <label for="contact_buttons[buttons][####][name]" class="form-label"><?php echo __("Name", "magicbox") ?> (<?php echo __("Optional", "magicbox") ?>)</label>
                </div>
            </div>
            <div class="col-lg-1">
                <div class="remove btn btn-danger btn-sm removeButton" data-uniq="####">
                    <i class="fa-solid fa-xmark"></i></div>
            </div>
        </div>
    </div>
</div>

<script>

    iconSet="cb1";
    jQuery(document).on('change', '.iconSet', function () {
        iconSet=jQuery(this).val();

        jQuery('.socialItem .icon img').each(function (k, v) {
            imgUrl=jQuery(this).attr('src');
            imgUrl=imgUrl.replace("/cb1/", "/" + iconSet + "/");
            imgUrl=imgUrl.replace("/cb2/", "/" + iconSet + "/");
            imgUrl=imgUrl.replace("/cb3/", "/" + iconSet + "/");
            imgUrl=imgUrl.replace("/cb4/", "/" + iconSet + "/");
            imgUrl=imgUrl.replace("/cb5/", "/" + iconSet + "/");
            jQuery(this).attr('src', imgUrl);
        });

    });

    jQuery(document).on('click', '.iconSelector', function () {
        oldValue=jQuery(this).val();
    });

    jQuery(document).on('change', '.iconSelector', function () {

        uniq=jQuery(this).data("uniq");
        value=jQuery(this).val();
        newUrl="<?php echo $GLOBALS{'_mb_icon_url_'}?>/social/" + iconSet + "/" + value + ".png";
        newImg='<img src="' + newUrl + '" height="30px">';
        jQuery('.item_' + uniq + ' .icon').html(newImg);

        /* if old value equal mail or phone*/
        if (oldValue == "mail" || oldValue == "phone" || oldValue == "whatsapp") {
            currentUrl=jQuery('.item_' + uniq + ' .url').val();
            currentUrl=currentUrl.replace("tel:", "");
            currentUrl=currentUrl.replace("mailto:", "");
            currentUrl=currentUrl.replace("tel:", "");
            currentUrl=currentUrl.replace("mailto:", "");
            currentUrl=currentUrl.replace("https://wa.me/", "");
            currentUrl=currentUrl.replace("http://wa.me/", "");
            jQuery('.item_' + uniq + ' .url').val(currentUrl);
        }

        if (value == "mail") {
            currentUrl=jQuery('.item_' + uniq + ' .url').val();
            if (currentUrl.indexOf("mailto:") == -1) {
                currentUrl="mailto:" + currentUrl;
                jQuery('.item_' + uniq + ' .url').val(currentUrl);
            }
        }

        if (value == "phone") {
            currentUrl=jQuery('.item_' + uniq + ' .url').val();
            if (currentUrl.indexOf("tel:") == -1) {
                currentUrl="tel:" + currentUrl;
                jQuery('.item_' + uniq + ' .url').val(currentUrl);
            }
        }

        if (value == "whatsapp") {
            currentUrl=jQuery('.item_' + uniq + ' .url').val();
            if (currentUrl.indexOf("https://wa.me/") == -1) {
                currentUrl="https://wa.me/" + currentUrl;
                jQuery('.item_' + uniq + ' .url').val(currentUrl);
            }
        }

    });

    jQuery(document).on('click', '.remove', function () {
        uniq=jQuery(this).data("uniq");
        jQuery('.item_' + uniq).remove();
    });

    jQuery(document).on('click', '.addMore', function () {
        uniqId=uniqCode();
        html=jQuery('.copyThat').html();
        html=html.replace("####", uniqId);
        html=html.replace("####", uniqId);
        html=html.replace("####", uniqId);
        html=html.replace("####", uniqId);
        html=html.replace("####", uniqId);
        html=html.replace("####", uniqId);
        html=html.replace("####", uniqId);
        html=html.replace("####", uniqId);
        html=html.replace("####", uniqId);
        html=html.replace("####", uniqId);
        html=html.replace("####", uniqId);
        html=html.replace("####", uniqId);
        jQuery('.addHere').append(html);
    });

    jQuery(document).ready(function () {
        var isDragging=false;
        jQuery(".allButtons ul li")
            .mousedown(function () {
                isDragging=false;
            })
            .mousemove(function () {
                isDragging=true;
            })
            .mouseup(function () {
                isDragging=false;
            });

        jQuery(".allButtons ul").sortable();

    });

</script>