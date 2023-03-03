<?php 
 $targets = array(
    "1" => __("Users","magicbox"),
    "2" => __("Manuel","magicbox")
);
$detailUrl = "admin.php?page=".sanitize_text_field($_REQUEST['page'])."&sub=".sanitize_text_field($_REQUEST['sub'])."&method=sendMail";
?>
<form method="post" class="theForm theForm-<?php echo sanitize_text_field($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":sanitize_text_field($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Campaigns","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can review the mail campaigns you have sent from the list","magicbox")?></div>
                    </div>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th><?php _e("Title","magicbox")?></th>
                    <th><?php _e("Type","magicbox")?></th>
                    <th><?php _e("Total","magicbox")?></th>
                    <th><?php _e("Start Date","magicbox")?></th>
                    <th><?php _e("Last Process","magicbox")?></th>
                    <th><?php _e("End Date","magicbox")?></th>
                    <th style="max-width:200px"><?php _e("Error","magicbox")?></th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($theClass->results as $item) {?>
                <tr>
                    <td><?php echo $item['subject']?></td>
                    <td><?php echo $targets[$item['type']]?></td>
                    <td><?php echo $item['total']?>/<?php echo $item['sended']?></td>
                    <td><?php echo $item['date']?></td>
                    <td><?php echo $item['date']!=$item['last_process_date']?magicbox_timeElapsed($item['last_process_date']):""?></td>
                    <td><?php echo $item['date']!=$item['end_date']?magicbox_timeElapsed($item['end_date']):""?></td>
                    <td style="max-width:200px"><?php echo $item['error']?></td>
                    <td>
                        <div class="d-flex justify-content-center gap-1">
                            <?php 
                             if(
                                $item['total']>$item['sended'] and $item['sended']>0 and
                                strtotime($item['date'])+90<=strtotime($item['last_process_date'])
                            ) {?>
                                <button type="submit" name="upsert" data-id="<?php echo $item['id']?>" value="<?php echo __("Update","magicbox")?>" onclick="return false;" class="btn btn-success btn-sm rounded-pill px-3 sendNow"><?php echo __("Force Send","magicbox")?></button>
                            <?php }?>

                            <?php if($item['status'] =="1") {?>
                                <button type="submit" name="upsert" data-id="<?php echo $item['id']?>" value="<?php echo __("Update","magicbox")?>" onclick="return false;" class="btn btn-warning btn-sm rounded-pill px-3 stopNow"><?php echo __("Stop","magicbox")?></button>
                            <?php }?>

                            <?php if($item['status'] =="2") {?>
                                <button type="submit" name="upsert" data-id="<?php echo $item['id']?>" value="<?php echo __("Update","magicbox")?>" onclick="return false;" class="btn btn-primary btn-sm rounded-pill px-3 sendNow"><?php echo __("Resume","magicbox")?></button>
                            <?php }?>
                            <?php if($item['status'] =="3") {?>
                                <button type="submit" value="<?php echo __("Update","magicbox")?>" onclick="return false;" class="btn btn-secondary btn-sm rounded-pill px-3"><?php echo __("Done","magicbox")?></button>
                            <?php }?>

                            <a class="btn btn-success btn-sm rounded-pill px-3" href="<?php echo $detailUrl?>&id=<?php echo $item['id'];?>"><?php echo __("Show","magicbox")?></a>
                        </div>
                    </td>
                </tr>
                <?php }?>
                </tbody>
                </table>
        </div>
        <div class="card-footer">
            <?php 
             $pureUrl = "admin.php?page=".sanitize_text_field($_REQUEST['page'])."&sub=".sanitize_text_field($_REQUEST['sub'])."&method=campaigns";
            $oldPn = intval(sanitize_text_field($_REQUEST['pn']))-1;
            $newPn = intval(sanitize_text_field($_REQUEST['pn']))+1;
            ?>

            <nav aria-label="<?php echo __("Pagination","magicbox")?>">
                <ul class="pagination my-0">
                    <?php if($_REQUEST['pn'] >=1) {?>
                        <li class="page-item my-0"><a class="page-link btn rounded-pill px-4 my-0" href="<?php echo $pureUrl."&pn=".$oldPn?>"><i class="fa-solid fa-angles-left me-2"></i><?php _e("Previous","magicbox")?></a></li>
                    <?php }?>
                    <?php if(($theClass->count) >=20) {?>
                        <li class="page-item my-0"><a class="page-link btn rounded-pill px-4 my-0" href="<?php echo $pureUrl."&pn=".$newPn?>"><i class="fa-solid fa-angles-right me-2"></i><?php _e("Next","magicbox")?></a></li>
                    <?php }?>
                </ul>
            </nav>
        </div>
    </div>

</form>




<?php $sendUrl = "admin.php?page=".sanitize_text_field($_REQUEST['page'])."&sub=".sanitize_text_field($_REQUEST['sub'])."&method=sendMail&campaign_id="; ?>
<script>
    jQuery(document).on('click', '.sendNow', function () {
        theId = jQuery(this).data('id');
        theUrl  = "<?php echo $sendUrl?>"+theId;

        jQuery(this).magicRequest(
            {'action': 'mb_bulk_mail', 'method' : 'sendMail',"campaign_id":theId},
            {'element':'form'},
            function(response) {
                console.log(response);
                response = jQuery.parseJSON(response);
                //console.log(response);
                if(response.result =="ok") {
                    Swal.fire({title:"<?php echo __("Successfully","magicbox")?>",text:"<?php echo __("Started again mail sending","magicbox")?>",icon:"success",buttons:false,timer: 3000,});
                } else {
                    Swal.fire({title:"<?php echo __("Error","magicbox")?>",text:response.error,icon:"error",buttons:false,timer: 3000,});
                }
            }
        );
    });

    jQuery(document).on('click', '.stopNow', function () {
        theId = jQuery(this).data('id');
        theUrl  = "<?php echo $sendUrl?>"+theId;

        jQuery(this).magicRequest(
            {'action': 'mb_bulk_mail', 'method' : 'stopCampaign',"campaign_id":theId},
            "",
            function(response) {
                response = jQuery.parseJSON(response);
                console.log(response);
                if(response.result =="ok") {
                    Swal.fire({title:"<?php echo __("Successfully","magicbox")?>",text:"<?php echo __("Campaign stoped","magicbox")?>",icon:"success",buttons:false,timer: 3000,});
                    location.reload();
                } else {
                    Swal.fire({title:"<?php echo __("Error","magicbox")?>",text:response.error,icon:"error",buttons:false,timer: 3000,});
                }
            }
        );
    });




</script>
