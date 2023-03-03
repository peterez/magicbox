<?php



/* Controller & Like a Model */

class mb_robot_txt_editor
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

        if ($this->postValue){

            if ($this->postValue['accept_robotostxt_change'] == "ok"){
                $this->saveRobotsTxt();
            }

            $this->magicBox->setUpRes();

        }

    }


    function toDo() {

        return false;
    }


    function loadRobotsTxt() {

        $file = ABSPATH . "robots.txt";

        return magicbox_getFile($file);
    }

    function saveRobotsTxt() {

        $file = ABSPATH . "robots.txt";

        return @file_put_contents($file, $this->postValue['robotstxt']);
    }

}


?>