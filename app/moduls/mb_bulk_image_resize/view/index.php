<form method="post" class="theForm theForm-<?php echo sanitize_text_field($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":sanitize_text_field($_REQUEST['method'])?>">

    <div class="card bg-light">

        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Bulk Image Resize","magicbox") ?></h6>
        </div>

         <div class="card-body">
             <div class="alert alert-custom alert-light-primary " role="alert">
                 <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                 <div class="alert-text">
                     <div class="w-100 d-flex flex-wrap gap-2">
                         <div class="infoItem"><?php echo __("You can resize the content, product, etc. images on your site with one click in bulk.","magicbox")?></div>
                         <div class="infoItem"><?php echo __("You can reduce the quality of images in bulk.","magicbox")?></div>
                         <div class="infoItem"><?php echo __("You can optimize JPG, PNG and GIF files.","magicbox")?></div>
                     </div>
                 </div>
             </div>

             <div class="container-mb">
                 <?php foreach($theClass->registeredImageSizes as $keyName => $item) { ?>

                     <div class="row fixedRow mb-2">
                        <div class="col-12">
                            <h3 class="innerTitle"><?php echo ucfirst($keyName)?></h3>
                        </div>
                         <div class="col-lg-4">
                             <div class="form-group">
                                 <select class="form-select" name="resize[<?php echo $keyName?>][status]" id="resize[<?php echo $keyName?>][status]">
                                     <?php foreach ($yesNo as $key => $value) { ?>
                                         <option value="<?php echo  $key ?>" <?php echo $key==2?"selected":""?>><?php echo  $value ?></option>
                                     <?php } ?>
                                 </select>
                                 <label class="form-label" for="resize[<?php echo $keyName?>][status]"><?php echo  __("Resize Images","magicbox") ?>?</label>
                             </div>
                         </div>

                         <div class="clearfix"></div>

                         <div class="col-md-3">
                             <div class="form-group">
                                 <input type="text" class="form-control" value="<?php echo $item['width']?>" name="resize[<?php echo $keyName?>][max_width]" id="resize[<?php echo $keyName?>][max_width]" placeholder=" "/>
                                 <label class="form-label" for="resize[<?php echo $keyName?>][max_width]"><?php echo  __("Maximum Width","magicbox") ?></label>
                             </div>
                         </div>

                         <div class="col-md-3">
                             <div class="form-group">
                                 <input type="text" class="form-control" value="<?php echo $item['height']?>" name="resize[<?php echo $keyName?>][max_height]" id="resize[<?php echo $keyName?>][max_height]" placeholder=" "/>
                                 <label class="form-label" for="resize[<?php echo $keyName?>][max_height]"><?php echo  __("Maximum Height","magicbox") ?></label>
                             </div>
                         </div>

                         <div class="col-md-3">
                             <div class="form-group">
                                 <select class="form-select" name="resize[<?php echo $keyName?>][crop]" id="">
                                     <?php foreach ($yesNo as $key => $value) { ?>
                                         <option value="<?php echo  $key ?>" <?php echo $item['crop']==1?"selected":""?> ><?php echo  $value ?></option>
                                     <?php } ?>
                                 </select>
                                 <label class="form-label" for="resize[<?php echo $keyName?>][crop]"><?php echo  __("Crop","magicbox") ?></label>
                             </div>
                         </div>

                         <div class="col-md-3">
                             <div class="form-group">
                                 <input type="text" class="form-control" value="90" name="resize[<?php echo $keyName?>][quality]" id="resize[<?php echo $keyName?>][quality]" placeholder=" "/>
                                 <label class="form-label" for="resize[<?php echo $keyName?>][quality]"><?php echo  __("Quality","magicbox") ?></label>
                             </div>
                         </div>
                     </div>

                 <?php }?>
                 <div class="row returnImages" style="display:none;">
                     <div class="col-12">
                         <textarea class="form-control returnedImages" style="min-height: 200px;"></textarea>
                     </div>
                 </div>
             </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a>
        </div>
    </div>



</form>


