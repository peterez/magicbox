<?php global $menuIcons;
$magicBoxLink = "admin.php?page=magic-box";
$_REQUEST['page'] = esc_attr($_REQUEST['page']);
$_REQUEST['sub'] = esc_attr($_REQUEST['sub']);
$_REQUEST['method'] = esc_attr($_REQUEST['method']);
?>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap shadow-sm p-0 mb-4">
    <a class="navbar-brand" href="#">WP MagicBox</a>
</header>

<div class="mbProgress" style=""></div>

<div class="container-fluid theMagicBox">
<div class="row">

<div class="col-3 sideBarCol">
    <div class="sidebarArea">
        <nav id="sidebarMenu" class="card sidebar collapse show">
            <a href="javascript:;" class="mobilNavHideButton"><i class="fa-solid fa-xmark"></i></a>

            <div class="card-header">
                <div class="menuSearchArea">
                    <input type="text" class="menuSearchField form-control" placeholder="<?php echo __("What you need?", "magicbox") ?>"/>
                    <a href="javascript:;" class="menuSearchCancelButton"><i class="fa-solid fa-xmark me-2"></i> <?php echo __("Cancel", "magicbox") ?>
                    </a>
                </div>

            </div>
            <div class="mb-menu card-body">
                <ul class="list-unstyled sideBarNav">
                    <li class="item <?php echo $_REQUEST['page'] == "magic-box"? ' selected' : "" ?>">
                        <button class="btn btn-sm itemLink" onclick="window.location='<?php echo $magicBoxLink ?>'"><i
                                class="bi bi-display"></i> &nbsp;<span><?php echo __("MagicBox", "magicbox") ?></span>
                        </button>
                    </li>
                    <?php
                    $menuUrls = array();
                    $menuNames = array();
                    foreach ($categories as $key => $item) {

                        if ($key == "mb_faq" or $key == "mb_documentation"){
                            continue;
                        }

                        $menuUrl         = menu_page_url($key, false);
                        $icon            = $menuIcons[$key];
                        $menuUrls[$key]  = $menuUrl;
                        $menuNames[$key] = $item['title'];
                        if (@$item['subs'][esc_attr($_REQUEST['sub'])]){
                            $selectedClass = ' selected';
                        } else {
                            $selectedClass = '';
                        }

                        $hasModulClass = "hasModul_" . $item['has'];

                        ?>

                        <li class="item menuItem <?php echo $hasModulClass ?> <?php echo $selectedClass ?>">

                            <?php if (is_array($item['subs'])){ ?>

                                <button class="btn btn-sm itemLink" data-bs-toggle="collapse" data-target="#menu-<?php echo $key ?>" data-bs-target="#menu-<?php echo $key ?>">
                                    <i class="<?php echo $icon ?>"></i> &nbsp;<span><?php echo $item['title'] ?></span>
                                </button>
                                <ul class="list-unstyled ps-3 collapse subMenu <?php echo $_REQUEST['page'] == $key? "show" : "" ?>"
                                    id="menu-<?php echo $key ?>">
                                    <?php /*?>
                                <li <?php if ($_REQUEST['sub'] == "") { ?><?php echo  $_REQUEST['page'] == $key ? 'class="selected"' : "" ?><?php } ?>>
                                    <a class="nav-link" href="<?php echo  $menuUrl ?>"><b><?php echo  $item['title'] ?></b></a></li>
                                <?*/
                                    ?>
                                    <?php if (is_array($item['subs'])){
                                        if (count($item['subs'])>0){
                                            foreach ($item['subs'] as $subKey => $it) {
                                                $menuUrls[$subKey]  = $menuUrl . "&sub=" . $subKey;
                                                $menuNames[$subKey] = $it['title'];

                                                $hasSubModulClass = "hasSubModul_" . $it['has'];

                                                ?>
                                                <li class="subMenuItem <?php echo $hasSubModulClass ?> <?php echo $_REQUEST['sub'] == $subKey? ' selected' : "" ?>">
                                                    <a class="nav-link" href="<?php echo $menuUrl ?>&sub=<?php echo $subKey ?>"><i class="bi bi-chevron-compact-right me-2"></i><?php echo $it['title'] ?>
                                                    </a>
                                                </li>
                                            <?php
                                            }
                                        }
                                    }?>

                                </ul>
                            <?php } else { ?>
                                <button class="btn btn-sm itemLink" onclick="window.location='<?php echo $menuUrl ?>'">
                                    <i class="<?php echo $icon ?>"></i> &nbsp;<span><?php echo $item['title'] ?></span>
                                </button>

                            <?php } ?>

                        </li>
                    <?php } ?>

                    <div class="searchNoResult"><?php echo __("There is no results", "magicbox") ?></div>
                </ul>

                <div class="text-center">
                    <div class="socialMedia">
                        <a href="https://instagram.com/wpmagicboxcom" target="_blank" class="instagram"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://facebook.com/wpmagicboxcom" target="_blank" class="facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://twitter.com/wpmagicboxcom" target="_blank" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                        <a href="https://www.youtube.com/channel/UCcrg3AKUwIezlUDcDjT5aOg" target="_blank" class="youtube"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>

            </div>

        </nav>
    </div>
</div>

