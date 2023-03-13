<div class="card bg-light">
    <div class="card-header">
        <h6 class="my-0"> <?php echo  __("Php Information","magicbox") ?></h6>
    </div>
    <div class="card-body">
        <div class="alert alert-custom alert-light-primary " role="alert">
            <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
            <div class="alert-text">
                <div class="w-100 d-flex flex-wrap gap-2">
                    <div class="infoItem"><?php echo  __("You can view a lot of informations about the current status of your php configuration.","magicbox") ?></div>
                    <div class="infoItem"><?php echo  __("You can view which extensions are active on your server.","magicbox") ?></div>
                    <div class="infoItem"><?php echo  __("You can view the server and cookie information of your website.","magicbox") ?></div>
                </div>
            </div>
        </div>

        <ul class="nav nav-pills navInner" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="-phpini-tab" data-bs-toggle="pill" data-bs-target="#-phpini" type="button" role="tab" aria-controls="-phpini" aria-selected="true">PHP</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="-ext-tab" data-bs-toggle="pill" data-bs-target="#-ext" type="button" role="tab" aria-controls="-ext" aria-selected="false">EXTENSIONS</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="-server-tab" data-bs-toggle="pill" data-bs-target="#-server" type="button" role="tab" aria-controls="-server" aria-selected="false">SERVER</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="-cookie-tab" data-bs-toggle="pill" data-bs-target="#-cookie" type="button" role="tab" aria-controls="-cookie" aria-selected="false">COOKIE</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="-session-tab" data-bs-toggle="pill" data-bs-target="#-session" type="button" role="tab" aria-controls="-session" aria-selected="false">SESSION</button>
            </li>

        </ul>

        <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane fade show active" id="-phpini" role="tabpanel" aria-labelledby="-phpini-tab">

                <?php foreach($theClass->iniVariables as $key =>  $items) { ?>

                    <div class="row fixedRow">
                        <div class="col-12">
                            <h3 class="innerTitle"><?php echo  strtoupper($key) ?></h3>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-12">

                            <table id="error-redirects" class="table table-striped" style="width:100%">
                                <thead>
                                <tr>
                                    <th><?php _e("Name","magicbox")?></th>
                                    <th><?php _e("Global","magicbox")?></th>
                                    <th><?php _e("Local","magicbox")?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                 foreach($items as $keyName => $item) {
                                    ?>
                                    <tr class="item">
                                        <td>
                                            <?php echo esc_attr($keyName)?>
                                        </td>
                                        <td>
                                            <?php echo $item['global_value']?>
                                        </td>
                                        <td>
                                            <?php echo $item['local_value']?>
                                        </td>
                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>

                        </div>
                    </div>

                <?php }?>

            </div>

            <div class="tab-pane fade" id="-ext" role="tabpanel" aria-labelledby="-ext-tab">

                <div class="row fixedRow">

                    <div class="col-12">
                        <h3 class="innerTitle">EXTENSIONS</h3>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-12">

                        <table id="error-redirects" class="table table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th><?php _e("Name","magicbox")?></th>
                                <th><?php _e("Value","magicbox")?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                             foreach($theClass->extVariables as $keyName => $item) {
                                $ext = new ReflectionExtension($item);
                                $version = $ext->getVersion();
                                ?>
                                <tr class="item">
                                    <td>
                                        <?php echo $item?>
                                    </td>
                                    <td>
                                        <?php echo $version?>
                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

            <div class="tab-pane fade" id="-server" role="tabpanel" aria-labelledby="-server-tab">

                <div class="row fixedRow">

                    <div class="col-12">
                        <h3 class="innerTitle">SERVER</h3>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-12">

                        <table class="table table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th><?php _e("Name","magicbox")?></th>
                                <th><?php _e("Value","magicbox")?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                             foreach($_SERVER as $keyName => $item) {
                                ?>
                                <tr class="item">
                                    <td>
                                        <?php echo esc_attr($keyName)?>
                                    </td>
                                    <td>
                                        <?php if(is_array($item)) {
                                            echo serialize($item);
                                        }elseif(is_object($item)) {
                                            echo serialize($item);
                                        } else {
                                            echo $item;
                                        } ?>
                                    </td>

                                </tr>
                            <?php }?>
                            </tbody>
                        </table>

                    </div>

                </div>


            </div>


            <div class="tab-pane fade" id="-cookie" role="tabpanel" aria-labelledby="-cookie-tab">

                <div class="row fixedRow">

                    <div class="col-12">
                        <h3 class="innerTitle">COOKIE</h3>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-12">

                        <table class="table table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th><?php _e("Name","magicbox")?></th>
                                <th><?php _e("Value","magicbox")?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                             foreach($_COOKIE as $keyName => $item) {
                                if(substr($keyName,0,10)=="wordpress_") { continue; }
                                ?>
                                <tr class="item">
                                    <td>
                                        <?php echo esc_attr($keyName)?>
                                    </td>
                                    <td>
                                        <?php if(is_array($item)) {
                                            echo serialize($item);
                                        }elseif(is_object($item)) {
                                            echo serialize($item);
                                        } else {
                                            echo $item;
                                        } ?>
                                    </td>

                                </tr>
                            <?php }?>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>

            <div class="tab-pane fade" id="-session" role="tabpanel" aria-labelledby="-session-tab">

                <div class="row fixedRow">

                    <div class="col-12">
                        <h3 class="innerTitle">SESSION</h3>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-12">

                        <table class="table table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th><?php _e("Name","magicbox")?></th>
                                <th><?php _e("Value","magicbox")?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                             foreach($_SESSION as $keyName => $item) {
                                if(substr($keyName,0,10)=="wordpress_") { continue; }
                                ?>
                                <tr class="item">
                                    <td>
                                        <?php echo esc_attr($keyName)?>
                                    </td>
                                    <td>
                                        <?php if(is_array($item)) {
                                            echo serialize($item);
                                        }elseif(is_object($item)) {
                                            echo serialize($item);
                                        } else {
                                            echo $item;
                                        } ?>
                                    </td>

                                </tr>
                            <?php }?>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>







<style>
    .tab-content .table tr td:nth-child(2) {
    word-break: break-all;
    }
    .tab-content .table tr td:nth-child(3) {
        word-break: break-all;
    }
</style>







