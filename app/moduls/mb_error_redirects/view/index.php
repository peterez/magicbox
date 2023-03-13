<?php 
 
$customPostTypes = $theClass->magicBox->postTypes();

$redirectTypes = array("301" => "301", "302" => "302", "307" => "307",);

$postTypes = array("url" => "Url", "donttouch" => translate("Don't Touch"));

foreach ($customPostTypes as $item) {
    $postTypes[$item['name']] = $item['label'];
}

$pureUrl = "admin.php?page=" . sanitize_text_field($_REQUEST['page']) . "&sub=" . esc_attr($_REQUEST['sub']);

?>
<form method="post" class="theForm theForm-<?php echo  esc_attr($_REQUEST['sub']) ?>-<?php echo $_REQUEST['method'] == ""? "index" : esc_attr($_REQUEST['method']) ?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Setting", "magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo  __("You can view the list of broken links on your website without using any SEO tools.","magicbox") ?></div>
                        <div class="infoItem"><?php echo  __("You can make 301,302 and 307 redirects to broken links.","magicbox") ?></div>
                    </div>
                </div>
            </div>
            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="error_redirects[status]" id="error_redirects[status]">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                        value="<?php echo  esc_attr($key) ?>"<?php if ($key == $options['error_redirects']['status'] or $options['error_redirects']['status'] == "" and $key == 2){
                                        echo "selected";
                                    } ?>><?php echo  esc_attr($value) ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="error_redirects[status]"><?php echo  __("Status", "magicbox") ?></label>
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

