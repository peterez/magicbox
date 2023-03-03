<?php


/* Controller & Like a Model */

class mb_user_switch
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

    }


    function toDo()
    {

        $return = array();
        return $return;
    }




}


?>