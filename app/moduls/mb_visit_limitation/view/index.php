<form method="post" class="theForm theForm-<?php echo sanitize_text_field($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":sanitize_text_field($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Visit Limitation","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can limit your visitors' page visits, searches and comments.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can exclude any user roles without limitation.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can exclude query limits for search engines.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can specify how the rules you specify are stored on your server.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can direct people who exceed the limits to different addresses.","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="visit_limitation[status]" id="visit_limitation[status]">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['visit_limitation']['status'] or $options['visit_limitation']['status'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="input-group-text" for="visit_limitation[status]"><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Visit Limitation Settings","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary mb-4 mt-2" role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can exclude any user roles without limitation.","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="form-check-group">
                <?php foreach ($theClass->userRoles as $key => $value) { ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" <?php echo $options['visit_limitation']['roles'][$key]=="1"?"checked":""?> name="visit_limitation[roles][<?php echo $key?>]" value="1" id="_<?php echo $key?>">
                        <label class="form-check-label" for="_<?php echo $key?>"><span><?php echo $value['name']?></span></label>
                    </div>
                <?php }?>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" <?php echo $options['visit_limitation']['roles']['siteuser']=="1"?"checked":""?> name="visit_limitation[roles][siteuser]" value="1" id="_siteUser">
                    <label class="form-check-label" for="_siteUser"><span><?php echo __("Unregistered Site User","magicbox")?></span></label>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow my-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input class="form-control" name="visit_limitation[max_page]" id="visit_limitation[max_page]" value="<?php echo  max($options['visit_limitation']['max_page'], 1) ?>" placeholder=" ">
                            <label class="form-label" for="visit_limitation[max_page]"><?php echo  __("Max Page Visit","magicbox") ?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Limit the number of pages that admins or users can visit.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input class="form-control" name="visit_limitation[max_search]" id="visit_limitation[max_search]" value="<?php echo  max($options['visit_limitation']['max_search'], 1) ?>" placeholder=" ">
                            <label class="form-label" for="visit_limitation[max_search]"><?php echo  __("Max Search","magicbox") ?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Limit the number of calls that admins or visitors can make.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <input class="form-control" name="visit_limitation[max_comment]" id="visit_limitation[max_comment]" value="<?php echo  max($options['visit_limitation']['max_comment'], 1) ?>" placeholder="">
                            <label class="form-label" for="visit_limitation[max_comment]"><?php echo  __("Max Comment","magicbox") ?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Limit the number of comments that admins or users can make.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="alert alert-custom alert-light-danger " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-minus"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><b><?php echo  __("Note","magicbox") ?></b> : <?php echo  __("These options are important for search engine indexes.","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow my-4 gy-2">
                    <div class="col-lg-4">
                        <div class="form-check-switch block">
                            <div class="form-check">
                                <label class="form-check-label" for="visit_limitation[exclude_sem]"><?php echo  __("Exclude search engine motors","magicbox") ?>
                                    <div class="form-info-normal ms-2" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Exclude search engines from limiting so that your website can get indexed.","magicbox") ?>"><i class="fa-solid fa-info"></i></div></label>
                                <input class="form-check-input" type="checkbox"
                                       name="visit_limitation[exclude_sem]"
                                       id="visit_limitation[exclude_sem]"
                                    <?php echo  $options['visit_limitation']['exclude_sem'] == "1" ? "checked" : "" ?>
                                    <?php echo  $options['visit_limitation']['exclude_sem'] == "" ? "checked" : "" ?>
                                       value="1">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-4">
                        <div class="form-check-switch block">
                            <div class="form-check">
                                <label class="form-check-label" for="visit_limitation[block_crawler]"><?php echo  __("Block spam bot and crawlers","magicbox") ?>
                                    <div class="form-info-normal ms-2" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Block spam bots and crawlers. APIs running on your website will not be affected and will continue to work.","magicbox") ?>"><i class="fa-solid fa-info"></i></div></label>
                                <input class="form-check-input" type="checkbox"
                                       name="visit_limitation[block_crawler]"
                                       id="visit_limitation[block_crawler]"
                                    <?php echo  $options['visit_limitation']['block_crawler'] == "1" ? "checked" : "" ?>
                                       value="1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("Determine how the rules you set will be stored in your system","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="row fixedRow my-4">
                <div class="col-12">
                    <label class="form-label-normal mb-3"><?php echo  __("Storage","magicbox") ?></label>
                </div>
                <div class="clearfix"></div>
                <div class="col-12">
                    <div class="form-check-group">
                        <?php 
                         foreach ($theClass->cacheDrivers as $key => $value) {
                            $methodName = "check".ucfirst($value);
                            $checkMethod = $theClass->$methodName();
                            ?>
                            <div class="form-check">
                                <input class="form-check-input" <?php echo $checkMethod==false?"disabled":""?> <?php echo $value == $options['visit_limitation']['data_storage']?"checked":""?> type="radio" name="visit_limitation[data_storage]" value="<?php echo $value?>" id="_<?php echo $methodName?>">
                                <label class="form-check-label" for="_<?php echo $methodName?>">
                                    <span><?php echo  ucfirst($value) ?></span>
                                </label>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("Determine which page will be shown to visitors who exceed the limits you set.","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <?php $errorType = array(
                                "1" => __("Default 404 Page","magicbox"),
                                "2" => __("Redirect","magicbox")
                            ); ?>
                            <select class="form-select errorType" name="visit_limitation[error_type]" id="visit_limitation[error_type]">
                                <?php foreach ($errorType as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['visit_limitation']['error_type'] or $options['visit_limitation']['error_type'] == "" and $key == 1) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="visit_limitation[error_type]"><?php echo  __("Error Type","magicbox") ?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Redirect to 404 page or the page you want.","magicbox") ?>" style="right:30px;"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-4">
                        <div class="form-group errorRedirect" style="display:<?php echo  $options['visit_limitation']['error_type'] == "2" ? "block" : "none" ?>">
                            <input class="form-control" name="visit_limitation[error_redirect]" id="" value="<?php echo  $options['visit_limitation']['error_redirect'] ?>" placeholder=" ">
                            <label class="form-label" for="visit_limitation[error_redirect]"><?php echo  __("Error Redirect","magicbox") ?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Enter the url you want to redirect. ","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
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

<script>

    jQuery(document).on('change', '.errorType', function () {

        if (jQuery(this).val() == "2") {
            jQuery('.errorRedirect').show(0);
        } else {
            jQuery('.errorRedirect').hide(0);
        }

    });


</script>
