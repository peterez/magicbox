<?php


/* Controller & Like a Model */

class mb_login_url
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

        if ($this->postValue){
            $this->postValue['user_login_page']['url'] = trim($this->postValue['user_login_page']['url']);
            $this->postValue['user_login_page']['url'] = trim($this->postValue['user_login_page']['url'],"/");
            $this->postValue['user_login_page']['url'] = trim($this->postValue['user_login_page']['url']);
            $this->postValue['user_login_page']['url'] = sanitize_title($this->postValue['user_login_page']['url']);

            if($this->postValue['user_login_page']['url'] =="") {
                $isOk = true;
                $this->postValue['user_login_page']['status'] = "2";
            } else {
                $isOk = $this->changeAndPutWploginFile();
            }

            /* Change and Put wp-login.php */

            if ($isOk){
                /* Login Page */
                $this->magicBox->opUp($this->postValue, array('user_login_page'));

                $this->magicBox->setUpRes();
            }
        }

    }


    function toDo() {

        $return = array();
        /* User Login Url : changing wp-login.php */

        if (@$this->options['user_login_page']['status'] == "1"){
            $return['add_action']['login_init'][] = array('method' => 'set404DefaultWpLogin');
            $return['add_action']['wp_loaded'][]  = array('method' => 'newUserLoginPage');
        }

        return $return;
    }


    /* Font Inits */

    function newUserLoginPage() {

        /* include the login page */
        $has = magicbox_hasTextInUrl($this->options['user_login_page']['url']);

        if ($has){
            /* The new lostpassword url in function */
            add_filter('lostpassword_url', function () { return site_url($this->options['user_login_page']['url'] . "?action=lostpassword"); });

            /* The new login url in function */
            add_filter('login_url', function () { return site_url($this->options['user_login_page']['url']); });
            global $_mb_ext_;
            $file = $_mb_ext_ . '/wp-login.php';
            require_once($file);
            die;
        }
    }


    function set404DefaultWpLogin() {

        $this->options['user_login_page']['url'] = trim($this->options['user_login_page']['url']);

        $hasWL = magicbox_hasTextInUrl("wp-login.php");
        $hasWA = magicbox_hasTextInUrl("wp-admin");

        if (($hasWL or $hasWA) and $this->options['user_login_page']['url'] != ""){
            status_header(404);
            if ((($template = get_404_template()) || ($template = get_index_template())) && ($template = apply_filters('template_include', $template))
            ){
                include($template);
            }
            die;
        }

    }


    private function checkIsIllegalPath($path) {
        $path = trim($path);
        $path = trim($path,"/");

        if (strstr($path, "wp-admin/") or
            $path == "wp-login.php" or
            $path == "wp-admin" or
            strstr($path, "wp-includes/") or
            $path == "wp-includes" or
            strstr($path, "wp-content/") or
            $path == "wp-content" or
            $path == "/" or
            $path == "" or
            magicbox_isUrl($path) or
            $path == "index.php" or
            $path == "config.php" or
            $path == ".htaccess" or
            $path == "license.txt" or
            $path == "readme.html" or
            $path == "wp-activate.php" or
            $path == "wp-blog-header.php" or
            $path == "wp-comments-post.php" or
            $path == "wp-config.php" or
            $path == "wp-config-sample.php" or
            $path == "wp-cron.php" or
            $path == "wp-links-opml.php" or
            $path == "wp-load.php" or
            $path == "wp-mail.php" or
            $path == "wp-settings.php" or
            $path == "wp-signup.php" or
            $path == "wp-trackback.php" or
            $path == "xmlrpc.php"
        ) {return true;

        } else {
            return false;
        }
    }

    /* Controllers */

    private function changeAndPutWploginFile() {

        if($this->checkIsIllegalPath($this->postValue['user_login_page']['url'])) {
            unset($this->postValue['user_login_page']['url']);
            $this->magicBox->setUpRes("fail", __("You can't use folder name or specific filename", "magicbox"));

            return false;
        }

        $magicbox_getFile = magicbox_getFile(ABSPATH . "/wp-login.php");

        if ($magicbox_getFile){
            $fileData = str_replace(array("__DIR__", "dirname(__FILE__)","wp-login.php"), array("''","''", $this->postValue['user_login_page']['url']), $magicbox_getFile);
            $fileData = str_replace("/wp-load.php", "wp-load.php", $fileData);
            global $_mb_ext_;
            $putFile = file_put_contents($_mb_ext_ . "/wp-login.php", $fileData);

            if ($putFile == false){
                unset($this->postValue['user_login_page']['url']);
                $this->magicBox->setUpRes("fail", __("wp-login.php file can't read", "magicbox"));

                return false;
            }

        } else {
            unset($this->postValue['user_login_page']['url']);

            $this->magicBox->setUpRes("fail", __("wp-login.php file can't read", "magicbox"));

            return false;
        }

        return true;

    }

}


?>