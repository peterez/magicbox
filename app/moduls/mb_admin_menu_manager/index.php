<?php
wp_raise_memory_limit('admin');


/* Controller & Like a Model */

class mb_admin_menu_manager
{
    public $magicBox;
    public $options;

    function __construct($depencyInjection) {

        wp_raise_memory_limit('admin');

        if (is_object($depencyInjection)){
            $this->magicBox  = $depencyInjection;
            $this->options   = $this->magicBox->options;
            $this->postValue = $this->magicBox->postValue;
        }
    }


    function index() {

        wp_enqueue_script('jquery-ui-sortable');
        $this->adminMenus = $this->adminMenus();
        global $wp_roles;
        $editableRoles = apply_filters('editable_roles', $wp_roles->roles);

        $this->userRoles     = $editableRoles;
        $this->userRolesJson = json_encode($editableRoles);


    }


    function toDo() {

        return array();
    }

    private function findMenuDetailFromArray($array, $key) {

        $return = array();
        if (is_array($array)){
            foreach ($array as $item) {
                if ($item[2] == $key){
                    $return = $item;
                }
            }
        }

        return $return;

    }


    function adminMenus() {

        global $submenu, $menu;

        foreach ($menu as $key => $value) {
            $menu[$key]['sub'] = $submenu[$value[2]];
        }

        return $menu;
    }

}


?>