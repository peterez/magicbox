<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Lazy Load","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can choose which pages the lazy load will be valid on.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can set which content types the lazy load is valid for.","magicbox")?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="lazyload[status]" id="lazyloadStatus">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  esc_attr($key) ?>"<?php if ($key == $options['lazyload']['status'] or $options['lazyload']['status'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  esc_attr($value) ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="lazyloadStatus"><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Choose","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-12">
                        <h3 class="innerTitle"><?php echo __("Choose Pages","magicbox")?></h3>
                        <div class="form-check-group mt-2">
                            <?php 
                             $postTypes = $theClass->magicBox->postTypes();
                            foreach ($postTypes as $key => $value) {
                                ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" <?php echo $options['lazyload']['type'][$value['name']] == "1"?"checked":""?> type="checkbox" name="lazyload[type][<?php echo  esc_attr($value['name'])?>]" value="1" id="_<?php echo  esc_attr($value['label'])?>">
                                    <label class="form-check-label" for="_<?php echo  esc_attr($value['label'])?>">
                                        <span><?php echo  esc_attr($value['label']) ?></span>
                                    </label>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-12">
                        <h3 class=innerTitle><?php echo __("Choose Types","magicbox")?></h3>
                        <div class="form-check-group mt-2">
                            <?php 
                             $lazyTypes = array("image","iframe","video","audio");
                            foreach ($lazyTypes as $key => $value) {
                                ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" <?php echo $options['lazyload']['types'][$value] == "1"?"checked":""?> type="checkbox" name="lazyload[types][<?php echo  esc_attr($value)?>]" value="1" id="_<?php echo  esc_attr($value)?>">
                                    <label class="form-check-label" for="_<?php echo  esc_attr($value)?>">
                                        <span><?php echo  ucfirst($value) ?></span>
                                    </label>
                                </div>
                            <?php }?>
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

