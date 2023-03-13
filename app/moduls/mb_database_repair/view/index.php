
<div class="card bg-light">
    <div class="card-header">
        <h6 class="my-0"><?php echo  __("Repair Tables","magicbox") ?></h6>
    </div>

    <div class="card-body">
        <div class="alert alert-custom alert-light-primary " role="alert">
            <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
            <div class="alert-text">
                <div class="w-100 d-flex flex-wrap gap-2">
                    <div class="infoItem"><?php echo  __("You can view the corrupted tables in your database by severity.","magicbox") ?></div>
                    <div class="infoItem"><?php echo  __("You can repair your tables one by one or in bulk.","magicbox") ?></div>
                </div>
            </div>
        </div>
        <div class="alert alert-custom alert-light-warning " role="alert">
            <div class="alert-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
            <div class="alert-text">
                <div class="w-100 d-flex flex-wrap gap-2">
                    <div class="infoItem"><?php echo  __("Sometimes you may find that your paintings are not repaired. The reason for this is related to the fact that the problem still persists on your site, and it breaks down again after the repair process.","magicbox") ?></div>
                </div>
            </div>
        </div>

        <table id="datatabse-repair" class="table table-striped table-mb" style="width:100%">
            <thead>
            <tr>
                <th><?php _e("Table Name","magicbox")?></th>
                <th><?php _e("Status","magicbox")?></th>
                <th width="180px" class="text-center"><?php _e("Action","magicbox")?></th>
            </tr>
            </thead>
            <tbody>
            <?php  foreach($theClass->tables as $item) {?>
                <tr class="item_<?php echo esc_attr($item['name'])?>">
                    <td class="<?php echo $item['importance']=="2"?"errors":""?><?php echo $item['importance']=="0"?"warnings":""?>">
                        <?php echo esc_attr($item['name'])?>
                    </td>
                    <td class="checkControl <?php echo $item['importance']=="2"?"errors":""?><?php echo $item['importance']=="0"?"warnings":""?>">
                        <div class="form-check-group styleTwo noBorder">
                            <div class="form-check">
                                <input type="checkbox" id="tables[<?php echo esc_attr($item['name'])?>]" class="form-check-input" value="<?php echo esc_attr($item['name'])?>" name="tables[<?php echo esc_attr($item['name'])?>]"/>
                                <label class="form-check-label" for="tables[<?php echo esc_attr($item['name'])?>]"><span><?php echo $item['status']?></span></label>
                            </div>
                        </div>

                    </td>
                    <td class="text-center <?php echo $item['importance']=="2"?"errors":""?><?php echo $item['importance']=="0"?"warnings":""?>">
                       <button type="submit" value="<?php _e("Repair Now","magicbox")?>" onclick="return false;" class="btn btn-primary btn-sm btnDataMB repairNow" table="<?php echo esc_attr($item['name'])?>"><i class="fa-solid fa-screwdriver-wrench me-2"></i><?php _e("Repair Now","magicbox")?></button>
                    </td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <button  value="<?php _e("Repair selected","magicbox")?>"  onclick="return false;" class="btn btn-primary rounded-pill px-4 repair" process="selected" ><i class="fa-solid fa-list-check me-2"></i><?php _e("Repair selected","magicbox")?></button>
        <button  value="<?php _e("Repair All","magicbox")?>"  onclick="return false;" class="btn btn-success rounded-pill px-4 repair" process="all" ><i class="fa-solid fa-screwdriver-wrench me-2"></i><?php _e("Repair All","magicbox")?></button>
    </div>
</div>

    <script type="text/javascript">


        function repair(tableName) {
            jQuery(this).magicRequest(
                { 'action': 'mb_database_repair', 'method' : 'repair', table: tableName  },
                false,
                function(response) {
                    if(response =="true") {
                        jQuery('.item_'+tableName+' td').removeClass('errors').removeClass('warnings');
                        jQuery('.item_'+tableName+' .checkControl').html('<i class="fa-solid fa-circle-check text-success me-2"></i><?php _e("Database repaired","magicbox")?>');
                    } else {
                        jQuery('.item_'+tableName+' td').addClass('errors');
                        jQuery('.item_'+tableName+' .status').html('<i class="fa-solid fa-triangle-exclamation text-danger me-2"></i><?php _e("Database not repaired","magicbox")?>');
                    }
                }
            );
        }

        jQuery(document).on('click','.repairNow',function() {

            var tableName = jQuery(this).attr('table');
            repair(tableName);

        });


        jQuery(document).on('click','.repair',function() {

            var process = jQuery(this).attr('process');

            var inputs = jQuery('#datatabse-repair').find("input[name]");
            inputs.each(function (index,value) {

                var tableName = inputs[index].value;

                var run = 1;
                if(process =="selected") {
                    if(inputs[index].checked) {
                        var run = 1;
                    } else {
                        var run = 0;
                    }
                }

                if(run ==1) {
                    repair(tableName);
                }

            });
            return false;

        });

    </script>