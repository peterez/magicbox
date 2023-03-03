<?php

/* Controller & Like a Model */

class mb_backup_manager
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

        $this->types  = array(
            "plugins",
            "themes",
            "uploads",
            "database"
        );

    }

    function index()
    {

    }

    function toDo()
    {
        return array();
    }




}


?>