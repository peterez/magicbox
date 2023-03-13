<script>
    var lastMainName;
    var lastMainKey;
    var lastMainCategory;
    makeDragable("mbSortMenuMain");

    jQuery(document).on('change','.menuManagerStatus',function() {
        jQuery('.updateButton').show(0);
    });

    function makeDragable(className) {
        jQuery(function () {
            var isDragging = false;
            jQuery("." + className + " ul li")
                .mousedown(function () {
                    isDragging = false;
                })
                .mousemove(function () {
                    isDragging = true;
                })
                .mouseup(function () {

                    if (isDragging == true) {

                        jQuery('.updateButton').show(100);


                        if (typeof jQuery('.updateButton span').attr('role') == "undefined") {
                            jQuery('.updateButton').attr('disabled', 'disabled').append('<span class="spinner-border spinner-border-sm ml-1" role="status" aria-hidden="true"></span>');
                        }
                        setTimeout(function () {
                            jQuery('.updateButton').removeAttr('disabled');
                            jQuery('.updateButton span').remove();
                            jQuery("." + className + " ul").sortable("enable");
                        }, 300);

                    } else {
                        if (jQuery(this).hasClass('unsortable')) {
                            Swal.fire({title:"<?php echo __("Warning!")?>",text:"<?php echo __("This user role can't view/edit this section")?>",icon:"warning",buttons:false,timer: 3000,});
                        } else {
                            theKey = jQuery(this).attr("key");
                            type = jQuery(this).attr("type");
                            mainCategory = jQuery(this).attr("main");
                            jQuery('.editMenu .title').val(jQuery(this).attr('name'));
                            jQuery('.editMenu .editKey').val(theKey);

                            let windowWidth = window.innerWidth;
                            if(windowWidth < 770) {
                                let sortMenuModalBody = document.querySelector('#mbSortMenuModalBody')
                                let editMenuModalBody = document.querySelector('#editMenuModalBody')
                                const editMenu = document.querySelector('.editMenu')
                                const sortMenu = document.querySelector('.mbSortMenu')
                                let sortMenuArea = document.querySelector('.mbSortMenuArea')
                                let editMenuArea = document.querySelector('.editMenuArea')
                                if(sortMenuArea && editMenuArea) {
                                    sortMenuArea.remove()
                                    editMenuArea.remove()
                                }

                                sortMenuModalBody.innerHTML = ''
                                sortMenuModalBody.append(sortMenu)
                                editMenuModalBody.innerHTML = ''
                                editMenuModalBody.append(editMenu)

                                if (type == "sub") {
                                    document.querySelector('#editMenuModalButton').click()
                                } else {
                                    document.querySelector('#mbSortMenuModalButton').click()
                                }
                            }

                            jQuery('.editMenu').show(0);

                            if (type == "main") {
                                jQuery('.editMenu .menuManagerDetailEditTitle').html(jQuery(this).attr('name') + '(<?php echo  __("Main","magicbox") ?>)');
                                jQuery('.subkeys').hide(0);
                                jQuery('.subkey_' + theKey).show(250);
                                jQuery('.mainCategoryArea').hide(0);
                                jQuery('.editMenu .mainCategory').val('');

                                lastMainName = jQuery(this).attr('name')
                                lastMainKey = theKey
                                lastMainCategory = jQuery(this).attr("main")
                            } else {
                                jQuery('.editMenu .menuManagerDetailEditTitle').html(jQuery(this).attr('name') + '(<?php echo  __("Sub","magicbox") ?>)');
                                jQuery('.editMenu .mainCategory').val(mainCategory);
                                jQuery('.mainCategoryArea').show(0);
                            }

                            jQuery(document).on('keyup','.editMenu .title',function() {
                                jQuery('.'+theKey+'_name').val(jQuery(this).val());
                            });

                        }
                    }

                    isDragging = false;

                });

            jQuery("." + className + " ul").sortable({
                cancel: ".unsortable"
            });
        });
    }

    var userRoles = jQuery.parseJSON('<?php echo $theClass->userRolesJson?>');

    jQuery(document).on('click', '.userRoles li a', function () {
        var theKey = jQuery(this).attr('key');
        jQuery('.userRoles li a').removeClass('active');
        jQuery(this).addClass('active');
        jQuery('.userRole').val(theKey);
        jQuery('.checkboxes').hide(0);
        jQuery('.checkbox_' + theKey).show(0);

        jQuery('.mbSortMenuMain ul li').each(function () {
            var capa = jQuery(this).attr('capability');
            var capability = userRoles[theKey]['capabilities'][capa];

            if (capability == true) {
                jQuery(this).removeClass('unsortable');
            } else {
                jQuery(this).addClass('unsortable');
                jQuery(this).find('.checkbox_' + theKey).attr("disabled", true);
                if (jQuery(this).find('.checkbox_' + theKey).prop('checked')) {
                    jQuery(this).find('.checkbox_' + theKey).prop('checked', false);
                }
            }
        });
    });
</script>

<script>
    jQuery(document).on('click','.userRoles li a',function() {
        theRole = jQuery(this).attr('key');
        jQuery('.roleKeyChecks').hide(0);
        jQuery('.roleKeyChecks[role='+theRole+']').show(0);
    });
</script>

<form method="post" class="theForm adminMenuManager theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
<div class="card bg-light">
    <div class="card-header">
        <h6 class="my-0"><?php echo  __("Admin Menu Manager","magicbox") ?></h6>
    </div>

    <div class="card-body">
        <div class="alert alert-custom alert-light-primary " role="alert">
            <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
            <div class="alert-text">
                <div class="w-100 d-flex flex-wrap gap-2">
                    <div class="infoItem"><?php echo  __("You can organize the admin panel menu depending on admins roles. ","magicbox") ?></div>
                </div>
            </div>
        </div>
        <div class="alert alert-custom alert-light-warning " role="alert">
            <div class="alert-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
            <div class="alert-text">
                <div class="w-100 d-flex flex-wrap gap-2">
                    <div class="infoItem"><?php echo  __("Admins cannot see the removed menu items but, they still have access to that section. You can set the administrators' access authorization to the menu items in the User Permissions section.","magicbox") ?></div>
                    <div class="infoItem"><?php echo  __("You can add new admins roles from the User Permissions section.","magicbox") ?></div>
                </div>
            </div>
        </div>

        <div class="container-mb">
            <div class="row fixedRow align-items-center mt-4">
                <div class="col-lg-4">
                    <div class="input-group my-lg-0">
                        <select class="form-select menuManagerStatus" name="admin_menu_manager[status]" id="menuManagerStatus">
                            <?php foreach ($activePassive as $key => $value) { ?>
                                <option
                                        value="<?php echo  esc_attr($key) ?>"<?php if ($key == $options['admin_menu_manager']['status'] or $options['admin_menu_manager']['status'] == "" and $key == 2) {
                                    echo "selected";
                                } ?>><?php echo  esc_attr($value) ?></option>
                            <?php } ?>
                        </select>
                        <label class="input-group-text" for="menuManagerStatus"><?php echo  __("Status","magicbox") ?></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card bg-light">
    <div class="card-header">
        <h6 class="my-0"><?php echo  __("Edit Menu Items","magicbox") ?></h6>
    </div>

    <div class="card-body">
        <div class="alert alert-custom alert-light-primary " role="alert">
            <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
            <div class="alert-text">
                <div class="w-100 d-flex flex-wrap gap-2">
                    <div class="infoItem"><?php echo  __("You can show different menü items for each admin role.","magicbox") ?></div>
                    <div class="infoItem"><?php echo  __("You can hide the menu items you don't want.","magicbox") ?></div>
                    <div class="infoItem"><?php echo  __("You can change the order of the menu links by dragging and dropping.","magicbox") ?></div>
                    <div class="infoItem"><?php echo  __("You can change the names of the menu items.","magicbox") ?></div>
                </div>
            </div>
        </div>

        <div class="row fixedRow">
            <div class="col-12">
                <ul class="nav nav-tabs userRoles my-3">
                    <?php 
                     foreach ($theClass->userRoles as $key => $value) {
                        ?>
                        <li class="nav-item" key="<?php echo  esc_attr($key) ?>">
                            <a class="nav-link  <?php echo  esc_attr($key) == "administrator" ? "active" : "" ?>" key="<?php echo  esc_attr($key) ?>"
                               href="javascript:;"><?php echo  esc_attr($value['name']) ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <div class="row fixedRow">

            <div class="col-md-4">
                <div class="mbSortMenuMain">
                    <ul class="sortingItems">
                        <?php $i = 0;
                        foreach ($theClass->adminMenus as $item) {
                            $pureKey = $item[2];
                            $mainKey = "_".md5($item[2]);
                            $item[0] = strip_tags(preg_replace('#<span (.*?)</span>#is', '', $item[0]));
                            $item[0] = $item[0] == "" ? "__" . __("Separator","magicbox") . "__" : $item[0];
                            ?>
                            <li class="sortingItem" key="<?php echo  esc_attr($mainKey) ?>" capability="<?php echo  $item[1] ?>" name="<?php echo  esc_attr($item[0]) ?>" type="main" main="0" icon="<?php echo  esc_attr($item[4]) ?>">
                                <span class="sortingIcon"><i class="fa-solid fa-grip-vertical"></i></span>

                                    <input type="hidden" class="<?php echo $mainKey?>_name"
                                           name="admin_menu_manager[list][<?php echo  esc_attr($pureKey) ?>][name]"
                                           value="<?php echo  esc_attr($item[0])?>"/>

                                <?php foreach ($theClass->userRoles as $roleKey => $roleValue) {

                                    $isChecked = "";

                                    if (is_array($options['admin_menu_manager']['list'])) {
                                        if ($options['admin_menu_manager']['list'][$pureKey]['checked'][$roleKey] == "1") {
                                            $isChecked = true;
                                        } else {
                                            $isChecked = false;
                                        }
                                    } else {
                                        if ($roleValue['capabilities'][$item[1]] == "1") {
                                            $isChecked = true;
                                        } else {
                                            $isChecked = false;
                                        }
                                    }
                                    ?>

                                    <input style="display:none" type="checkbox" role="<?php echo  esc_attr($roleKey)?>" class="checkboxes roleKeyChecks"
                                           name="admin_menu_manager[list][<?php echo  esc_attr($pureKey) ?>][checked][<?php echo  esc_attr($roleKey)?>]"
                                           <?php echo $isChecked==true?"checked":""?>
                                           value="1"/>
                                <?php } ?>

                                <?php echo  esc_attr($item[0])?>
                            </li>
                            <?php $i++;
                        } ?>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 mbSortMenuArea">
                <div class="mbSortMenu">
                    <?php 
                     foreach ($theClass->adminMenus as $items) {
                        $pureKey = $items[2];
                        $mainKey =  "_".md5($items[2]);
                        if (is_array($items['sub'])) {
                            ?>
                            <script>
                                makeDragable("mbSortMenu", "subkey_<?php echo $mainKey?>");
                            </script>

                            <div class="menuManagerDetail subkey_<?php echo  esc_attr($mainKey) ?> subkeys" style="display:none">
                                <div class="menuManagerDetailTitle">
                                    <i class="fa-solid fa-arrow-turn-down me-2"></i><?php echo  $items[0]; ?>
                                </div>
                                <ul class="sortingItemUnders">
                                    <?php $i = 0;
                                    foreach ($items['sub'] as $item) {
                                        $key = $item[2];
                                        $mainKey = "_".md5($mainKey."_".$key);

                                        $item[0] = strip_tags(preg_replace('#<span (.*?)</span>#is', '', $item[0]));
                                        $item[0] = $item[0] == "" ? "__" . __("Separator","magicbox") . "__" : $item[0];
                                        ?>
                                        <li class="sortingItemUnder" key="<?php echo  esc_attr($mainKey) ?>" name="<?php echo  esc_attr($item[0]) ?>" type="sub" main="<?php echo  esc_attr($pureKey) ?>">
                                            <span class="sortingIcon"><i class="fa-solid fa-grip-vertical"></i></span>

                                            <input type="hidden" class="<?php echo $mainKey?>_name"
                                                   name="admin_menu_manager[list][<?php echo  esc_attr($pureKey) ?>][sub][<?php echo $key?>][name]"
                                                   value="<?php echo  esc_attr($item[0])?>"/>

                                            <?php foreach ($theClass->userRoles as $roleKey => $roleValue) {

                                                $isChecked = "";

                                                if (is_array($options['admin_menu_manager']['list'])) {
                                                    if ($options['admin_menu_manager']['list'][$pureKey]['sub'][$key]['checked'][$roleKey] == "1") {
                                                        $isChecked = true;
                                                    } else {
                                                        $isChecked = false;
                                                    }
                                                } else {
                                                    if ($roleValue['capabilities'][$item[1]] == "1") {
                                                        $isChecked = true;
                                                    } else {
                                                        $isChecked = false;
                                                    }
                                                }
                                                ?>
                                                <input style="display:none" type="checkbox" role="<?php echo  esc_attr($roleKey)?>" class="checkboxes roleKeyChecks"
                                                       name="admin_menu_manager[list][<?php echo  esc_attr($pureKey) ?>][sub][<?php echo $key?>][checked][<?php echo  esc_attr($roleKey)?>]"
                                                    <?php echo $isChecked==true?"checked":""?>
                                                       value="1"/>
                                            <?php } ?>

                                            <?php echo  esc_attr($item[0]) ?>

                                        </li>
                                        <?php  $i++;
                                    }?>
                                </ul>
                            </div>


                        <?php } ?>
                    <?php } ?>
                </div>
            </div>

            <div class="col-md-4 editMenuArea">
                <div class="editMenu menuManagerDetailEdit" style="display:none;">

                    <div class="menuManagerDetailEditTitle">

                    </div>
                    <div class="form-group">
                        <input type="text" name="title" id="title" placeholder=" " class="form-control title"/>
                        <label class="form-label" for="title"><?php echo  __("Menu Title","magicbox") ?></label>
                    </div>


                    <div class="mainCategoryAreae" style="display:none">
                        <select name="main_category" id="main_category" class="form-control mainCategory">
                            <option value="-"><?php echo  __("Choose","magicbox") ?></option>
                            <?php foreach ($theClass->adminMenus as $key => $item) {
                                ?>
                                <option value="<?php echo  esc_attr($item[2]) ?>"><?php echo  esc_attr($item[0]) ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for="main_category"><?php echo  __("Target Page","magicbox") ?></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
  <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a>
    </div>

</div>
    <div class="modal fade" id="mbSortMenuModal" aria-hidden="true" aria-labelledby="mbSortMenuModalLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn btn-primary btn-sm rounded-pill px-3" id="mainMenuEditButton"><?php echo  __("Main Menü Edit","magicbox") ?></button>
                    <button type="button" class="btn-close" id="mainMenuCloseButton" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="mbSortMenuModalBody">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editMenuModal" aria-hidden="true" aria-labelledby="editMenuModalLabel"  tabindex="1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn btn-success btn-sm rounded-pill px-3" id="updateFakeButton" ><?php echo  __("Update","magicbox") ?></button>
                    <button type="button" class="btn-close" id="editMenuCloseButton" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="editMenuModalBody">
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary d-none" id="mbSortMenuModalButton" data-bs-toggle="modal" data-bs-target="#mbSortMenuModal"></button>
    <button type="button" class="btn btn-primary d-none" id="editMenuModalButton" data-bs-toggle="modal" data-bs-target="#editMenuModal"></button>
</form>

<style>

    .mbSortMenu ul li {
        background: #2271b1;
        color: #fff;
        padding: 3px 5px 9px 5px;
        margin: 3px;
        cursor: pointer;
    }

    .mbSortMenuMain ul li {
        background: #2271b1;
        color: #fff;
        padding: 3px 5px 9px 5px;
        margin: 3px;
        cursor: pointer;
    }

    .unsortable {
        background: #79a9cf !important;
    }

</style>

<script>

    jQuery(document).on('click', '#iconlist div', function () {
        getClass = jQuery(this).attr('class');
        getClass = getClass.replace('dashicons ', '');
        jQuery('.setIcon').val(getClass);
    });

    document.querySelector('#updateFakeButton').addEventListener('click',() => {
        document.querySelector('#mainMenuCloseButton').click()
        document.querySelector('#editMenuCloseButton').click()
        document.querySelector('.pageSaveButton').click()
    })

    document.querySelector('#mainMenuEditButton').addEventListener('click',() => {
        theKey = lastMainKey;
        mainCategory = lastMainCategory;
        jQuery('.editMenu .title').val(lastMainName);
        jQuery('.editMenu .editKey').val(theKey);

        jQuery('.editMenu').show(0);

        jQuery('.editMenu .menuManagerDetailEditTitle').html(lastMainName + '(<?php echo  __("Main","magicbox") ?>)');
        jQuery('.subkeys').hide(0);
        jQuery('.subkey_' + theKey).show(250);
        jQuery('.mainCategoryArea').hide(0);
        jQuery('.editMenu .mainCategory').val('');

        jQuery(document).on('keyup','.editMenu .title',function() {
            jQuery('.'+theKey+'_name').val(jQuery(this).val());
        });

        document.querySelector('#editMenuModalButton').click()
    })

    let sortingItems = document.querySelectorAll('.sortingItem')

    sortingItems.forEach((item) => {
        item.addEventListener('click',()=> {
            if(document.querySelector('.sortingItem.active')) {
                document.querySelector('.sortingItem.active').classList.remove('active')
                if(document.querySelector('.sortingItemUnder.active')) {
                    document.querySelector('.sortingItemUnder.active').classList.remove('active')
                }
            }
            item.classList.add('active')
        })
    })
    let sortingItemsUnder = document.querySelectorAll('.sortingItemUnder')

    sortingItemsUnder.forEach((item) => {
        item.addEventListener('click',()=> {
            if(document.querySelector('.sortingItemUnder.active')) {
                document.querySelector('.sortingItemUnder.active').classList.remove('active')
            }
            item.classList.add('active')
        })
    })

</script>



