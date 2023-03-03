<?php
function mb_contact_buttons() {

    global $magicBox;
    $magicBox->checkAndIncluseSubPage();
    $magicBox->runPage();
}


/* Controller & Like a Model */

class mb_contact_buttons
{
    public $magicBox;
    public $options;

    function __construct($depencyInjection) {

        if (is_object($depencyInjection)){
            $this->magicBox  = $depencyInjection;
            $this->options   = $this->magicBox->options;
            $this->postValue = $this->magicBox->postValue;
        }

        $this->buttonPositions = array("topleft" => "Top Left", "topright" => "Top Right", "topcenter" => "Top Center", "middleleft" => "Middle Left", "middleright" => "Middle Right", "middlecenter" => "Middle Center", "bottomleft" => "Bottom Left", "bottomright" => "Bottom Right", "bottomcenter" => "Bottom Center",);

    }

    function index() {

        wp_enqueue_script('jquery-ui-sortable');

    }

    function toDo() {

        $return = array();

        return $return;
    }


}


?>