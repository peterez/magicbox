<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
<?php 
$pageTypes = array("all" => __("All Pages","magicbox"));
$currentPostTypes = $theClass->magicBox->postTypes();

foreach ($currentPostTypes as $item) {
    $pageTypes[$item['name']] = $item['label'];
}

$pageTypes["category"] = __("Post Category","magicbox");
if (function_exists('is_product_category')){
    $pageTypes["product_category"] = __("Product Category","magicbox");
}

$devices = array("all" => __("All Devices","magicbox"), "desktop" => __("Desktop","magicbox"), "mobile" => __("Mobile","magicbox"), "tablet" => __("Tablet","magicbox"));
$positions = array("head-top_html" => __("Head Top","magicbox"), "head-bottom_html" => __("Head Bottom","magicbox"), "body-top_html" => __("Body Top","magicbox"), "body-bottom_html" => __("Body Bottom","magicbox"),);

?>

<script>
    var codeMirrorVals = {};
    var isMirrorred = {};
</script>

<div class="card bg-light">
    <div class="card-header">
        <h6 class="my-0"><?php echo  __("Code Inserter Manager","magicbox") ?></h6>
    </div>

    <div class="card-body">
        <div class="alert alert-custom alert-light-primary " role="alert">
            <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
            <div class="alert-text">
                <div class="w-100 d-flex flex-wrap gap-2">
                    <div class="infoItem"><?php echo  __("You can add PHP, JS and HTML code to the desired areas of your website.","magicbox") ?></div>
                    <div class="infoItem"><?php echo  __("You can select the pages you want to add code to.","magicbox") ?></div>
                    <div class="infoItem"><?php echo  __("You can set which device views the codes you add will be valid.","magicbox") ?></div>
                    <div class="infoItem"><?php echo  __("You can add codes to Head top, head bottom, body top and body bottom sections.","magicbox") ?></div>
                </div>
            </div>
        </div>

        <div class="container-mb">
            <div class="row fixedRow">
                <div class="col-lg-4">
                    <div class="form-group">
                        <select class="form-select" name="code_inserter[status]" id="code_inserter[status]">
                            <?php foreach ($activePassive as $key => $value) { ?>
                                <option
                                    value="<?php echo  esc_attr($key) ?>"<?php if ($key == $options['code_inserter']['status'] or $options['code_inserter']['status'] == "" and $key == 2){
                                    echo "selected";
                                } ?>><?php echo  esc_attr($value) ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="code_inserter[status]"><?php echo  __("Status","magicbox") ?></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card bg-light">
    <div class="card-header">
        <h6 class="my-0"><?php echo  __("Add New Code","magicbox") ?></h6>
    </div>

    <div class="card-body">
        <div class="alert alert-custom alert-light-primary " role="alert">
            <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
            <div class="alert-text">
                <div class="w-100 d-flex flex-wrap gap-2">
                    <div class="infoItem"><?php echo  __("Select the pages you want to add code to.","magicbox") ?></div>
                    <div class="infoItem"><?php echo  __("Set which device views the codes you add will be valid.","magicbox") ?></div>
                    <div class="infoItem"><?php echo  __("You can add codes to Head top, head bottom, body top and body bottom sections.","magicbox") ?></div>
                </div>
            </div>
        </div>

        <div class="container-mb">
            <div class="row fixedRow">
                <div class="col-md-3">
                    <div class="form-group">
                        <select name="page_type" id="pageType" class="pageType form-control">
                            <?php foreach ($pageTypes as $key => $value) { ?>
                                <option value="<?php echo  esc_attr($key) ?>"><?php echo  esc_attr($value) ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="pageType"><?php echo  __("Page","magicbox") ?></label>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <select name="device" id="device" class="device form-control">
                            <?php foreach ($devices as $key => $value) { ?>
                                <option value="<?php echo  esc_attr($key) ?>"><?php echo  esc_attr($value) ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="device"><?php echo  __("Device","magicbox") ?></label>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <select name="position" id="position" class="position form-control">
                            <?php foreach ($positions as $key => $value) { ?>
                                <option value="<?php echo  esc_attr($key) ?>"><?php echo  esc_attr($value) ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="position"><?php echo  __("Position","magicbox") ?></label>
                    </div>
                </div>

                <div class="col-md-3">
                    <button type="submit" name="upsert" onclick="return false;" value="<?php echo  __("Add New","magicbox") ?>" class="btn btn-success addNew mt-3">
                        <i class="fa-solid fa-circle-plus me-2"></i><?php echo  __("Add New","magicbox") ?></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card bg-light">
    <div class="card-header">
        <h6 class="my-0"><?php echo  __("Edit Codes") ?></h6>
    </div>

    <div class="card-body">
        <div class="alert alert-custom alert-light-primary " role="alert">
            <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
            <div class="alert-text">
                <div class="w-100 d-flex flex-wrap gap-2">
                    <div class="infoItem"><?php echo  __("You can edit the codes you added.","magicbox") ?></div>
                </div>
            </div>
        </div>

        <div class="container-mb">
            <div class="row fixedRow">
                <div class="col-12">
                    <div class="pasteHere">

                        <?php foreach ($pageTypes as $key => $v) { ?>

                            <div id="ci_<?php echo  esc_attr($key) ?>">

                                <?php foreach ($devices as $dk => $d) { ?>

                                    <div class="ci_<?php echo  $dk ?>">

                                        <?php foreach ($theClass->insertedCodes[$key][$dk] as $value) {

                                            $ex = explode("__", $value['key']);
                                            ?>
                                            <div class="row fixedRow align-items-center <?php echo  esc_attr($value['key']) ?>">
                                                <div class="col-12">
                                                    <div class="checkAndshowHide" key="<?php echo  esc_attr($value['key']) ?>" style="cursor:pointer">
                                                        <h3 class="innerTitle"><?php echo  $v ?> > <?php echo  $d ?> > <?php echo  $positions[$ex[2]] ?></h3>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="row" id="<?php echo  esc_attr($value['key']) ?>" style="visibility:hidden; position:absolute;">

                                                    <div class="col-10">
                                                        <div class="form-group">
                                                            <textarea id="__<?php echo  esc_attr($value['key']) ?>" name="code_inserter[<?php echo  esc_attr($value['key']) ?>]" class="form-control" placeholder=" "><?php echo  htmlspecialchars($value['value']) ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-2">
                                                        <button onclick="jQuery('.<?php echo  esc_attr($value['key']) ?>').hide(200).remove();" class="btn btn-danger rounded-pill my-0 pageSaveButton">
                                                            <i class="fa-solid fa-circle-minus"></i></button>
                                                    </div>
                                                </div>

                                            </div>

                                            <script>
                                                setAsCodeMirror('__<?php echo  esc_attr($value['key'])?>');
                                            </script>
                                        <?php } ?>
                                    </div>

                                <?php } ?>

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

<div class="copyThat" style="display:none">

    <div class="row fixedRow align-items-center ##name##">
        <div class="col-12">
            <div class="" onclick="jQuery('.##name## .card-body').show(200)">
                <h3 class="innerTitle">##label##</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row" id="##name##">
            <div class="col-10">
                <div class="form-group">
                    <textarea id="##idName##" name="##name##" class="form-control" placeholder=" "></textarea>
                </div>
            </div>
            <div class="col-2">
                <button onclick="jQuery('.##name##').hide(200).remove(); " class="btn btn-danger rounded-pill my-0 pageSaveButton">
                    <i class="fa-solid fa-trash-can"></i></button>
            </div>
        </div>

    </div>
</div>

<script>

    jQuery(document).on('click', '.checkAndshowHide', function () {

        key=jQuery(this).attr('key');

        if (jQuery('#' + key + '').css('visibility') == "hidden") {
            jQuery('#' + key + '').removeAttr('style');
            jQuery('#' + key).focus().click();
        } else {
            jQuery('#' + key + '').attr('style', 'visibility:hidden; position:absolute;');
        }

    });

    jQuery(document).on('click', '.addNew', function () {

        pageType=jQuery('.pageType').val();
        device=jQuery('.device').val();
        position=jQuery('.position').val();

        pageTypeLabel=jQuery(".pageType option:selected").text();
        deviceLabel=jQuery('.device option:selected').text();
        positionLabel=jQuery('.position option:selected').text();

        name="code_inserter[" + pageType + "__" + device + "__" + position + "]";
        idName="__" + pageType + "__" + device + "__" + position;
        label=pageTypeLabel + " > " + deviceLabel + " > " + positionLabel;

        if (jQuery('.' + name + ' .bg-light').hasClass()) {
            jQuery('.' + name + ' .card-body').show(200);

        } else {

            if(isMirrorred[idName] !=1) {

            copy=jQuery('.copyThat').html();
            copy=copy.replace('##name##', name);
            copy=copy.replace('##name##', name);
            copy=copy.replace('##name##', name);
            copy=copy.replace('##name##', name);
            copy=copy.replace('##name##', name);
            copy=copy.replace('##idName##', idName);
            copy=copy.replace('##label##', label);
            copy=copy.replace('##title##', positionLabel);

            jQuery('.pasteHere #ci_' + pageType + ' .ci_' + device).append(copy);

            setAsCodeMirror(idName);

             goThere('.card-footer .pageSaveButton');
            } else {
                swal.fire({title:"<?php echo __("Successfully","magicbox")?>",text:"<?php echo __("You already added before","magicbox")?>",icon:"success",buttons:false,timer: 3000,});
            }
        }
    });


</script>