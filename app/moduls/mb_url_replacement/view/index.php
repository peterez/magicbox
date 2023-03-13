<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Url Replacement","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can change the links of all content types bulk or individually.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can change an old url on your site with a new url.","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="alert alert-custom alert-light-warning " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You have to make changes with every protocols ( like : https://olddomain, https://www.olddomain, http://olddomain, http://www.olddomain )","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="form-check-group noBorder fCol mb-1">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input allOptions" name="types[]" value="all"
                           id="accept_all">
                    <label class="form-check-label" for="accept_all"><span><?php echo __("All Options","magicbox")?></span></label>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="selectOptions form-check-group noBorder fCol">
                <?php foreach ($theClass->types as $key => $value) { ?>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="types[]" value="<?php echo  esc_attr($key) ?>"
                               id="accept_<?php echo  esc_attr($key) ?>">
                        <label class="form-check-label" for="accept_<?php echo  esc_attr($key) ?>"><span><?php echo  esc_attr($value) ?></span></label>
                    </div>
                <?php } ?>
            </div>
            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="old_url" id="old_url" placeholder=" " class="form-control "/>
                            <label class="form-label" for="old_url"><?php echo  __("Old Url","magicbox") ?> <small>(https://www.oldurl.com)</small></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Enter the old url you want to change.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="new_url" id="new_url" placeholder=" " class="form-control "/>
                            <label class="form-label" for="new_url"><?php echo  __("New Url","magicbox") ?> <small>(https://yournewsite.com)</small></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Enter the new url.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
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

<script>

    jQuery(document).on('change','.allOptions',function() {
       if(jQuery(this).is(':checked')) {
           jQuery('.selectOptions input').prop('checked',true).prop('disabled',true);
       } else {
           jQuery('.selectOptions input').prop('checked',false).prop('disabled',false);
       }
    });

</script>