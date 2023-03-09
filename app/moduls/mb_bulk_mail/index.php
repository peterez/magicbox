<?php

use SendGrid\Mail\From;
use SendGrid\Mail\HtmlContent;
use SendGrid\Mail\Mail;
use SendGrid\Mail\PlainTextContent;
use SendGrid\Mail\Subject;
use SendGrid\Mail\To;

/* Controller & Like a Model */

class mb_bulk_mail
{
    public $magicBox;
    public $options;

    function __construct($depencyInjection) {

        if (is_object($depencyInjection)){
            $this->magicBox  = $depencyInjection;
            $this->options   = $this->magicBox->options;
            $this->postValue = $this->magicBox->postValue;
        }

        $this->pureUrl = $pureUrl = "admin.php?page=" . @sanitize_text_field($_REQUEST['page']) . "&sub=" . @esc_attr($_REQUEST['sub']);
        $this->subMenu = array(array("link" => $pureUrl, "title" => __("Settings","magicbox")), array("link" => $pureUrl, "title" => __("Campaigns","magicbox"), "method" => "campaigns"), array("link" => $pureUrl, "title" => __("Send Mail","magicbox"), "method" => "sendMail"),);

    }

    function index() {


    }

    function toDo() {

        return array();
    }

    function campaigns() {

        global $wpdb;

        $page  = intval(sanitize_text_field($_GET['pn']))+1;
        $limit = 20;
        $page  = $page*$limit-$limit;

        $this->results = $wpdb->get_results("
        SELECT *
        FROM  mb_mail_campaign
        order by id desc limit $page,$limit
        ", ARRAY_A);

        $this->count = count($this->results);
    }


    function sendMail() {

        global $wp_roles;
        $editableRoles = apply_filters('editable_roles', $wp_roles->roles);

        $this->userRoles = $editableRoles;

        if ($_GET['id'] != ""){
            $this->insertId             = sanitize_text_field($_GET['id']);
            $getCurrentCampign          = $this->getCampaign();
            $this->options['bulk_mail'] = $getCurrentCampign;
        }


    }

    private function getCampaign() {

        global $wpdb;
        $result         = $wpdb->get_row("
                   SELECT *
                   FROM  mb_mail_campaign
                   WHERE id='" . sanitize_text_field($this->insertId) . "'", ARRAY_A);

        $result['role'] = unserialize($result['role']);

        return $result;

    }


}


?>