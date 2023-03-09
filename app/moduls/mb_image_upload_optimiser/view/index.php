<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Image Upload Optimiser","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You save time on your bulk image uploads.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can set the maximum dimensions and quality of the image you will upload.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("By reducing the size of your images before uploading them to your server, you consume minimal space in your hosting space.","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="input-group">
                            <select class="form-select" name="image_optimiser[status]" id="image_optimiser[status]">
                                <?php foreach ($yesNo as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>" <?php echo  $key == $options['image_optimiser']['status'] ? "selected" : "" ?> <?php if ($options['image_optimiser']['status'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="input-group-text" for=""image_optimiser[status]><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-12 col-lg-4">
                        <div class="input-group">
                            <input type="text" class="form-control"
                                   value="<?php echo  $options['image_optimiser']['width'] == "" ? "1440" : $options['image_optimiser']['width'] ?>"
                                   name="image_optimiser[width]" id="image_optimiser[width]" placeholder=" "/>
                            <label class="form-label" for="image_optimiser[width]"><?php echo  __("Max Width","magicbox") ?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Set the maximum width at which images will be loaded. e.g 1920px.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-12 col-lg-4">
                        <div class="input-group">
                            <input type="text" class="form-control"
                                   value="<?php echo  $options['image_optimiser']['quality'] == "" ? "1440" : $options['image_optimiser']['height'] ?>"
                                   name="image_optimiser[height]" id="image_optimiser[height]" placeholder=" "/>
                            <label class="form-label" for="image_optimiser[height]"><?php echo  __("Max Height","magicbox") ?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Set the maximum height at which images are loaded. e.g 1080px.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-12 col-lg-4">
                        <div class="input-group">
                            <input type="text" class="form-control"
                                   value="<?php echo  $options['image_optimiser']['quality'] == "" ? "90" : $options['image_optimiser']['quality'] ?>"
                                   name="image_optimiser[quality]" id="image_optimiser[quality]" placeholder=" "/>
                            <label class="form-label" for="image_optimiser[quality]"><?php echo  __("Quality","magicbox") ?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Determine the quality of uploaded images. Enter a value between 1-100.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-12 col-lg-4">
                        <div class="input-group">
                            <input type="text" class="form-control"
                                   value="<?php echo  $options['image_optimiser']['max_size'] == "" ? "10" : $options['image_optimiser']['max_size'] ?>"
                                   name="image_optimiser[max_size]" id="image_optimiser[max_size]" placeholder=" "/>
                            <label class="form-label" for="image_optimiser[max_size]"><?php echo  __("Max File Size ( Megabayt )","magicbox") ?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Specify the maximum file size that will be uploaded in megabytes.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
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
