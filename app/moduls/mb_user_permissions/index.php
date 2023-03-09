<?php
wp_raise_memory_limit('admin');

/* Controller & Like a Model */

class mb_user_permissions
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

        $this->menuCapabilities = $this->capabilities();
        global $wp_roles;
        $editableRoles = apply_filters('editable_roles', $wp_roles->roles);
        $this->userRoles = $editableRoles;

    }


    function toDo()
    {
        return array();
    }


    function capabilities()
    {
        global $submenu, $menu;

        foreach ($menu as $key => $value) {
            $newmenu[$key] = $value;
            $newmenu[$key]['sub'] = $submenu[$value[2]];
        }

        return $newmenu;


        foreach ($menu as  $value) {

            if($newmenu[$value[1]] =="") {
            if($submenu[$value[2]] !="") {
                $newmenu[$value[1]] = $value;
                $newmenu[$value[1]]['sub'] = $submenu[$value[2]];
            }
            }
        }

          return $newmenu;




    }



}


?>