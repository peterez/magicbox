<?php
$redirectTypes = array("301" => "301", "302" => "302", "307" => "307",);

$postTypes = array("url" => "Url", "donttouch" => __("Don't Touch","magicbox"));
$customPostTypes = $theClass->magicBox->postTypes();
foreach ($customPostTypes as $item) {
    $postTypes[$item['name']] = $item['label'];
}

$pureUrl = "admin.php?page=" . sanitize_text_field($_REQUEST['page']) . "&sub=" . sanitize_text_field($_REQUEST['sub']);

?>

<form method="post" class="theForm theForm-<?php echo sanitize_text_field($_REQUEST['sub']) ?>-<?php echo $_REQUEST['method'] == ""? "index" : sanitize_text_field($_REQUEST['method']) ?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo __("Setting", "magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can redirect pages with 301,302 and 307 error codes to different pages you want.", "magicbox") ?></div>
                        <div class="infoItem"><?php echo __("You can view the list of links which you have redirected to.", "magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="custom_redirects[status]" id="custom_redirects[status]">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                        value="<?php echo $key ?>"<?php if ($key == $options['custom_redirects']['status'] or $options['custom_redirects']['status'] == "" and $key == 2){
                                        echo "selected";
                                    } ?>><?php echo $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="input-group-text" for="custom_redirects[status]"><?php echo __("Status", "magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a>
        </div>
    </div>

    <div class="card bg-light mt-3">
        <div class="card-header">
            <h6 class="my-0"><?php echo __("Custom Redirects", "magicbox") ?></h6>
        </div>

        <div class="card-body">
            <table id="error-redirects" class="table table-striped table-mb" style="width:100%">
                <thead>
                <tr>
                    <th><?php _e("Link", "magicbox") ?></th>
                    <th><?php _e("Redirects", "magicbox") ?></th>
                    <th><?php _e("Determine", "magicbox") ?></th>
                    <th><?php _e("Action", "magicbox") ?></th>
                </tr>
                </thead>
                <tbody>
                <?php  foreach ($theClass->links as $item) {

                    $ex           = explode("|", $item['post_content']);
                    $postType     = $ex[0];
                    $postValue    = $ex[1];
                    $redirectType = $ex[2];
                    $postLabel    = $ex[3];

                    ?>
                    <tr class="item_<?php echo $item['ID'] ?>">
                        <td>
                            <div class="form-group-in-table">

                                <input type="text" name="broken_link" value="<?php echo $item['post_title'] ?>" class="form-control-in-table"/>
                            </div>

                        </td>
                        <td>
                            <div class="row fixedRow gx-1">
                                <div class="col-4">
                                    <div class="form-group-in-table">
                                        <select name="redirect_type" class="form-control-in-table">
                                            <?php foreach ($redirectTypes as $key => $value) { ?>
                                                <option value="<?php echo $key ?>" <?php echo $redirectType == $key? "selected" : "" ?>><?php echo $value ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-group-in-table">
                                        <select name="type" class="form-control-in-table chooseType" the_id="<?php echo $item['ID'] ?>">
                                            <?php foreach ($postTypes as $key => $value) { ?>
                                                <option value="<?php echo $key ?>" <?php echo $postType == $key? "selected" : "" ?>><?php echo $value ?></option>
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
                                <input type="text" class="form-control-in-table redirect_url setValue" placeholder="<?php _e("URL", "magicbox") ?>" value="<?php echo $postValue ?>" name="redirect_url"/>
                            </div>
                            <div class="form-group-in-table redirect_id setValue" style="display:<?php if ($postType != "" and $postType != "url" and $postType != "donttouch"){
                                echo "block";
                            } else {
                                echo "none";
                            } ?>">
                                <input type="hidden" class="redirect_id_value" name="redirect_id" value="<?php echo $postValue ?>" the_id="<?php echo $item['ID'] ?>"/>
                                <input type="text" class="form-control-in-table searchPost" name="label" value="<?php echo $postLabel ?>" the_id="<?php echo $item['ID'] ?>" placeholder="<?php echo __("Search Text", "magicbox") ?>"/>

                                <div class="input-icon" data-mb="pop" data-mb-title="Determine" data-mb-content="<?php echo __("You can choose post with search", "magicbox") ?>">
                                    <i class="fa-solid fa-magnifying-glass"></i></div>
                                <ul class="searchReaults determineSearchResult">
                                </ul>
                            </div>
                        </td>

                        <td>
                            <button type="submit" value="<?php _e("Update", "magicbox") ?>" onclick="return false;" class="btn btn-primary btnDataMB updateRedirect mt-1" the_id="<?php echo $item['ID'] ?>">
                                <i class="fa-solid fa-check"></i></button>
                            <button type="submit" value="<?php _e("Delete", "magicbox") ?>" onclick="return false;" class="btn btn-danger btnDataMB deleteRedirect mt-1" the_id="<?php echo $item['ID'] ?>">
                                <i class="fa-solid fa-trash-can"></i></button>
                        </td>

                    </tr>
                <?php } ?>

                </tbody>

            </table>
        </div>
        <div class="card-footer text-center">
            <button value="<?php _e("Add New", "magicbox") ?>" class="btn btn-primary addNewRedirect rounded-pill px-4" onclick="return false;">
                <i class="fa-solid fa-circle-plus me-2"></i><?php _e("Add New", "magicbox") ?></button>
        </div>
    </div>
</form>
<script>
    jQuery(document).on('click', '.addNewRedirect', function () {

        var uniq='id' + (new Date()).getTime();

        value=jQuery('.copyThat').html();

        value=value.replace("trr", "tr");
        value=value.replace("trr", "tr");
        value=value.replace("trr", "tr");
        value=value.replace("tdd", "td");
        value=value.replace("tdd", "td");
        value=value.replace("tdd", "td");
        value=value.replace("tdd", "td");
        value=value.replace("tdd", "td");
        value=value.replace("tdd", "td");
        value=value.replace("tdd", "td");
        value=value.replace("tdd", "td");
        value=value.replace("tdd", "td");
        value=value.replace("noid", uniq);
        value=value.replace("noid", uniq);
        value=value.replace("noid", uniq);
        value=value.replace("noid", uniq);
        value=value.replace("noid", uniq);
        value=value.replace("noid", uniq);
        value=value.replace("noid", uniq);
        value=value.replace("noid", uniq);
        value=value.replace("noid", uniq);
        value=value.replace("noid", uniq);
        jQuery('table tbody').append(value);

    });
</script>

<div class="copyThat" style="display:none">
    <trr class="item_noid">
        <tdd>
            <div class="form-group-in-table">

                <input type="text" name="broken_link" class="form-control-in-table"/>
            </div>
        </tdd>
        <tdd>
            <div class="row fixedRow gx-1">
                <div class="col-4">
                    <div class="form-group-in-table">
                        <select name="redirect_type" class="form-control-in-table control-form">
                            <?php foreach ($redirectTypes as $key => $value) { ?>
                                <option value="<?php echo $key ?>"><?php echo $value ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group-in-table">
                        <select name="type" class="form-control-in-table control-form chooseType" the_id="noid">
                            <?php foreach ($postTypes as $key => $value) { ?>
                                <option value="<?php echo $key ?>"><?php echo $value ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </tdd>
        <tdd>
            <div class="form-group-in-table" style="display:block">
                <input type="text" class="form-control-in-table redirect_url setValue" placeholder="<?php _e("URL", "magicbox") ?>" name="redirect_url"/>
            </div>
            <div class="form-group-in-table redirect_id setValue" style="display:none">
                <input type="hidden" class="redirect_id_value" name="redirect_id" the_id="noid"/>
                <input type="text" class="form-control-in-table searchPost" name="label" value="" the_id="noid" placeholder="Search Text"/>

                <div class="input-icon" data-mb="pop" data-mb-title="Determine" data-mb-content="<?php echo __("Aramak istediğiniz kelimeyi yazarak sayfayı seçebilirsiniz.", "magicbox") ?>">
                    <i class="fa-solid fa-magnifying-glass"></i></div>
                <ul class="searchReaults determineSearchResult" style="display:none; padding:0px; margin: 10px 0px;">
                </ul>
            </div>
        </tdd>

        <tdd>
            <button type="submit" value="<?php _e("Add", "magicbox") ?>" onclick="return false;" class="btn btn-success btnDataMB mt-1 updateRedirect" the_id="noid">
                <i class="fa-solid fa-floppy-disk me-1"></i><?php _e("Add", "magicbox") ?></button>
        </tdd>

    </trr>
</div>


<?php
$pureUrl = "admin.php?page=" . sanitize_text_field($_REQUEST['page']) . "&sub=" . sanitize_text_field($_REQUEST['sub']);
$oldPn = intval(sanitize_text_field($_REQUEST['pn']))-1;
$newPn = intval(sanitize_text_field($_REQUEST['pn']))+1;
?>

<nav aria-label="<?php echo __("Pagination", "magicbox") ?>">
    <ul class="pagination mt-3">
        <?php if ($_REQUEST['pn']>=1){ ?>
            <li class="page-item">
                <a class="page-link" href="<?php echo $pureUrl . "&pn=" . $oldPn ?>"><?php _e("Previous", "magicbox") ?></a>
            </li>
        <?php } ?>
        <?php if (count($theClass->brokenLinks)>=20){ ?>
            <li class="page-item">
                <a class="page-link" href="<?php echo $pureUrl . "&pn=" . $newPn ?>"><?php _e("Next", "magicbox") ?></a>
            </li>
        <?php } ?>
    </ul>
</nav>

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
                    { 'action': 'mb_custom_redirects', 'method': 'getPostSearch', 'post_type': postType, keyword: keyword  },
                    false,
                    function (data) {

                        jQuery('.item_' + id + ' .searchReaults').show(0).html(data);

                        jQuery(document).on('click', '.item_' + id + ' .choosePost', function () {

                            if (isClicked == true) {
                                return false;
                            }

                            isClicked=true;

                            postid=jQuery(this).attr('the_id');
                            title=jQuery(this).html();

                            jQuery('.item_' + id + ' .searchPost').val(title);
                            jQuery('.item_' + id + ' .redirect_id_value').val(postid);
                            jQuery('.item_' + id + ' .searchReaults').html('');
                            jQuery('.item_' + id + ' .searchReaults').hide(0).html("");

                            Swal.fire({
                                didOpen: ()=>{
                                Swal.showLoading();
                            jQuery(this).magicRequest(
                                {'action': 'mb_custom_redirects', 'method': 'index'},
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
            )
            ;

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
            {'action': 'mb_custom_redirects', 'method': 'index'},
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
            {'action': 'mb_custom_redirects', 'method': 'index', 'process': 'delete'},
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