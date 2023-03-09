<?php 
 $pureUrl = "admin.php?page=" . sanitize_text_field($_REQUEST['page']) . "&sub=" . esc_attr($_REQUEST['sub']);
?>
<div class="card bg-light">

    <div class="card-header">
        <h6 class="my-0"><?php echo  __("Duplicated Contents","magicbox") ?></h6>
    </div>


    <div class="card-body">
        <div class="alert alert-custom alert-light-primary " role="alert">
            <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
            <div class="alert-text">
                <div class="w-100 d-flex flex-wrap gap-2">
                    <div class="infoItem"><?php echo  __("You can delete duplicate content and redirect to original content.","magicbox") ?></div>
                    <div class="infoItem"><?php echo  __("You can reduce server usage and speed up your website by cleaning up unnecessary content.","magicbox") ?></div>
                </div>
            </div>
        </div>
        <table id="duplicated-posts" class="table table-striped table-mb" style="width:100%">
            <thead>
            <tr>
                <th>&nbsp;</th>
                <th><?php _e("Duplicated Post","magicbox")?></th>
                <th><?php _e("Original Post","magicbox")?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($theClass->duplicates as $item) { ?>
                <tr class="item_<?php echo $item['ID']?>">
                    <td>
                        <div class="form-check-group noBorder">
                            <div class="form-check p-0">
                                <input type="checkbox" name="duplicates[<?php echo $item['ID']?>][status]" value="1"/>
                            </div>
                        </div>
                        <input type="hidden" name="duplicates[<?php echo $item['ID']?>][id]" value="<?php echo $item['ID']?>" />
                        <input type="hidden" name="duplicates[<?php echo $item['ID']?>][target_guid]" value="<?php echo $item['target_guid']?>" />
                    </td>
                    <td>
                        <a target="_blank" href="<?php echo $item['guid']?>"><?php echo $item['post_title']?> <div alt="f504" class="dashicons dashicons-external"></div></a>
                    </td>
                    <td>
                        <a target="_blank" href="<?php echo $item['target_guid']?>"><?php echo $item['target_title']?> <div alt="f504" class="dashicons dashicons-external"></div></a>
                    </td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <div class="row fixedRow">
            <div class="col-md-8">
                <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a></div>
            <div class="col-md-4">
                <div class="d-flex justify-content-end">
                    <?php 
                     $pureUrl = "admin.php?page=" . sanitize_text_field($_REQUEST['page']) . "&sub=" . esc_attr($_REQUEST['sub']);
                    $oldPn = intval(sanitize_text_field($_REQUEST['pn']))-50;
                    $newPn = intval(sanitize_text_field($_REQUEST['pn']))+50;
                    ?>

                    <nav aria-label="<?php echo __("Pagination","magicbox")?>">
                        <ul class="pagination my-0">
                            <?php if($_REQUEST['pn'] >=1) {?>
                                <li class="page-item my-0"><a class="page-link btn rounded-pill px-4 my-0" href="<?php echo $pureUrl."&pn=".$oldPn?>"><i class="fa-solid fa-angles-left me-2"></i><?php _e("Previous","magicbox")?></a></li>
                            <?php }?>
                            <?php if(count($theClass->duplicates) >=50) {?>
                                <li class="page-item my-0"><a class="page-link btn rounded-pill px-4 my-0" href="<?php echo $pureUrl."&pn=".$newPn?>"><i class="fa-solid fa-angles-right me-2"></i><?php _e("Next","magicbox")?></a></li>
                            <?php }?>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>

    <script type="text/javascript">


        jQuery(document).on('click','.justDelete',function() {

            jQuery(this).magicRequest(
                {'action': 'mb_duplicate_manager', 'method' : 'delete','type':'delete'},
                {'element':'#duplicated-posts'},
                function(response) {
                    Swal.fire({title:"<?php echo __("Successfully","magicbox")?>",text:response,icon:"success",buttons:false,timer: 3000,});
                }
            )

        });

        jQuery(document).on('click','.deleteRedirect',function() {
            postid = jQuery(this).attr('the_id');

            jQuery(this).magicRequest(
                {'action': 'mb_duplicate_manager', 'method' : 'delete','type':'deleteRedirect'},
                {'element':'#duplicated-posts'},
                function(response) {
                    Swal.fire({title:"<?php echo __("Successfully","magicbox")?>",text:response,icon:"success",buttons:false,timer: 3000,});
                }
            )

        });


    </script>