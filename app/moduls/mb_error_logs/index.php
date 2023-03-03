<?php


/* Controller & Like a Model */

class mb_error_logs
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

            if($this->postValue['clear_log'] =="ok") {
                $this->clearErrorLog();
                $this->magicBox->setUpRes();
            }

        }

    }


    function toDo()
    {
      return false;
    }


    function getErrorLogFile() {

        $file = ini_get('error_log');

        if($file =="") {
            $file = ABSPATH."error_log";
        } else {
            $file = ABSPATH.$file;
        }

        return $file;
    }

    function clearErrorLog() {
        $file =  $this->getErrorLogFile();
        @file_put_contents($file,"");

    }

    function loadErrorFile() {

       $file =  $this->getErrorLogFile();

        $loadFile = magicbox_getFile($file);
        $explode = explode("\n",$loadFile);

        foreach($explode as $item) {

            $ex = explode("]",$item);

            $date = str_replace("[","",$ex[0]);
            $detail = trim($ex[1]);

            if($date =="" or $detail =="") {
                continue;
            }

            $first15 = substr($ex[1],0,25);

            if(stristr($first15,"fatal") or stristr($first15,"parse") or stristr($first15,"exception") or stristr($first15,"call to")) {
                $level = "1";
            } elseif(stristr($first15,"warning")) {
                $level = "2";
            } else {
                $level = "3";
            }

            $errors[] = array(
                "date" => $date,
                "level" => $level,
                "detail" => $detail
            );
        }

        return $errors;

    }







}


?>