<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("New login url","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can manually change the admin panel login address.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can block malicious login attempts to your admin panel.","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="alert alert-custom alert-light-danger " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-radiation"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("Please do not forget the address you changed. You will make your next login with the new address.","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="alert alert-custom alert-light-warning " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("If you want undo this change, clear the input and update or set status as passive.","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="user_login_page[status]" id="user_login_page[status]">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['user_login_page']['status'] or $options['user_login_page']['status'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="user_login_page[status]"><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <input type="text" name="user_login_page[url]" id="user_login_page[url]" placeholder=" " value="<?php echo  $options['user_login_page']['url'] ?>" class="form-control">
                            <label class="form-label" for="user_login_page[url]">wp-new-login</label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Change the WordPress login url. E.g example.com/my-login-url. Just type the 'my-login-url' part.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button onclick="return false;" name="upsert" value="<?php echo  __("Update","magicbox") ?>" class="btn btn-success rounded-pill px-4 pageSaveButton"><i class="fa-solid fa-floppy-disk me-2"></i><?php echo  __("Update","magicbox") ?></button>
        </div>
    </div>
</form>
