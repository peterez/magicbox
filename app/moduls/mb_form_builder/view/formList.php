<?php $readUrl = "admin.php?page=".sanitize_text_field($_REQUEST['page'])."&sub=".esc_attr($_REQUEST['sub']);?>
<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
    <div class="card bg-light">

        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h6 class="my-0"><?php echo  __("Form List","magicbox") ?></h6>
                <a href="admin.php?page=mb_contact&sub=mb_form_builder" class="btn btn-sm btn-primary rounded-pill px-4"><i class="fa-solid fa-circle-plus me-2"></i><?php echo  __("Add New Form","magicbox") ?></a>
            </div>
        </div>

        <div class="card-body">

            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("Your form list, you can change form or delete","magicbox")?></div>
                        <div class="infoItem"><?php echo __("Attention: Clear you shortcode in post/page when delete your form","magicbox")?></div>
                    </div>
                </div>
            </div>

            <table class="table table-striped table-mb formBuilderFormList">
                <thead>
                <tr>
                    <th><?php _e("Title","magicbox")?></th>
                    <th><?php _e("Mail","magicbox")?></th>
                    <th><?php _e("Shortcode","magicbox")?></th>
                    <th class="text-end"><?php _e("Process","magicbox")?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($theClass->results as $item) {
                    $item['label_data']= unserialize($item['label_data']);
                    ?>
                <tr>
                    <td><?php echo $item['label_data']['title']?></td>
                    <td><?php echo $item['mail']==""?__("None","magicbox"):$item['mail']?></td>
                    <td>[mbForm id="<?php echo $item['id']?>"]</td>
                    <td class="text-end">
                        <a class="btn btn-primary btnDataMB" href="<?php echo $readUrl?>&formId=<?php echo $item['id']?>"><i class="fa-solid fa-pen-to-square me-1"></i><?php echo __("Edit","magicbox")?></a>
                        <a class="btn btn-danger btnDataMB" href="<?php echo $readUrl?>&method=deleteForm&formId=<?php echo $item['id']?>"><i class="fa-solid fa-trash-can me-1"></i><?php echo __("Delete","magicbox")?></a>
                    </td>
                </tr>
                <?php }?>
                </tbody>
                </table>
        </div>
        <?php 
         $pureUrl = "admin.php?page=".sanitize_text_field($_REQUEST['page'])."&sub=".esc_attr($_REQUEST['sub'])."&method=".esc_attr($_REQUEST['method']);
         $oldPn = intval(sanitize_text_field($_REQUEST['pn']))-1;
         $newPn = intval(sanitize_text_field($_REQUEST['pn']))+1;
        ?>
        <?php if($_REQUEST['pn'] >=1 || ($theClass->count) >=20) {?>
            <div class="card-footer">
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
        <?php }?>
    </div>
</form>


