<?php
if (!class_exists('Magicbox_CacheDriverManager')){
    include_once($GLOBALS{'_mb_helpers_'} . '/cacheDrivers/empty.php');
    include_once($GLOBALS{'_mb_helpers_'} . '/cacheDrivers/file.php');
    include_once($GLOBALS{'_mb_helpers_'} . '/cacheDrivers/memcache.php');
    include_once($GLOBALS{'_mb_helpers_'} . '/cacheDrivers/memcached.php');
    include_once($GLOBALS{'_mb_helpers_'} . '/cacheDrivers/redis.php');
    include_once($GLOBALS{'_mb_helpers_'} . '/cacheDrivers/apc.php');
    include_once($GLOBALS{'_mb_helpers_'} . '/cacheDrivers/apcu.php');
    include_once($GLOBALS{'_mb_helpers_'} . '/cacheDrivers/wincache.php');

    class Magicbox_CacheDriverManager
    {

        public $drivers
            = array('memcache', 'memcached', 'redis', 'file', 'apc', 'apcu', 'wincache',);


        function __construct($driver, $args = array()) {

            $this->dirver = $this->runDriver($driver, $args);
        }

        function runDriver($driver, $args) {

            if ($driver == "memcache"){
                return Magicbox_CacheMemcache::getInstance($args);
            } elseif ($driver == "memcached") {
                return Magicbox_CacheMemcached::getInstance($args);
            } elseif ($driver == "file") {
                return Magicbox_CacheFile::getInstance($args);
            } elseif ($driver == "redis") {
                return Magicbox_CacheRedis::getInstance($args);
            } elseif ($driver == "apc") {
                return Magicbox_CacheApc::getInstance($args);
            } elseif ($driver == "apcu") {
                return Magicbox_CacheApcu::getInstance($args);
            } elseif ($driver == "wincache") {
                return Magicbox_CacheWincache::getInstance($args);
            } else {
                return Magicbox_CacheEmpty::getInstance($args);
            }

        }

        function get($key) {

            return $this->dirver->get($key);
        }

        function set($key, $data) {

            return $this->dirver->set($key, $data);
        }

        function delete($key) {

            return $this->dirver->delete($key);
        }

        function flush() {

            $this->dirver->flush();
        }

    }
}


?>