<?php


/* Controller & Like a Model */

class mb_bulk_image_resize
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
        $this->registeredImageSizes = wp_get_registered_image_subsizes();
    }


    function toDo()
    {
       return false;
    }


    function getLastImage()
    {

        global $wpdb;
        $resumeId = intval(sanitize_text_field($_REQUEST['resumeId'])) <= 0 ? PHP_INT_MAX : intval(sanitize_text_field($_REQUEST['resumeId']));
        $result = $wpdb->get_results(
            $wpdb->prepare("
            SELECT *
            FROM $wpdb->posts
            WHERE ID < %d AND post_type = 'attachment' 
            AND post_mime_type LIKE %s
            ORDER BY ID DESC limit 1",
                $resumeId, '%%image%%')
        );

        return (array)$result[0];

    }


}


?>