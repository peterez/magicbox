<script>
    var isMirrorred = {};
    var codeMirrorVals = {};
</script>
<form method="post" class="theForm theForm-<?php echo sanitize_text_field($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":sanitize_text_field($_REQUEST['method'])?>">
    <div class="card bg-light">

        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Custom Css","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can add custom css to both the WordPress Admin Panel and your website.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can add custom CSS to mobile, tablet and desktop views.","magicbox")?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="custom_css[status]" id="custom_css[status]">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['custom_css']['status'] or $options['custom_css']['status'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="custom_css[status]"><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">

        <div class="card-header">
            <h6 class="my-0"><?php echo __("Frontend Design","magicbox")?></h6>
        </div>

        <div class="card-body">
            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-12">
                        <h3 class="innerTitle"><?php echo  __("Custom Css For All Devices","magicbox") ?></h3>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-12">
                        <div class="input-group">
                            <textarea id="custom_css_all" name="custom_css[all_css]" class="form-control" placeholder=""><?php echo $options['custom_css']['all_css']; ?></textarea>
                            <label class="input-group-text" for="custom_css_all"><?php echo  __("Custom Css For All Devices","magicbox") ?></label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-12">
                        <div class="form-check-switch">
                            <div class="form-check">
                                <label class="form-check-label" for="accept_all_change"><?php echo  __("Accept Custom Css","magicbox") ?></label>
                                <input type="checkbox" class="form-check-input" name="custom_css[all]" value="ok"
                                    <?php echo $options['custom_css']['all'] =="ok"?"checked":""?> id="accept_all_change">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-12">
                        <h3 class="innerTitle"><?php echo  __("Custom Css For Mobile","magicbox") ?></h3>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea id="custom_css_mobile" name="custom_css[mobile_css]" class="form-control" placeholder=""><?php echo $options['custom_css']['mobile_css']; ?></textarea>
                            <label class="form-label" for="custom_css_mobile"><?php echo  __("Custom Css For Mobile","magicbox") ?></label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-12">
                        <div class="form-check-switch">
                            <div class="form-check">
                                <label class="form-check-label" for="accept_mobile_change"><?php echo  __("Accept Mobile Css","magicbox") ?></label>
                                <input type="checkbox" class="form-check-input" name="custom_css[mobile]" value="ok"
                                    <?php echo $options['custom_css']['mobile'] =="ok"?"checked":""?> id="accept_mobile_change">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-12">
                        <h3 class="innerTitle"><?php echo  __("Custom Css For Tablet","magicbox") ?></h3>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea id="custom_css_tablet" name="custom_css[tablet_css]" class="form-control" placeholder=""><?php echo $options['custom_css']['tablet_css']; ?></textarea>
                            <label class="form-label" for="custom_css_tablet"><?php echo  __("Custom Css For Tablet","magicbox") ?></label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-12">
                        <div class="form-check-switch">
                            <div class="form-check">
                                <label class="form-check-label" for="accept_tablet_change"><?php echo  __("Accept Tablet Css","magicbox") ?></label>
                                <input type="checkbox" class="form-check-input" name="custom_css[tablet]" value="ok"
                                    <?php echo $options['custom_css']['tablet'] =="ok"?"checked":""?> id="accept_tablet_change">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="card bg-light">

        <div class="card-header">
            <h6 class="my-0"><?php echo __("Admin Panel Design","magicbox")?></h6>
        </div>

        <div class="card-body">
            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-12">
                        <h3 class="innerTitle"><?php echo  __("Custom Css For All Devices","magicbox") ?></h3>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea id="custom_css_all_admin" name="custom_css[all_admin_css]" class="form-control" placeholder=""><?php echo $options['custom_css']['all_admin_css']; ?></textarea>
                            <label class="form-label" for="custom_css_all_admin"><?php echo  __("Custom Css For All Devices","magicbox") ?></label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-12">
                        <div class="form-check-switch">
                            <div class="form-check">
                                <label class="form-check-label" for="accept_all_change_admin"><?php echo  __("Accept Custom Css","magicbox") ?></label>
                                <input type="checkbox" class="form-check-input" name="custom_css[all_admin]" value="ok"
                                    <?php echo $options['custom_css']['all_admin'] =="ok"?"checked":""?> id="accept_all_change_admin">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-12">
                        <h3 class="innerTitle"><?php echo  __("Custom Css For Mobile","magicbox") ?></h3>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea id="custom_css_mobile_admin" name="custom_css[mobile_admin_css]" class="form-control" placeholder=""><?php echo $options['custom_css']['mobile_admin_css']; ?></textarea>
                            <label class="form-label" for="custom_css_mobile_admin"><?php echo  __("Custom Css For Mobile","magicbox") ?></label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-12">
                        <div class="form-check-switch">
                            <div class="form-check">
                                <label class="form-check-label" for="accept_mobile_change_admin"><?php echo  __("Accept Mobile Css","magicbox") ?></label>
                                <input type="checkbox" class="form-check-input" name="custom_css[mobile_admin]" value="ok"
                                    <?php echo $options['custom_css']['mobile_admin'] =="ok"?"checked":""?>  id="accept_mobile_change_admin">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-12">
                        <h3 class="innerTitle"><?php echo  __("Custom Css For Tablet","magicbox") ?></h3>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea id="custom_css_tablet_admin" name="custom_css[tablet_admin_css]" class="form-control"><?php echo $options['custom_css']['tablet_admin_css']; ?></textarea>
                            <label class="form-label" for="custom_css_tablet_admin"><?php echo  __("Custom Css For Tablet","magicbox") ?></label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-12">
                        <div class="form-check-switch">
                            <div class="form-check">
                                <label class="form-check-label" for="accept_tablet_change_admin"><?php echo  __("Accept Tablet Css","magicbox") ?></label>
                                <input type="checkbox" class="form-check-input" name="custom_css[tablet_admin]" value="ok"
                                    <?php echo $options['custom_css']['tablet_admin'] =="ok"?"checked":""?>  id="accept_tablet_change_admin">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button onclick="return false;" name="upsert" value="<?php echo __("Update","magicbox")?>" class="btn btn-success rounded-pill px-4 pageSaveButton"><i class="fa-solid fa-floppy-disk me-2"></i><?php echo __("Update","magicbox")?></button>
        </div>
    </div>
</form>


<script>
    setAsCodeMirror("custom_css_all","text/x-ini");
    setAsCodeMirror("custom_css_mobile","text/x-ini");
    setAsCodeMirror("custom_css_tablet","text/x-ini");
    setAsCodeMirror("custom_css_all_admin","text/x-ini");
    setAsCodeMirror("custom_css_mobile_admin","text/x-ini");
    setAsCodeMirror("custom_css_tablet_admin","text/x-ini");

</script>

