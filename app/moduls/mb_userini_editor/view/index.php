<script>
    var isMirrorred = {};
    var codeMirrorVals = {};
</script>
<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("User.ini Editor","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can make updates without the need for ftp client.","magicbox")?></div>
                    </div>
                </div>
            </div>
            <div class="alert alert-custom alert-light-warning " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("If the User.ini file does not exist, it will be created automatically.","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="alert alert-custom alert-light-danger " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-minus"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("Please backup the file contents before making changes","magicbox")?></div>
                    </div>
                </div>
            </div>

            <textarea id="userini" name="userini" class="form-control"><?php echo  $theClass->loadUserIni(); ?></textarea>

            <div class="form-check-group noBorder">
                <div class="form-check mt-2">
                    <input type="checkbox" class="form-check-input" name="accept_userini_change" value="ok"
                           id="accept_userini_change">
                    <label class="form-check-label" for="accept_userini_change"><span><?php echo  __("Accept User.ini Changes","magicbox") ?></span></label>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button onclick="return false;" name="upsert" value="<?php echo __("Update","magicbox")?>" class="btn btn-success rounded-pill px-4 pageSaveButton"><i class="fa-solid fa-floppy-disk me-2"></i><?php echo __("Update","magicbox")?></button>
        </div>
    </div>
</form>


<script>
    setAsCodeMirror("userini","text/jsx");
</script>
