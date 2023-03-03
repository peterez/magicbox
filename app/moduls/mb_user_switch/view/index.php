<form method="post" class="theForm theForm-<?php echo sanitize_text_field($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":sanitize_text_field($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("User Swicth","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can change user without entering username and password.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can test your website and admin panel with different user types.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can choose which admin roles can use this feature.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("After you switch to a new user account, you can keep testing your website that you are logged into as that user.","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="alert alert-custom alert-light-warning " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("User switching is only available for users who have the administrator role.","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="alert alert-custom alert-light-danger " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-minus"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("When you are done, you can return to your user account by clicking the notification displayed on the screen.","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="switch_user[status]" id="fancyboxStatus">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                        value="<?php echo  $key ?>"<?php if ($key == $options['switch_user']['status'] or $options['switch_user']['status'] == "" and $key == 2){
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="input-group-text" for="switch_user[status]"><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("User Switch Settings","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can choose which admin roles can use this feature.","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="form-check-group">
                <?php foreach ($theClass->magicBox->getUserRoles() as $key => $item) { ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox"
                               name="switch_user[user_roles][<?php echo  $key ?>]"
                               id="switch_user[user_roles][<?php echo  $key ?>]"
                            <?php echo  $options['switch_user']['user_roles'][$key] == "1"? "checked" : "" ?>
                               value="1">
                        <label class="form-check-label" for="switch_user[user_roles][<?php echo  $key ?>]"><span><?php echo  $item ?></span></label>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a>
        </div>
    </div>
</form>


