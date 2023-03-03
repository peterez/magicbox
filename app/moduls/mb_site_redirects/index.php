<?php


/* Controller & Like a Model */

class mb_site_redirects
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

    }


    function index()
    {

        if ($this->postValue) {

            $this->controllers();

            $this->magicBox->opUp(
                $this->postValue,
                array(
                    'redirect',
                )
            );

            $this->magicBox->setUpRes();

        }

    }


    function toDo()
    {

        $return = array();
        /* Redirects */
        if (@$this->options['redirect']['status'] == "1") {
        if ($this->options['redirect']['ssl'] == "1") {
            $return['add_action']['wp_loaded'][] = array('method' => 'theRedirect',"args"=>"to_https");
        }
        if ($this->options['redirect']['ssl'] == "2") {
            $return['add_action']['wp_loaded'][] = array('method' => 'theRedirect',"args"=>"to_http");
        }
        if ($this->options['redirect']['www'] == "1") {
            $return['add_action']['wp_loaded'][] = array('method' => 'theRedirect',"args"=>"to_www");
        }
        if ($this->options['redirect']['www'] == "2") {
            $return['add_action']['wp_loaded'][] = array('method' => 'theRedirect',"args"=>"to_non-www");
        }
        if ($this->options['redirect']['another'] == "1" or $this->options['redirect']['another'] == "3") {
            $return['add_action']['wp_loaded'][] = array('method' => 'theRedirect',"args"=>array(
                "type"=>$this->options['redirect']['another'],
                "url"=>$this->options['redirect']['another_website']
            ));
        }
        }

        return $return;
    }





    /* Font Inits */


    function theRedirect($args)
    {

        $scheme = $_SERVER['REQUEST_SCHEME'];
        $siteUrl = site_url();

        $reqUri = $this->magicBox->getCurrentPath();

        /* we cutting the subfoldername from request_uri */

        if($args =="to_https" and $scheme =="http") {
            $newUrl = get_site_url(null, $reqUri, 'https');
          magicbox_redirect($newUrl);
        }

        if($args =="to_http" and $scheme =="https") {
            $newUrl = get_site_url(null, $reqUri, 'http');
            magicbox_redirect($newUrl);
        }

        if($args =="to_www" and strstr($siteUrl,"www.") ==false) {
            $newUrl = get_site_url();
            $newUrl = rtrim(str_replace("://","://www.",$newUrl),"/")."/".ltrim($reqUri,"/");
            magicbox_redirect($newUrl);
        }

        if($args =="to_non-www" and strstr($siteUrl,"www.")) {
            $newUrl = get_site_url();
            $newUrl = rtrim(str_replace("www.","",$newUrl),"/")."/".ltrim($reqUri,"/");
            magicbox_redirect($newUrl);
        }


        if(is_array($args) and wp_http_validate_url($args['url'])) {

            if($this->options['user_login_url'] !="") {
                $hasLogin = magicbox_hasTextInUrl($this->options['user_login_url']);
            } else {
                $hasLogin = magicbox_hasTextInUrl("wp-login.php");
            }

            $hasAdmin = magicbox_hasTextInUrl("/wp-admin");

            if($hasLogin or $hasAdmin) {
                return false;
            }

            if($args['type'] =="1") {
            $newUrl = $args['url'];
            }

            if($args['type'] =="3") {
            $newUrl = $args['url']."/".ltrim(sanitize_text_field($_SERVER['REQUEST_URI']),"/");
            }

            magicbox_redirect($newUrl);

        }

    }




    /* Controllers */

    private function controllers() {

        if($this->postValue['redirect']['www'] =="1") {
            $siteUrl = site_url();
            if(strstr($siteUrl,"www.") ==false) {
                $siteUrl = str_replace("http://","http://www.",$siteUrl);
                $siteUrl = str_replace("https://","https://www.",$siteUrl);
                update_option('siteurl',$siteUrl);
            }
        }


        if($this->postValue['redirect']['www'] =="2") {
            $siteUrl = site_url();
            $siteUrl = str_replace("www.","",$siteUrl);
                  update_option('siteurl',$siteUrl);
        }


        if($this->postValue['redirect']['ssl'] =="1") {
            $siteUrl = site_url("","https");
              update_option('siteurl',$siteUrl);
        }

        if($this->postValue['redirect']['ssl'] =="2") {
            $siteUrl = site_url("","http");
              update_option('siteurl',$siteUrl);
        }


    }





}


?>