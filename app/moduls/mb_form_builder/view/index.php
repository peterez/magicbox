<?php $options = $theClass->options;
$options['form_builder']['label_data'] = unserialize($options['form_builder']['label_data']);
?>

<div class="card bg-light">

    <div class="card-header">
        <h6 class="my-0"><?php echo  __("Add New Form","magicbox") ?></h6>
    </div>

    <div class="card-body">
        <div class="alert alert-custom alert-light-primary " role="alert">
            <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
            <div class="alert-text">
                <div class="w-100 d-flex flex-wrap gap-2">
                    <div class="infoItem"><?php echo  __("You can add the forms you add to the page you want with Shortcode.","magicbox") ?></div>
                    <div class="infoItem"><?php echo  __("You can follow the messages sent to the forms from your admin panel.","magicbox") ?></div>
                    <div class="infoItem"><?php echo  __("If you want, incoming forms are automatically forwarded to the e-mail addresses you specify.","magicbox") ?></div>
                </div>
            </div>
        </div>
        <div class="row fixedRow">
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control pageTitle" name="form_builder[label_data][title]" id="form_builder[label_data][title]" value="<?php echo  $options['form_builder']['label_data']['title']?>" placeholder=" ">
                    <label class="form-label" for="form_builder[label_data][title]"><?php echo __("Title","magicbox")?></label>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control pageLabel" name="form_builder[label_data][label]" id="form_builder[label_data][label]" value="<?php echo  $options['form_builder']['label_data']['label'] ?>" placeholder=" ">
                    <label class="form-label" for="form_builder[label_data][label]"><?php echo __("Label","magicbox")?></label>
                </div>

            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control pageButtonName" name="form_builder[label_data][button_name]" id="form_builder[label_data][button_name]" value="<?php echo  $options['form_builder']['label_data']['button_name'] ?>" placeholder=" ">
                    <label class="form-label" for="form_builder[label_data][button_name]"><?php echo __("Button Name","magicbox")?></label>
                </div>

            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control pageMail" id="pageMail" value="<?php echo  $options['form_builder']['mail'] ?>" placeholder=" ">
                    <label class="form-label" for="pageMail"><?php echo __("Notification Mail","magicbox")?></label>
                    <span class="form-info" data-mb="pop" data-mb-title="<?php echo __("Notification Mail","magicbox")?>" data-mb-content="<?php echo __("If you put your mail here, when someone contact with you, same message will sent this mail address","magicbox")?>"><i class="fa-solid fa-info"></i></span>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control pageSuccessResultText" name="form_builder[label_data][success_text]" id="form_builder[label_data][success_text]" value="<?php echo  $options['form_builder']['label_data']['success_text']?>" placeholder=" ">
                    <label class="form-label" for="form_builder[label_data][success_text]"><?php echo __("Success Result Text","magicbox")?></label>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control pageFailResultText" name="form_builder[label_data][fail_text]" id="form_builder[label_data][fail_text]" value="<?php echo  $options['form_builder']['label_data']['fail_text'] ?>" placeholder=" ">
                    <label class="form-label" for="form_builder[label_data][fail_text]"><?php echo __("Fail Result Text","magicbox")?></label>
                </div>
            </div>
        </div>
        <h3 class="innerTitle"><?php echo  __("Form Elements","magicbox") ?></h3>
        <div class="modal fade" id="inputAddModal" tabindex="-1" aria-labelledby="inputAddModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inputAddModal"><?php echo  __("Form Elements","magicbox") ?></h5>
                        <button type="button" class="btn-close modalCloseButton" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="selectElement" id="assetArea">
                            <ul class="formBuilderElementList">
                                <li data-element="input" data-type="text"><div class="formBuilderElementListItem"><div class="itemIcon"><i class="fa-solid fa-font"></i></div><div class="itemTitle"><?php echo  __("Text Input","magicbox") ?></div></div> </li>
                                <li data-element="input" data-type="number"><div class="formBuilderElementListItem"><div class="itemIcon"><i class="fa-solid fa-arrow-up-9-1"></i></div><div class="itemTitle"><?php echo  __("Number Input","magicbox") ?></div></div></li>
                                <li data-element="input" data-type="email"><div class="formBuilderElementListItem"><div class="itemIcon"><i class="fa-solid fa-envelope"></i></div><div class="itemTitle"><?php echo  __("Email Input","magicbox") ?></div></div></li>
                                <li data-element="input" data-type="password"><div class="formBuilderElementListItem"><div class="itemIcon"><i class="fa-solid fa-key"></i></div><div class="itemTitle"><?php echo  __("Password","magicbox") ?></div></div></li>
                                <li data-element="input" data-type="date"><div class="formBuilderElementListItem"><div class="itemIcon"><i class="fa-solid fa-calendar-days"></i></div><div class="itemTitle"><?php echo  __("Date Selector","magicbox") ?></div></div></li>
                                <li data-element="input" data-type="time"><div class="formBuilderElementListItem"><div class="itemIcon"><i class="fa-solid fa-clock"></i></div><div class="itemTitle"><?php echo  __("Time Selector","magicbox") ?></div></div></li>
                                <li data-element="input" data-type="range"><div class="formBuilderElementListItem"><div class="itemIcon"><i class="fa-solid fa-sliders"></i></div><div class="itemTitle"><?php echo  __("Number Slider","magicbox") ?></div></div></li>
                                <li data-element="input" data-type="color"><div class="formBuilderElementListItem"><div class="itemIcon"><i class="fa-solid fa-fill-drip"></i></div><div class="itemTitle"><?php echo  __("Color Picker","magicbox") ?></div></div></li>
                                <li data-element="input" data-type="url"><div class="formBuilderElementListItem"><div class="itemIcon"><i class="fa-solid fa-arrow-pointer"></i></div><div class="itemTitle"><?php echo  __("Website / Url","magicbox") ?></div></div></li>
                                <li data-element="input" data-type="tel"><div class="formBuilderElementListItem"><div class="itemIcon"><i class="fa-solid fa-phone"></i></div><div class="itemTitle"><?php echo  __("Phone","magicbox") ?></div></div></li>
                                <li data-element="input" data-type="file"><div class="formBuilderElementListItem"><div class="itemIcon"><i class="fa-solid fa-upload"></i></div><div class="itemTitle"><?php echo  __("File Upload","magicbox") ?></div></div></li>
                                <li data-element="checkbox" data-type="checkbox"><div class="formBuilderElementListItem"><div class="itemIcon"><i class="fa-solid fa-square-check"></i></div><div class="itemTitle"><?php echo  __("Multiple Choice","magicbox") ?></div></div></li>
                                <li data-element="checkbox" data-type="radio"><div class="formBuilderElementListItem"><div class="itemIcon"><i class="fa-solid fa-circle-dot"></i></div><div class="itemTitle"><?php echo  __("Radio Choice","magicbox") ?></div></div></li>
                                <li data-element="textarea" data-type="textarea"><div class="formBuilderElementListItem"><div class="itemIcon"><i class="fa-solid fa-align-left"></i></div><div class="itemTitle"><?php echo  __("Text Area","magicbox") ?></div></div></li>
                                <li data-element="selectbox" data-type="single"><div class="formBuilderElementListItem"><div class="itemIcon"><i class="fa-solid fa-list"></i></div><div class="itemTitle"><?php echo  __("Select Box","magicbox") ?></div></div></li>
                                <li data-element="selectbox" data-type="multiple"><div class="formBuilderElementListItem"><div class="itemIcon"><i class="fa-solid fa-list-check"></i></div><div class="itemTitle"><?php echo  __("Select Box (Multiple)") ?></div></div></li>
                                <li data-element="html" data-type="html"><div class="formBuilderElementListItem"><div class="itemIcon"><i class="fa-solid fa-code"></i></div><div class="itemTitle"><?php echo  __("Html Area","magicbox") ?></div></div></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row fixedRow">
            <div class="col-lg-3 assetEditBox">
                <div class="assetEditArea" id="assetEditArea">
                    <input type="hidden" class="settingClass"/>

                    <div class="form-group setterItem mb-3 mt-0">
                        <input class="form-control setter setLabelName" id="setLabelName" value="" placeholder=" ">
                        <label class="form-label labelName" for="setLabelName"><?php echo  __("Label Name","magicbox") ?></label>
                    </div>

                    <div class="form-group mb-3 setterItem placeholderSetter">
                        <input class="form-control setter setPlaceHolder" id="setPlaceHolder" value="" placeholder=" ">
                        <label class="form-label labelName" for="setPlaceHolder"><?php echo  __("Placeholder","magicbox") ?></label>
                    </div>

                    <div class="form-group mb-3 setterItem">
                        <input class="form-control setter setNote" id="setNote" value="" placeholder=" ">
                        <label class="form-label labelName" for="setNote"><?php echo  __("Note","magicbox") ?></label>
                    </div>

                    <div class="form-group mb-3 setterItem optionSetter">
                        <input type="text" class="tagsInput form-control setter setOptions" id="setOptions" data-role="tagsinput" />
                        <label class="form-label labelName" for="setOptions"><?php echo  __("Options","magicbox") ?></label>
                    </div>

                    <div class="setterItem mb-3 minMaxSetter">
                        <div class="row fixedRow">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input class="form-control setter setMin" id="setMin" value="" placeholder=" ">
                                    <label class="form-label labelName" for="setMin"><?php echo  __("Min","magicbox") ?></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input class="form-control setter setMax" id="setMax" value="" placeholder=" ">
                                    <label class="form-label labelName" for="setMax"><?php echo  __("Max","magicbox") ?></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input class="form-control setter setStep" id="setStep" value="" placeholder=" ">
                                    <label class="form-label labelName" for="setStep"><?php echo  __("Step","magicbox") ?></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3 setterItem">
                        <input class="form-control setter setClass" id="setClass" value="" placeholder=" ">
                        <label class="form-label labelName" for="setClass"><?php echo  __("Additional Class","magicbox") ?></label>
                    </div>

                    <div class="form-group mb-3 setterItem requiredSetter">
                        <select class="form-control setter setRequired" id="setRequired">
                            <option value=""><?php echo  __("Choose","magicbox") ?></option>
                            <option value="2"><?php echo  __("No","magicbox") ?></option>
                            <option value="1"><?php echo  __("Yes","magicbox") ?></option>
                        </select>
                        <label class="form-label labelName" for="setRequired"><?php echo  __("Is Required?") ?></label>
                    </div>

                    <div class="form-group mb-3 setterItem">
                        <select class="form-control setter setDivWidth" id="setDivWidth">
                            <option value=""><?php echo  __("Choose","magicbox") ?></option>
                            <option value="mb-col-md-12"><?php echo  __("Full","magicbox") ?></option>
                            <option value="mb-col-md-9"><?php echo  __("Long Quarter","magicbox") ?></option>
                            <option value="mb-col-md-6"><?php echo  __("Half","magicbox") ?></option>
                            <option value="mb-col-md-3"><?php echo  __("Quarter","magicbox") ?></option>
                        </select>
                        <label class="form-label labelName" for="setDivWidth"><?php echo  __("Width","magicbox") ?></label>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="assetEditModal" aria-hidden="true" aria-labelledby="assetEditModalLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" id="mainMenuCloseButton" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="assetEditModalBody">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><?php echo  __("Save changes","magicbox") ?></button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary d-none" id="assetEditModalButton" data-bs-toggle="modal" data-bs-target="#assetEditModal"></button>
            <div class="col-lg-9">
                <form method="post" class="sendForm">
                    <input type="hidden" class="formBuilderTitle" name="form_builder[label_data][title]"
                           value="<?php echo  $options['form_builder']['label_data']['title'] ?>"/>
                    <input type="hidden" class="formBuilderPath" name="form_builder[path]"
                           value="<?php echo  $options['form_builder']['path']==""?"contact-with-us":$options['form_builder']['path'] ?>"/>
                    <input type="hidden" class="formBuilderMail" name="form_builder[mail]"
                           value="<?php echo  $options['form_builder']['mail'] ?>"/>
                    <input type="hidden" class="formBuilderButtonName" name="form_builder[label_data][button_name]"
                           value="<?php echo  $options['form_builder']['label_data']['button_name'] ?>"/>
                    <input type="hidden" class="formBuilderSuccessResult" name="form_builder[label_data][success_text]"
                           value="<?php echo  $options['form_builder']['label_data']['success_text'] ?>"/>
                    <input type="hidden" class="formBuilderFailResult" name="form_builder[label_data][fail_text]"
                           value="<?php echo  $options['form_builder']['label_data']['fail_text'] ?>"/>
                    <input type="hidden" class="formBuilderLabel" name="form_builder[label_data][label]"
                           value="<?php echo  $options['form_builder']['label_data']['label'] ?>"/>

                    <ul class="innerHere settingValues my-0 py-0" id="sortable"><?php echo mbFormBuilderAssetsToHtml($options['form_builder']['data'],true)?></ul>
                    <button type="submit" style="display:none;" name="upsert" value="<?php echo  __("Update","magicbox") ?>"
                            class="btn btn-success sendButton"><?php echo  __("Update","magicbox") ?></button>
                </form>
            </div>
        </div>
        <div class="row fixedRow justify-content-end">
            <div class="col-12" id="addButtonArea">
                <div class="text-center">
                    <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#inputAddModal">
                        <i class="fa-solid fa-circle-plus me-2"></i> <?php echo  __("Add Element","magicbox") ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a>
    </div>

