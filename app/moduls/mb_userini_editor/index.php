<?php

/* Controller & Like a Model */

class mb_userini_editor
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

            if ($this->postValue['accept_userini_change'] == "ok"){
                $this->saveUserIni();
            }

            $this->magicBox->setUpRes();

        }
    }


    function toDo() {

        if (!is_admin()){
            return false;
        }
        $return = array();

        if ($this->magicBox->isThisPage(get_class())){
         add_action('admin_enqueue_scripts', array($this->magicBox, 'codeMirrorAssets'));
        }

        return $return;
    }



    function getUserIni() {



        $file = ini_get('user_ini.filename');

        if ($file == ""){
            $file = ini_get('user_ini');

            if ($file == ""){
                $file = "php.ini";
            }
        }

        if ($file == ""){
            $file = ABSPATH . "php.ini";
        } else {
            $file = ABSPATH . $file;
        }

        return $file;
    }


    function loadUserIni() {

        return magicbox_getFile($this->getUserIni());
    }

    function saveUserIni() {

        return file_put_contents($this->getUserIni(), $this->postValue['userini']);
    }

}


?>