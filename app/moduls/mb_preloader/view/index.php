<form method="post" class="theForm theForm-<?php echo sanitize_text_field($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":sanitize_text_field($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Preloader","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can select the Preloader image you want from the gallery or add your own.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can specify the display time, size and effect of the image.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can select the pages you want the Preloader to appear on.","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <select class="form-select" name="preloader[status]" id="preloader[status]">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['preloader']['status'] or $options['preloader']['status'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="input-group-text" for="preloader[status]"><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Select Preloader","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can add automatic preloaders to your website","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="row fixedRow">
                <div class="col-12">
                    <div class="col-12">
                        <div class="loadingGifs">
                            <?php for($i=1; $i<=37; $i++) {
                                $iconUrl = $GLOBALS{'_mb_assets_loading_gifs_'}."/".$i.".gif";
                                ?>
                                <img src="<?php echo $iconUrl?>" />
                            <?php  }
                            if($options['preloader']['gif'] =="") {
                                $options['preloader']['gif'] = $iconUrl;
                            }

                            ?>
                        </div>

                        <div class="mt-3 loadGif">
                            <?php echo $theClass->magicBox->uploadForm("Pre Loader Icon","preloader[gif]",$options['preloader']['gif']);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Preloader Settings","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can add automatic preloaders to your website","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="row fixedRow">
                <div class="col-md-3">
                    <div class="form-group" >
                        <input type="text"  class="form-control" name="preloader[background]" id="preloader_background"
                               value="<?php echo  ($options['preloader']['background']) ?>" placeholder=" "/>
                        <label class="form-label" for="preloader_background"><?php echo  __("Background","magicbox") ?></label>
                        <div class="form-color-box" data-input="preloader_background"></div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <input type="number" min="0" class="form-control" name="preloader[max_width]" id="preloader[max_width]"
                               value="<?php echo  ($options['preloader']['max_width']) ?>" placeholder=" "/>
                        <label class="form-label" for="preloader[max_width]"><?php echo  __("Max GIF Width","magicbox") ?></label>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <input  class="form-control" name="preloader[zindex]" id="preloader[zindex]"
                                value="<?php echo  $options['preloader']['zindex'] ?>" placeholder=" "/>
                        <label class="form-label" for="preloader[zindex]"><?php echo  __("Z-index","magicbox") ?></label>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-6 col-xxl-3">
                    <div class="form-group">
                        <?php 
                         $closes = array(
                            "fadeOut" => __("Fade Out","magicbox"),
                            "slideDown" => __("Slide Down","magicbox"),
                            "hide" => __("Hiding","magicbox"),
                            "toggle" => __("Toggle","magicbox"),
                        );
                        ?>
                        <select name="preloader[effect]" class="form-control" id="preloader[effect]">
                            <?php foreach ($closes as $key => $value) { ?>
                                <option <?php echo  $options['preloader']['effect'] == $key ? "selected" : "" ?>
                                        value="<?php echo  $key ?>"><?php echo  $value ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="preloader[effect]"><?php echo  __("Effect","magicbox") ?></label>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-3">
                    <div class="form-group">
                        <input type="number" min="0" class="form-control" name="preloader[effect_speed]" id="preloader[effect_speed]" placeholder=" "
                               value="<?php echo  intval($options['preloader']['effect_speed']) ?>"/>
                        <label class="form-label" for="preloader[effect_speed]"><?php echo  __("Effect Speed Millisecond","magicbox") ?></label>
                        <span class="form-info" data-mb="pop" data-mb-title="<?php echo  __("Effect Speed Millisecond","magicbox") ?>" data-mb-content="<?php echo __("1000 millisecond is 1 second","magicbox")?> (250)"><i class="fa-solid fa-info"></i></span>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-3">
                    <div class="form-group">
                        <input type="number" min="0" class="form-control" name="preloader[min_wait]" id="preloader[min_wait]" placeholder=" "
                               value="<?php echo  intval($options['preloader']['min_wait']) ?>"/>
                        <label class="form-label" for="preloader[min_wait]"><?php echo  __("Minumum Wait Millisecond","magicbox") ?><small>(500)</small></label>
                        <span class="form-info" data-mb="pop" data-mb-title="<?php echo  __("Minumum Wait Millisecond","magicbox") ?>" data-mb-content="<?php echo __("If you put your mail here, when someone contact with you, same message will sent this mail address","magicbox")?>"><i class="fa-solid fa-info"></i></span>
                    </div>
                </div>

                <div class="col-md-6 col-xxl-3">
                    <div class="form-group">
                        <input type="number" min="0" class="form-control" name="preloader[max_wait]" id="preloader[max_wait]" placeholder=" "
                               value="<?php echo  intval($options['preloader']['max_wait']) ?>"/>
                        <label class="form-label" for="preloader[max_wait]"><?php echo  __("Maximum Wait Millisecond","magicbox") ?> <small>(5000)</small></label>
                        <span class="form-info" data-mb="pop" data-mb-title="<?php echo  __("Maximum Wait Millisecond","magicbox") ?>" data-mb-content="<?php echo __("1000 millisecond is 1 second","magicbox")?>"><i class="fa-solid fa-info"></i></span>
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
                        <div class="infoItem"><?php echo  __("You can add automatic preloaders to your website","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="row fixedRow">
                <div class="col-12">
                    <div class="form-check-group">
                        <?php $postTypes = $theClass->magicBox->postTypes();
                        foreach ($postTypes as $key => $value) {
                            ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" <?php echo $options['preloader']['type'][$value['name']] == "1"?"checked":""?> type="checkbox" name="preloader[type][<?php echo $value['name']?>]" value="1" id="_<?php echo $value['name']?>">
                                <label class="form-check-label" for="_<?php echo $value['name']?>">
                                    <span><?php echo  $value['label'] ?></span>
                                </label>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a>
        </div>
    </div>
</form>