</div>



<div class="copyElement" style="display:none">

    <div class="input">
        <li class="item edit mt-2 ###className###" data-classname="###className###">
            <input type="hidden" class="form-control setLabelName settingOption" name="e[###className###][labelName]"/>
            <input type="hidden" class="form-control setPlaceHolder settingOption" name="e[###className###][placeholder]"/>
            <input type="hidden" class="form-control setNote settingOption" name="e[###className###][note]"/>
            <input type="hidden" class="form-control setOptions settingOption" name="e[###className###][options]"/>
            <input type="hidden" class="form-control setType settingOption" name="e[###className###][type]"/>
            <input type="hidden" class="form-control setElement settingOption" name="e[###className###][element]"/>
            <input type="hidden" class="form-control setName settingOption" name="e[###className###][name]"/>
            <input type="hidden" class="form-control setClass settingOption" name="e[###className###][class]"/>
            <input type="hidden" class="form-control setMax settingOption" name="e[###className###][max]"/>
            <input type="hidden" class="form-control setMin settingOption" name="e[###className###][min]"/>
            <input type="hidden" class="form-control setStep settingOption" name="e[###className###][step]"/>
            <input type="hidden" class="form-control setRequired settingOption" name="e[###className###][required]"/>
            <input type="hidden" class="form-control setDivWidth settingOption" name="e[###className###][divWidth]"/>
            <textarea class="form-control setHtml settingOption" name="e[###className###][html]" style="display:none;"></textarea>

            <div class="mb-row fixedRow align-items-center">
                <div class="mb-col-11">
                    <div class="row fixedRow">
                        <div class="mb-col-md-12 ###className###_input">
                            <div class="form-group-2">
                                <label class="form-label-2 labelName"></label>
                                <input type="###type###" class="form-control-2 labelControl" placeholder="">
                            </div>
                            <div class="form-text"></div>
                        </div>
                    </div>
                </div>
                <div class="mb-col-1">
                    <div class="formProcess">
                        <span class="delete" data-classname="###className###"><i class="fa-solid fa-trash-can"></i></span>
                        <span class="edit" data-classname="###className###"><i class="fa-solid fa-pen-to-square"></i></span>
                    </div>
                </div>
            </div>

            <div class="sortIcon"><i class="fa-solid fa-grip-vertical"></i></div>
        </li>
    </div>

    <div class="selectbox">
        <li class="form-group item edit mt-2 ###className###" data-classname="###className###">
            <input type="hidden" class="form-control setLabelName settingOption" name="e[###className###][labelName]"/>
            <input type="hidden" class="form-control setPlaceHolder settingOption" name="e[###className###][placeholder]"/>
            <input type="hidden" class="form-control setNote settingOption" name="e[###className###][note]"/>
            <input type="hidden" class="form-control setOptions settingOption" name="e[###className###][options]"/>
            <input type="hidden" class="form-control setType settingOption" name="e[###className###][type]"/>
            <input type="hidden" class="form-control setElement settingOption" name="e[###className###][element]"/>
            <input type="hidden" class="form-control setName settingOption" name="e[###className###][name]"/>
            <input type="hidden" class="form-control setClass settingOption" name="e[###className###][class]"/>
            <input type="hidden" class="form-control setMax settingOption" name="e[###className###][max]"/>
            <input type="hidden" class="form-control setMin settingOption" name="e[###className###][min]"/>
            <input type="hidden" class="form-control setStep settingOption" name="e[###className###][step]"/>
            <input type="hidden" class="form-control setRequired settingOption" name="e[###className###][required]"/>
            <input type="hidden" class="form-control setDivWidth settingOption" name="e[###className###][divWidth]"/>
            <textarea class="form-control setHtml settingOption" name="e[###className###][html]" style="display:none;"></textarea>

            <div class="mb-row fixedRow align-items-center">
                <div class="mb-col-11">
                    <div class="mb-row fixedRow">
                        <div class="mb-col-md-12 ###className###_input">
                            <div class="form-group-2">
                                <label class="form-label-2 labelName"></label>
                                <select ###type### class="form-control-2 labelControl">
                                </select>
                            </div>
                            <div class="form-text"></div>
                        </div>
                    </div>
                </div>
                <div class="mb-col-1">
                    <div class="formProcess">
                        <span class="delete" data-classname="###className###"><i class="fa-solid fa-trash-can"></i></span>
                        <span class="edit" data-classname="###className###"><i class="fa-solid fa-pen-to-square"></i></span>
                    </div>
                </div>
            </div>

            <div class="sortIcon"><i class="fa-solid fa-grip-vertical"></i></div>
        </li>
    </div>


    <div class="checkbox">
        <li class="form-group item edit mt-2 ###className###" data-classname="###className###">
            <input type="hidden" class="setLabelName settingOption" name="e[###className###][labelName]"/>
            <input type="hidden" class="setPlaceHolder settingOption" name="e[###className###][placeholder]"/>
            <input type="hidden" class="setNote settingOption" name="e[###className###][note]"/>
            <input type="hidden" class="setOptions settingOption" name="e[###className###][options]"/>
            <input type="hidden" class="setType settingOption" name="e[###className###][type]"/>
            <input type="hidden" class="setElement settingOption" name="e[###className###][element]"/>
            <input type="hidden" class="setName settingOption" name="e[###className###][name]"/>
            <input type="hidden" class="setClass settingOption" name="e[###className###][class]"/>
            <input type="hidden" class="setMax settingOption" name="e[###className###][max]"/>
            <input type="hidden" class="setMin settingOption" name="e[###className###][min]"/>
            <input type="hidden" class="setStep settingOption" name="e[###className###][step]"/>
            <input type="hidden" class="setRequired settingOption" name="e[###className###][required]"/>
            <input type="hidden" class="setDivWidth settingOption" name="e[###className###][divWidth]"/>
            <textarea class="setHtml settingOption" name="e[###className###][html]" style="display:none;"></textarea>

            <div class="mb-row fixedRow align-items-center">
                <div class="mb-col-11">
                    <div class="mb-row fixedRow">
                        <div class="mb-col-md-12 ###className###_input">
                            <div class="form-group-2">
                                <label class="form-label-2 labelName"></label>

                                <div class="labelControl">
                                </div>
                                <div class="form-text"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-col-1">
                    <div class="formProcess">
                        <span class="delete" data-classname="###className###"><i class="fa-solid fa-trash-can"></i></span>
                        <span class="edit" data-classname="###className###"><i class="fa-solid fa-pen-to-square"></i></span>
                    </div>
                </div>
            </div>

            <div class="sortIcon"><i class="fa-solid fa-grip-vertical"></i></div>
        </li>
    </div>

    <div class="textarea">
        <li class="form-group item edit mt-2 ###className###" data-classname="###className###">
            <input type="hidden" class="setLabelName settingOption" name="e[###className###][labelName]"/>
            <input type="hidden" class="setPlaceHolder settingOption" name="e[###className###][placeholder]"/>
            <input type="hidden" class="setNote settingOption" name="e[###className###][note]"/>
            <input type="hidden" class="setOptions settingOption" name="e[###className###][options]"/>
            <input type="hidden" class="setType settingOption" name="e[###className###][type]"/>
            <input type="hidden" class="setElement settingOption" name="e[###className###][element]"/>
            <input type="hidden" class="setName settingOption" name="e[###className###][name]"/>
            <input type="hidden" class="setClass settingOption" name="e[###className###][class]"/>
            <input type="hidden" class="setMax settingOption" name="e[###className###][max]"/>
            <input type="hidden" class="setMin settingOption" name="e[###className###][min]"/>
            <input type="hidden" class="setStep settingOption" name="e[###className###][step]"/>
            <input type="hidden" class="setRequired settingOption" name="e[###className###][required]"/>
            <input type="hidden" class="setDivWidth settingOption" name="e[###className###][divWidth]"/>
            <textarea class="setHtml settingOption" name="e[###className###][html]" style="display:none;"></textarea>

            <div class="mb-row fixedRow align-items-center">
                <div class="mb-col-11">
                    <div class="mb-row fixedRow">
                        <div class="mb-col-md-12 ###className###_input">
                            <div class="form-group-2">
                                <label class="form-label-2 labelName"></label>
                                <textarea  class="form-control-2 labelControl" placeholder=""></textarea>
                            </div>
                            <div class="form-text"></div>
                        </div>
                    </div>
                </div>

                <div class="mb-col-1">
                    <div class="formProcess">
                        <span class="delete" data-classname="###className###"><i class="fa-solid fa-trash-can"></i></span>
                        <span class="edit" data-classname="###className###"><i class="fa-solid fa-pen-to-square"></i></span>
                    </div>
                </div>
            </div>

            <div class="sortIcon"><i class="fa-solid fa-grip-vertical"></i></div>
        </li>
    </div>

    <div class="html">
        <li class="form-group item edit mt-2 ###className###" data-classname="###className###">
            <input type="hidden" class="form-control setLabelName settingOption" name="e[###className###][labelName]"/>
            <input type="hidden" class="form-control setPlaceHolder settingOption" name="e[###className###][placeholder]"/>
            <input type="hidden" class="form-control setNote settingOption" name="e[###className###][note]"/>
            <input type="hidden" class="form-control setOptions settingOption" name="e[###className###][options]"/>
            <input type="hidden" class="form-control setType settingOption" name="e[###className###][type]"/>
            <input type="hidden" class="form-control setElement settingOption" name="e[###className###][element]"/>
            <input type="hidden" class="form-control setName settingOption" name="e[###className###][name]"/>
            <input type="hidden" class="form-control setClass settingOption" name="e[###className###][class]"/>
            <input type="hidden" class="form-control setMax settingOption" name="e[###className###][max]"/>
            <input type="hidden" class="form-control setMin settingOption" name="e[###className###][min]"/>
            <input type="hidden" class="form-control setStep settingOption" name="e[###className###][step]"/>
            <input type="hidden" class="form-control setRequired settingOption" name="e[###className###][required]"/>
            <input type="hidden" class="form-control setDivWidth settingOption" name="e[###className###][divWidth]"/>
            <textarea class="form-control setHtml settingOption" name="e[###className###][html]" style="display:none;"></textarea>

            <div class="mb-row fixedRow align-items-center">
                <div class="mb-col-11">
                    <div class="mb-row fixedRow">
                        <div class="mb-col-md-12 ###className###_input">
                            <div class="form-group-2">
                                <label class="form-label-2 labelName"></label>

                                <div class="form-control2 labelControl"></div>
                            </div>
                            <div class="form-text"></div>
                        </div>
                    </div>
                </div>
                <div class="mb-col-1">
                    <div class="formProcess">
                        <span class="delete" data-classname="###className###"><i class="fa-solid fa-trash-can"></i></span>
                        <span class="edit" data-classname="###className###"><i class="fa-solid fa-pen-to-square"></i></span>
                    </div>
                </div>
            </div>

            <div class="sortIcon"><i class="fa-solid fa-grip-vertical"></i></div>
        </li>
    </div>


