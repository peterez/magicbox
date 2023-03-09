<script>
    var isMirrorred = {};
    var codeMirrorVals = {};
</script>
<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Htaccess Editor","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can make updates without the need for ftp program.","magicbox")?></div>
                    </div>
                </div>
            </div>
            <div class="alert alert-custom alert-light-warning " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("If the Htaccess file does not exist, it will be created automatically.","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="alert alert-custom alert-light-danger " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-minus"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("Please backup the file contents before making any changes","magicbox")?></div>
                    </div>
                </div>
            </div>

            <textarea id="htaccess" name="htaccess" class="form-control"><?php echo  $theClass->loadHtaccess(); ?></textarea>
            <div class="form-check-switch noBorder">
                <div class="form-check mt-2">
                    <input type="checkbox" class="form-check-input" name="accept_htaccess_change" value="ok"
                           id="accept_htaccess_change">
                    <label class="form-check-label" for="accept_htaccess_change"><span><?php echo  __("Accept Htaccess Changes","magicbox") ?></span></label>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button onclick="return false;" name="upsert" value="<?php echo __("Update","magicbox")?>" class="btn btn-success rounded-pill px-4 pageSaveButton"><i class="fa-solid fa-floppy-disk me-2"></i><?php echo __("Update","magicbox")?></button>
        </div>
    </div>
</form>


<script>
    setAsCodeMirror("htaccess","text/x-nginx-conf");
</script>