<script>
    var isMirrorred = {};
    var codeMirrorVals = {};
</script>
<form method="post" class="theForm theForm-<?php echo sanitize_text_field($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":sanitize_text_field($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Edit Robots.txt") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary" role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can edit the robot.txt file of your website.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can make your edits without the hassle of FTP tools or permissions.","magicbox") ?></div>
                        <div class="infoItem rounded-1">
                            <?php echo  __("More information on creating a robot.txt file can be found at <a href='https://developers.google.com/search/docs/advanced/robots/create-robots-txt' target='_blank'>https://developers.google.com/search/docs/advanced/robots/create-robots-txt</a>","magicbox") ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <textarea name="robotstxt" id="robotstxt" onkeyup="jQuery('.showAcceptRobotostxt').show(0);" rows="4" class="form-control"><?php echo $theClass->loadRobotsTxt()?></textarea>
            </div>
            <div class="form-check-switch">
                <div class="form-check showAcceptRobotostxt">
                    <input type="checkbox" class="form-check-input" name="accept_robotostxt_change" value="ok" id="accept_robotostxt_change">
                    <label class="form-check-label" for="accept_robotostxt_change"><?php echo __("Accept Robotos.txt Changes","magicbox")?></label>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <button onclick="return false;" name="upsert" value="<?php echo  __("Update","magicbox") ?>" class="btn btn-success rounded-pill px-4 pageSaveButton"><i class="fa-solid fa-floppy-disk me-2"></i><?php echo  __("Update","magicbox") ?></button>
        </div>
    </div>
</form>

<script>
    setAsCodeMirror("robotstxt");

    jQuery(document).on('change', '.redirectAnother', function () {
        if (jQuery(this).val() == 2) {
            jQuery('.redirectAnotherValue').hide(0);
        } else {
            jQuery('.redirectAnotherValue').show(0);
        }
    });



</script>