</div>

<script>

jQuery(function () {
    jQuery("#sortable").sortable();
    jQuery("#sortable").disableSelection();
    jQuery(".tagsInput").tagsinput();
});

jQuery(document).on('change', '.pageStatus', function () {
    jQuery('.formBuilderStatus').val(jQuery(this).val());
});
jQuery(document).on('keyup', '.pageTitle', function () {
    jQuery('.formBuilderTitle').val(jQuery(this).val());
});
jQuery(document).on('keyup', '.pagePath', function () {
    jQuery('.formBuilderPath').val(jQuery(this).val());
});
jQuery(document).on('keyup', '.pageMail', function () {
    jQuery('.formBuilderMail').val(jQuery(this).val());
});

jQuery(document).on('keyup', '.pageButtonName', function () {
    jQuery('.formBuilderButtonName').val(jQuery(this).val());
});


jQuery(document).on('keyup', '.pageSuccessResultText', function () {
    jQuery('.formBuilderSuccessResult').val(jQuery(this).val());
});
jQuery(document).on('keyup', '.pageFailResultText', function () {
    jQuery('.formBuilderFailResult').val(jQuery(this).val());
});
jQuery(document).on('keyup', '.pageLabel', function () {
    jQuery('.formBuilderLabel').val(jQuery(this).val());
});


