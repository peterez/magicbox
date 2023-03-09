<?php $smtpSecure = array("tls" => "TLS", "ssl" => "SSL"); ?>
<form method="post" class="theForm theForm-<?php echo esc_attr($_REQUEST['sub'])?>-<?php echo $_REQUEST['method']==""?"index":esc_attr($_REQUEST['method'])?>">
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("SMTP Settings","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem rounded-1"><?php echo  __("You can easily add the SMTP mail information.","magicbox") ?></div>
                        <div class="infoItem rounded-1"><?php echo  __("With this feature, messages from the contact forms on your site are forwarded to the e-mail you want.","magicbox") ?></div>
                        <div class="infoItem rounded-1"><?php echo  __("With this feature, new membership, order, lost password, etc. E-mails are forwarded to your members.","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <select class="form-select" name="smtp[status]" id="smtp[status]">
                                <?php foreach ($activePassive as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['smtp']['status'] or $options['smtp']['status'] == "" and $key == 2){
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="smtp[status]"><?php echo  __("Status","magicbox") ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-light">
        <div class="card-header">
            <h6 class="my-0"><?php echo  __("Add Your SMTP Settings","magicbox") ?></h6>
        </div>

        <div class="card-body">
            <div class="alert alert-custom alert-light-primary " role="alert">
                <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="alert-text">
                    <div class="w-100 d-flex flex-wrap gap-2">
                        <div class="infoItem rounded-1"><?php echo  __("SMTP is about your mail configuration, if you don't fill inputs right you can trouble with mailling","magicbox") ?></div>
                    </div>
                </div>
            </div>

            <div class="container-mb">
                <div class="row fixedRow">
                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control" id="smtp[host]" name="smtp[host]" value="<?php echo  $options['smtp']['host'] ?>" placeholder=" "/>
                            <label class="form-label" for="smtp[host]"><?php echo  __("Mail Host","magicbox") ?></label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="smtp[username]" name="smtp[username]" value="<?php echo  $options['smtp']['username'] ?>" placeholder=" "/>
                            <label class="form-label" for="smtp[username]"><?php echo  __("Mail Username","magicbox") ?></label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="smtp[password]" maxlength="650" name="smtp[password]" value="<?php echo  $options['smtp']['password'] ?>" placeholder=" "/>
                            <label class="form-label" for="smtp[password]"><?php echo  __("Mail Password","magicbox") ?></label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select class="form-select" id="smtp[smtp_secure]" name="smtp[smtp_secure]">
                                <?php foreach ($smtpSecure as $key => $value) { ?>
                                    <option
                                            value="<?php echo  $key ?>"<?php if ($key == $options['smtp']['smtp_secure']){
                                        echo "selected";
                                    } ?>><?php echo  $value ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label" for="smtp[smtp_secure]"><?php echo  __("Smtp Secure","magicbox") ?></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="smtp[smtp_port]" maxlength="650" name="smtp[smtp_port]" value="<?php echo  $options['smtp']['smtp_port'] ?>" placeholder=" "/>
                            <label class="form-label" for="smtp[smtp_port]"><?php echo  __("Smtp Port","magicbox") ?></label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="smtp[sender_name]" maxlength="650" name="smtp[sender_name]" value="<?php echo  $options['smtp']['sender_name'] ?>" placeholder=" "/>
                            <label class="form-label" for="smtp[sender_name]"><?php echo  __("Sender Name","magicbox") ?></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="smtp[reply_mail]" maxlength="650" name="smtp[reply_mail]" value="<?php echo  $options['smtp']['reply_mail'] ?>" placeholder=" "/>
                            <label class="form-label" for="smtp[reply_mail]"><?php echo  __("Reply Mail","magicbox") ?></label>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="card-footer">
          <a class="btn btn-primary" target="_blank" href="https://wpmagicbox.com"><?php echo __("Buy Licence", "magicbox") ?></a>

        </div>

        <input type="hidden" name="testMail" class="hiddenTestMail"/>

    </div>
</form>

<script>

    jQuery(document).on('keyup', '.theTestMail', function () {
        jQuery('.hiddenTestMail').val(jQuery(this).val());
    });

    var isClicked=false;
    var testConn;
    jQuery(document).on('click', '.testMail', function () {

        if (isClicked == true) {
            boxup("<?php echo __("Wait for response or stop older test","magicbox")?>",
                {
                    'confirm': true,
                    'textOk': '<?php echo __("Stop Test","magicbox")?>',
                    'textCancel': '<?php echo __("Wait Response","magicbox")?>'
                },
                function (ret) {
                    if (ret) {
                        testConn.abort();
                    } else {
                        setTimeout(function () {
                            boxup("<?php echo __("Wait for response","magicbox")?>", {'type': 'notify'});
                            setTimeout(function () {
                                jQuery('.boxupButtons').remove();
                            }, 10);
                        }, 250);
                    }
                }
            );
            return false;
        }

        boxup("<?php echo __("Test your mail settings","magicbox")?>", {
                'confirm': true,
                'textOk': '<?php echo __("Test Now","magicbox")?>',
                'textCancel': '<?php echo __("Cancel","magicbox")?>'
            },
            function (result) {

                if (result) {
                    isClicked=true;
                    setTimeout(function () {
                        boxup("<?php echo __("Wait for response","magicbox")?>", {'type': 'notify'});
                        setTimeout(function () {
                            jQuery('.boxupButtons').remove();
                        }, 10);
                    }, 250);

                    testConn=jQuery(this).magicRequest(
                        {'action': 'mb_smtp', 'method': 'mailTest'},
                        {'element': 'form'},
                        function (response) {
                            jQuery('.boxupOuter').remove();
                            isClicked=false;
                            response=JSON.parse(response);
                            if (response.result == "ok") {
                                Swal.fire({title:"<?php echo __("Successfully","magicbox")?>",text:"<?php echo __("It's Done","magicbox")?>",icon:"success",buttons:false,timer: 3000,});
                            } else {
                                Swal.fire({title:"<?php echo __("Error","magicbox")?>",text:response.error,icon:"error",buttons:false,timer: 3000,});
                            }
                        }
                    );
                } else {
                    isClicked=false;
                }

            });

        inputHtml='<p><input class="form-control theTestMail" placeholder="<?php echo __("testmail@yourmail.com")?>"></p>';
        jQuery('.boxupOuter .boxupInner .text').append(inputHtml);

        /*
         date = jQuery(this).attr('date');

         jQuery(this).magicRequest(
         {'action': 'mb_backup_manager', 'method' : 'deleteBackup',"deleteDate":date},
         "",
         function(response) {
         response = JSON.parse(response);
         if(response.result=="ok") {
         jQuery('.item_'+date).remove();
         } else {
         alert(response.error);
         }
         }
         );
         */

    });

</script>
