<?php


/* Controller & Like a Model */

class mb_comment_manager
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
        if ($this->postValue) {

	            $this->magicBox->opUp(
                $this->postValue,
                array(
					'comment_manager',
                )
            );

            $this->magicBox->setUpRes();

        }

    }


    function toDo()
    {

        if($this->options['comment_manager']['status'] =="1") {
            add_filter( 'comments_array', array($this,'hiddenOldComments') );
            add_filter( 'comments_open', array($this,'hiddenNewComment') );
        }

        return array();
    }


    function hiddenOldComments() {
        if($this->options['comment_manager']['hidden_old_comment'][$this->magicBox->getPageType()] =="1") {
            add_filter( 'comments_array', '__return_empty_array' );
        }
    }

    function hiddenNewComment() {
        if($this->options['comment_manager']['disable_new_comment'][$this->magicBox->getPageType()] =="1") {
        add_filter( 'comments_open', '__return_false' );
        }
    }




}


?>