jQuery(document).on('click', '.clearEmptiesAndSend', function () {

    jQuery('.settingOption').each(function (e) {
        if (typeof jQuery(this).val() == "undefined" || jQuery(this).val() == "") {
            jQuery(this).removeAttr('name');
            jQuery(this).remove();
        }
    }).promise().done(function () {
            jQuery('.sendForm').submit();
            jQuery('.sendButton').click();
    });

});

/* Edit Values */

/* input */
jQuery(document).on('keyup', '.assetEditArea .setLabelName', function () {
    jQuery('.' + jQuery.editClassName + ' .labelName').html(jQuery(this).val());
    jQuery('.' + jQuery.editClassName + ' .setLabelName').val(jQuery(this).val());

});

jQuery(document).on('keyup', '.assetEditArea .setPlaceHolder', function () {
    jQuery('.' + jQuery.editClassName + ' .labelControl').attr('placeholder', jQuery(this).val());
    jQuery('.' + jQuery.editClassName + ' .setPlaceHolder').val(jQuery(this).val());
});

jQuery(document).on('keyup', '.assetEditArea .setNote', function () {
    jQuery('.' + jQuery.editClassName + ' .form-text').html(jQuery(this).val());
    jQuery('.' + jQuery.editClassName + ' .setNote').val(jQuery(this).val());
});


