<?php global $_mb_icon_url_; ?>
<div class="mbDashboard">
    <div class="modal fade" id="licenceKeyModal" tabindex="-1" aria-labelledby="licenceKeyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="licenceKeyModal"><?php echo __("Manage Licence", "magicbox") ?></h5>
                    <button type="button" class="btn-close modalCloseButton" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="licenceKeyForm">

                        <div class="row fixedRow gx-0 align-items-center  _<?php echo esc_attr($key) ?>">
                            <div class="col-12">
                                <div class="d-flex">
                                    <div class="input-group my-0 d-inline-block">
                                        <input class="form-control last-rounded-0" name="lk" id="lk" placeholder=" " value="<?php echo $magicBox->licence['lk'] ?>">
                                        <label class="input-group-text" for="lk"><?php echo __("Licence Key", "magicbox") ?></label>
                                    </div>
                                    <button type="submit" onclick="return false;" name="upsert" value="<?php echo __("Update", "magicbox") ?>" class="btn btn-success btnSendLicence start-rounded-0 sendLicence">
                                        <i class="fa-solid fa-floppy-disk me-2"></i><?php echo __("Update", "magicbox") ?>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="modal-header mt-4">
                    <h5 class="modal-title" id="licenceKeyModal"><?php echo __("Buy Licence", "magicbox") ?></h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3"><?php echo __("If you don't have licence or expired you can buy and upgrade your licence", "magicbox") ?></div>
                        <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row fixedRow justify-content-center gy-4">
        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
            <div class="dashboardItem top">
                <div class="dashboardItemTitleTop">
                    <h3><?php echo __("UPDATE", "magicbox") ?></h3>
                </div>
                <ul class="DashboardItemList">
                    <li>
                        <div class="infoListItem"><i class="fa-solid fa-crosshairs"></i></div>
                        <span><strong><?php echo __("Your Version", "magicbox") ?> : </strong> <?php echo esc_attr($magicBox->version) ?></span>
                    </li>
                    <li>
                        <div class="infoListItem"><i class="fa-solid fa-circle-up"></i></div>
                        <span><strong><?php echo __("New Version", "magicbox") ?> : </strong> <?php echo $magicBox->licence['last_version'] ?></span>
                    </li>
                    <li>
                        <div class="infoListItem"><i class="fa-solid fa-arrow-right-arrow-left"></i></div>
                        <a target="_blank" href="https://wpmagicbox.com/changelog" class="bold"><?php echo __("CHANGELOG", "magicbox") ?></a>
                    </li>

                    <?php
                    if (version_compare($magicBox->version, $magicBox->licence['last_version'])<0 or $magicBox->licence['last_version'] == ""){
                        ?>   <?php } ?>
                        <li>
                            <div class="infoListItem"><i class="fa-solid fa-download"></i></div>
                            <a href="#" class="warning updateNow"><?php echo __("UPDATE NOW", "magicbox") ?></a>
                        </li>


                </ul>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
            <div class="dashboardItem top">
                <div class="dashboardItemTitleTop">
                    <h3><?php echo __("LICENCE", "magicbox") ?></h3>
                </div>
                <ul class="DashboardItemList">
                    <li>
                        <div class="infoListItem"><i class="fa-solid fa-earth-europe"></i></div>
                        <span><?php echo $magicBox->licence['auth'] == ""? "N/A" : $magicBox->licence['auth'] ?></span>
                    </li>
                    <li>
                        <div class="infoListItem"><i class="fa-solid fa-key"></i></div>
                        <a href="#" class="<?php echo $magicBox->licence['result'] == "ok"? "success" : "danger text-danger" ?>"><?php echo __("TRAIL LICENCE!", "magicbox")  ?></a>
                    </li>
                    <li>
                        <div class="infoListItem"><i class="fa-solid fa-hourglass-start"></i></div>
                        <span><strong><?php echo __("Expires", "magicbox") ?> : </strong> <?php echo $magicBox->licence['end_date'] == ""? "N/A" : $magicBox->licence['end_date'] ?></span>
                    </li>
                    <li>
                        <div class="infoListItem"><i class="fa-solid fa-unlock-keyhole"></i></div>
                        <a href="javascript:;" class="info" data-bs-toggle="modal" data-bs-target="#licenceKeyModal"><?php echo __("CHANGE LICENCE", "magicbox") ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
            <div class="dashboardItem top">
                <div class="dashboardItemTitleTop">
                    <h3><?php echo __("HELP CENTER", "magicbox") ?></h3>
                </div>
                <ul class="DashboardItemList">
                    <li>
                        <div class="infoListItem"><i class="fa-solid fa-play"></i></div>
                        <a target="_blank" href="https://wpmagicbox.com/features"><?php echo __("Tutorials", "magicbox") ?></a>
                    </li>
                    <li>
                        <div class="infoListItem"><i class="fa-solid fa-question"></i></div>
                        <a target="_blank" href="https://wpmagicbox.com/contact/newFeature/<?php echo $magicBox->licence['lk'] ?>"><?php echo __("Ask for New Feature", "magicbox") ?></a>
                    </li>
                    <li>
                        <div class="infoListItem"><i class="fa-solid fa-bug"></i></div>
                        <a target="_blank" href="https://wpmagicbox.com/contact/bug/<?php echo $magicBox->licence['lk'] ?>"><?php echo __("Bug Report", "magicbox") ?></a>
                    </li>
                    <li>
                        <div class="infoListItem"><i class="fa-solid fa-info"></i></div>
                        <a target="_blank" href="https://wpmagicbox.com/contact"><?php echo __("Contact Support", "magicbox") ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <?php
    $menuUrls = array();
    $menuNames = array();
    foreach ($categories as $key => $item) {
        $key = esc_attr($key);
        $menuUrl         = menu_page_url($key, false);
        $icon            = esc_attr($menuIcons[$key]);
        $menuUrls[$key]  = $menuUrl;
        $menuNames[$key] = $item['title'];

        if ($key == "mb_faq" or $key == "mb_documentation"){
            continue;
        }

        $hasModulClass = esc_attr("hasModul_" . $item['has']);

        ?>
        <div class="row dashboardItemArea <?php echo $hasModulClass; ?> fixedRow _<?php echo $key ?>">
            <div class="col-12">
                <div class="dashboardGroupTitle">
                    <h3><?php echo esc_attr($item['title']) ?></h3>
                </div>
            </div>
            <?php if (count($item['subs'])>0){
                foreach ($item['subs'] as $subKey => $it) {
                    $subKey = esc_attr($subKey);
                    $pureSubKey       = $subKey;
                    $subKey           = str_replace(array("mb_", "mb-", "_"), array("", "", "-"), $subKey);
                    $hasSubModulClass = esc_attr("hasSubModul_" . $it['has']);
                    ?>
                    <div class="col-mb-3 mb-4 <?php echo $hasSubModulClass; ?>">
                        <div class="dashboardItem <?php echo $subKey ?>">
                            <a class="nav-link" href="<?php echo $menuUrl ?>&sub=<?php echo $pureSubKey ?>">
                                <div class="dashboardItemIcon">
                                    <img src="<?php echo $_mb_icon_url_ ?>/<?php echo $subKey ?>.png"/>
                                </div>
                                <div class="dashboardItemTitle">
                                    <h4><?php echo esc_attr($it['title']) ?></h4>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php
                }
            }?>
        </div>

    <?php } ?>

