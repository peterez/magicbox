<?php


/* Controller & Like a Model */

class mb_htaccess_editor
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

            if ($this->postValue['accept_htaccess_change'] == "ok"){
                $this->saveHtaccess();
            }

            $this->magicBox->setUpRes();

        }

    }


    function toDo() {

        $return = array();

        if ($this->magicBox->isThisPage(get_class())){
             add_action('admin_enqueue_scripts', array($this->magicBox, 'codeMirrorAssets'));
        }

        return $return;
    }



    function loadHtaccess() {

        $file = ABSPATH . ".htaccess";
        $file = wp_kses_post(magicbox_getFile($file));

        return $file;
    }

    function saveHtaccess() {

        $file = ABSPATH . ".htaccess";

        return file_put_contents($file, sanitize_textarea_field($this->postValue['htaccess']));
    }

}


?>