jQuery(document).on('keyup', '.assetEditArea .setMin', function () {
    jQuery('.' + jQuery.editClassName + ' .labelControl').attr('min', jQuery(this).val());
    jQuery('.' + jQuery.editClassName + ' .setMin').val(jQuery(this).val());
});

jQuery(document).on('keyup', '.assetEditArea .setMax', function () {
    jQuery('.' + jQuery.editClassName + ' .labelControl').attr('max', jQuery(this).val());
    jQuery('.' + jQuery.editClassName + ' .setMax').val(jQuery(this).val());
});

jQuery(document).on('keyup', '.assetEditArea .setStep', function () {
    jQuery('.' + jQuery.editClassName + ' .labelControl').attr('step', jQuery(this).val());
    jQuery('.' + jQuery.editClassName + ' .setStep').val(jQuery(this).val());
});

jQuery(document).on('keyup', '.assetEditArea .setClass', function () {
    jQuery('.' + jQuery.editClassName + ' .setClass').val(jQuery(this).val());
});

jQuery(document).on('change', '.assetEditArea .setRequired', function () {
    jQuery('.' + jQuery.editClassName + ' .setRequired').val(jQuery(this).val());
});

jQuery(document).on('change', '.assetEditArea .setDivWidth', function () {
    jQuery('.' + jQuery.editClassName + '_input').removeClass('mb-col-md-12');
    jQuery('.' + jQuery.editClassName + '_input').removeClass('mb-col-md-9');
    jQuery('.' + jQuery.editClassName + '_input').removeClass('mb-col-md-6');
    jQuery('.' + jQuery.editClassName + '_input').removeClass('mb-col-md-3');
    jQuery('.' + jQuery.editClassName + '_input').addClass(jQuery(this).val());
    jQuery('.' + jQuery.editClassName + ' .setDivWidth').val(jQuery(this).val());
});


