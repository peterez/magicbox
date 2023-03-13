<div class="card bg-light">

    <div class="card-header">
        <h6 class="my-0"><?php echo  __("Contact Page Settings","magicbox") ?></h6>
    </div>

    <div class="card-body">
        <?php if($theClass->subMenu) {?>
            <nav class="navInnerArea">
                <ul class="nav nav-pills subNavMenu navInner" role="tablist">
                    <?php foreach($theClass->subMenu as $item) {
                        if($item['method'] !="") {
                            $item['link'] = $item['link']."&method=".$item['method'];
                        }
                        ?>
                        <li class="nav-item" role="presentation" ><a class="nav-link <?php echo $_REQUEST['method']==$item['method']?"active":""?>" href="<?php echo esc_attr($item['link']) ?>"><?php echo  $item['title'] ?></a></li>
                    <?php }?>
                </ul>
            </nav>
        <?php }?>

        <div class="container-mb">
            <div class="row fixedRow">

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control"><?php echo  $theClass->result['status'] == "3" ? __("Unread","magicbox") : __("Read","magicbox") ?></label>
                        <label class="form-label"><?php echo  __("Status","magicbox") ?></label>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control"><?php echo  $theClass->result['date'] ?></label>
                        <label class="form-label"><?php echo  __("Date","magicbox") ?></label>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control"><?php echo  $theClass->result['ip'] ?></label>
                        <label class="form-label"><?php echo  __("IP","magicbox") ?></label>
                    </div>
                </div>
                <div class="clearfix"></div>
                <?php $serialize = ($theClass->result['form']['data']); ?>

                <?php foreach ($serialize as $key => $value) {

                    $value['labelName'] = $value['labelName'] ==""?$value['placeholder']:$value['labelName'];
                    $value['labelName'] = $value['labelName'] ==""?$value['note']:$value['labelName'];
                    ?>

                    <?php if ($theNames != "" or $value != "") { ?>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control"><?php echo esc_attr($theClass->result['data'][$key]) ?></label>
                                <label class="form-label"><?php echo  esc_attr($value)['labelName'] ?></label>
                            </div>
                            <?php echo  esc_attr($value)['type']=="html"?"<br>":""?>
                        </div>
                        <div class="clearfix"></div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


