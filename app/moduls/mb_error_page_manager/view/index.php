<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Error Page Manager","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can prevent your users from having a bad experience.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can automatically redirect pages that give 404 errors to content with relevant and similar URLs.","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="cotainer-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="error_page_manager[status]" id="error_page_manager[status]">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  esc_attr($key) ?>"<?php if ($key == $options['error_page_manager']['status'] or $options['error_page_manager']['status'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  esc_attr($value) ?></option>
                                <?php } ?>
                            </select>
                            <label class="input-group-text" for="error_page_manager[status]"><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="error_page_manager[process]" id="error_page_manager[process]">
                                <?php 
                                 $choose = array(
                                    "1" => __("Show in Same Page","magicbox"),
                                    "2" => __("Redirect","magicbox")
                                );
                                foreach ($choose as $key => $value) { ?>
                                    <option
                                            value="<?php echo  esc_attr($key) ?>"<?php if ($key == $options['error_page_manager']['process'] or $options['error_page_manager']['process'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  esc_attr($value) ?></option>
                                <?php } ?>
                            </select>
                            <label class="input-group-text" for="error_page_manager[process]"><?php echo  __("Process","magicbox") ?></label>
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