<div class="col-9 pageInnerArea">
    <div class="pageInner">
        <?php if ($_REQUEST['sub']){ ?>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo $magicBoxLink ?>"><?php _e("Home", "magicbox") ?></a></li>
                    <?php if ($_REQUEST['page'] != "" and $_REQUEST['page'] != "magic-box"){ ?>
                        <li class="breadcrumb-item <?php echo $_REQUEST['sub'] == ""? "active" : "" ?>"><a
                                href="<?php echo esc_attr($menuUrls[$_REQUEST['page']]) ?>"><?php echo esc_attr($menuNames[$_REQUEST['page']]) ?></a>
                        </li>
                    <?php } ?>
                    <?php if ($_REQUEST['sub'] != ""){ ?>
                        <li class="breadcrumb-item active"><a
                                href="<?php echo esc_attr($menuUrls[$_REQUEST['sub']]) ?>"><?php echo esc_attr($menuNames[$_REQUEST['sub']]) ?></a>
                        </li>
                    <?php } ?>
                    <?php if (@$theClass->subMenu){ ?>
                        <li class="breadcrumb-item"></li>
                    <?php } ?>
                </ol>
            </nav>
        <?php } ?>

        <div class="row fixedRow licenceKeyAlert" style="display:<?php echo @$magicBox->licence['result'] != "ok"? "block" : "none" ?>">
            <div class="col-12">
                <div class="alert alert-custom alert-light-danger " role="alert">
                    <div class="alert-icon"><i class="fa-solid fa-circle-minus"></i></div>
                    <div class="alert-text">
                        <div class="w-100 d-flex flex-wrap gap-2">
                            <?php echo __("You can't manage magixbox without licence key. Please update your licence key or buy new one") ?>.
                            <?php echo __("For buy new licence key", "magicbox") ?>:
                            <a target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if ($magicBox->licence['result'] == "ok"){

            if (time()>=intval($magicBox->licence['end_time']) or intval($magicBox->licence['end_time'])-time()<=2592000 and intval($magicBox->licence['end_time'])>0){
                ?>
                <div class="row fixedRow">
                    <div class="col-12">
                        <div class="alert alert-custom alert-light-warning " role="alert">
                            <div class="alert-icon"><i class="fa-solid fa-circle-plus"></i></div>
                            <div class="alert-text">
                                <div class="w-100 d-flex flex-wrap gap-2">
                                    <?php
                                    if (time()>=intval($magicBox->licence['end_time'])){
                                        ?>
                                        <?php echo __("Your licence key in trouble. You have to buy or upgrade your licence") ?>.
                                        <?php echo __("For licence key process", "magicbox") ?>:
                                        <a target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a>
                                    <?php
                                    } else {
                                        if (intval($magicBox->licence['end_time'])-time()<=2592000){
                                            echo __("Your licence key will expire soon. You have to upgrade your licence");
                                            ?>.
                                            <?php echo __("For licence key process", "magicbox") ?>:
                                            <a target="_blank" href="https://wpmagicbox.com"><?php echo __("Upgrade Licence", "magicbox") ?></a>
                                        <?php
                                        }
                                    } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
        }?>

        <?php if (@$theClass->subMenu){ ?>
            <nav class="navInnerArea">
                <ul class="nav nav-pills subNavMenu navInner" role="tablist">
                    <?php foreach ($theClass->subMenu as $item) {
                        if ($item['method'] != ""){
                            $item['link'] = $item['link'] . "&method=" . $item['method'];
                        }
                        ?>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?php echo $_REQUEST['method'] == $item['method']? "active" : "" ?>" href="<?php echo $item['link'] ?>"><?php echo $item['title'] ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        <?php } ?>
        <?php

        if ($subModul == ""){
            $pathAfter                     = '/main/' . $modulPath . "-view.php";
            $file                          = $GLOBALS{'_mb_moduls_'} . $pathAfter;
            $mbMasterPageFiles[$modulPath] = $file;
        } else {
            $pathAfter                      = '/' . $modul . '/view/' . $methodName . '.php';
            $file                           = $GLOBALS{'_mb_moduls_'} . $pathAfter;
            $mbMasterPageFiles[$methodName] = $file;
        }

        if (file_exists($file)){
            @include $file;
        } else {

            foreach ($GLOBALS{'mbAllModulDirs'} as $theModulDir) {
                $file = $theModulDir . $pathAfter;
                if (file_exists($file)){
                    @include $file;
                    break;
                }
            }

        }

        ?>

        <script>
            jQuery(document).on('click', '.pageSaveButton', function () {

                Swal.fire({
                    didOpen: function () {
                        Swal.showLoading();
                        jQuery(this).magicRequest(
                            {'action': '<?php echo $_REQUEST['sub']?>', 'method': '<?php echo $_REQUEST['method']==""?"index":$_REQUEST['method']?>'},
                            {'element': '.theForm-<?php echo $_REQUEST['sub']?>-<?php echo $_REQUEST['method']==""?"index":$_REQUEST['method']?>'},
                            function (response) {
                                if (response == "0") {
                                    Swal.fire({title: "<?php echo __("Error","magicbox")?>", text: "<?php echo __("Check your session","magicbox")?>", icon: "error", buttons: false, timer: 3000});
                                } else {

                                    response=JSON.parse(response);
                                    Swal.close()
                                    if (response['result'] == "ok") {
                                        swal.fire({title: "<?php echo __("Successfully","magicbox")?>", text: "<?php echo __("It's Done","magicbox")?>", icon: "success", buttons: false, timer: 3000});
                                    } else {
                                        Swal.fire({title: "<?php echo __("Error","magicbox")?>", text: response['error'], icon: "error", buttons: false, timer: 3000});
                                    }

                                }
                            }
                        );
                    }
                });
            });

        </script>
    </div>
</div>

</div>
</div>



