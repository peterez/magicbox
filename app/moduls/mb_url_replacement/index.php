<?php


/* Controller & Like a Model */

class mb_url_replacement
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

        $this->types = array(
            "content" => "Post, pages, products etc",
            "excerpts" => "Post, pages, products etc excerpts",
            "links" => "Attachment links",
            "guids" => "Post, pages, products etc guid"
        );

    }


    function index()
    {

    }


    function toDo()
    {
        return array();
    }




}


?>