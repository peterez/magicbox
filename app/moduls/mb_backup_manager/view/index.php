<form method="post" class="theForm theForm-<?php echo sanitize_text_field($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":sanitize_text_field($_REQUEST['method'])?>">

    <div class="card bg-light">

        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Backup Manager","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can back up your entire website, plugins, themes, upload folder or database if you want.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can see the list of backups you have taken and download the ones you want.","magicbox")?></div>
                    </div>
                </div>
            </div>
            <div class="alert alert-custom alert-light-warning " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can close this page. Backup progress will continue.","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="row fixedRow">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="form-check-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input allOptions" name="types[]" value="full"
                                       id="accept_all">
                                <label class="form-check-label" for="accept_all"><span><?php echo __("Full Backup","magicbox")?></span></label>
                            </div>
                            <div class="selectOptions" style="float:left; width: auto;">
                                <?php foreach ($theClass->types as $key => $value) { ?>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="types[]" value="<?php echo  $value ?>"
                                               id="accept_<?php echo  $value ?>">
                                        <label class="form-check-label" for="accept_<?php echo  $value ?>"><span><?php echo  magicbox_strUpDown($value,"capitalize") ?></span></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="card-body backupWarning text-center" style="display:<?php echo $this->options['backup']['task']['status']=="1"?"block":"none"?>;">
                <?php echo __("You can close this page. Backup progress will be continue")?>
            </div>

            <div class="progressArea" style="display:<?php echo $this->options['backup']['task']['status']=="1"?"block":"none"?>;">
                <div class="progress progressIn">
                    <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a>
        </div>
    </div>

    <?php if(count($options['backup']['list'])>0) {?>
    <div class="card bg-light">

        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Backup List","magicbox") ?></h6>
        </div>

        <div class="card-body">

            <table class="table table-mb">
                <thead>
                <tr>
                    <th scope="col"><?php echo __("Date","magicbox")?></th>
                    <th scope="col"><?php echo __("Full","magicbox")?></th>
                    <th scope="col"><?php echo __("Database","magicbox")?></th>
                    <th scope="col"><?php echo __("Plugins","magicbox")?></th>
                    <th scope="col"><?php echo __("Themes","magicbox")?></th>
                    <th scope="col"><?php echo __("Uploads","magicbox")?></th>
                    <th scope="col">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($options['backup']['list'] as $date => $value){?>
                <tr class="item_<?php echo $date?>">
                    <td scope="row"><?php echo $date?></td>
                    <td>
                        <?php 
                         $item = $value['full'];

                        if($item['status'] =="1") {
                            $downloadLink = site_url()."/mb-backup/".$item['name'];
                        } else {
                            $downloadLink = "#";
                        }
                        ?>
                        <?php if($item['name'] !="") {?>
                            <a target="_blank" href="<?php echo $downloadLink?>" class="btn btnDataMB <?php echo $item['status'] =="1"?"btn-primary":"btn-secondary"?>">
                                <i class="fa-solid fa-download me-1"></i><?php echo $item['name']?>
                            </a>
                        <?php }?>
                    </td>
                    <td>
                        <?php 
                         $item = $value['database'];

                        if($item['status'] =="1") {
                            $downloadLink = site_url()."/mb-backup/".$item['name'];
                        } else {
                            $downloadLink = "#";
                        }
                        ?>
                        <?php if($item['name'] !="") {?>
                            <a target="_blank" href="<?php echo $downloadLink?>" class="btn btnDataMB <?php echo $item['status'] =="1"?"btn-primary":"btn-secondary"?>">
                                <i class="fa-solid fa-download me-1"></i><?php echo $item['name']?>
                            </a>
                        <?php }?>
                    </td>

                    <td>
                        <?php 
                         $item = $value['plugins'];

                        if($item['status'] =="1") {
                            $downloadLink = site_url()."/mb-backup/".$item['name'];
                        } else {
                            $downloadLink = "#";
                        }
                        ?>
                        <?php if($item['name'] !="") {?>
                            <a target="_blank" href="<?php echo $downloadLink?>" class="btn <?php echo $item['status'] =="1"?"btn-primary":"btn-secondary"?>">
                                <?php echo $item['name']?>
                            </a>
                        <?php }?>
                    </td>

                    <td>
                        <?php 
                         $item = $value['themes'];

                        if($item['status'] =="1") {
                            $downloadLink = site_url()."/mb-backup/".$item['name'];
                        } else {
                            $downloadLink = "#";
                        }
                        ?>
                        <?php if($item['name'] !="") {?>
                        <a target="_blank" href="<?php echo $downloadLink?>" class="btn <?php echo $item['status'] =="1"?"btn-primary":"btn-secondary"?>">
                            <?php echo $item['name']?>
                        </a>
                        <?php }?>
                    </td>

                    <td>
                        <?php 
                         $item = $value['uploads'];

                        if($item['status'] =="1") {
                            $downloadLink = site_url()."/mb-backup/".$item['name'];
                        } else {
                            $downloadLink = "#";
                        }
                        ?>
                        <?php if($item['name'] !="") {?>
                            <a target="_blank" href="<?php echo $downloadLink?>" class="btn <?php echo $item['status'] =="1"?"btn-primary":"btn-secondary"?>">
                                <?php echo $item['name']?>
                            </a>
                        <?php }?>
                    </td>

                    <td>
                        <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a>
                    </td>
                </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <?php }?>

</form>

<script>

    jQuery(document).on('change','.allOptions',function() {
        if(jQuery(this).is(':checked')) {
            jQuery('.selectOptions input').prop('checked',false).prop('disabled',true);
        } else {
            jQuery('.selectOptions input').prop('checked',false).prop('disabled',false);
        }
    });



    jQuery(document).on('click','.deleteDate',function() {

        date = jQuery(this).attr('date');

        jQuery(this).magicRequest(
            {'action': 'mb_backup_manager', 'method' : 'deleteBackup',"deleteDate":date},
            "",
            function(response) {
                response = JSON.parse(response);

                if(response.result=="ok") {
                    jQuery('.item_'+date).remove();
                } else {
                    Swal.fire({title:"<?php echo __("Error","magicbox")?>",text:response.error,icon:"error",buttons:false,timer: 3000,});
                }

            }
        );

    });


    function checkTasks() {
        interval =   setInterval(function(){

            jQuery(this).magicRequest(
                {'action': 'mb_backup_manager', 'method' : 'getTask'},
                "",
                function(response) {
                      response = JSON.parse(response);
                    if(response.status!="2") {
                        jQuery('.progressArea').show(250);
                        jQuery('.progressArea .progressIn').css({'width':response.progress});
                    } else {
                        location.reload();
                        clearInterval(interval);
                        jQuery('.progressArea').hide(250);
                    }
                }
            );

        }, 5000);
    }

    jQuery(document).on('click', '.backupNow', function () {

        jQuery(this).magicRequest(
            {'action': 'mb_backup_manager', 'method' : 'backup'},
            {'element':'.theForm'},
            function() {
                jQuery('.backupNow').html('<?php echo __("In Progress","magicbox")?>').val('<?php echo __("In Progress","magicbox")?>').removeClass('backupNow');
                jQuery('.progressArea').show(250);
                jQuery('.progressArea .progress').css({'width':'25%'});
                jQuery('.backupWarning').show(250);
                checkTasks();
            }
        );
    });


    <?php if($this->options['backup']['task']['status'] =="1") {?>  checkTasks();  <?php }?>


</script>