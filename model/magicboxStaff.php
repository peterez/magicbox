<?php

/* Sanitizing all datas recursively with MagicboxStaff->sanitizeTextFiles method */
/* Escaping all datas recursively with MagicboxStaff->getOptionHtml method */

if (!class_exists('MagicboxStaff')){

    class MagicboxStaff
    {
        /* For Real */
        public $version = "1.2.1";

        protected function gli($code) {

            $siteUrl = site_url();

            $domain  = magicbox_clearIllegalDomainKeywords($siteUrl);
            $code    = sanitize_text_field($code);
            $version = $this->version;

            $get = json_decode(@$this->gau("check/{$code}/{$domain}/{$version}"), true);

            if (!is_array($get)){
                $get       = $GLOBALS{'lkrp'};
                $get['lk'] = trim($code);
            }
            $get['lk'] = trim($code);
            $this->saveOurNews($get['panelMessages']);

            return $get;
        }

        function caslk() {

            $get = $this->gli($_REQUEST['lk']);
            $this->sld($get);
            echo $_REQUEST['is_ajax'] != "true"? "" : json_encode($get);

            return $get;
        }


        protected function getlk() {

            $md5           = md5(site_url());
            $this->licence = unserialize(get_option($md5));

            return $this->licence;
        }


        function updatePlugin() {

            $l = $this->getlk();

            $phpVersion = phpversion();
            $explode    = explode(".", $phpVersion);
            $phpVersion = (float)$explode[0] . "." . $explode[1];

            if ($phpVersion<5.4){
                echo json_encode(array("result" => "fail", "error" => _("Magicbox not run on PHP 5.4 and older. Supported Versions ( php5.6, php7.X, php8.X )")));

                return false;
            }

            $magicbox_getFile = $this->gau("update/" . $l['lk'] . "?auth=" . $l['auth']);

            $isJson = json_decode($magicbox_getFile, true);

            if ($isJson['result'] != "fail"){

                $path = $GLOBALS{'_mb_ext_'} . "/magicbox-" . uniqid() . rand(1, 9999999) . ".zip";

                $ret = file_put_contents($path, $magicbox_getFile);

                if ($ret){

                    WP_Filesystem();
                    $rett = unzip_file($path, $GLOBALS{'_mb_dir_'});

                    $isWpError = is_wp_error($rett);

                    if ($isWpError){
                        echo json_encode(array("result" => "fail", "error" => _("Unzip problems please upgrade your plugin manually")));
                    } else {

                        $this->ips();

                        echo json_encode(array("result" => "ok"));
                    }

                    unlink($path);

                } else {
                    echo json_encode(array("result" => "fail", "error" => _("Unzip problems please upgrade your plugin manually. It's about chmod.")));
                }

            } else {
                echo json_encode(array("result" => "fail", "error" => _("Unzip problems please upgrade your plugin manually. " . $isJson['error'])));
            }

        }


        protected function setPluginLang() {

            add_filter('locale', function () {

                $locale = $this->getPluginLang();

                return $locale;
            }, 10);

            load_plugin_textdomain("magicbox", false, $GLOBALS{'_mb_dir_'} . '/languages');
        }


        protected function updateLang() {

            update_option("magicbox_lang", sanitize_text_field($_POST['lang']));
            echo json_encode(array("result" => "ok", "lang" => $_POST['lang']));
        }


        protected function gau($p) {

            $ctx    = stream_context_create(array("http" => array('timeout' => 150), "ssl" => array("verify_peer" => false, "verify_peer_name" => false)));
            $return = file_get_contents("https://" . "wp" . str_replace("staff", ".com/", strtolower(get_class())) . $p, false, $ctx);

            return $return;
        }


        protected function getNewsFromApi() {

            $rand = rand(1, 5);

            if ($rand == 1){
                $news = $this->gau("check/news");
                $this->saveOurNews($news);
            }

        }


        private function sld($get) {

            $md5 = md5(site_url());
            update_option($md5, serialize($get));
        }


        private function saveOurNews($news) {

            if ($news == ""){
                return false;
            }
            $oldNews = $this->getOurNews();

            $needUpdate = false;
            if (is_array($news)){
                foreach ($news as $key => $value) {
                    if ($oldNews[$key]['id'] == ""){
                        $needUpdate = true;
                    }
                }
            }
            if ($needUpdate){
                update_option("magicbox_news", serialize($news));
            }
        }


        function getPluginLang() {

            $lang = get_option("magicbox_lang");

            if ($lang == ""){
                $lang = "en";
            }

            return $lang;

        }


        function ips() {

            @ob_start();
            global $wpdb;

            $theFile = $GLOBALS{'_mb_ext_'} . "/mb.sql";

            $templine = '';
            if (file_exists($theFile)){

                $lines = file_get_contents($theFile);
                $lines = explode("\n", $lines);

                foreach ($lines as $line) {
                    if (substr($line, 0, 2) == '--' || $line == ""){
                        continue;
                    }
                    $templine .= $line;
                    if (substr(trim($line), -1, 1) == ';' and strlen($templine)>3){
                        $wpdb->query($templine);
                        $templine = '';
                    }
                }

                /*  unlink($theFile); */
            }

        }


        function ipin() {

            global $current_user;

            $name = urlencode($current_user->data->display_name);
            $mail = urlencode($current_user->data->user_email);

            $siteUrl = site_url();
            $domain  = magicbox_clearIllegalDomainKeywords($siteUrl);
            $version = $this->version;
            $this->gau("check/install/{$domain}?version={$version}&ip=" . urlencode(magicbox_getUserIp()) . "&full_url=" . urlencode($siteUrl) . "&name=" . $name . "&mail=" . $mail);
            $return = $this->gli("");
            $this->sld($return);
        }


        function ipuin() {

            $siteUrl = site_url();
            $domain  = magicbox_clearIllegalDomainKeywords($siteUrl);
            $version = $this->version;
            $this->gau("check/install/{$domain}?version={$version}&ip=" . urlencode(magicbox_getUserIp()) . "&full_url=" . urlencode($siteUrl) . "&is_deactive=1");

        }


        function userCan() {

            $can = true;
            if (is_user_logged_in()){
                $user = wp_get_current_user();
                if ($user->allcaps['manage_options'] != "1"){
                    $can = false;
                }

            } else {
                $can = false;
            }

            if (!is_admin()){
                $can = false;
            }

            if ($can == false){
                if ($_REQUEST['is_ajax'] == "true"){
                    echo json_encode(array("result" => "fail", "error" => __("Permission denied", "magicbox")));
                    die;
                } else {
                    wp_die(__("Permission denied", "magicbox"));
                    die;
                }
            }

            return true;

        }


        function isMagicboxPage() {

            $isMagicboxPage = false;

            $thePage   = sanitize_text_field(str_replace("mb-", "mb_", $_REQUEST['page']));
            $theAction = sanitize_text_field(str_replace("mb-", "mb_", $_REQUEST['action']));

            if ($thePage == "magicbox" or $theAction == "caslk" or $thePage == "caslk" or $this->categories[$thePage] != ""){
                $isMagicboxPage = true;
            }

            foreach ($this->categories as $key => $value) {

                if ($theAction == "magicbox" or $key == $theAction or @$value['subs'][$theAction] != ""){
                    $isMagicboxPage = true;
                    break;
                }

            }

            if (!is_admin()){
                $isMagicboxPage = false;
            }

            return $isMagicboxPage;
        }


        function getOurNews() {

            $news = get_option("magicbox_news");

            if ($news == ""){
                return array();
            } else {
                return unserialize($news);
            }

        }


        function opUp($data, $keys) {

            if (!is_admin() || count($data) == 0){
                return false;
            }
            /* Get all datas */
            $getCurrentData = unserialize(get_option('magicbox_data'));

            /* pick selected keys and sanitize all data. */
            /* Save html datas as file */
            /* Save sanitized data to db */
            foreach ($keys as $key) {
                $getCurrentData[$key] = $this->sanitizeTextFiles($data[$key], $key);
            }

            update_option("magicbox_data", serialize($getCurrentData));

            /* for in-memory */
            $this->options = $data;

        }


        function getOptionFromDb() {

            $this->options = unserialize(get_option('magicbox_data'));
            if (!is_array($this->options)){
                $this->options = array();
            } else {
                $this->options = $this->getOptionHtml($this->options);
            }

            return $this->options;
        }


        function getOption($key = "") {

            $getCurrentData = $this->options;

            if ($key != ""){
                return $getCurrentData[$key];
            } else {
                return $getCurrentData;
            }

        }


        function getOptionHtml($options, $mainKey = "") {

            if ($mainKey != ""){
                $mainKey = $mainKey . "_";
            }

            $newArray = array();
            foreach ($options as $key => $value) {

                if (is_array($value)){
                    $newArray[$key] = $this->getOptionHtml($value, $key);
                } else {
                    if (strstr($key, '_html')){
                        $newArray[$key] = wp_kses_post(html_entity_decode($this->loadCode($mainKey . $key, "html")));

                        $newArray[$key . "_file_path"] = $this->getLoadedPath($mainKey . $key, "html");
                        $newArray[$key . "_file_url"]  = $this->getLoadedUrl($mainKey . $key, "html");

                    } elseif (strstr($key, '_css')) {
                        $newArray[$key] = wp_kses_post(html_entity_decode($this->loadCode($mainKey . $key, "css")));

                        $newArray[$key . "_file_path"] = $this->getLoadedPath($mainKey . $key, "css");
                        $newArray[$key . "_file_url"]  = $this->getLoadedUrl($mainKey . $key, "css");

                    } elseif (strstr($key, '_js')) {
                        $newArray[$key] = wp_kses_post(html_entity_decode($this->loadCode($mainKey . $key, "js")));

                        $newArray[$key . "_file_path"] = $this->getLoadedPath($mainKey . $key, "js");
                        $newArray[$key . "_file_url"]  = $this->getLoadedUrl($mainKey . $key, "js");

                    } else {
                        $newArray[$key] = esc_attr($value);
                    }
                }
            }

            return $newArray;
        }


        function sanitizeTextFiles($data, $mainkey = "") {

            if ($mainkey != ""){
                $mainkey = $mainkey . "_";
            }

            if (is_array($data)){
                foreach ($data as $key => $value) {
                    /* bypass if in _html tag */
                    if (strstr($key, "_html")){
                        $this->saveCode($mainkey . $key, htmlentities($data[$key]), "html");
                        $newData[$key] = "";
                    } elseif (strstr($key, "_css")) {
                        $this->saveCode($mainkey . $key, htmlentities($data[$key]), "css");
                        $newData[$key] = "";
                    } elseif (strstr($key, "_js")) {
                        $this->saveCode($mainkey . $key, htmlentities($data[$key]), "js");
                        $newData[$key] = "";
                    } else {
                        $newData[$key] = $this->sanitizeTextFiles($value, $key);
                    }
                }

                return $newData;
            } else {

                if (magicbox_checkMail(trim($data))){
                    return sanitize_email($data);
                } else if (magicbox_isUrl(trim($data))){
                    return sanitize_url($data);
                } else {
                    return sanitize_text_field($data);
                }
            }

        }


        function getCurrentUrl() {

            $reqUri = $this->getCurrentPath();

            return get_site_url(null, $reqUri);
        }


        function getCurrentPath() {

            if (strstr(ltrim($_SERVER['REQUEST_URI'], "/"), "/") == false){
                return $_SERVER['REQUEST_URI'];
            }

            $siteUrl = site_url();

            /* we cutting the subfoldername from request_uri */
            $ex = explode("/", $siteUrl);
            if (count($ex)>=3){
                $curPath = "";
                foreach ($ex as $key => $it) {
                    if ($key<=2 or $it == ""){
                        continue;
                    }
                    $curPath .= "/" . $it;
                }
            }

            $reqUri = $_SERVER['REQUEST_URI'];
            if ($curPath != ""){
                $reqUri = str_replace($curPath, "", $reqUri);
            }

            return $reqUri;

        }


        function postTypes($query = "") {

            if ($query == ""){
                $query = array('public' => true);
            }

            $postTypes = (array)get_post_types($query, 'objects');

            $types['homepage'] = array("label" => _("Homepage"), "name" => "homepage", "public" => true);
            foreach ($postTypes as $item) {
                $item = (array)$item;
                if ($item['name'] == "attachment"){
                    continue;
                }
                $types[] = $item;
            }

            return $types;

        }


        function currentScreen() {

            return get_current_screen();
        }


        function isThisPage($className) {

            $subClass = str_replace("-", "_", $_REQUEST['sub']);

            if ($subClass == $className){
                return "sub";
            }

            $pageClass = str_replace("-", "_", $_REQUEST['page']);

            if ($pageClass == $className){
                return "page";
            }

            return false;
        }


        function uploadForm($label, $inputName, $currentImageUrl = "", $help = '', $pop = '') {

            $key = md5($inputName);

            $html = '<div class="uploadedImage  _' . $key . '">
        <div class="image-thumbnail">';
            if ($currentImageUrl != ""){
                $html .= '<div class="uploadedImageItem"><img src="' . esc_url($currentImageUrl) . '" /><span class="removeImage" key="' . $key . '"><i class="fa-solid fa-trash-can"></i></span></div>';
            }
            $html .= '</div> <div class="row fixedRow align-items-center gx-1"><div class="col-9"><div class="form-group d-flex">';

            $html .= '<input id="id_' . $key . '"  class="form-control" name="' . $inputName . '" value="' . esc_url($currentImageUrl) . '" placeholder=" "/>';
            $html .= '<label class="input-group-text" for="id_' . $key . '">' . $label . '</label>';
            if ($pop != ""){
                $html .= '<div class="form-info" data-mb="pop" data-mb-title="" data-mb-content="' . $pop . '"><i class="fa-solid fa-info"></i></div>';
            }
            $html .= '</div></div>';
            $html .= '<div class="col-3"><div  style="margin-left: 10px; cursor:pointer;"  key="' . $key . '" class="image_upload btn btn-primary w-100">' . translate('Browse') . '</div></div>';

            if ($help != ""){
                $html .= ' <div class="col-12"><div class="alert-text">' . $help . '</div></div>';
            }

            $html .= '</div></div>';

            return $html;

        }


        function loadCode($key, $type = "html") {

            $file = $this->getLoadedPath($key, $type);
            $file = magicbox_getFile($file);

            return $file;
        }


        function getLoadedPath($key, $type) {

            return $GLOBALS{'_mb_ext_'} . "/code/" . $key . "." . $type;
        }


        function getLoadedUrl($key, $type) {

            return $GLOBALS{'_mb_ext_url_'} . "/code/" . $key . "." . $type;
        }


        function saveCode($key, $value, $type = "html") {

            $file  = $this->getLoadedPath($key, $type);
            $value = trim($value);
            if ($value != "" or strlen($value)>0){
                return @file_put_contents($file, $value);
            } else {
                return true;
            }
        }


        function getUserRoles() {

            global $wp_roles;
            foreach ($wp_roles->roles as $key => $item) {
                $roles[$key] = $item['name'];
            }

            return $roles;
        }


        function getPageType() {

            $type = get_post_type();
            if (is_front_page()){
                $type = "homepage";
            }

            return $type;
        }


        function smtpMailSender($toMail, $toName, $title, $detail, $options = null) {

            if ($options == ""){
                $options = $this->options['smtp'];
            }

            $mail = new MBphpMail(true);

            try {
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host       = $options['host'];
                $mail->SMTPAuth   = true;
                $mail->Username   = $options['username'];
                $mail->Password   = $options['password'];
                $mail->SMTPSecure = $options['smtp_secure'];;

                $mail->Port = $options['smtp_port'];
                if ($options['sender_mail'] != ""){
                    $mail->setFrom($options['sender_mail'], $options['sender_name']);
                } else {
                    $mail->setFrom($options['username'], $options['sender_name']);
                }

                $mail->addAddress($toMail, $toName);

                if ($options['reply_mail'] != ""){
                    $mail->addReplyTo($options['reply_mail']);
                } else {
                    $mail->addReplyTo($options['sender_mail']);
                }

                $mail->isHTML(true);
                $mail->CharSet = 'utf-8';
                $mail->Subject = $title;
                $mail->Body    = $detail;

                $isSend = $mail->send();

                return array("result" => "ok", "return" => $isSend);

            } catch (Exception $e) {
                $error = _("Error") . " : " . $e->getMessage();

                return array("result" => "fail", "error" => $error);
            }

        }


        function ourPropaganda() {

            $result = $this->getOurNews();

            foreach ($result as $item) {

                if ($item['full_width'] == "1"){
                    $hook = "in_admin_header";
                } else {
                    $hook = "wp_dashboard_setup";
                }

                if ($item['type'] == "magicbox" and class_exists('Mb_custom_dashboard')){
                    add_action($hook, function () use ($item) {

                        $customDashboard                               = new Mb_custom_dashboard($this);
                        $customDashboard->dashboardSettigs["magicbox"] = $item;
                        $customDashboard->showPanelMessage("magicbox");

                    }, 99999999);
                }

            }

        }


        function setUpRes($result = "ok", $error = "", $redirect = "") {

            if ($_REQUEST['is_ajax'] == "true"){

                $array = array("result" => $result);
                if ($error != ""){
                    $array["error"] = trim($error);
                }
                echo json_encode($array);
            } else {

                if ($redirect == ""){
                    $url = $this->getCurrentUrl();
                } else {
                    $url = $redirect;
                }

                magicbox_redirect($url);
            }

            die;

        }


        function codeMirrorAssets() {

            $settings = wp_enqueue_code_editor(array('type' => 'text/css'));
            wp_localize_script('jquery', 'mb_cm_settings', $settings);
            wp_enqueue_script('wp-theme-plugin-editor');
            wp_enqueue_style('wp-codemirror');

        }


        function themeAssets() {

            /* admin panel */
            $version = intval($this->version);

            wp_enqueue_style('mb-bootstrap', $GLOBALS{'_mb_assets_url_'} . '/css/bootstrap.min.css', false, $version);
            wp_enqueue_style('mb-bootstrap-datatables', $GLOBALS{'_mb_assets_url_'} . '/css/dataTables.bootstrap5.min.css', false, $version);
            wp_enqueue_style('mb-bootstrap-datatables1', $GLOBALS{'_mb_assets_url_'} . '/css/asset.css', false, $version);
            wp_enqueue_style('mb-bootstrap-datatables2', $GLOBALS{'_mb_assets_url_'} . '/css/main.css', false, $version);
            wp_enqueue_style('mb-bootstrap-datatables3', $GLOBALS{'_mb_assets_url_'} . '/css/bootstrap-icons.css', false, $version);
            wp_enqueue_style('mb-bootstrap-datatables4', $GLOBALS{'_mb_assets_url_'} . '/css/bootstrap-tagsinput.css', false, $version);
            wp_enqueue_style("mb-bootstrap-datatables15", $GLOBALS{'_mb_assets_url_'} . '/picker/themes/nano.min.css', false, $version);
            wp_enqueue_style("mb-bootstrap-datatables17", $GLOBALS{'_mb_assets_url_'} . '/sweetalert/sweetalert2.min.css', false, $version);

            wp_enqueue_script("mb-bootstrap-datatables2", $GLOBALS{'_mb_assets_url_'} . '/js/jquery.dataTables.min.js', false, $version);
            wp_enqueue_script("mb-bootstrap-datatables3", $GLOBALS{'_mb_assets_url_'} . '/js/dataTables.bootstrap5.min.js', false, $version);
            wp_enqueue_script("mb-bootstrap-datatables4", $GLOBALS{'_mb_assets_url_'} . '/js/bootstrap.bundle.min.js', false, $version);
            wp_enqueue_script("mb-bootstrap-datatables10", $GLOBALS{'_mb_assets_url_'} . '/js/asset.js', false, $version);
            wp_enqueue_script("mb-bootstrap-datatables11", $GLOBALS{'_mb_assets_url_'} . '/js/bootstrap-tagsinput.js', false, $version);
            wp_enqueue_script("mb-bootstrap-datatables12", $GLOBALS{'_mb_assets_url_'} . '/js/d28852a19c.js', false, $version);
            wp_enqueue_script("mb-bootstrap-datatables14", $GLOBALS{'_mb_assets_url_'} . '/picker/pickr.es5.min.js', false, $version);
            wp_enqueue_script("mb-bootstrap-datatables16", $GLOBALS{'_mb_assets_url_'} . '/sweetalert/sweetalert2.min.js', false, $version);

        }


        function themeAssetsFooter() {

            /* admin panel */
            $version = intval($this->version);
            wp_enqueue_script("mb-bootstrap-datatables", $GLOBALS{'_mb_assets_url_'} . '/js/custom.js', false, $version);
            echo '<script>var popoverTriggerList = [].slice.call(document.querySelectorAll(\'[data-bs-toggle="popover"]\'));    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) { return new bootstrap.Popover(popoverTriggerEl)});</script>';
        }


        function themeAssetsFrontend() {

            /* front-end */
            $version = intval($this->version);
            wp_enqueue_style('mb-frontend', $GLOBALS{'_mb_assets_url_'} . '/css/mbFrontend.css', false, $version);
            wp_enqueue_script('mb-frontend', $GLOBALS{'_mb_assets_url_'} . '/js/mbFrontend.js', false, $version);
        }


        protected function __clone() { }

    }
}

?>