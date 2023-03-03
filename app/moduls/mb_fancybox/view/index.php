<?php 
 $types = array(
    "img" => __("Image","magicbox"),
    "pdf" => __("Pdf","magicbox"),
    "youtube" => __("Youtube Links","magicbox"),
    "vimeo" => __("Vimeo Links","magicbox"),
    "dailymotion" => __("Dailymotion Links","magicbox"),
);
?>
<form method="post" class="theForm theForm-<?php echo sanitize_text_field($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":sanitize_text_field($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Fancybox","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can choose which objects FancyBox apply to, image, video, pdf etc.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can edit the appearance of the FancyBox.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can select the pages on which the FancyBoxes will be displayed.","magicbox")?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="fancybox[status]" id="fancyboxStatus">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['fancybox']['status'] or $options['fancybox']['status'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="fancyboxStatus"><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Choose Assets","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("Choose which elements the fantasy box will apply to.","magicbox")?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-12">
                        <div class="form-check-group">
                            <?php 
                             foreach ($types as $key => $value) {
                                ?>
                                <div class="form-check">
                                    <input class="form-check-input" <?php echo $options['fancybox']['types'][$key] == "1"?"checked":""?> type="checkbox" name="fancybox[types][<?php echo $key?>]" value="1" id="_<?php echo $key?>">
                                    <label class="form-check-label" for="_<?php echo $key?>"><span><?php echo  $value ?></span></label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Fancybox Settings","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-md-6">
                        <div class="input-group">
                            <select class="form-select" name="fancybox[settings][titleShow]" id="fancybox[settings][titleShow]">
                                <?php foreach ($yesNo as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['fancybox']['settings']['titleShow'] or $options['fancybox']['settings']['titleShow'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="input-group-text" for="fancybox[settings][titleShow]"><?php echo  __("Show Title","magicbox") ?></label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group">
                            <select class="form-select" name="fancybox[settings][autoScale]" id="fancybox[settings][autoScale]">
                                <?php foreach ($yesNo as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['fancybox']['settings']['autoScale'] or $options['fancybox']['settings']['autoScale'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="input-group-text" for="fancybox[settings][autoScale]"><?php echo  __("Auto Scale","magicbox") ?></label>
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="input-group">
                            <select class="form-select" name="fancybox[settings][transitionIn]">
                                <?php foreach (array("none","elastic","fade") as  $value) { ?>
                                    <option
                                            value="<?php echo  $value ?>"<?php if ($value == $options['fancybox']['settings']['transitionIn']) {
                                        echo "selected";
                                    } ?>><?php echo  ucfirst($value) ?></option>
                                <?php } ?>
                            </select>
                            <label class="input-group-text" for="fancybox[settings][transitionIn]"><?php echo  __("Transition In","magicbox") ?></label>
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="input-group">
                            <select class="form-select" name="fancybox[settings][transitionOut]" id="fancybox[settings][transitionOut]">
                                <?php foreach (array("none","elastic","fade") as  $value) { ?>
                                    <option
                                            value="<?php echo  $value ?>"<?php if ($value == $options['fancybox']['settings']['transitionOut']) {
                                        echo "selected";
                                    } ?>><?php echo  ucfirst($value) ?></option>
                                <?php } ?>
                            </select>
                            <label class="input-group-text" for="fancybox[settings][transitionOut]"><?php echo  __("Transition Out","magicbox") ?></label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="number"name="fancybox[settings][width]" id="fancybox[settings][width]" value="<?php echo $options['fancybox']['settings']['width']?>" class="form-control" placeholder=" "/>
                            <label class="form-label" for="fancybox[settings][width]"><?php echo  __("Width","magicbox") ?></label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="number"  name="fancybox[settings][height]" id="fancybox[settings][height]" value="<?php echo $options['fancybox']['settings']['height']?>" class="form-control"/>
                            <label class="form-label" for="fancybox[settings][height]"><?php echo  __("Height","magicbox") ?></label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" name="fancybox[settings][overlayColor]" id="fancybox_settings_overlayColor" value="<?php echo $options['fancybox']['settings']['overlayColor']?>" class="form-control" placeholder=" "/>
                            <label class="input-group-text" for="fancybox_settings_overlayColor"><?php echo  __("Overlay Color","magicbox") ?> <small>(<?php echo __("Pick","magicbox")?>)</small></label>
                            <div class="form-color-box" data-input="fancybox_settings_overlayColor"></div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="number" min="1" max="9" name="fancybox[settings][overlayOpacity]" id="fancybox[settings][overlayOpacity]" value="<?php echo $options['fancybox']['settings']['overlayOpacity']?>" class="form-control"/>
                            <label class="input-group-text" for="fancybox[settings][overlayOpacity]"><?php echo  __("Overlay Opacity","magicbox") ?> <small>(1-9)</small></label>
                        </div>
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
                        <div class="infoItem"><?php echo __("You can select the pages on which the FancyBoxes will be displayed.","magicbox")?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-12">
                        <div class="form-check-group">
                            <?php $postTypes = $theClass->magicBox->postTypes();
                            foreach ($postTypes as $key => $value) {
                                ?>
                                <div class="form-check">
                                    <input class="form-check-input" <?php echo $options['fancybox']['type'][$value['name']] == "1"?"checked":""?> type="checkbox" name="fancybox[type][<?php echo $value['name']?>]" value="1" id="_<?php echo $value['name']?>">
                                    <label class="form-check-label" for="_<?php echo $value['name']?>"><span><?php echo  $value['label'] ?></span></label>
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
