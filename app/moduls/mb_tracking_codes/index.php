<?php


/* Controller & Like a Model */

class mb_tracking_codes
{
    public $magicBox;
    public $options;
    public $headCodeManagerCodes;

    function __construct($depencyInjection) {

        if (is_object($depencyInjection)){
            $this->magicBox  = $depencyInjection;
            $this->options   = $this->magicBox->options;
            $this->postValue = $this->magicBox->postValue;
        }

        $this->magicBox->headCodeManagerCodes = array(
            "custom_code" => __("Custom Code","magicbox"),
            /* "webmaster_tools_code" => __("Webmaster Tools Code","magicbox"), */
            "google_analytics_code" => __("Google Analytics","magicbox"),
            "google_search_console_code" => __("Google Search Console","magicbox"),
            "yandex_metrica_code" => __("Yandex Metrica","magicbox"),
            "microsoft_clarity_code" => __("Microsoft Clarity","magicbox"),
            "facebook_pixel_code" => __("Facebook Pixel","magicbox"),
            "google_tag_manager_code" => __("Google Tag Manager","magicbox"),
            "onesignal_code" => __("OneSignal Code","magicbox"),
        );

        if ($this->magicBox->isThisPage(get_class())){
            add_action('admin_enqueue_scripts', array($this->magicBox, 'codeMirrorAssets'));
        }

    }

    function index() {

    }


    function toDo() {

        return array();
    }

}


?>