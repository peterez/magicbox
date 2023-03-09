<?php $readUrl = "admin.php?page=".sanitize_text_field($_REQUEST['page'])."&sub=".esc_attr($_REQUEST['sub'])."";?>
<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
    <div class="card bg-light">

        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Contacts","magicbox") ?></h6>
        </div>

        <div class="card-body">

            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("Contact list of forms","magicbox")?></div>
                    </div>
                </div>
            </div>

            <table class="table table-striped table-mb formBuilderContacts">
                <thead>
                <tr>
                    <th><?php _e("Title","magicbox")?></th>
                    <th><?php _e("Mail","magicbox")?></th>
                    <th><?php _e("Date","magicbox")?></th>
                    <th><?php _e("IP","magicbox")?></th>
                    <th class="text-center"><?php _e("Status","magicbox")?></th>
                    <th class="text-center"><?php _e("Form","magicbox")?></th>
                    <th class="text-end"><?php _e("Process","magicbox")?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($theClass->results as $item) { $item['label_data'] = unserialize($item['label_data']); ?>
                <tr>
                    <td><?php echo $item['label_data']['title']?></td>
                    <td><?php echo $item['mail']?></td>
                    <td><?php echo $item['date']?></td>
                    <td><?php echo $item['ip']?></td>
                    <td class="text-center">
                        <?php if($item['status']=="3") { ?>
                            <a class="btn btn-warning statusResult fs-4" href="javascript:;"><i class="fa-solid fa-envelope"></i></a>
                        <?php } else { ?>
                            <a class="btn btn-success statusResult fs-4" href="javascript:;"><i class="fa-solid fa-envelope-open-text"></i></a>
                        <?php } ?>
                    </td>
                    <td class="text-center"><a class="btn btn-primary btnDataMB" href="<?php echo $readUrl?>&method=index&formId=<?php echo $item['form_id']?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td class="text-end">
                        <a class="btn btn-primary btnDataMB" href="<?php echo $readUrl?>&method=view&contactId=<?php echo $item['id']?>"><i class="fa-solid fa-eye"></i></a>
                        <a class="btn btn-danger btnDataMB" href="<?php echo $readUrl?>&method=deleteContact&contactId=<?php echo $item['id']?>"><i class="fa-solid fa-trash-can"></i></a>
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


