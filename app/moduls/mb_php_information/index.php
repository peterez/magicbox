<?php


/* Controller & Like a Model */

class mb_php_information
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

        $this->iniVariables = $this->getIniVariables();
        $this->extVariables = get_loaded_extensions();

    }


    function toDo()
    {
      return false;
    }


    function getIniVariables() {
        $list =  ini_get_all();

        $return = array();
        foreach($list as $key => $value) {
            if(strstr($key,'.')) {
                $ex = explode(".",$key);
                $keyName = $ex[0];
                $key = $ex[1];
            } else {
                $keyName = "php";
            }

          $return[$keyName][$key] = $value;
        }

        return $return;

    }



}


?>