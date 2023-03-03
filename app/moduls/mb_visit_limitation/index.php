<?php


/* Controller & Like a Model */

class mb_visit_limitation
{
    public $magicBox;
    public $options;

    function __construct($depencyInjection)
    {
        if (is_object($depencyInjection)) {
            $this->magicBox = $depencyInjection;
            $this->options = $this->magicBox->options;
            $this->postValue = $this->magicBox->postValue;
        }

        $this->cacheDriver = new Magicbox_CacheDriverManager("file");
        $this->cacheDrivers = $this->cacheDriver->drivers;

    }

    function index()
    {

        global $wp_roles;
        $editableRoles = apply_filters('editable_roles', $wp_roles->roles);

        $this->userRoles = $editableRoles;

        if ($this->postValue) {

            if($this->postValue['visit_limitation']['exclude_sem'] !="1") {
                $this->postValue['visit_limitation']['exclude_sem'] = "2";
            }

            $this->magicBox->opUp(
                $this->postValue,
                array(
                    'visit_limitation',
                )
            );

            $this->magicBox->setUpRes();

        }

    }


    function toDo()
    {
        $return = array();
        /* User Login Url : changing wp-login.php */
        if(@$this->options['visit_limitation']['status'] =="1") {
            if(!is_admin()) {
                $return['add_action']['wp_loaded'][] = array('method' => 'check');
            }
        }

        return $return;
    }


    function check()
    {

        $currentPath = $this->magicBox->getCurrentPath();

        /* bypass if is ajax request */
        if(magicbox_hasTextInUrl("wp-login.php",$currentPath) or magicbox_hasTextInUrl("wp-admin",$currentPath) or magicbox_hasTextInUrl("wp-ajax",$currentPath) or magicbox_hasTextInUrl("admin-ajax",$currentPath)) {
            return true;
        }

        /* if changed login url from us */
        if($this->options['user_login_page']['url'] !="" and $this->options['user_login_page']['status'] =="1") {
            if(magicbox_hasTextInUrl($this->options['user_login_page']['url'],$currentPath)) {
                return true;
            }
        }


        /* bypass if sem bot */
        if($this->options['visit_limitation']['exclude_sem'] =="1") {
            if($this->checkIsSem()) {
                return true;
            }
        }

        /* block if is human bot */
        if($this->options['visit_limitation']['block_crawler'] =="1") {
            $userAgent = sanitize_text_field($_SERVER['HTTP_USER_AGENT']);
            if($userAgent =="" or strlen($userAgent)<10 or strstr(magicbox_getUserIp(),":")) {
                include get_404_template();
                die;
            }
        }

        /* is this redirected page bypass limitation */
        if($this->options['visit_limitation']['error_type'] =="2") {
            if(
                strstr($this->options['visit_limitation']['error_redirect'],$currentPath) or
                strstr($currentPath,$this->options['visit_limitation']['error_redirect'])
            ) {
                return true;
            }
        }

        /* check this user type is bypassed */
        $currentUser = wp_get_current_user();
        $run = true;
        foreach($this->options['visit_limitation']['roles'] as  $key => $value) {
           if(in_array($key,$currentUser->roles)) {
               $run = false;
               break;
           }
        }

        /* if unregistered user */
        if($currentUser->ID==0 and $this->options['visit_limitation']['roles']['siteuser'] =="1") {
            $run = false;
        }


        if($run ==false) {
            return false;
        }


        if(is_search()) {
            $processType = "search";
        } else {
            if($_POST['comment'] !="") {
                $processType = "comment";
            }  else {
                $processType = "page";
            }
        }


        /* include the login page */
        if($this->options['visit_limitation']['data_storage'] =="") {
            $this->options['visit_limitation']['data_storage'] = "file";
        }
        $this->cacheDriver = new CacheDriverManager($this->options['visit_limitation']['data_storage']);
        $this->setCacheKey();

        $theUserKey = "VLpages_".md5(magicbox_getUserIp());
        $theCountKey = "VLcount_".$processType."_".$theUserKey;

        $visitedThisPage =  unserialize($this->cacheDriver->get($theUserKey));

        /* if visit this page before dont block and count */
        $time = time();
        if(is_array($visitedThisPage)) {
            /* delete old keys */
            foreach($visitedThisPage as $vk => $vt) {
                if(intval($vt)<=$time) {
                    unset($visitedThisPage[$vk]);
                }
            }
        } else {
            $visitedThisPage = array();
        }

        if(intval($visitedThisPage[$this->cacheKey])>$time) {
            return true;
        }

        $getTotal = intval($this->cacheDriver->get($theCountKey));

        if($getTotal>intval($this->options['visit_limitation']['max_'.$processType])) {

            if($this->options['visit_limitation']['error_type'] =="1") {
                include get_404_template();
            } else {
                if(magicbox_isUrl($this->options['visit_limitation']['error_redirect'])) {
                    magicbox_redirect($this->options['visit_limitation']['error_redirect']);
                } else {
                    magicbox_redirect(site_url()."/".ltrim($this->options['visit_limitation']['error_redirect'],"/"));
                }


                die();
            }
            die;
        } else {
            if($GLOBALS['vtIsAdded'] !=true) {
                $GLOBALS['vtIsAdded'] = true;
                $newTotal = $getTotal+1;

                $this->cacheDriver->set($theCountKey,$newTotal);

                $visitedThisPage[$this->cacheKey] = time()+86400;
                $this->cacheDriver->set($theUserKey,serialize($visitedThisPage));

            }
        }
    }

    function setCacheKey()
    {
        $cacheKey = $this->magicBox->getCurrentPath();

        if ($cacheKey == "/" or $cacheKey == "") {
            $cacheKey = "/";
        }

        $this->cacheKey = md5($cacheKey);

        return $this->cacheKey;
    }


    function checkIsSem() {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        if(
            strstr($userAgent,'yandex.com/bot') or
            (
                strstr($userAgent,'yandex') and
                strstr($userAgent,'bot')
            )
        ) {
            return true;
        }
        if(strstr($userAgent,"yahoo.com")) {
            return true;
        }
        if(strstr($userAgent,"AOLBuild") or strstr($userAgent,"aolbuild")) {
            return true;
        }
        if(strstr($userAgent,"Baidu") or strstr($userAgent,"baidu")) {
            return true;
        }
        if(strstr($userAgent,"bingbot") or strstr($userAgent,"msnbot")  or strstr($userAgent,"BingPreview") ) {
            return true;
        }
        if(strstr($userAgent,"duckduckgo")) {
            return true;
        }
        if(strstr($userAgent,"adsbot-google") or strstr($userAgent,"googlebot") or strstr($userAgent,"mediapartners-googlee")) {
            return true;
        }
        if(strstr($userAgent,"teoma")) {
            return true;
        }
        if(strstr($userAgent,"slurp")) {
            return true;
        }

    }



    function checkMemcached()
    {
        if (class_exists('Memcached')) {
            return true;
        }
        return false;
    }


    function checkMemcache()
    {
        if (class_exists('Memcache')) {
            return true;
        }
        return false;
    }


    function checkRedis()
    {
        if (class_exists('RedisServer')) {
            return true;
        }
        return false;
    }

    function checkApc()
    {
        if (function_exists('apc_fetch')) {
            return true;
        }
        return false;
    }

    function checkApcu()
    {
        if (function_exists('apcu_fetch')) {
            return true;
        }
        return false;
    }

    function checkWincache()
    {
        if (function_exists('wincache_ucache_get')) {
            return true;
        }
        return false;
    }

    function checkFile()
    {
        return true;
    }



}


?>