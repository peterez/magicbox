<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
<?php if($options['cache']['ttl'] =="") { $options['cache']['ttl'] = 12; } ?>

    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Cache","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can set how caches are stored on your server.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can set the duration of caches on your server.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can set which states will be cached.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can separate desktop and mobile user caches.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can set the data that you do not want to be cached.","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="alert alert-custom alert-light-danger " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-minus"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("If you change caching method all cached files will delete.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("The cache system does not work if there is have ajax request, specific php file request or user post request also if there is have logged user or admin.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("If you add a new post or edit one, this page will be cached automatically without the need to set it up again. ","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="form-check-group mb-3">
                <div class="form-check">
                    <input class="form-check-input"  type="radio" <?php echo $options['cache']['method']== ""?"checked":""?> name="cache[method]" value="none" id="_none">
                    <label class="form-check-label" for="_none">
                        <span><?php _e("None","magicbox");?></span>
                    </label>
                </div>

                <?php 
                 foreach ($theClass->cacheDrivers as $key => $value) {
                $methodName = "check".ucfirst($value);
                $checkMethod = $theClass->$methodName();
                ?>
                    <div class="form-check">
                    <input class="form-check-input" <?php echo $checkMethod==false?"disabled":""?> <?php echo  esc_attr($value) == $options['cache']['method']?"checked":""?> type="radio" name="cache[method]" value="<?php echo  esc_attr($value)?>" id="_<?php echo $methodName?>">
                    <label class="form-check-label" for="_<?php echo $methodName?>">
                        <span><?php echo  ucfirst($value) ?></span>
                    </label>
                    </div>
                <?php } ?>
            </div>
            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" class="form-control" name="cache[ttl]" id="" placeholder=" " value="<?php echo $options['cache']['ttl']?>">
                            <label  class="form-label" for="cache[ttl]"><?php _e("Cache Lifetime","magicbox")?> (<?php _e("Hours","magicbox")?>)</label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Re-Cache Behavior") ?></h6>
        </div>
        <div class="card-body">
            <div class="alert alert-custom alert-light-danger " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-minus"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><b><?php echo  __("Note","magicbox") ?></b> : <?php echo  __("If you add new post or edit someone, it will be re-cache self page. No need to settings for that","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="form-check-group fCol">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" <?php echo $options['cache']['recache']['homepage']['new_post']== "1"?"checked":""?> name="cache[recache][homepage][new_post]" value="1" id="_r1">
                    <label class="form-check-label" for="_r1">
                        <span><?php _e("Re-cache homepage if add new post","magicbox");?></span>
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" <?php echo $options['cache']['recache']['homepage']['edit_post']== "1"?"checked":""?> name="cache[recache][homepage][edit_post]" value="1" id="_r2">
                    <label class="form-check-label" for="_r2">
                         <span><?php _e("Re-cache homepage if edit post","magicbox");?></span>
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" <?php echo $options['cache']['recache']['homepage']['delete_post']== "1"?"checked":""?> name="cache[recache][homepage][delete_post]" value="1" id="_r3">
                    <label class="form-check-label" for="_r3">
                         <span><?php _e("Re-cache homepage if delete post","magicbox");?></span>
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" <?php echo $options['cache']['recache']['homepage']['comment']== "1"?"checked":""?> name="cache[recache][homepage][comment]" value="1" id="_r4">
                    <label class="form-check-label" for="_r4">
                         <span><?php _e("Re-cache homepage if there is comment situation ( if tagged active, passive or spammed )","magicbox");?></span>
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" <?php echo $options['cache']['recache']['homepage']['plugin']=="1"?"checked":""?> name="cache[recache][homepage][plugin]" value="1" id="_r5">
                    <label class="form-check-label" for="_r5">
                         <span><?php _e("Re-cache homepage if there is plugin situation ( if tagged active, passive or delete )","magicbox");?></span>
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" <?php echo $options['cache']['disable_cache_logged']=="1"?"checked":""?> name="cache[disable_cache_logged]" value="1" id="_r6">
                    <label class="form-check-label" for="_r6">
                         <span><?php _e("Disable cache when user logged","magicbox");?></span>
                    </label>
                </div>


                <div class="form-check">
                    <input class="form-check-input" type="checkbox" <?php echo $options['cache']['separate_cache']=="1"?"checked":""?> name="cache[separate_cache]" value="1" id="_r7">
                    <label class="form-check-label" for="_r7">
                         <span><?php _e("Separate mobil and desktop user cache","magicbox");?></span>
                    </label>
                </div>


                <div class="form-check">
                    <input class="form-check-input" type="checkbox" <?php echo $options['cache']['minfiy_html']=="1"?"checked":""?> name="cache[minfiy_html]" value="1" id="_r8">
                    <label class="form-check-label" for="_r8">
                         <span><?php _e("Minify HTML","magicbox");?></span>
                    </label>
                </div>


                <div class="form-check">
                    <input class="form-check-input" type="checkbox" <?php echo $options['cache']['gzip']=="1"?"checked":""?> name="cache[gzip]" value="1" id="_r9">
                    <label class="form-check-label" for="_r9">
                         <span><?php _e("Pre-compress cache pages with Gzip");?></span>
                    </label>
                </div>
            </div>

        </div>
    </div>


    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Cache Exclusions","magicbox") ?></h6>
        </div>

        <div class="card-body">


            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can deactive instantly cache when if you want","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can deactive cache depending to condition","magicbox")?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" class="form-control" name="cache[exc][query_string]" id="cache[exc][query_string]" value="<?php echo $options['cache']['exc']['query_string']?>" placeholder=" ">
                            <label  class="form-label" for="cache[exc][query_string]"><?php _e("Query String","magicbox")?></label>
                            <span class="form-info" data-mb="pop" data-mb-title="<?php _e("Query String","magicbox")?>" data-mb-content="<b><?php echo  __("Note","magicbox") ?></b> : <?php echo  __("Write with (,)","magicbox") ?><br> <b><?php echo  __("Example","magicbox") ?></b> : <?php echo  __("sale_id,user_id,post_id","magicbox") ?>"><i class="fa-solid fa-info"></i></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" class="form-control" name="cache[exc][cookie]" id="cache[exc][cookie]" value="<?php echo $options['cache']['exc']['cookie']?>" placeholder=" ">
                            <label  class="form-label" for="cache[exc][cookie]"><?php _e("Cookies","magicbox")?></label>
                            <span class="form-info" data-mb="pop" data-mb-title="<?php _e("Cookies","magicbox")?>" data-mb-content="<b><?php echo  __("Note","magicbox") ?></b> : <?php echo  __("Write with (,)","magicbox") ?><br> <b><?php echo  __("Example","magicbox") ?></b> : <?php echo  __("adv,user_id","magicbox") ?>"><i class="fa-solid fa-info"></i></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" class="form-control" name="cache[exc][path]" id="cache[exc][path]" value="<?php echo $options['cache']['exc']['path']?>" placeholder=" ">
                            <label  class="form-label" for="cache[exc][path]"><?php _e("Url Path","magicbox")?></label>
                            <span class="form-info" data-mb="pop" data-mb-title="<?php _e("Url Path","magicbox")?>" data-mb-content="<b><?php echo  __("Note","magicbox") ?></b> : <?php echo  __("Write with (,)","magicbox") ?><br> <b><?php echo  __("Example","magicbox") ?></b> : <?php echo  __("user-basket,payment","magicbox") ?>"><i class="fa-solid fa-info"></i></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a> </div>
    </div>

</form>

