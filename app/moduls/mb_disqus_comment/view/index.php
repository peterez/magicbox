<?php 
 $positions = array(
    "before" => __("Before comments","magicbox"),
    "after" => __("Aftere comments","magicbox"),
);

$margins = array(
    "center" => __("Center","magicbox"),
    "left" => __("Left","magicbox"),
    "right" => __("Right","magicbox"),
);

?>
<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Disqus Comment","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can adjust the position and size of the comment section.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can activate the captcha feature while commenting.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can limit the number of comment that users can.","magicbox")?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="disqus_comment[status]" id="disqus_comment[status]">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  esc_attr($key) ?>"<?php if ($key == $options['disqus_comment']['status'] or $options['disqus_comment']['status'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  esc_attr($value) ?></option>
                                <?php } ?>
                            </select>
                            <label class="input-group-text" for="disqus_comment[status]"><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Disqus Comment Setting","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="disqus_comment[app_id]" id="disqus_comment[app_id]" value="<?php echo $options['disqus_comment']['app_id']?>" placeholder=" "/>
                            <label class="form-label" for="disqus_comment[app_id]"><?php echo  __("Disqus Shortname","magicbox") ?></label>
                            <span class="form-info" data-mb="pop" data-mb-title="<?php echo  __("Disqus Shortname","magicbox") ?>" data-mb-content="<?php echo __("Type your shortname taken from disqus.com","magicbox")?>"><i class="fa-solid fa-info"></i></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="disqus_comment[margin]" id="disqus_comment[margin]">
                                <?php foreach ($margins as $key => $value) { ?>
                                    <option
                                            value="<?php echo  esc_attr($key) ?>"<?php if ($key == $options['disqus_comment']['margin'] or $options['disqus_comment']['margin'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  esc_attr($value) ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="disqus_comment[margin]"><?php echo  __("Box Area","magicbox") ?></label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" class="form-control" name="disqus_comment[max_width]" id="disqus_comment[max_width]" value="<?php echo $options['disqus_comment']['max_width']==""?"500px":$options['disqus_comment']['max_width']?>" placeholder=" "/>
                            <label class="form-label" for="disqus_comment[max_width]"><?php echo  __("Max Width","magicbox") ?></label>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="disqus_comment[position]" id="disqus_comment[position]">
                                <?php foreach ($positions as $key => $value) { ?>
                                    <option
                                            value="<?php echo  esc_attr($key) ?>"<?php if ($key == $options['disqus_comment']['position'] or $options['disqus_comment']['position'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  esc_attr($value) ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="disqus_comment[position]"><?php echo  __("Position","magicbox") ?></label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-6 col-lg-3">
                        <?php $url = "admin.php?page=mb_security&sub=mb_captcha";?>
                        <label class="form-label-normal mb-2"><?php echo  __("Comment Captcha","magicbox") ?></label>
                        <a target="_blank" class="btn btn-primary btn-sm btn-sm rounded-pill px-3 mb-3" href="<?php echo esc_attr($url)?>"><?php echo  __("Go Settings","magicbox") ?></a>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <?php $url = "admin.php?page=mb_security&sub=mb_visit_limitation";?>
                        <label class="form-label-normal mb-2"><?php echo  __("Comment Limitation","magicbox") ?></label>

                        <a target="_blank" class="btn btn-primary btn-sm rounded-pill px-3 mb-3" href="<?php echo esc_attr($url)?>"><?php echo  __("Go Settings","magicbox") ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button onclick="return false;" name="upsert" value="<?php echo  __("Update","magicbox") ?>" class="btn btn-success rounded-pill px-4 pageSaveButton"><i class="fa-solid fa-floppy-disk me-2"></i><?php echo  __("Update","magicbox") ?></button>
        </div>
    </div>
</form>
