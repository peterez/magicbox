<form method="post" class="theForm theForm-<?php echo sanitize_text_field($_REQUEST['sub'])?>-<?php echo sanitize_text_field($_REQUEST['method'])==""?"index":sanitize_text_field($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Bulk Mail","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem"><?php echo __("You can easily make mail designs with the editor.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can send bulk e-mails specific to the member types on your site.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can add your mailing list in bulk manually.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can review the details of the bulk mails you have sent.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You can add special tags such as -name, -username, -mail to your maills.","magicbox")?></div>
                        <div class="infoItem"><?php echo __("You must be a member of the <a href='https://sendgrid.com' target='_blank'>https://sendgrid.com</a> website","magicbox")?></div>
                    </div>
                </div>
            </div>


            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input class="form-control" value="<?php echo $options['bulk_mail']['api_key']?>"  name="bulk_mail[api_key]" id="bulk_mail[api_key]" placeholder=" ">
                            <label class="form-label" for="bulk_mail[api_key]"><?php echo  __("API Key","magicbox") ?></label>
                            <div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="<?php echo  __("You must be a member of the https://sendgrid.com website","magicbox") ?>"><i class="fa-solid fa-info"></i></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input class="form-control" value="<?php echo $options['bulk_mail']['send_mail']?>"  name="bulk_mail[send_mail]" id="bulk_mail[send_mail]" placeholder=" ">
                            <label class="form-label" for="bulk_mail[send_mail]"><?php echo  __("Sender E-Mail","magicbox") ?></label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input class="form-control" value="<?php echo $options['bulk_mail']['sender_name']?>"  name="bulk_mail[sender_name]" id="bulk_mail[sender_name]" placeholder=" ">
                            <label class="form-label" for="bulk_mail[sender_name]"><?php echo  __("Sender Name","magicbox") ?></label>
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

