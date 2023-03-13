<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Error Logs","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can see the location and date of the error logs.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can easily clear the records.","magicbox")?></div>
                    </div>
                </div>
            </div>

            <div class="errorListArea">
               <ul class="error-list">
                <?php 
                 $logs = $theClass->loadErrorFile();

                foreach($logs as $item) {
                    ?>
                    <li class="error-level-<?php echo $item['level']?>"><i class="fa-solid fa-right-long text-danger me-2"></i><b><?php echo $item['date']?></b> : <?php echo $item['detail']?></li>
                    <?php 
                 }
                ?>
               </ul>
            </div>

            <div class="row fixedRow">
                <div class="col-md-6">
                    <div class="form-check-switch">
                        <div class="form-check">
                            <label class="form-check-label" for="clearWhenUpdate"><?php echo __("Clear error logs when update","magicbox")?></label>
                            <input type="checkbox" class="form-check-input" name="clear_log" value="ok" id="clearWhenUpdate">
                        </div>
                    </div>

                </div>

                <div class="col-md-6">
                    <?php if(count($logs)>0) {
                        $currentUrl = $magicBox->getCurrentUrl();
                        $theUrl = $currentUrl."&method=clearErrorLog&redirect=".urlencode($currentUrl);
                        ?>
                        <a href="<?php echo esc_attr($theUrl)?>" class="btn btn-danger rounded-pill px-4 mt-2"><i class="fa-solid fa-trash-can me-2"></i><?php echo  __("Delete Error Logs","magicbox") ?></a>
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button onclick="return false;" name="upsert" value="<?php echo  __("Update","magicbox") ?>" class="btn btn-success rounded-pill px-4 pageSaveButton"><i class="fa-solid fa-floppy-disk me-2"></i><?php echo  __("Update","magicbox") ?></button>
        </div>
    </div>
</form>
