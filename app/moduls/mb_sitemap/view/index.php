<?php $postTypes = $theClass->magicBox->postTypes(); ?>
<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  _e("Sitemap","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can create separate sitemaps depending on the content types of your website.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can include images in sitemaps.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("Your sitemap will be automatically updated for each separate content you add, without the need to repeatedly create a sitemap.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You will be listed more easily in search engines such as Google, Bing, Yandex, Yahoo, Ask.","magicbox") ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php foreach ($postTypes as $postKey => $value) { ?>
        <div class="card bg-light">
            <div class="card-header">
                <h6 class="my-0"><?php echo  _e("Sitemap Manager","magicbox") ?> : <?php echo  $value['label'] ?></h6>
            </div>

            <div class="card-body">
                <div class="container-mb">
                    <div class="row fixedRow">
                        <div class="col-12">
                            <div class="form-check-switch">
                                <div class="form-check">
                                    <label class="form-check-label" for="sitemap[<?php echo  $value['name'] ?>][status]"><?php echo  __("Status","magicbox") ?></label>
                                    <input class="form-check-input" type="checkbox"
                                           name="sitemap[<?php echo  $value['name'] ?>][status]"
                                           id="sitemap[<?php echo  $value['name'] ?>][status]"
                                        <?php echo  $options['sitemap'][$value['name']]['status'] == "1"? "checked" : "" ?>
                                           value="1">
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="sitemap[<?php echo  $value['name'] ?>][url]" id="sitemap[<?php echo  $value['name'] ?>][url]" placeholder=" " value="<?php echo  $options['sitemap'][$value['name']]['url'] ?>" class="form-control "/>
                                <label class="form-label" for="sitemap[<?php echo  $value['name'] ?>][url]"><?php echo  trim(site_url(), "/") ?>/
                                    <small>(<?php echo  strtolower($value['label']) ?>.xml)</small>
                                </label>
                                <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Enter the sitemap url you specified. e.g ","magicbox") ?><?php echo  trim(site_url(), "/") ?>/<?php echo  strtolower($value['label']) ?>.xml"><i class="fa-solid fa-info"></i></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="sitemap[<?php echo  $value['name'] ?>][limit]" id="sitemap[<?php echo  $value['name'] ?>][limit]" placeholder=" " value="<?php echo  $options['sitemap'][$value['name']]['limit'] ?>" class="form-control"/>
                                <label class="input-group-text" for="sitemap[<?php echo  $value['name'] ?>][limit]"><?php echo  __("Limit","magicbox") ?>
                                    <small>(1000)</small>
                                </label>
                                <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Specify the number of pages that will be added to the sitemap.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-12">
                            <div class="d-flex align-items-center mb-3">
                                <label class="form-label-normal" style="width:auto;"><?php echo  __("Add attached images","magicbox") ?></label>
                                <div class="form-info-normal ms-2" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Include the images you have uploaded on your website in the sitemap.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                            </div>
                            <div class="form-check-group noBorder mb-3">
                                <div>
                                    <?php foreach ($yesNo as $key => $val) { ?>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" name="sitemap[<?php echo  $value['name'] ?>][show_images]" value="<?php echo  $key ?>"
                                                <?php if ($options['sitemap'][$value['name']]['show_images'] == $key or ($options['sitemap'][$value['name']]['show_images'] != "1" and $key == 2)){
                                                    echo "checked";
                                                } ?>  id="showimages_<?php echo  $key . $postKey ?>">
                                            <label class="form-check-label" for="showimages_<?php echo  $key . $postKey ?>"><span><?php echo  $val ?></span></label>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-12">
                            <div class="d-flex align-items-center mb-3">
                                <label class="form-label-normal d-inline-block" style="width:auto;"><?php echo  __("Add post content images","magicbox") ?></label>
                                <div class="form-info-normal ms-2" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("Include images in the content you publish in the sitemap.","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                            </div>

                            <div class="form-check-group noBorder">

                                <?php foreach ($yesNo as $key => $val) { ?>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="sitemap[<?php echo  $value['name'] ?>][show_text_images]"
                                               value="<?php echo  $key ?>"
                                            <?php if ($options['sitemap'][$value['name']]['show_text_images'] == $key or ($options['sitemap'][$value['name']]['show_text_images'] != "1" and $key == 2)){
                                                echo "checked";
                                            } ?>  id="showtextimages_<?php echo  $key . $postKey ?>">
                                        <label class="form-check-label" for="showtextimages_<?php echo  $key . $postKey ?>"><span><?php echo  $val ?></span></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php } ?>

    <?php 
     $value = array();
    $value['name'] = "categories";
    $value['label'] = __("Categories","magicbox");
    ?>

    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  _e("Sitemap Manager","magicbox") ?> : <?php echo  $value['label'] ?></h6>
        </div>
        <div class="card-body">
            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-12">
                        <div class="form-check-switch">
                            <div class="form-check">
                                <label class="form-check-label" for="sitemap[<?php echo  $value['name'] ?>][status]"><?php echo  __("Status","magicbox") ?></label>
                                <input class="form-check-input" type="checkbox"
                                       name="sitemap[<?php echo  $value['name'] ?>][status]"
                                       id="sitemap[<?php echo  $value['name'] ?>][status]"
                                    <?php echo  $options['sitemap'][$value['name']]['status'] == "1"? "checked" : "" ?>
                                       value="1">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" name="sitemap[<?php echo  $value['name'] ?>][url]" id="sitemap[<?php echo  $value['name'] ?>][url]" placeholder=" " value="<?php echo  $options['sitemap'][$value['name']]['url'] ?>" class="form-control "/>
                            <label class="input-group-text" for="sitemap[<?php echo  $value['name'] ?>][url]"><?php echo  trim(site_url(), "/") ?>/</label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  trim(site_url(), "/") ?>/sitemap.xml"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" name="sitemap[<?php echo  $value['name'] ?>][limit]" id="sitemap[<?php echo  $value['name'] ?>][limit]" placeholder=" " value="<?php echo  $options['sitemap'][$value['name']]['limit'] ?>" class="form-control"/>
                            <label class="input-group-text" for="sitemap[<?php echo  $value['name'] ?>][limit]"><?php echo  __("Limit","magicbox") ?>
                                <small>(1000)</small>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
     $value = array();
    $value['name'] = "tags";
    $value['label'] = __("Tags","magicbox");
    ?>

    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  _e("Sitemap Manager","magicbox") ?> : <?php echo  $value['label'] ?></h6>
        </div>

        <div class="card-body">
            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-12">
                        <div class="form-check-switch">
                            <div class="form-check">
                                <label class="form-check-label" for="sitemap[<?php echo  $value['name'] ?>][status]"><?php echo  __("Status","magicbox") ?></label>
                                <input class="form-check-input" type="checkbox"
                                       name="sitemap[<?php echo  $value['name'] ?>][status]"
                                       id="sitemap[<?php echo  $value['name'] ?>][status]"
                                    <?php echo  $options['sitemap'][$value['name']]['status'] == "1"? "checked" : "" ?>
                                       value="1">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" name="sitemap[<?php echo  $value['name'] ?>][url]" id="sitemap[<?php echo  $value['name'] ?>][url]" placeholder=" " value="<?php echo  $options['sitemap'][$value['name']]['url'] ?>" class="form-control "/>
                            <label class="input-group-text" for="sitemap[<?php echo  $value['name'] ?>][url]"><?php echo  trim(site_url(), "/") ?>/</label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  trim(site_url(), "/") ?>/sitemap.xml"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" name="sitemap[<?php echo  $value['name'] ?>][limit]" id="sitemap[<?php echo  $value['name'] ?>][limit]" placeholder=" " value="<?php echo  $options['sitemap'][$value['name']]['limit'] ?>" class="form-control"/>
                            <label class="input-group-text" for="sitemap[<?php echo  $value['name'] ?>][limit]"><?php echo  __("Limit","magicbox") ?>
                                <small>(1000)</small>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
     $value = array();
    $value['name'] = "users";
    $value['label'] = __("Users","magicbox");
    ?>

    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  _e("Sitemap Manager","magicbox") ?> : <?php echo  $value['label'] ?></h6>
        </div>

        <div class="card-body">
            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-12">
                        <div class="form-check-switch">
                            <div class="form-check">
                                <label class="form-check-label" for="sitemap[<?php echo  $value['name'] ?>][status]"><?php echo  __("Status","magicbox") ?></label>
                                <input class="form-check-input" type="checkbox"
                                       name="sitemap[<?php echo  $value['name'] ?>][status]"
                                       id="sitemap[<?php echo  $value['name'] ?>][status]"
                                    <?php echo  $options['sitemap'][$value['name']]['status'] == "1"? "checked" : "" ?>
                                       value="1">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" name="sitemap[<?php echo  $value['name'] ?>][url]" id="sitemap[<?php echo  $value['name'] ?>][url]" placeholder=" " value="<?php echo  $options['sitemap'][$value['name']]['url'] ?>" class="form-control "/>
                            <label class="input-group-text" for="sitemap[<?php echo  $value['name'] ?>][url]"><?php echo  trim(site_url(), "/") ?>/</label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  trim(site_url(), "/") ?>/sitemap.xml"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" name="sitemap[<?php echo  $value['name'] ?>][limit]" id="sitemap[<?php echo  $value['name'] ?>][limit]" placeholder=" " value="<?php echo  $options['sitemap'][$value['name']]['limit'] ?>" class="form-control"/>
                            <label class="input-group-text" for=""><?php echo  __("Limit","magicbox") ?>
                                <small>(1000)</small>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a>
        </div>
    </div>
</form>

<script>

    jQuery(document).on('click', '.changeUrl', function () {

        jQuery(this).magicRequest(
            {'action': 'mb_url_replacement', 'method': 'change'}, {'element': 'form'},
            function (response) {
                swal.fire({title:"<?php echo __("Successfully","magicbox")?>",text:response,icon:"success",buttons:false,timer: 3000,});
            }
        )

    });

</script>