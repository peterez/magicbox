<?php global $_mb_icon_url_; ?>
<div class="card bg-light mt-0">

    <div class="mbDashboard">

        <?php
        $menuUrls = array();
        $menuNames = array();
        foreach ($categories as $key => $item) {
            $key = esc_attr($key);
            if ($key != sanitize_text_field($_GET['page'])){
                continue;
            }

            $menuUrl         = menu_page_url($key, false);
            $icon            = esc_attr($menuIcons[$key]);
            $menuUrls[$key]  = $menuUrl;
            $menuNames[$key] = $item['title'];
            $hasModulClass = esc_attr("hasModul_".$item['has']);
            ?>

            <div class="<?php echo $hasModulClass;?>">
                <div class="card-header">
                    <h6 class="my-0"><?php echo esc_attr($item['title']) ?></h6>
                </div>

                <div class="card-body">
                    <div class="alert alert-custom alert-light-primary " role="alert">
                        <div class="alert-icon"><i class="fa-solid fa-circle-info"></i></div>
                        <div class="alert-text">
                            <div class="w-100 d-flex flex-wrap gap-2">
                                <div class="infoItem"><?php echo  __("You can make the arrangements you want in the WordPress Admin panel and show different features to the admins depending on their roles. ") ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php if (count($item['subs'])>0){
                            foreach ($item['subs'] as $subKey => $it) {
                                $subKey = esc_attr($subKey);
                                $pureSubKey = $subKey;
                                $subKey     = str_replace(array("mb-","mb_", "_"), array("","", "-"), $subKey);
                                $hasSubModulClass = esc_attr("hasSubModul_".$it['has']);
                                ?>
                                <div class="col-mb-3 mb-4 <?php echo $hasSubModulClass;?>">
                                    <div class="dashboardItem <?php echo $subKey ?>">
                                        <a class="nav-link" href="<?php echo $menuUrl ?>&sub=<?php echo $pureSubKey ?>">
                                            <div class="dashboardItemIcon">
                                                <img src="<?php echo $_mb_icon_url_ ?>/<?php echo $subKey ?>.png"/>
                                            </div>
                                            <div class="dashboardItemTitle">
                                                <h4><?php echo esc_attr($it['title']) ?></h4>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php
                            }
                        }?>

                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

</div>


