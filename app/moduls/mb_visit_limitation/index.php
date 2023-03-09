<?php


/* Controller & Like a Model */

class mb_visit_limitation
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

        $this->cacheDrivers
            = array('memcache', 'memcached', 'redis', 'file', 'apc', 'apcu', 'wincache');

    }

    function index()
    {

        global $wp_roles;
        $editableRoles = apply_filters('editable_roles', $wp_roles->roles);

        $this->userRoles = $editableRoles;

    }


    function toDo()
    {
        $return = array();

        return $return;
    }



    function checkMemcached()
    {
        if (class_exists('Memcached')) {
            return true;
        }
        return false;
    }


    function checkMemcache()
    {
        if (class_exists('Memcache')) {
            return true;
        }
        return false;
    }


    function checkRedis()
    {
        if (class_exists('RedisServer')) {
            return true;
        }
        return false;
    }

    function checkApc()
    {
        if (function_exists('apc_fetch')) {
            return true;
        }
        return false;
    }

    function checkApcu()
    {
        if (function_exists('apcu_fetch')) {
            return true;
        }
        return false;
    }

    function checkWincache()
    {
        if (function_exists('wincache_ucache_get')) {
            return true;
        }
        return false;
    }

    function checkFile()
    {
        return true;
    }



}


?>