/* item added */
jQuery(document).on('itemAdded', ".assetEditArea .tagsInput", function (event) {
    rand = randomText();
    html = "";
    if (jQuery('.' + jQuery.editClassName + ' .setElement').val() == "selectbox") {
        html = '<option value="' + event.item + '">' + event.item + '</option>';
    } else {
        html = '<div class="form-check formCheckControl" value="' + event.item + '">' +
            '<input class="form-check-input" type="' + jQuery('.' + jQuery.editClassName + ' .setType').val() + '"  value="' + event.item + '" id="' + rand + '">' +
            '<label class="form-check-label" for="' + rand + '">' + event.item + '</label>' +
            '</div>';
    }

    jQuery('.' + jQuery.editClassName + ' .labelControl').append(html);
    jQuery('.' + jQuery.editClassName + ' .setOptions').val(jQuery('.assetEditArea .tagsInput').val());

});

jQuery(document).on('itemRemoved', ".assetEditArea .tagsInput", function (event) {
    jQuery('.' + jQuery.editClassName + ' .labelControl option[value="' + event.item + '"]').remove();
    jQuery('.' + jQuery.editClassName + ' .labelControl .formCheckControl[value="' + event.item + '"]').remove();
    jQuery('.' + jQuery.editClassName + ' .setOptions').val(jQuery('.assetEditArea .tagsInput').val());
});


