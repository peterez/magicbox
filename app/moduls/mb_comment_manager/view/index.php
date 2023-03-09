<?php 
 $customPostTypes = $theClass->magicBox->postTypes();
foreach ($customPostTypes as $item) {
    $postTypes[$item['name']] = $item['label'];
}

?>
<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Comment Manager","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can prevent commenting on the content you select.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can hide old comments made on the content you select.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can activate the captcha feature while commenting.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can limit the number of comment that users can.","magicbox")?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="comment_manager[status]" id="comment_manager[status]">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['comment_manager']['status'] or $options['comment_manager']['status'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="comment_manager[status]"><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Comment Manager Setting","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-12">
                        <label class="form-label-normal mb-2"><?php echo  __("Hidden old comments","magicbox") ?></label>
                        <div class="form-check-group mb-3">
                            <?php 
                             foreach ($postTypes as $key => $value) {
                                ?>
                                <div class="form-check form-check-inline">
                                    <input
                                            class="form-check-input" <?php echo  $options['comment_manager']['hidden_old_comment'][$key] == "1" ? "checked" : "" ?>
                                            type="checkbox" name="comment_manager[hidden_old_comment][<?php echo  $key ?>]" value="1"
                                            id="_<?php echo  $key ?>">
                                    <label class="form-check-label" for="_<?php echo  $key ?>">
                                        <span><?php echo  $value ?></span>
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-12">
                        <label class="form-label-normal mb-2"><?php echo  __("Disable new comment","magicbox") ?></label>
                        <div class="form-check-group mb-3">
                            <?php 
                             foreach ($postTypes as $key => $value) {
                                ?>
                                <div class="form-check form-check-inline">
                                    <input
                                            class="form-check-input" <?php echo  $options['comment_manager']['disable_new_comment'][$key] == "1" ? "checked" : "" ?>
                                            type="checkbox" name="comment_manager[disable_new_comment][<?php echo  $key ?>]" value="1"
                                            id="__<?php echo  $key ?>">
                                    <label class="form-check-label" for="__<?php echo  $key ?>">
                                        <span><?php echo  $value ?></span>
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-6 col-lg-3">
                        <?php $url = "admin.php?page=mb_security&sub=mb_captcha";?>
                        <label class="form-label-normal mb-2"><?php echo  __("Comment Captcha","magicbox") ?></label>
                        <a target="_blank" class="btn btn-primary btn-sm rounded-pill px-3 mb-3" href="<?php echo $url?>"><?php echo  __("Go Settings","magicbox") ?></a>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <?php $url = "admin.php?page=mb_security&sub=mb_visit_limitation";?>
                        <label class="form-label-normal mb-2"><?php echo  __("Comment Limitation","magicbox") ?></label>
                        <a target="_blank" class="btn btn-primary btn-sm rounded-pill px-3 mb-3" href="<?php echo $url?>"><?php echo  __("Go Settings","magicbox") ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button onclick="return false;" name="upsert" value="<?php echo  __("Update","magicbox") ?>" class="btn btn-success rounded-pill px-4 pageSaveButton"><i class="fa-solid fa-floppy-disk me-2"></i><?php echo  __("Update","magicbox") ?></button>
        </div>
    </div>
</form>
