<?php


/* Controller & Like a Model */

class mb_smtp
{
    public $magicBox;
    public $options;

    function __construct($depencyInjection) {

        if (is_object($depencyInjection)){
            $this->magicBox  = $depencyInjection;
            $this->options   = $this->magicBox->options;
            $this->postValue = $this->magicBox->postValue;
        }

    }

    function index() {

        if ($this->postValue){
            $this->magicBox->opUp($this->postValue, array('smtp'));

            $this->magicBox->setUpRes();

        }
    }

    function toDo() {

        $return = array();
        if ($this->options['smtp']['status'] == "1"){
            $this->mailSetup();
        }

        return $return;
    }


    private function mailSetup() {

        add_filter('wp_mail_from', function () {

            return $this->options['smtp']['username'];
        });

        add_filter('wp_mail_from_name', function () {

            if ($this->options['smtp']['sender_name'] != ""){
                return $this->options['smtp']['sender_name'];
            } else {
                return $this->options['smtp']['username'];
            }
        });

        add_filter( 'wp_mail_content_type', function(){
            return 'text/html';
        });

        add_action('phpmailer_init', array($this, 'configureSmtp'));
    }

    function configureSmtp($phpmailer) {

        $phpmailer->isSMTP();
        $phpmailer->Host       = $this->options['smtp']['host'];
        $phpmailer->SMTPAuth   = true;
        $phpmailer->Port       = $this->options['smtp']['smtp_port'];
        $phpmailer->Username   = $this->options['smtp']['username'];
        $phpmailer->Password   = $this->options['smtp']['password'];
        $phpmailer->SMTPSecure = $this->options['smtp']['smtp_secure'];

        $phpmailer->From = $this->options['smtp']['username'];

        if ($this->options['smtp']['sender_mail'] != ""){
            $phpmailer->FromName = $this->options['smtp']['sender_name'];
        }

        if ($this->options['smtp']['reply_mail'] != ""){
            $phpmailer->addReplyTo($this->options['smtp']['reply_mail']);
        } else {
            $phpmailer->addReplyTo($this->options['smtp']['sender_mail']);
        }

        return $phpmailer;

    }

    function mailTest() {

        if (!is_admin()){
            echo json_encode(array("result" => "fail", "error" => __("Please login as admin","magicbox")));
        }

        if (filter_var($this->postValue['testMail'], FILTER_VALIDATE_EMAIL)){
            $this->options['smtp'] = $this->postValue['smtp'];
            $this->mailSetup();
            $return = wp_mail($this->postValue['testMail'], "Test Mail Subject", "Test Mail Detail");

            if ($return){
                echo json_encode(array("result" => "ok"));
            } else {

                global $tsMailErrors;
                global $phpmailer;
                if (!isset($tsMailErrors)){
                    $tsMailErrors = array();
                }
                if (isset($phpmailer)){
                    $tsMailErrors .= $phpmailer->ErrorInfo . " -> ";
                }

                $tsMailErrors = trim(trim($tsMailErrors), '->');

                if ($tsMailErrors == ""){
                    $tsMailErrors = __("Invalid mail options","magicbox");
                }

                echo json_encode(array("result" => "fail", "error" => $tsMailErrors));
            }

        } else {
            echo json_encode(array("result" => "fail", "error" => __("Invalid email address","magicbox")));
        }
    }

}


?>