<div class="card bg-light mt-3">
    <div class="card-header">
        <h6 class="my-0"><?php echo  __("Error Redirects", "magicbox") ?></h6>
    </div>

    <div class="card-body">

        <table id="error-redirects" class="table table-striped table-mb" style="width:100%">
            <thead>
            <tr>
                <th><?php _e("Broken Link", "magicbox") ?></th>
                <th><?php _e("Redirects", "magicbox") ?></th>
                <th><?php _e("Determine", "magicbox") ?></th>
                <th><?php _e("Action", "magicbox") ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($theClass->brokenLinks as $item) {

                $ex           = explode("|", $item['post_content']);
                $postType     = $ex[0];
                $postValue    = $ex[1];
                $redirectType = $ex[2];
                $postLabel    = $ex[3];

                ?>
                <tr class="item_<?php echo esc_attr($item['id']) ?>">
                    <td>
                        <div class="form-group-in-table">
                            <input type="text" class="form-control-in-table" value="<?php echo esc_attr($item['post_title']) ?>"/>
                            <input type="hidden" name="broken_link" value="<?php echo esc_attr($item['post_title']) ?>"/>
                        </div>

                    </td>
                    <td>
                        <div class="row fixedRow">
                            <div class="col-4">
                                <div class="form-group-in-table">
                                    <select name="redirect_type" class="control-form form-control-in-table">
                                        <?php foreach ($redirectTypes as $key => $value) { ?>
                                            <option value="<?php echo  esc_attr($key) ?>" <?php echo  $redirectType == $key? "selected" : "" ?>><?php echo  esc_attr($value) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group-in-table">
                                    <select name="type" class="control-form form-control-in-table chooseType" the_id="<?php echo esc_attr($item['id']) ?>">
                                        <?php foreach ($postTypes as $key => $value) { ?>
                                            <option value="<?php echo  esc_attr($key) ?>" <?php echo  $postType == $key? "selected" : "" ?>><?php echo  esc_attr($value) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="form-group-in-table redirect_url" style="display:<?php if ($postType == "" or $postType == "url" or $postType == "donttouch"){
                            echo "block";
                        } else {
                            echo "none";
                        } ?>">
                            <input type="text" class="redirect_url setValue form-control-in-table" placeholder="<?php _e("URL", "magicbox") ?>" value="<?php echo esc_attr($postValue) ?>" name="redirect_url"/>
                        </div>
                        <div class="redirect_id setValue form-group-in-table" style="display:<?php if ($postType != "" and $postType != "url" and $postType != "donttouch"){
                            echo "block";
                        } else {
                            echo "none";
                        } ?>">
                            <input type="hidden" class="redirect_id_value" name="redirect_id" value="<?php echo esc_attr($postValue) ?>" the_id="<?php echo esc_attr($item['id']) ?>"/>
                            <input type="text" class="searchPost form-control-in-table" name="label" value="<?php echo esc_attr($postLabel) ?>" the_id="<?php echo esc_attr($item['id']) ?>" placeholder="<?php echo  __("Search Text", "magicbox") ?>"/>

                            <div class="input-icon" data-mb="pop" data-mb-title="Determine" data-mb-content="<?php echo  __("Aramak istediğiniz kelimeyi yazarak sayfayı seçebilirsiniz.", "magicbox") ?>">
                                <i class="fa-solid fa-magnifying-glass"></i></div>
                            <ul class="searchReaults determineSearchResult" style="display:none; padding:0px; margin: 10px 0px;">
                            </ul>
                        </div>
                    </td>

                    <td>
                        <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a>

                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <?php 
     $pureUrl = "admin.php?page=" . sanitize_text_field($_REQUEST['page']) . "&sub=" . esc_attr($_REQUEST['sub']);
    $oldPn = intval(sanitize_text_field($_REQUEST['pn']))-1;
    $newPn = intval(sanitize_text_field($_REQUEST['pn']))+1;
    ?>
    <?php if ($_REQUEST['pn']>=1 || count($theClass->brokenLinks)>=20){ ?>
        <div class="card-footer">
            <nav aria-label="<?php echo __("Pagination", "magicbox") ?>">
                <ul class="pagination my-0">
                    <?php if ($_REQUEST['pn']>=1){ ?>
                        <li class="page-item my-0">
                            <a class="page-link btn rounded-pill px-4 my-0" href="<?php echo  $pureUrl . "&pn=" . $oldPn ?>"><i class="fa-solid fa-angles-left me-2"></i><?php _e("Previous", "magicbox") ?>
                            </a></li>
                    <?php } ?>
                    <?php if (count($theClass->brokenLinks)>=20){ ?>
                        <li class="page-item my-0">
                            <a class="page-link btn rounded-pill px-4 my-0" href="<?php echo  $pureUrl . "&pn=" . $newPn ?>"><i class="fa-solid fa-angles-right me-2"></i><?php _e("Next", "magicbox") ?>
                            </a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    <?php } ?>
</div>

<script type="text/javascript">

    jQuery(document).on('change', '.chooseType', function () {
        id=jQuery(this).attr('the_id');
        val=jQuery(this).val();

        jQuery('.item_' + id + ' .setValue').hide(0);

        if (val == "url") {
            jQuery('.item_' + id + ' .redirect_url').show(0);
        } else {
            jQuery('.item_' + id + ' .redirect_id').show(0);
        }

    });

    var hasReq=false;
    var isClicked=false;

    jQuery(document).on('keyup', '.searchPost', function () {

        var keyword=jQuery(this).val();
        id=jQuery(this).attr('the_id');
        postType=jQuery('.item_' + id + ' .chooseType').val();
        jQuery('.item_' + id + ' .searchReaults').html('');
        jQuery('.item_' + id + ' .searchReaults').show(0).html('<li class="loader"> <i class="fa-solid fa-spinner fa-spin"></i> </li>');

        if (keyword == "") {
            jQuery('.item_' + id + ' .searchReaults').hide(0).html("");
        } else {

            if (hasReq != false) {
                hasReq.abort();
                isClicked=false;
            }

            hasReq=jQuery(this).magicRequest(
                { 'action': 'mb_error_redirects', 'method': 'getPostSearch', 'post_type': postType, keyword: keyword  },
                false,
                function (data) {

                    if (isClicked == true) {
                        return false;
                    }
                    isClicked=true;


                    jQuery('.item_' + id + ' .searchReaults').show(0).html(data);

                    jQuery(document).on('click', '.item_' + id + ' .choosePost', function () {
                            postid=jQuery(this).attr('the_id');
                            title=jQuery(this).html();

                            jQuery('.item_' + id + ' .searchPost').val(title);
                            jQuery('.item_' + id + ' .redirect_id_value').val(postid);
                            jQuery('.item_' + id + ' .searchReaults').html('');
                            jQuery('.item_' + id + ' .searchReaults').hide(0).html("");

                            Swal.fire({
                                didOpen: function () {
                                    Swal.showLoading()
                                    jQuery(this).magicRequest(
                                        {'action': 'mb_error_redirects', 'method': 'index'},
                                        {'element': '.item_' + id},
                                        function (response) {
                                            isClicked=false;
                                            response=JSON.parse(response);
                                            Swal.close()
                                            if (response['result'] == "ok") {
                                                swal.fire({title: "<?php echo __("Successfully","magicbox")?>", text: "<?php echo __("It's Done","magicbox")?>", icon: "success", buttons: false, timer: 3000});
                                            } else {
                                                Swal.fire({title: "<?php echo __("Error","magicbox")?>", text: response['error'], icon: "error", buttons: false, timer: 3000});
                                            }
                                        }
                                    );
                                }
                            })
                        }
                    );
                }
            );

        }

    })
    ;

    jQuery(document).on('click', '.updateRedirect', function () {
        postid=jQuery(this).attr('the_id');

        Swal.fire({
            didOpen: ()=>{
            Swal.showLoading()
        jQuery(this).magicRequest(
            {'action': 'mb_error_redirects', 'method': 'index'},
            {'element': '.item_' + postid},
            function (response) {

                response=JSON.parse(response);
                Swal.close()
                if (response['result'] == "ok") {
                    swal.fire({title: "<?php echo __("Successfully","magicbox")?>", text: "<?php echo __("It's Done","magicbox")?>", icon: "success", buttons: false, timer: 3000});
                } else {
                    Swal.fire({title: "<?php echo __("Error","magicbox")?>", text: response['error'], icon: "error", buttons: false, timer: 3000});
                }

            }
        );
    }
    })
    })
    ;

    jQuery(document).on('click', '.deleteRedirect', function () {
        postid=jQuery(this).attr('the_id');

        Swal.fire({
            didOpen: ()=>{
            Swal.showLoading()
        jQuery(this).magicRequest(
            {'action': 'mb_error_redirects', 'method': 'index', 'process': 'delete'},
            {'element': '.item_' + postid},
            function (response) {
                response=JSON.parse(response);
                Swal.close()
                if (response['result'] == "ok") {
                    swal.fire({title: "<?php echo __("Successfully","magicbox")?>", text: "<?php echo __("It's Done","magicbox")?>", icon: "success", buttons: false, timer: 3000});
                } else {
                    Swal.fire({title: "<?php echo __("Error","magicbox")?>", text: response['error'], icon: "error", buttons: false, timer: 3000});
                }
             }
        );
    }
    })
    })
    ;

</script>