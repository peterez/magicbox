<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub']) ?>-<?php echo $_REQUEST['method'] == ""? "index" : esc_attr($_REQUEST['method']) ?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo __("Seo Image", "magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can add sub and title tags of images at once.", "magicbox") ?></div>
                        <div class="infoItem"><?php echo __("You can increase the rate of your images appearing in search results.", "magicbox") ?></div>
                        <div class="infoItem"><?php echo __("You can replace images file name with post title", "magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="seo_image[status]" id="seo_image[status]">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                        value="<?php echo $key ?>"<?php if ($key == $options['seo_image']['status'] or $options['seo_image']['status'] == "" and $key == 2){
                                        echo "selected";
                                    } ?>><?php echo $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="seo_image[status]"><?php echo __("Status", "magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="seo_image[replace_image_name]" id="seo_image[status]">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                        value="<?php echo $key ?>"<?php if ($key == $options['seo_image']['replace_image_name'] or $options['seo_image']['replace_image_name'] == "" and $key == 2){
                                        echo "selected";
                                    } ?>><?php echo $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="seo_image[status]"><?php echo __("Replace Images Name", "magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button onclick="return false;" name="upsert" value="<?php echo __("Update", "magicbox") ?>" class="btn btn-success rounded-pill px-4 pageSaveButton">
                <i class="fa-solid fa-floppy-disk me-2"></i><?php echo __("Update", "magicbox") ?></button>
        </div>
    </div>
</form>


