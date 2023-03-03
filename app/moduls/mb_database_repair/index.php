<?php

/* Controller & Like a Model */

class mb_database_repair
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

        if ($this->postValue ==false) {
            $this->tables = $this->getTables();
        }

    }


    function toDo()
    {
        return false;
    }


    function repair() {

        /* if isn't admin dont run */
        if(!is_admin()) { return false; }

        global $wpdb;

        $table = strip_tags(sanitize_text_field($_REQUEST['table']));
        $repair_db = $wpdb->query("REPAIR TABLE $table");
        if($repair_db) {
            echo "true";
        } else {
            echo "false";
        }
    }


    private function getTables()
    {

        global $wpdb;
        $tables = $wpdb->get_results("SHOW TABLE STATUS");

        $return = array();
        foreach ($tables as $item) {

            if($item->Engine=='InnoDB')
            {
                $status = __("Storage engine doesn't support repair","magicbox");
                $level = "0";
            } else {
                if($item->Data_free>0)
                {
                    $status = __("Free Bytes Allocated","magicbox")." (".$item->Data_free.")";
                    $level = "2";
                }
                else
                {
                    $status = "Ok";
                    $level = "1";
                }
            }

            $arr = array(
                "name" => $item->Name,
                "status" => $status,
                "importance" => $level,
                "object" => $item
            );

            $return[] = $arr;
        }

        return $return;
    }



}


?>