/* Edit Values */

jQuery(document).on('click', 'span.delete', function () {
    className = jQuery(this).data('classname');
    jQuery('.' + className).remove();
});

jQuery(document).on('click', '.edit', function () {
    className = jQuery(this).data('classname');


    jQuery('.item').removeClass('selected');
    jQuery('.item.' + className).addClass('selected');

    jQuery('.settingClass').val(className);
    jQuery.editClassName = className;

    elementName = jQuery('.' + className+' .setElement').val();
    type = jQuery('.' + className+' .setType').val();


    /* define which element will show */
    jQuery('.setterItem').show(0);

    if (elementName != "selectbox" & elementName != "checkbox") {
        jQuery('.assetEditArea .optionSetter').hide(0);
    }

    if (type != "range" && type != "number") {
        jQuery('.assetEditArea .minMaxSetter').hide(0);
    }

    if (elementName == "selectbox" || type == "range" || type == "checkbox" || type == "radio" || type == "time" || type == "date" || type == "color") {
        jQuery('.assetEditArea .placeholderSetter').hide(0);
    }

    if (elementName == "selectbox" || type == "range" || type == "color") {
        jQuery('.assetEditArea .requiredSetter').hide(0);
    }

    if (elementName == "html") {
        jQuery('.assetEditArea .requiredSetter').hide(0);
        jQuery('.assetEditArea .optionSetter').hide(0);
        jQuery('.assetEditArea .minMaxSetter').hide(0);
        jQuery('.assetEditArea .placeholderSetter').hide(0);
    }

    if (type == "text" || type == "color" || type == "url" || type == "mail" || type == "password" || type == "date" || type == "time" || type == "phone") {
        jQuery('.assetEditArea .minMaxSetter').hide(0);
        jQuery('.assetEditArea .optionSetter').hide(0);
    }

    /* defined which element showed */


    /* clear old values */
    jQuery('.setter').val('');

    /* get entered values */
    jQuery('.assetEditArea .setLabelName').val(jQuery('.' + className + ' .labelName').html());
    jQuery('.assetEditArea .setPlaceHolder').val(jQuery('.' + className + ' .labelControl').attr('placeholder'));
    jQuery('.assetEditArea .setPlaceHolder').val(jQuery('.' + className + ' .setPlaceHolder').val());

    jQuery('.assetEditArea .setNote').val(jQuery('.' + className + ' .form-text').html());
    jQuery('.assetEditArea .setMin').val(jQuery('.' + className + ' .setMin').val());
    jQuery('.assetEditArea .setMax').val(jQuery('.' + className + ' .setMax').val());
    jQuery('.assetEditArea .setStep').val(jQuery('.' + className + ' .setStep').val());
    jQuery('.assetEditArea .setClass').val(jQuery('.' + className + ' .setClass').val());
    jQuery('.assetEditArea .setRequired').val(jQuery('.' + className + ' .setRequired').val());
    jQuery('.assetEditArea .setDivWidth').val(jQuery('.' + className + ' .setDivWidth').val());
    jQuery('.assetEditArea .setHtml').val(jQuery('.' + className + ' .setHtml').val());

    if (elementName == "selectbox" || elementName == "checkbox") {
    /* update tags input */
    jQuery('.' + className + ' .labelControl').html('');
    currentVal = jQuery('.' + className + ' .setOptions').val();
    jQuery('.assetEditArea .setOptions').tagsinput('removeAll');
    jQuery('.assetEditArea .setOptions').tagsinput('add', currentVal);
    jQuery('.' + className + ' .setOptions').val(currentVal);
    }

    jQuery('.tabEditButton').click();
    document.querySelector('.assetEditArea').classList.add('show')
});


