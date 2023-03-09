<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Custom Dashboard","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can change admin panel logo and dashboard title.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can hide Dashboard widgets based on admin roles.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can add Dashboard Messages and show them to the user types you want.","magicbox")?></div>
                    </div>
                </div>
            </div>
            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <select class="form-select" name="custom_dashboard[status]" id="custom_dashboard[status]">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['custom_dashboard']['status'] or $options['custom_dashboard']['status'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="input-group-text" for="custom_dashboard[status]"><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Change Dashboard Title & Logo") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can change admin panel logo and dashboard title.","magicbox")?></div>
                    </div>
                </div>
            </div>
            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <input class="form-control" name="custom_dashboard[title]" id="custom_dashboard[title]" placeholder=" " value="<?php echo  $options['custom_dashboard']['title'] ?>">
                            <label class="form-label" for="custom_dashboard[title]"><?php echo  __("Dasboard Title","magicbox") ?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Change the heading for the Dashboard.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>
                    <div class="cclearfix"></div>
                    <div class="col-lg-5">
                        <?php echo  $theClass->magicBox->uploadForm("Dasboard Icon", "custom_dashboard[dashboard_icon]", $options['custom_dashboard']['dashboard_icon'],'',__("Add a logo to Dashboard. Suggested height 40px","magicbox")); ?>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Hide Dashboard Widgets","magicbox") ?> </h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can hide default Dashboard widgets depending on admin role or you can specify which panels should appear.","magicbox")?></div>
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs" role="tablist">
                <?php 
                 $isFirst = true;
                foreach ($theClass->magicBox->getUserRoles() as $key => $item) { ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?php echo $isFirst==true?"active":""; $isFirst = false;?>" id="<?php echo $key?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo $key?>" type="button" role="tab" aria-controls="<?php echo $key?>" aria-selected="true"><?php echo $item?></button>
                    </li>
                <?php }?>
            </ul>

            <div class="tab-content pt-4 " id="myTabContent">
                <?php 
                 $isFirst = true;
                foreach ($theClass->magicBox->getUserRoles() as $key => $item) { ?>
                    <div class="tab-pane fade <?php echo $isFirst==true?"show active":""; $isFirst = false;?>" id="<?php echo $key?>" role="tabpanel" aria-labelledby="<?php echo $key?>-tab">
                        <div class="row fixedRow">
                            <div class="col-12">
                                <a href="javascript:;" class="btn btn-success ms-2 btnDataMB btnSelectAll selectAll<?php echo $key?>" data-key="<?php echo $key?>" data-fkey=""><i class="fa-solid fa-check-double me-1"></i> Select All</a>
                                <a href="javascript:;" class="btn btn-danger ms-2 d-none btnDataMB btnUnSelectAll  unSelectAll<?php echo $key?>" data-key="<?php echo $key?>" data-fkey=""><i class="fa-solid fa-xmark me-1"></i> Un Select All</a>
                            </div>
                            <div class="col-12">
                                <div class="form-check-group fCol mt-3 checkGroup_<?php echo $key?>">
                                    <?php foreach ($theClass->registeredWidgets as $item) { ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   name="custom_dashboard[hide_widgets][<?php echo $key;?>][<?php echo  $item['id'] ?>]"
                                                   id="custom_dashboard[hide_widgets][<?php echo $key;?>][<?php echo  $item['id'] ?>]"
                                                <?php echo  $options['custom_dashboard']['hide_widgets'][$key][$item['id']] == "1" ? "checked" : "" ?>
                                                   value="1" placeholder=" ">
                                            <label class="form-check-label" for="custom_dashboard[hide_widgets][<?php echo $key;?>][<?php echo  $item['id'] ?>]"><span><?php echo  $item['title'] ?></span></label>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>

            </div>

        </div>
    </div>

    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Own Dashboard Message","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("Add your own Dashboard message. This will appear in the control panel and you can select the admin roles this will be visible to.","magicbox")?></div>
                    </div>
                </div>
            </div>

            <div class="form-check-switch mb-4">
                <div class="form-check">
                    <label class="form-check-label" for="custom_dashboard[parent_message][status]"><span><?php echo  __("Parent Message Status","magicbox") ?></span></label>
                    <input class="form-check-input parentMessageStatus" type="checkbox"
                           name="custom_dashboard[parent_message][status]"
                           id="custom_dashboard[parent_message][status]"
                        <?php echo  $options['custom_dashboard']['parent_message']['status'] == "1" ? "checked" : "" ?>
                           value="1">
                </div>
            </div>

            <div class="parentMessage" style="display:<?php echo  $options['custom_dashboard']['parent_message']['status'] == "1" ? "block" : "none" ?>">
                <div class="form-check-group">
                    <div class="form-check pe-4">
                        <input class="form-check-input" type="checkbox"
                               name="custom_dashboard[parent_message][full_width]"
                               id="custom_dashboard[parent_message][full_width]"
                            <?php echo  $options['custom_dashboard']['parent_message']['full_width'] == "1" ? "checked" : "" ?>
                               value="1">
                        <label class="form-check-label" for="custom_dashboard[parent_message][full_width]"><span><?php echo  __("In header","magicbox") ?></span></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("You can set the position of the message as header or bottom.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                    </div>
                    <div class="form-check pe-4">
                        <input class="form-check-input" type="checkbox"
                               name="custom_dashboard[parent_message][dismissible]"
                               id="custom_dashboard[parent_message][dismissible]"
                            <?php echo  $options['custom_dashboard']['parent_message']['dismissible'] == "1" ? "checked" : "" ?>
                               value="1">
                        <label class="form-check-label" for="custom_dashboard[parent_message][dismissible]"><span><?php echo  __("Dismissible","magicbox") ?></span></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("You can set whether the message can be closed or not.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row fixedRow mt-3">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input class="form-control"
                                   name="custom_dashboard[parent_message][title]"
                                   id="custom_dashboard[parent_message][title]"
                                   value="<?php echo  $options['custom_dashboard']['parent_message']['title'] ?>" placeholder=" ">
                            <label class="form-label" for="custom_dashboard[parent_message][title]"><?php echo  __("Title","magicbox") ?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Title of the Dashboard Message","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label-normal d-inline-block w-auto" for="custom_dashboard[second_message][message_html]">HTML : <?php echo  __("Description","magicbox") ?></label>
                            <div class="form-info-normal ms-2" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("You can add any HTML to the Dashboard message.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                        </div>
                        <?php
                        $settings = array( 'textarea_name' => 'custom_dashboard[parent_message][message_html]');
                        wp_editor($options['custom_dashboard']['parent_message']['message_html'], "custom_dashboard_parent",$settings);
                        ?>
                    </div>
                </div>

                <div class="alert alert-custom alert-light-warning my-4" role="alert">
                    <div class="alert-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
                    <div class="alert-text">
                        <div class="w-100 d-flex flex-wrap gap-2">
                            <div class="infoItem"><?php echo __("Select the user roles this message will be visible to.","magicbox")?></div>
                        </div>
                    </div>
                </div>
                <div class="form-check-group">
                <?php 
                 foreach ($theClass->magicBox->getUserRoles() as $key => $item) { ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                               name="custom_dashboard[parent_message][user_roles][<?php echo  $key ?>]"
                               id="custom_dashboard[parent_message][user_roles][<?php echo  $key ?>]"
                               <?php echo  $options['custom_dashboard']['parent_message']['user_roles'][$key] == "1" ? "checked" : "" ?>
                               value="1">
                        <label class="form-check-label"
                               for="custom_dashboard[parent_message][user_roles][<?php echo  $key ?>]"><span><?php echo  $item ?></span></label>
                    </div>
                <?php } ?>
                </div>

            </div>
        </div>
    </div>

    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Own Dashboard Message","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("Add your own Dashboard message. This will appear in the Dashboard panel and you can select the admin roles this will be visible to.","magicbox")?></div>
                    </div>
                </div>
            </div>
            <div class="form-check-switch">
                <div class="form-check">
                    <label class="form-check-label" for="custom_dashboard[second_message][status]"><span><?php echo  __("Second Message Status","magicbox") ?></span></label>
                    <input class="form-check-input secondMessageStatus" type="checkbox"
                           name="custom_dashboard[second_message][status]"
                           id="custom_dashboard[second_message][status]"
                        <?php echo  $options['custom_dashboard']['second_message']['status'] == "1" ? "checked" : "" ?>
                           value="1">
                </div>
            </div>

            <div class="secondMessage mt-3" style="display:<?php echo  $options['custom_dashboard']['second_message']['status'] == "1" ? "block" : "none" ?>">

                <div class="form-check-group mb-4">
                    <div class="form-check pe-4">
                        <input class="form-check-input" type="checkbox"
                               name="custom_dashboard[second_message][full_width]"
                               id="custom_dashboard[second_message][full_width]"
                            <?php echo  $options['custom_dashboard']['second_message']['full_width'] == "1" ? "checked" : "" ?>
                               value="1">
                        <label class="form-check-label"
                               for="custom_dashboard[second_message][full_width]"><span><?php echo  __("In header","magicbox") ?></span></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("You can set the position of the message as header or bottom.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                    </div>
                    <div class="form-check pe-4">
                        <input class="form-check-input" type="checkbox"
                               name="custom_dashboard[second_message][dismissible]"
                               id="custom_dashboard[second_message][dismissible]"
                            <?php echo  $options['custom_dashboard']['second_message']['dismissible'] == "1" ? "checked" : "" ?>
                               value="1">
                        <label class="form-check-label"
                               for="custom_dashboard[second_message][dismissible]"><span><?php echo  __("Dismissible","magicbox") ?></span></label>
                        <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("You can set whether the message can be closed or not.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                    </div>
                </div>

                <div class="container-mb">
                    <div class="row fixedRow">
                        <div class="col-4">
                            <div class="form-group">
                                <input class="form-control"
                                       name="custom_dashboard[second_message][title]"
                                       id="custom_dashboard[second_message][title]"
                                       value="<?php echo  $options['custom_dashboard']['second_message']['title'] ?>" placeholder=" ">
                                <label class="form-label" for="custom_dashboard[second_message][title]"><?php echo  __("Title","magicbox") ?></label>
                                <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Title of the Dashboard Message","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label-normal d-inline-block w-auto" for="custom_dashboard[second_message][message_html]">HTML : <?php echo  __("Description","magicbox") ?></label>
                                <div class="form-info-normal ms-2" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("You can add any HTML to the Dashboard message.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                            </div>

                                <?php
                                $settings = array( 'textarea_name' => 'custom_dashboard[second_message][message_html]');
                                wp_editor($options['custom_dashboard']['second_message']['message_html'], "custom_dashboard_second",$settings);
                                ?>
                        </div>
                    </div>
                </div>


                <div class="alert alert-custom alert-light-warning my-4" role="alert">
                    <div class="alert-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
                    <div class="alert-text">
                        <div class="w-100 d-flex flex-wrap gap-2">
                            <div class="infoItem"><?php echo __("Select the user roles this message will be visible to.","magicbox")?></div>
                        </div>
                    </div>
                </div>

                <div class="form-check-group">
                <?php foreach ($theClass->magicBox->getUserRoles() as $key => $item) { ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                               name="custom_dashboard[second_message][user_roles][<?php echo  $key ?>]"
                               id="custom_dashboard[second_message][user_roles][<?php echo  $key ?>]"
                            <?php echo  $options['custom_dashboard']['second_message']['user_roles'][$key] == "1" ? "checked" : "" ?>
                               value="1">
                        <label class="form-check-label"
                               for="custom_dashboard[second_message][user_roles][<?php echo  $key ?>]"><span><?php echo  $item ?></span></label>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
        <div class="card-footer">
          <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a>
        </div>
    </div>
</form>


<script>


    jQuery(document).on('click', '.secondMessageStatus', function () {
        if (jQuery(this)[0].checked) {
            jQuery('.secondMessage').show(250);
        } else {
            jQuery('.secondMessage').hide(250);
        }
    });


    jQuery(document).on('click', '.parentMessageStatus', function () {
        if (jQuery(this)[0].checked) {
            jQuery('.parentMessage').show(250);
        } else {
            jQuery('.parentMessage').hide(250);
        }
    });


    jQuery(document).on('click', ".image_upload", (function () {
        var t = jQuery(this);
        var keyName = t.attr('key');
        var e = wp.media.editor.send.attachment;

        return wp.media.editor.send.attachment = function (i, r) {
            var s = '<img id="' + r.id + '" src="' + r.url + '" /><span class="removeImage" key="' + keyName + '">X</span>';

            jQuery('._' + keyName + ' .image-thumbnail').html(s);
            jQuery('._' + keyName + ' input').val(r.url);

            wp.media.editor.send.attachment = e;

        }, wp.media.editor.open(), !1

    }));

    jQuery(document).on("click", ".removeImage", (function () {
        var t = jQuery(this);
        var keyName = t.attr('key');
        jQuery('._' + keyName + ' .image-thumbnail').html('');
        jQuery('._' + keyName + ' input').val('');
    }));


    let selectAllButtons = document.querySelectorAll('.btnSelectAll')
    let unSelectAllButtons = document.querySelectorAll('.btnUnSelectAll')

    selectAllButtons.forEach((item) => {
        item.addEventListener('click',() => {
            checkAuto(item,true,'unSelectAll')
        })
    })

    unSelectAllButtons.forEach((item) => {
        item.addEventListener('click',() => {
            checkAuto(item,false,'selectAll')
        })
    })

    function checkAuto(item,val,showItem) {

        let itemKey = item.getAttribute('data-key')
        let fkey = item.getAttribute('data-fkey')
        let checkButtons = document.querySelector('.checkGroup_'+ itemKey + fkey )
        checkButtons = checkButtons.querySelectorAll('input')

        checkButtons.forEach((checkItem) => {
            checkItem.checked = val
        })

        item.classList.add('d-none')
        document.querySelector('.'+ showItem + itemKey + fkey).classList.remove('d-none')
    }


</script>

