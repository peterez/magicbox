<form method="post" class="theForm theForm-<?php echo sanitize_text_field($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":sanitize_text_field($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Clone Manager","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem rounded-1"><?php echo  __("You can set the contents for which the Duplicate feature will be active.","magicbox") ?></div>
                        <div class="infoItem rounded-1"><?php echo  __("You can make edits to draft contents without breaking the original content.","magicbox") ?></div>
                        <div class="infoItem rounded-1"><?php echo  __("You can publish the draft content manually whenever you want.","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="alert alert-custom alert-light-warning " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("After the cloning features are activated, these will be visible under the page, post and product lists. ","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group mb-4">
                            <select class="form-select" name="clone_manager[status]" id="clone_manager[status]">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['clone_manager']['status'] or $options['clone_manager']['status'] == "" and $key == 2){
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="clone_manager[status]"><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Elements to Duplicate","magicbox") ?></h6>
        </div>
        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem rounded-1"><?php echo  __("Select the sections where the cloning feature will be active )","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="alert alert-custom alert-light-warning " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("After activating the clone features, the clone feature will be active under the page, post and product lists","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("Please backup the file contents before making changes","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <?php foreach ($theClass->postTypes as $item) { ?>
                        <div class="col-lg-4">
                            <div class="form-check-switch block mb-2">
                                <div class="form-check">
                                    <label class="form-check-label" for="check_<?php echo  $item['name'] ?>"><?php _e("Set as active","magicbox") ?> : <?php echo  $item['label'] ?></label>
                                    <input type="checkbox" class="form-check-input" name="clone_manager[cloner][<?php echo  $item['name'] ?>]" <?php echo  $options['clone_manager']['cloner'][$item['name']] == "1"? "checked" : "" ?> value="1"
                                           id="check_<?php echo  $item['name'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button onclick="return false;" name="upsert" value="<?php echo  __("Update","magicbox") ?>" class="btn btn-success rounded-pill px-4 pageSaveButton">
                <i class="fa-solid fa-floppy-disk me-2"></i><?php echo  __("Update","magicbox") ?></button>
        </div>
    </div>
</form>