jQuery(document).on('click', '.selectElement li', function () {
    elementName = jQuery(this).data('element');
    elementType = jQuery(this).data('type');

    className = selectElement(elementName, elementType);
    goThere('.' + className, 0);
    jQuery('.modalCloseButton').click();

    document.querySelector('.assetEditArea').classList.add('show')

    jQuery("#sortable").sortable();
    jQuery("#sortable").disableSelection();
});

function selectElement(elementName, type) {

    className = randomText();
    uniq = randomText();
    name = className;

    if (elementName == "selectbox") {
        if (type == "single") {
            type = " ";
            name = className;
        } else {
            type = "multiple";
            name = className + "[]";
        }
    }

    if (elementName == "checkbox") {

        if (type == "radio") {
            name = className;
        } else {
            name = className + "[]";
        }

    }


    jQuery.editClassName = className;

    newElement = jQuery('.copyElement .' + elementName).html();

    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);
    newElement = newElement.replace('###className###', className);

    newElement = newElement.replace('###uniq###', uniq);
    newElement = newElement.replace('###uniq###', uniq);
    newElement = newElement.replace('###uniq###', uniq);

    newElement = newElement.replace('###type###', type);
    newElement = newElement.replace('###type###', type);
    newElement = newElement.replace('###type###', type);

    newElement = newElement.replace('###name###', name);
    newElement = newElement.replace('###name###', name);
    newElement = newElement.replace('###name###', name);

    jQuery('.innerHere').append(newElement);

    /* After Add */

    jQuery('.' + className + " .setName").val(name);
    jQuery('.' + className + " .setType").val(type);
    jQuery('.' + className + " .setElement").val(elementName);

    jQuery('.innerHere .selected').removeClass('selected');
    jQuery('.' + className).addClass('selected');

    if (elementName == "selectbox" || elementName == "checkbox") {
    jQuery('.assetEditArea .setOptions').tagsinput('removeAll');
    jQuery('.assetEditArea .setOptions').tagsinput('add', '<?php echo __("Option 1","magicbox")?>,<?php echo __("Option 2","magicbox")?>');
    jQuery('.' + className + ' .setOptions').val('<?php echo __("Option 1","magicbox")?>,<?php echo __("Option 2","magicbox")?>');
    }

    jQuery('.setterItem').show(0);

    if (elementName != "selectbox" & elementName != "checkbox") {
        jQuery('.assetEditArea .optionSetter').hide(0);
    }

    if (type != "range" && type != "number") {
        jQuery('.assetEditArea .minMaxSetter').hide(0);
    }

    if (elementName == "selectbox" || type == "range" || type == "checkbox" || type == "radio" || type == "time" || type == "date" || type == "color") {
        jQuery('.assetEditArea .placeholderSetter').hide(0);
    }

    if (elementName == "selectbox" || type == "range" || type == "color") {
        jQuery('.assetEditArea .requiredSetter').hide(0);
    }

    if (elementName == "html") {
        jQuery('.assetEditArea .requiredSetter').hide(0);
        jQuery('.assetEditArea .optionSetter').hide(0);
        jQuery('.assetEditArea .minMaxSetter').hide(0);
        jQuery('.assetEditArea .placeholderSetter').hide(0);
    }

    if (type == "text" || type == "color" || type == "url" || type == "mail" || type == "password" || type == "date" || type == "time" || type == "phone") {
        jQuery('.assetEditArea .minMaxSetter').hide(0);
        jQuery('.assetEditArea .optionSetter').hide(0);
    }




    /* clear input */
    jQuery('.assetEditArea .setLabelName').val('');
    jQuery('.assetEditArea .setPlaceHolder').val('');
    jQuery('.assetEditArea .setNote').val('');
    jQuery('.assetEditArea .setMin').val('');
    jQuery('.assetEditArea .setMax').val('');
    jQuery('.assetEditArea .setStep').val('');
    jQuery('.assetEditArea .setClass').val('');
    jQuery('.assetEditArea .setRequired').val('');
    jQuery('.assetEditArea .setDivWidth').val('');
    jQuery('.assetEditArea .setHtml').val('');


    return className;
}


function randomText() {
    return "_" + Math.random().toString(36).substring(7);
}

let windowWidth = window.innerWidth

if(windowWidth < 990) {
    let editPanel = document.querySelector('#assetEditArea')
    document.querySelector('.assetEditBox').remove()

    //assetEditModal
    document.querySelector('#assetEditModalBody').innerHTML = ''
    document.querySelector('#assetEditModalBody').append(editPanel)

    jQuery(document).on('click','.edit',() => {
        document.querySelector('#assetEditModalButton').click()
        console.log('clicked')
    })
}

</script>

