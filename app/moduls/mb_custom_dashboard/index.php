<?php

/* Controller & Like a Model */

class mb_custom_dashboard
{
    public $magicBox;
    public $options;

    function __construct($depencyInjection) {

        if (is_object($depencyInjection)){
            $this->magicBox  = $depencyInjection;
            $this->options   = $this->magicBox->options;
            $this->postValue = $this->magicBox->postValue;
        }

    }

    function index() {

        $this->registeredWidgets = $this->getRegisteredDashboardWidgets();


    }

    function mbAssets() {

        wp_enqueue_script("jQuery");
        wp_enqueue_script("mb-bootstrap-datatables10", $GLOBALS{'_mb_assets_url_'} . '/js/asset.js', false, '1.0.' . rand(1, 9999));
    }

    function toDo() {

        if (!is_admin()){
            return false;
        }

        $return = array();
        if ($this->options['custom_dashboard']['status'] == "1"){

            $this->dashboardSettigs = $this->options['custom_dashboard'];

            add_action('admin_enqueue_scripts', array($this, 'addMediaUpload'));

            add_action('admin_enqueue_scripts', array($this, 'mbAssets'));

            $return['add_action']['wp_dashboard_setup'][] = array('method' => 'removeDashboardWidgets', 'priotiy' => 50);

            if (@$this->options['custom_dashboard']['dashboard_icon'] or $this->options['custom_dashboard']['title']){
                $return['add_action']['wp_dashboard_setup'][] = array('method' => 'dashboardSetup', 'priotiy' => 50);
            }

            if (@$this->options['custom_dashboard']['parent_message']['status'] == "1"){

                if (@$this->options['custom_dashboard']['parent_message']['full_width'] == "1"){
                    $return['add_action']['in_admin_header'][] = array('method' => 'showPanelMessage', 'args' => 'parent_message');
                } else {
                    $return['add_action']['wp_dashboard_setup'][] = array('method' => 'showPanelMessage', 'args' => 'parent_message');
                }

            }

            if (@$this->options['custom_dashboard']['second_message']['status'] == "1"){
                if (@$this->options['custom_dashboard']['second_message']['full_width'] == "1"){
                    $return['add_action']['in_admin_header'][] = array('method' => 'showPanelMessage', 'args' => 'second_message');
                } else {
                    $return['add_action']['wp_dashboard_setup'][] = array('method' => 'showPanelMessage', 'args' => 'second_message');
                }

            }

        }

        return $return;
    }


    function showPanelMessage($type) {

        global $current_user;
        $canShow = true;
        foreach ($current_user->roles as $item) {
            @$has = $this->dashboardSettigs[$type]['user_roles'][$item];
            if ($has != "1"){
                $canShow = false;
            }
        }

        /* Eğer magicbox sitesinden geliyorsa kesin göster */
        if ($type == "magicbox"){
            $canShow = true;
        }
        if ($canShow == false){
            return false;
        }

        if ($this->dashboardSettigs[$type]['full_width'] == "1"){
            $this->fullWidthMessage($type);
        } else {
            $this->columnMessage($type);
        }
    }

    function columnMessageDetail($post, $callback_args) {

        echo html_entity_decode($callback_args['args']);
    }

    function columnMessage($type = "") {

        if ($type == "parent_message"){
            $position = "normal";
        } else {
            $position = "side";
        }

        $md5 = uniqid();

        wp_add_dashboard_widget('custom_help_widget_' . $md5, $this->dashboardSettigs[$type]['title'], array($this, 'columnMessageDetail'), null, $this->dashboardSettigs[$type]['message_html'], $position, 'high');
    }


    function fullWidthMessage($type = "") {

        global $isAddedFullWidthMessageJavascript;
        $key = $type;
        $md5 = md5($key . $this->dashboardSettigs[$type]['title'] . $this->dashboardSettigs[$type]['message_html']);

        $result = get_user_meta(get_current_user_id(), $md5, true);
        if ($result != "1"){
            ?>
            <div data-welcome_key="<?php echo $key ?>" class="welcome-panel mb-welcome-panel-<?php echo $md5 ?>" style="clear:unset">
                <?php
                if ($this->dashboardSettigs[$type]['dismissible'] == "1"){
                    ?>
                    <a class="welcome-panel-close" href="#" onclick="return false;" md5="<?php echo $md5 ?>" key="<?php echo $key ?>"><?php echo __("Dismiss", "magicbox") ?></a>
                <?php } ?>
                <div class="welcome-panel-content mb-welcome-panel-content">
                    <?php if ($this->dashboardSettigs[$type]['title']){ ?>
                        <h2><?php echo $this->dashboardSettigs[$type]['title'] ?></h2>
                    <?php } ?>
                    <div class="mb-welcome-content">
                        <?php echo $this->dashboardSettigs[$type]['message_html'] ?>
                    </div>
                </div>
            </div>

            <?php if (@$isAddedFullWidthMessageJavascript != "1"){ ?>
                <script>
                    jQuery(document).on('click', '.welcome-panel-close', function () {

                        theKey=jQuery(this).attr('key');
                        theMd5=jQuery(this).attr('md5');

                        jQuery('.mb-welcome-panel-' + theMd5).hide(0);

                        jQuery(this).magicRequest(
                            {'action': 'mb_custom_dashboard', 'method': 'makeHideMessageForMe', 'key': theKey, 'md5': theMd5},
                            "",
                            function (response) {

                                json=JSON.parse(response);
                                if (json.result == "ok") {
                                    jQuery('.mb-welcome-panel-' + theMd5).hide(0);
                                } else {
                                    jQuery('.mb-welcome-panel-' + theMd5).show(0);
                                }
                            }
                        );
                    });
                </script>
                <style>
                    .mb-welcome-panel-content {
                        min-height: auto;
                        display: flex;
                        flex-direction: column;
                        justify-content: space-between;
                        padding: 15px;
                        border: 0px;
                    }

                    .mb-welcome-panel-content .mb-welcome-content {
                        padding: 5px;
                    }
                </style>
                <?php $isAddedFullWidthMessageJavascript = "1";
            } ?>
        <?php
        }
    }

