<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">

<div class="card bg-light">
    <div class="card-header">
        <h6 class="my-0"><?php echo  __("User Permissions","magicbox") ?></h6>
    </div>

    <div class="card-body">
        <div class="alert alert-custom alert-light-primary " role="alert">
            <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
            <div class="alert-text">
                <div class="w-100 d-flex flex-wrap gap-2">
                    <div class="infoItem"><?php echo  __("You can set admin roles and access permissions on your website.","magicbox") ?></div>
                </div>
            </div>
        </div>
        <div class="alert alert-custom alert-light-warning " role="alert">
            <div class="alert-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
            <div class="alert-text">
                <div class="w-100 d-flex flex-wrap gap-2">
                    <div class="infoItem"><?php echo  __("You cant set administratior permissions.","magicbox") ?></div>
                    <div class="infoItem"><?php echo  __("Even though you remove any permission from your admins, they still see the same permission in the wordpress menu. If you want the permission you removed not to appear in the menu, you must set the menu items for the same user from the Admin menu manager.","magicbox") ?></div>
                    <div class="infoItem"><?php echo  __("When you add a new role, the privileges you have not given in this section will appear in the menu. After adding a new role, you can edit the menu from the Admin menu manager.","magicbox") ?></div>
                </div>
            </div>
        </div>
        <div class="container-mb">
            <div class="row fixedRow">
                <div class="col-md-4">
                    <div class="form-group">
                        <select class="form-select" name="user_permission[status]" id="user_permission[status]">
                            <?php foreach ($activePassive as $key => $value) { ?>
                                <option
                                        value="<?php echo  esc_attr($key) ?>"<?php if ($key == $options['user_permission']['status'] or $options['user_permission']['status'] == "" and $key == 2) {
                                    echo "selected";
                                } ?>><?php echo  esc_attr($value) ?></option>
                            <?php } ?>
                        </select>
                        <label class="form-label" for=""user_permission[status]><?php echo  __("Status","magicbox") ?></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card bg-light">
    <div class="card-header">
        <h6 class="my-0"><?php echo  __("User Permissions Setting","magicbox") ?></h6>
    </div>

    <div class="card-body">
        <div class="alert alert-custom alert-light-primary " role="alert">
            <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
            <div class="alert-text">
                <div class="w-100 d-flex flex-wrap gap-2">
                    <div class="infoItem"><?php echo  __("You can add different admin roles to your site.","magicbox") ?></div>
                    <div class="infoItem"><?php echo  __("You can set all permissions of user roles on your website.","magicbox") ?></div>
                    <div class="infoItem"><?php echo  __("You can set the permissions of user roles for all pages and plugins that you add to your website later.","magicbox") ?></div>
                    <div class="infoItem"><?php echo  __("When user logins the website you can redirect specific admin role automatically to another page.","magicbox") ?></div>
                </div>
            </div>
        </div>
        <div class="container-mb">
            <div class="row fixedRow">
                <div class="col-12">
                    <ul class="nav nav-tabs" id="nav-tab" role="tablist">

                        <?php $isFirst = false;
                        foreach ($theClass->userRoles as $key => $value) {
                            if ($key == "administrator") {
                                continue;
                            }
                            ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?php echo  $isFirst != true ? "active" : ""; $isFirst = true; ?>" id="nav-<?php echo  esc_attr($key) ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?php echo  esc_attr($key) ?>" type="button" role="tab" aria-controls="nav-<?php echo  esc_attr($key) ?>" aria-selected="true"><?php echo  esc_attr($value['name']) ?></button>
                                </li>
                        <?php } ?>
                        <li class="nav-item addBefore">
                            <a href="javascript:;" class="addNewButton nav-link "><span class="btn btn-primary btnDataMB"><i class="fa-solid fa-plus me-1"></i> Add New Role</span></a>
                        </li>
                    </ul>

                    <div class="tab-content pt-3" id="nav-tabContent">

                        <?php $isFirst = false;

                        $allCapabilities = $theClass->userRoles["administrator"]['capabilities'];

                        $currentRoleCapabilities = get_role( "author" )->capabilities;

                        foreach ($theClass->userRoles as $key => $value) {

                            /* the role capabilities */
                            $currentRoleCapabilities = get_role($key)->capabilities;

                            if ($key == "administrator") {
                                continue;
                            }
                            ?>
                            <div class="tab-pane fade <?php echo  $isFirst != true ? "show active" : ""; $isFirst = true; ?>" id="nav-<?php echo  esc_attr($key) ?>" role="tabpanel" aria-labelledby="nav-<?php echo  esc_attr($key) ?>">
                                <div class="alert alert-custom alert-light-warning " role="alert">
                                    <div class="w-100">
                                        <div class="row fixedRow align-items-center">
                                            <div class="col-md-6 col-lg-4">
                                                <div class="form-group my-0 my-lg-3">
                                                    <input type="text" class="form-control" id="role_name[<?php echo $key?>]" name="role_name[<?php echo $key?>]" value="<?php echo  esc_attr($value['name'])?>" placeholder=" "/>
                                                    <label class="form-label" for="role_name[<?php echo $key?>]"><?php echo __("Role Name","magicbox")?></label>
                                                    <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Specify the name of the admin role.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <div class="form-group my-0 my-lg-3">
                                                    <input type="text" class="form-control" id="user_permission[redirect][<?php echo $key?>]" name="user_permission[redirect][<?php echo $key?>]" value="<?php echo $options['user_permission']['redirect'][$key]?>" placeholder=" "/>
                                                    <label class="form-label" for="user_permission[redirect][<?php echo $key?>]"><?php echo __("Role Redirect Page After Login","magicbox")?></label>
                                                    <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Redirect admins to a specified URL after login.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                                                </div>
                                            </div>
                                            <?php if(substr($key,0,3) =="mb_") {?>
                                            <div class="col-md-12 col-lg-4 text-center text-lg-start">
                                                <a href="javascript:;" class="btn btn-danger mt-3 mt-lg-0" id="userDeleteButton" data-key="<?php echo $key?>"><i class="fa-solid fa-trash-can me-2"></i><?php echo __("Delete Role : ".$value['name'])?></a>
                                            </div>
                                            <?php }?>

                                        </div>
                                    </div>

                                </div>

                                <?php
                                $shortCapValueArr = array();
                                foreach($theClass->menuCapabilities as  $capValues) {
                                    $capValues[0] = strip_tags(preg_replace('#<span (.*?)</span>#is', '', $capValues[0]));

                                    if($capValues[0] =="") {
                                        continue;
                                    }

                                    if(!is_array($capValues['sub']) or count($capValues['sub']) ==0) {
                                        continue;
                                    }

                                    $shortCapValue = explode('.',$capValues[2])[0];
                                    if(array_search($shortCapValue,$shortCapValueArr) !== false) {$shortCapValue .= '1';}
                                    array_push($shortCapValueArr,$shortCapValue);

                                    if($capValues[2] =="edit-comments.php") {
                                        $fakeKeyName = "_comments";
                                    }elseif($capValues[2] =="edit.php") {
                                        $fakeKeyName = "_posts";
                                    }elseif($capValues[2] =="edit.php?post_type=page") {
                                        $fakeKeyName = "_pages";
                                    }elseif($capValues[2] =="index.php") {
                                        $fakeKeyName = "_dashboard";
                                    }elseif($capValues[2] =="upload.php") {
                                        $fakeKeyName = "_files";
                                    }elseif($capValues[2] =="users.php") {
                                        $fakeKeyName = "_users";
                                    }elseif($capValues[2] =="themes.php") {
                                        $fakeKeyName = "_theme";
                                    }elseif($capValues[2] =="plugins.php") {
                                        $fakeKeyName = "_plugins";
                                    }else {
                                        $fakeKeyName = str_replace(array("edit_","_edit","_options"),"",$capValues[1]);
                                        $fakeKeyName = $capValues[1];
                                    }



                                    ?>
                                    <h3 class="innerTitle"><?php echo  $capValues[0]?> <a href="javascript:;" class="btn btn-success ms-2 btnDataMB btnSelectAll selectAll<?php echo $key?><?php echo $shortCapValue?>" data-key="<?php echo $key?>" data-fkey="<?php echo $shortCapValue?>"><i class="fa-solid fa-check-double me-1"></i> Select All</a><a href="javascript:;" class="btn btn-danger ms-2 d-none btnDataMB btnUnSelectAll  unSelectAll<?php echo $key?><?php echo $shortCapValue?>" data-key="<?php echo $key?>" data-fkey="<?php echo $shortCapValue?>"><i class="fa-solid fa-xmark me-1"></i> Un Select All</a></h3>

                                    <div class="form-check-group checkGroup_<?php echo $key?><?php echo $shortCapValue?>">
                                        <?php foreach($capValues['sub'] as $it) {

                                            $it[0] = strip_tags(preg_replace('#<span (.*?)</span>#is', '', $it[0]));

                                            $val = $value['capabilities'][$it[1]];

                                            $capName = $it[1];

                                            $isAddedKey = md5($capValues[0].$key.$capName);

                                            if($isAdded[$isAddedKey] =="1") {
                                                continue;
                                            } else {
                                                $isAdded[$isAddedKey] = "1";
                                                $isAdded[$capName] = "1"; /* for other caps */
                                                $isAdded[$key.$capName] = "1"; /* for value capabilities */
                                            }

                                            if($currentRoleCapabilities[$capName] =="1") {
                                                $val = "1";
                                            } else {
                                                $val = "0";
                                            }

                                            ?>
                                            <div class="form-check">
                                                <input class="form-check-input"  <?php echo  $val == "1" ? "checked" : "" ?> name="caps[<?php echo $key?>][<?php echo  $capName ?>]" type="checkbox" id="<?php echo  $isAddedKey ?>" value="1">
                                                <label class="form-check-label" for="<?php echo  $isAddedKey ?>"><span><?php echo $it[0]?></span></label>
                                            </div>
                                        <?php }?>

                                        <?php foreach($allCapabilities as $capName => $val) {
                                            if(strstr($capName,$fakeKeyName)) {

                                                $isAddedKey = md5($capValues[0].$key.$capName);

                                                /* this is important */
                                                if($isAdded[$isAddedKey] =="1"  or $isAdded[$key.$capName] =="1") {
                                                    continue;
                                                } else {
                                                    $isAdded[$isAddedKey] = "1";
                                                    $isAdded[$capName] = "1"; /* for other caps */
                                                    $isAdded[$key.$capName] = "1"; /* for value capabilities */
                                                }

                                                if($currentRoleCapabilities[$capName] =="1") {
                                                    $val = "1";
                                                } else {
                                                    $val = "0";
                                                }

                                                ?>
                                                <div class="form-check">
                                                    <input class="form-check-input"  <?php echo  $val == "1" ? "checked" : "" ?> name="caps[<?php echo $key?>][<?php echo  $capName ?>]" type="checkbox" id="<?php echo  $isAddedKey ?>" value="1">
                                                    <label class="form-check-label" for="<?php echo $isAddedKey ?>"><span><?php echo $capName?></span></label>
                                                </div>
                                            <?php }
                                        } ?>
                                    </div>
                                <?php } ?>
                                <h3 class="innerTitle"><?php echo  __("Others","magicbox") ?> <a href="javascript:;" class="btn btn-success ms-2 btnDataMB btnSelectAll selectAll<?php echo $key?>other" data-key="<?php echo $key?>" data-fkey="other"><i class="fa-solid fa-check-double me-1"></i> Select All</a><a href="javascript:;" class="btn btn-danger ms-2 d-none btnDataMB btnUnSelectAll  unSelectAll<?php echo $key?>other" data-key="<?php echo $key?>" data-fkey="other"><i class="fa-solid fa-xmark me-1"></i> Un Select All</a></h3>
                                <div class="form-check-group checkGroup_<?php echo $key?>other">

                                    <?php  foreach($allCapabilities as $capName => $val) {

                                        /* this is important */
                                        if($isAdded[$key.$capName] =="1") {
                                            continue;
                                        } else {
                                            $isAdded[$key.$capName] = "1";
                                        }

                                        if($currentRoleCapabilities[$capName] =="1") {
                                            $val = "1";
                                        } else {
                                            $val = "0";
                                        }

                                        ?>
                                        <div class="form-check form-check-inline m-1">
                                            <input class="form-check-input"  <?php echo  $val == "1" ? "checked" : "" ?> name="caps[<?php echo $key?>][<?php echo  $capName ?>]" type="checkbox" id="<?php echo  esc_attr($key).$capName ?>" value="1">
                                            <label class="form-check-label" for="<?php echo  esc_attr($key).$capName ?>"><span><?php echo $capName?></span></label>
                                        </div>
                                    <?php } ?>
                                </div>


                                <?php if(substr($key,0,3) =="mb_") {?>
                                <div class="mt-3">
                                    <div class="float-end">
                                        <div class="btn btn-danger" id="userDeleteButton" data-key="<?php echo $key?>" style="cursor:pointer;"">
                                        <i class="fa-solid fa-trash-can me-2"></i><?php echo  __("Delete Role : " . $value['name']) ?>
                                    </div>
                                    <input type="hidden" class="deleteMe_<?php echo  esc_attr($key) ?>" name="delete[<?php echo  esc_attr($key) ?>]" value="0"/>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                    <?php } ?>

                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="card-footer">
       <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com">Buy Licence</a>
    </div>
</div>




</form>

<div class="copyForTabber" style="display:none">
    <li class="nav-item" role="presentation">
        <button class="nav-link setMe_###key###" id="nav-###key###-tab" data-bs-toggle="tab" data-bs-target="#nav-###key###" type="button" role="tab" aria-controls="nav-###key###" aria-selected="true"><?php echo __("New Name","magicbox")?></button>
    </li>
</div>

<div class="copyThat" style="display:none;">

    <?php $isFirst = false;

    foreach ($theClass->userRoles as $key => $value) {

        /* the role capabilities */
        $currentRoleCapabilities = get_role($key )->capabilities;

        if ($key != "administrator") {
            continue;
        }
        ?>
        <div class="tab-pane fade" id="nav-###key###" role="tabpanel" aria-labelledby="nav-###key###">
            <div class="row fixedRow">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" class="form-control setName" id="role_name[###key###]" name="role_name[###key###]" data-key="###key###" value="<?php echo __("New Name","magicbox")?>" placeholder=" "/>
                        <label class="form-label" for="role_name[###key###]"><?php echo __("Role Name","magicbox")?></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" class="form-control" id="user_permission[redirect][###key###]" name="user_permission[redirect][###key###]" placeholder=" "/>
                        <label class="form-label" for="user_permission[redirect][###key###]"><?php echo __("Role Redirect Page After Login","magicbox")?></label>
                    </div>
                </div>
            </div>
            <?php
            $shortCapValueArr = array();
            $isFirstCheckbox = true;
            foreach($theClass->menuCapabilities as  $capValues) {

                $capValues[0] = strip_tags(preg_replace('#<span (.*?)</span>#is', '', $capValues[0]));

                if($capValues[0] =="") {
                    continue;
                }

                $shortCapValue = explode('.',$capValues[2])[0];
                if(array_search($shortCapValue,$shortCapValueArr) !== false) {$shortCapValue .= '1';}
                array_push($shortCapValueArr,$shortCapValue);

                if($capValues[2] =="edit-comments.php") {
                    $fakeKeyName = "_comments";
                }elseif($capValues[2] =="edit.php") {
                    $fakeKeyName = "_posts";
                }elseif($capValues[2] =="edit.php?post_type=page") {
                    $fakeKeyName = "_pages";
                }elseif($capValues[2] =="index.php") {
                    $fakeKeyName = "_dashboard";
                }elseif($capValues[2] =="upload.php") {
                    $fakeKeyName = "_files";
                }elseif($capValues[2] =="users.php") {
                    $fakeKeyName = "_users";
                }elseif($capValues[2] =="themes.php") {
                    $fakeKeyName = "_theme";
                }elseif($capValues[2] =="plugins.php") {
                    $fakeKeyName = "_plugins";
                }else {
                    $fakeKeyName = str_replace(array("edit_","_edit","_options"),"",$capValues[1]);
                    $fakeKeyName = $capValues[1];
                }

                ?>

                <h3 class="innerTitle"><?php echo  $capValues[0]?> <a href="javascript:;" class="btn btn-success ms-2 btnDataMB btnSelectAll selectAll###key###<?php echo $shortCapValue?>" data-key="###key###" data-fkey="<?php echo $shortCapValue?>"><i class="fa-solid fa-check-double me-1"></i> Select All</a><a href="javascript:;" class="btn btn-danger ms-2 d-none btnDataMB btnUnSelectAll  unSelectAll###key###<?php echo $shortCapValue?>" data-key="###key###" data-fkey="<?php echo $shortCapValue?>"><i class="fa-solid fa-xmark me-1"></i> Un Select All</a></h3>

                <div class="form-check-group checkGroup_###key###<?php echo $shortCapValue?>">
                    <?php 
 
                    foreach($capValues['sub'] as $it) {

                        $it[0] = strip_tags(preg_replace('#<span (.*?)</span>#is', '', $it[0]));

                        $val = $value['capabilities'][$it[1]];

                        $capName = $it[1];

                        $isAddedKey = md5($capValues[0].$key.$capName);

                        if($isAdded[$isAddedKey] =="1") {
                            continue;
                        } else {
                            $isAdded[$isAddedKey] = "1";
                            $isAdded[$capName] = "1"; /* for other caps */
                            $isAdded[$key.$capName] = "1"; /* for value capabilities */
                        }

                        ?>
                        <div class="form-check">
                            <input class="form-check-input" <?php echo $isFirstCheckbox==true?"checked":""; $isFirstCheckbox = false; ?> name="caps[###key###][<?php echo  $capName ?>]" type="checkbox" id="###key###<?php echo $isAddedKey?>" value="1">
                            <label class="form-check-label" for="###key###<?php echo  $isAddedKey ?>"><span><?php echo $it[0]?></span></label>
                        </div>
                    <?php }?>


                    <?php foreach($allCapabilities as $capName => $val) {
                        if(strstr($capName,$fakeKeyName)) {

                            $isAddedKey = md5($capValues[0].$key.$capName);

                            /* this is important */
                            if($isAdded[$isAddedKey] =="1"  or $isAdded[$key.$capName] =="1") {
                                continue;
                            } else {
                                $isAdded[$isAddedKey] = "1";
                                $isAdded[$capName] = "1"; /* for other caps */
                                $isAdded[$key.$capName] = "1"; /* for value capabilities */
                            }

                            ?>
                            <div class="form-check">
                                <input class="form-check-input"  name="caps[###key###][<?php echo  $capName ?>]" type="checkbox" id="###key###<?php echo  $isAddedKey ?>" value="1">
                                <label class="form-check-label" for="###key###<?php echo $isAddedKey?>"><span><?php echo $capName?></span></label>
                            </div>
                        <?php }}?>

                </div>

            <?php } ?>



            <h3 class="innerTitle"><?php echo  __("Others","magicbox") ?> <a href="javascript:;" class="btn btn-success ms-2 btnDataMB btnSelectAll selectAll###key###other" data-key="###key###" data-fkey="other"><i class="fa-solid fa-check-double me-1"></i> Select All</a><a href="javascript:;" class="btn btn-danger ms-2 d-none btnDataMB btnUnSelectAll  unSelectAll###key###other" data-key="###key###" data-fkey="other"><i class="fa-solid fa-xmark me-1"></i> Un Select All</a></h3>
            <div class="form-check-group  checkGroup_###key###other">

                <?php  foreach($allCapabilities as $capName => $val) {

                    /* this is important */
                    if($isAdded[$key.$capName] =="1") {
                        continue;
                    } else {
                        $isAdded[$key.$capName] = "1";
                    }

                    ?>
                    <div class="form-check">
                        <input class="form-check-input"  name="caps[###key###][<?php echo  $capName ?>]" type="checkbox" id="###key###<?php echo  $capName ?>" value="1">
                        <label class="form-check-label" for="###key###<?php echo  $capName ?>"><span><?php echo $capName?></span></label>
                    </div>
                <?php } ?>
            </div>

        </div>
    <?php break; } ?>

</div>

