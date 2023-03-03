<form method="post" class="theForm theForm-<?php echo sanitize_text_field($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":sanitize_text_field($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Keyword Suggestion","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can add word suggestions directly to your content or use them as a tag.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can easily find popular keywords related to the topic.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can target keywords correctly.","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-select" name="keyword_suggestion[status]" id="keyword_suggestionStatus">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['keyword_suggestion']['status'] or $options['keyword_suggestion']['status'] == "" and $key == 2) {
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="input-group-text" for="keyword_suggestionStatus"><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button onclick="return false;" name="upsert" value="<?php echo __("Update","magicbox")?>" class="btn btn-success rounded-pill px-4 pageSaveButton"><i class="fa-solid fa-floppy-disk me-2"></i><?php echo __("Update","magicbox")?></button>
        </div>
    </div>
</form>

