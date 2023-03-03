<?php $pureUrl = "admin.php?page=" . sanitize_text_field($_REQUEST['page']) . "&sub=" . sanitize_text_field($_REQUEST['sub']); ?>
<form method="post" class="theForm theForm-<?php echo sanitize_text_field($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":sanitize_text_field($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Login Logs","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can view the date users attempted to login.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can view whether the login attempt was successful or not.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can see what ip and browser users are trying from.","magicbox")?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="login_logs[status]" id="login_logs[status]">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['login_logs']['status'] or $options['login_logs']['status'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="input-group-text" for="login_logs[status]"><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a>
        </div>
    </div>

    <div class="mb-3"></div>
    <div class="clearfix"></div>

    <div class="card bg-light">

        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Login Logs","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th><?php _e("Date","magicbox")?></th>
                    <th><?php _e("Username","magicbox")?></th>
                    <th><?php _e("Ip","magicbox")?></th>
                    <th><?php _e("Status","magicbox")?></th>
                    <th><?php _e("Browser","magicbox")?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($theClass->results as $item) {  ?>
                    <tr>
                        <td><?php echo $item['date']?></td>
                        <td><?php echo $item['username']?></td>
                        <td><?php echo $item['ip']?></td>
                        <td><?php echo $item['status']=="1"?__("Success","magicbox"):__("Failed","magicbox")?></td>
                        <td><?php echo $item['browser']?></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>

    </div>
</form>
<script>
    document.querySelector('.pageSaveFlushButton').addEventListener('click',() => {
        Swal.fire({
            didOpen: () => {
                Swal.showLoading()
                jQuery(this).magicRequest(
                    {'action': 'mb_login_logs', 'method' : 'index','upsertAndFlush':'true'},
                    {'element':'.theForm-<?php echo sanitize_text_field($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":sanitize_text_field($_REQUEST['method'])?>'},
                    function(response) {
                        response = JSON.parse(response);
                        Swal.close()
                        if(response['result']=="ok") {
                            swal.fire({title:"<?php echo __("Successfully","magicbox")?>",text:"<?php echo __("It's Done","magicbox")?>",icon:"success",buttons:false,timer: 3000});
                        } else {
                            Swal.fire({title:"<?php echo __("Error","magicbox")?>",text:response['error'],icon:"error",buttons:false,timer: 3000});
                        }
                    }
                );
            }
        })
    })
</script>

<?php 
  $oldPn = intval(sanitize_text_field($_REQUEST['pn']))-1;
$newPn = intval(sanitize_text_field($_REQUEST['pn']))+1;
?>

<nav aria-label="<?php echo __("Pagination","magicbox")?>">
    <ul class="pagination mt-3">
        <?php if($_REQUEST['pn'] >=1) {?>
            <li class="page-item"><a class="page-link" href="<?php echo $pureUrl."&pn=".$oldPn?>"><?php _e("Previous","magicbox")?></a></li>
        <?php }?>
        <?php if(($theClass->count) >=20) {?>
            <li class="page-item"><a class="page-link" href="<?php echo $pureUrl."&pn=".$newPn?>"><?php _e("Next","magicbox")?></a></li>
        <?php }?>
    </ul>
</nav>

