<?php

/* Controller & Like a Model */

class mb_code_insert_manager
{
    public $magicBox;
    public $options;

    function __construct($depencyInjection) {

        if (is_object($depencyInjection)){
            $this->magicBox  = $depencyInjection;
            $this->options   = $this->magicBox->options;
            $this->postValue = $this->magicBox->postValue;
        }

        if ($this->magicBox->isThisPage(get_class())){
            add_action('admin_enqueue_scripts', array($this->magicBox, 'codeMirrorAssets'));
        }

    }


    function index() {

        $this->insertedCodes = array();


    }


    function toDo() {

        $return = array();

        return $return;
    }


}


?>