</div>

<script>
    jQuery(document).on('click', '.langButtonList li a', function () {
        newLang=jQuery(this).data('lang');
        newIcon=jQuery(this).data('icon-url');

        jQuery('.langButtonList img').attr('src', newIcon);

        swal.fire({title: "<?php echo __("Successfully","magicbox")?>", text: "<?php echo __("It's Done, please wait","magicbox")?>", icon: "success", buttons: false, timer: 3000, });

        jQuery(this).magicRequest(
            {'action': 'magicBox', 'method': 'updateLang', 'lang': newLang}, {},
            function () {
                window.location.reload();
            }
        );

    });

    jQuery(document).on('click', '.sendLicence', function () {
        Swal.fire({
            didOpen: ()=>{
            Swal.showLoading();
        jQuery(this).magicRequest(
            {'action': 'MagicboxStaff', 'method': 'caslk'}, {'element': '.licenceKeyForm'},
            function (response) {
                response=JSON.parse(response);
                Swal.close()
                if (response.result == "ok") {
                    jQuery('._<?php echo  esc_attr($key) ?> #lk').val(response.lk);
                    jQuery('#licenceKeyModal').removeClass('show');
                    jQuery('.modal-backdrop').removeClass('show');
                    jQuery('.licenceKeyAlert').hide(0);
                    swal.fire({title: "<?php echo __("Successfully","magicbox")?>", text: "<?php echo __("It's Done","magicbox")?>", icon: "success", buttons: false, timer: 3000 }).then(function(res) {
                        location.reload();
                        window.location.reload();
                        });
                } else {
                    jQuery('.licenceKeyAlert').show(0);
                    Swal.fire({title: "Error", text: response.error, icon: "error", text: response.error, buttons: false, timer: 3000});
                }
            }
        );
    }
    })
    ;

    })
    ;

    jQuery(document).on('click', '.updateNow', function () {
        Swal.fire({
            didOpen: ()=>{
            Swal.showLoading();
        jQuery(this).magicRequest(
            {'action': 'MagicBox', 'method': 'updatePlugin'}, {},
            function (response) {
                response=JSON.parse(response);
                console.log(response);
                Swal.close()
                if (response.result == "ok") {
                    jQuery('.modal-backdrop').removeClass('show');
                    swal.fire({title: "<?php echo __("Successfully","magicbox")?>", text: "<?php echo __("It's Done, plugin updated","magicbox")?>", icon: "success", buttons: false, timer: 3000 }).then(function(res) {
                        location.reload();
                        window.location.reload();
                    });
                } else {
                    Swal.fire({title: "Error", text: response.error, icon: "error", text: response.error, buttons: false, timer: 3000});
                }
            }
        );
    }
    })
    ;
    })
    ;

</script>