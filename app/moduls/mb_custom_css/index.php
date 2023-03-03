<?php

/* Controller & Like a Model */

class mb_custom_css
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

            if ($this->postValue['custom_css']['all'] != "ok"){
                $this->postValue['custom_css']['all_css'] = "";
            }
            if ($this->postValue['custom_css']['mobile'] != "ok"){
                $this->postValue['custom_css']['mobile_css'] = "";
            }
            if ($this->postValue['custom_css']['tablet'] != "ok"){
                $this->postValue['custom_css']['tablet_css'] = "";
            }

            if ($this->postValue['custom_css']['all_admin'] != "ok"){
                $this->postValue['custom_css']['all_admin_css'] = "";
            }
            if ($this->postValue['custom_css']['mobile_admin'] != "ok"){
                $this->postValue['custom_css']['mobile_admin_css'] = "";
            }
            if ($this->postValue['custom_css']['tablet_admin'] != "ok"){
                $this->postValue['custom_css']['tablet_admin_css'] = "";
            }

            $this->magicBox->opUp($this->postValue, array('custom_css',));

            $this->magicBox->setUpRes();

        }


    }


    function toDo() {

        $return = array();
        if (@$this->options['custom_css']['status'] == "1"){

            if (is_admin()){
                /* For Admin */

                if ($this->options['custom_css']['all_admin'] == "ok"){
                    $url = $this->options['custom_css']['all_admin_file_url'];
                    $return['add_action']['admin_enqueue_scripts'][] = array('method' => 'addCustomCss', 'args' => $url);
                }

                if ($this->options['custom_css']['mobile_admin'] == "ok"){
                    if (magicbox_checkUserAgent() == "mobile"){
                        $url = $this->options['custom_css']['mobile_admin_file_url'];

                        $return['add_action']['admin_enqueue_scripts'][] = array('method' => 'addCustomCss', 'args' => $url);
                    }
                }

                if ($this->options['custom_css']['tablet_admin'] == "ok"){
                    if (magicbox_checkUserAgent() == "tablet"){
                        $url = $this->options['custom_css']['tablet_admin_file_url'];
                        $return['add_action']['admin_enqueue_scripts'][] = array('method' => 'addCustomCss', 'args' => $url);
                    }
                }

            } else {

                /* For Front */
                if ($this->options['custom_css']['all'] == "ok"){
                    $url = $this->options['custom_css']['all_css_file_url'];
                    $return['add_action']['wp_head'][] = array('method' => 'addCustomCss', 'args' => $url);
                }

                if ($this->options['custom_css']['mobile'] == "ok"){
                    if (magicbox_checkUserAgent() == "mobile"){
                        $url = $this->options['custom_css']['mobile_css_file_url'];
                        $return['add_action']['wp_head'][] = array('method' => 'addCustomCss', 'args' => $url);
                    }
                }

                if ($this->options['custom_css']['tablet'] == "ok"){
                    if (magicbox_checkUserAgent() == "tablet"){
                        $url = $this->options['custom_css']['tablet_css_file_url'];
                        $return['add_action']['wp_head'][] = array('method' => 'addCustomCss', 'args' => $url);
                    }
                }

            }
        }

        return $return;
    }


    function addCustomCss($file) {
        wp_enqueue_style('mb-custom-css-' . md5($file), $file, false, '1.0.0');
    }

}


?>