    function dashboardSetup() {

        global $wp_version;

        $dashboardHead = '';

        if ($this->options['custom_dashboard']['dashboard_icon']){
            $dashboardHead .= '<span class="mb_dashboard_logo"><img src="' . $this->options['custom_dashboard']['dashboard_icon'] . '" align="left" /></span>';
            $dashboardHead .= "<style>.mb_dashboard_logo img { vertical-align : middle;padding-right : 20px;}</style>";
        }

        if ($this->options['custom_dashboard']['title']){
            $dashboardHead .= '<h1 class="mb_dashboard_title">' . $this->options['custom_dashboard']['title'] . '</h1>';
        }

        if (version_compare($wp_version, '3.8-beta', '>=')){

            add_action('admin_footer', function () use ($dashboardHead) {

                ?>
                <script>
                    jQuery("#wpbody-content .wrap h1:eq(0)").hide(0);
                    jQuery("#wpbody-content .wrap h1:eq(0)").after('<div class="custom_dashboard_head"><?php echo ($dashboardHead)?></div><div style="clear:both;"></div>');
                </script>
            <?php
            });

            return true;
        }

        add_action('admin_footer', function () use ($dashboardHead) {

            ?>
            <script>jQuery("#icon-index").html('<?php echo htmlentities($dashboardHead)?>');</script>
        <?php
        });

    }


    function removeDashboardWidgets() {

        global $wp_meta_boxes;

        $user = wp_get_current_user();

        if (is_array($wp_meta_boxes['dashboard'])){

            foreach ($user->roles as $role) {

                if (is_array($this->options['custom_dashboard']['hide_widgets'][$role])){
                    foreach ($this->options['custom_dashboard']['hide_widgets'][$role] as $key => $val) {

                        if($key =="welcome_panel") {
                            remove_action('welcome_panel', 'wp_welcome_panel');
                        } else {
                        add_action('admin_footer', function () use ($key) {
                            echo '<style>#dashboard-widgets-wrap #' . $key . ' { display:none !important; }</style>';
                            echo '<style>#dashboard-widgets #' . $key . ' { display:none !important; }</style>';
                        });
                        }

                    }
                }

                foreach ($wp_meta_boxes['dashboard'] as $key1 => $items) {
                    foreach ($items as $key2 => $its) {
                        foreach ($its as $key3 => $it) {

                            if (@$this->options['custom_dashboard']['hide_widgets'][$role][$it['id']] == "1"){
                                unset($wp_meta_boxes['dashboard'][$key1][$key2][$key3]);

                                if($key3 =="welcome_panel") {
                                    remove_action('welcome_panel', 'wp_welcome_panel');
                                } else {
                                add_action('admin_footer', function () use ($key3) {
                                    echo '<style>#dashboard-widgets-wrap #' . $key3 . ' { display:none !important; }</style>';
                                    echo '<style>#dashboard-widgets #' . $key3 . ' { display:none !important; }</style>';
                                });
                                }

                            }
                            if (@$this->options['custom_dashboard']['hide_widgets'][$role][$key3] == "1"){
                                unset($wp_meta_boxes['dashboard'][$key1][$key2][$key3]);
                                unset($wp_meta_boxes['dashboard']['normal']['high'][$key2][$key3]);

                                if($key3 =="welcome_panel") {
                                    remove_action('welcome_panel', 'wp_welcome_panel');
                                } else {
                                    add_action('admin_footer', function () use ($key3) {
                                        echo '<style>#dashboard-widgets-wrap #' . $key3 . ' { display:none !important; }</style>';
                                        echo '<style>#dashboard-widgets #' . $key3 . ' { display:none !important; }</style>';
                                    });
                                }

                            }

                        }
                    }
                }
            }
        }
    }


    function makeHideMessageForMe() {

        update_user_meta(get_current_user_id(), sanitize_text_field($_REQUEST['md5']), 1);
        $this->magicBox->setUpRes();
        die;
    }


    function addMediaUpload() {

        wp_enqueue_media();
        wp_enqueue_editor();
        wp_enqueue_script(array('jquery', 'editor', 'thickbox', 'media-upload'));
    }


    private function getRegisteredDashboardWidgets() {

        require_once ABSPATH . 'wp-admin/includes/dashboard.php';
        wp_dashboard_setup();

        global $wp_meta_boxes;

        foreach ($wp_meta_boxes as $items) {
            foreach ($items as $its) {
                foreach ($its as $it) {
                    foreach ($it as $i) {
                        $widgets[] = $i;
                    }
                }
            }
        }

        $widgets[] = array(
           "id" => "welcome_panel",
            "title" => "Welcome Panel"
        );


        return $widgets;
    }

}


?>