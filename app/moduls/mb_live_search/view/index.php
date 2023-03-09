<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Live Search","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can include images in search results.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can limit the length of titles and descriptions.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can specify the number of results to show.","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-12 col-md-4">
                        <div class="input-group">
                            <select class="form-select" name="live_search[status]" id="live_search[status]">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['live_search']['status'] or $options['live_search']['status'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="input-group-text" for="live_search[status]"><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Live Search Settings","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="container-mb">
                <div class="row fixedRow">

                    <div class="col-12 col-md-6">
                        <div class="input-group">
                            <select class="form-select" name="live_search[show_img]" id="live_search[show_img]">
                                <?php foreach ($yesNo as $key => $value) { ?>
                                    <option
                                            value="<?php echo  esc_attr($key) ?>"<?php if (esc_attr($key) == $options['live_search']['show_img'] or $options['live_search']['show_img'] == "" and esc_attr($key) == 2) {
                                        echo "selected";
                                    } ?>><?php echo  esc_attr($value) ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="live_search[show_img]"><?php echo  __("Show Image","magicbox") ?></label>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-12 col-md-6">
                        <div class="row fixedRow">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder=" " name="live_search[cut_title]" id="live_search[cut_title]"
                                           value="<?php echo  $options['live_search']['cut_title'] ?>"/>
                                    <label class="form-label" for="live_search[cut_title]"><?php echo  __("Cut Title","magicbox") ?></label>
                                    <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Shorten the title of search results.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder=" " name="live_search[cut_desc]" id="live_search[cut_desc]"
                                           value="<?php echo  $options['live_search']['cut_desc'] ?>"/>
                                    <label class="form-label" for="live_search[cut_desc]"><?php echo  __("Cut Description","magicbox") ?></label>
                                    <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Shorten the description of Search Results.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-12 col-md-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder=" " name="live_search[post_limit]" id="live_search[post_limit]"
                                   value="<?php echo  $options['live_search']['post_limit'] ?>"/>
                            <label class="form-label" for="live_search[post_limit]"><?php echo  __("List Limit","magicbox") ?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Limit the number of results to be listed.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
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

