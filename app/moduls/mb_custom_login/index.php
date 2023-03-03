<?php

/* Controller & Like a Model */

class mb_custom_login
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
                    'custom_login',
                )
            );

            $this->magicBox->setUpRes();

        }

    }


    function toDo()
    {

        $return = array();

        if(@$this->options['custom_login']['status'] =="1") {
            if ( ! wp_script_is( 'jquery', 'enqueued' )) {
                 wp_enqueue_script( 'jquery' );
            }
        add_action('admin_enqueue_scripts', array($this, 'addMediaUpload'));
        $return['add_action']['login_footer'][] = array('method' => 'loginPage','priotiy'=>5000);
        }

        return $return;
    }

    function loginPage() {
                ?>
                <style>
                     <?php if($this->options['custom_login']['logo'] !="") {?>
                    #login h1 a, .login h1 a {
                        background-image: url('<?php echo $this->options['custom_login']['logo']?>');
                        <?php if($this->options['custom_login']['logo_width'] !="") {?>
                        width: <?php echo $this->options['custom_login']['logo_width']?> !important;
                        <?php } else {?>
                        width: auto !important;
                        <?php }?>
                        <?php if($this->options['custom_login']['logo_height'] !="") {?>
                            height: <?php echo $this->options['custom_login']['logo_height']?> !important;
                        <?php } else {?>
                        height: auto !important;
                        <?php }?>
                        <?php 
                          if ($this->options['custom_login']['logo_width'] !="" and $this->options['custom_login']['logo_height'] !="") {?>
                        background-size:url('<?php echo $this->options['custom_login']['logo_width']?> <?php echo $this->options['custom_login']['logo_height']?>');
                        <?php } else {?>
                        background-size:contain;
                        background-position-y: center;
                        <?php } ?>
                    }
                    <?php } ?>

                    <?php if($this->options['custom_login']['retina_logo'] !="") {?>
                    @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
                        #login h1 a, .login h1 a { background-image: url('<?php echo $this->options['custom_login']['retina_logo']?>');}
                    }
                    <?php }?>

                    body.login{
                    <?php if($this->options['custom_login']['background_fullsize'] =="1") {?>
                        -webkit-background-size: cover !important;
                        -moz-background-size: cover !important;
                        -o-background-size: cover !important;
                        background-size: cover !important;
                    <?php }?>
                    <?php if($this->options['custom_login']['background_color'] !="") {?>
                        background-color: <?php echo $this->options['custom_login']['background_color']?> !important;
                    <?php }?>
                    <?php if($this->options['custom_login']['background_image'] !="") {?>
                        background-image: url('<?php echo $this->options['custom_login']['background_image']?>') !important;
                    <?php }?>
                    <?php if($this->options['custom_login']['background_position'] !="") {?>
                        background-position: <?php echo $this->options['custom_login']['background_position']?> !important;
                    <?php }?>
                    <?php if($this->options['custom_login']['background_repeat'] !="") {?>
                        background-repeat: <?php echo $this->options['custom_login']['background_repeat']?> !important;
                    <?php }?>
                    }
                    <?php if($this->options['custom_login']['hide_register_lost_url'] =="1") {?>
                    p#nav{display:none !important;}
                    <?php }?>
                    <?php if($this->options['custom_login']['hide_back_url'] =="1") {?>
                    p#backtoblog{display:none !important;}
                    <?php }?>
                     <?php if($this->options['custom_login']['hide_remember_me'] =="1") {?>
                     .forgetmenot{display:none !important;}
                     <?php }?>

                    <?php if($this->options['custom_login']['form_background_color']!="") {?>
                    #loginform { background-color: <?php echo $this->options['custom_login']['form_background_color']?> !important; }
                    <?php }?>
                     <?php if($this->options['custom_login']['form_border_radius']!="") {?>
                     #loginform {
                         -webkit-border-radius: <?php echo $this->options['custom_login']['form_border_radius']?> !important;
                         -moz-border-radius: <?php echo $this->options['custom_login']['form_border_radius']?> !important;
                         border-radius: <?php echo $this->options['custom_login']['form_border_radius']?> !important;
                          }
                     <?php }?>
                    <?php if($this->options['custom_login']['form_label_color']!="") {?>
                    #loginform label{ color: <?php echo $this->options['custom_login']['form_label_color']?> !important; }
                    <?php }?>

                    <?php if($this->options['custom_login']['form_button_color']!="" or $this->options['custom_login']['form_button_text_color']!="") {?>
                    #loginform input[type=submit],#loginform .submit input[type=button]{
                    <?php if($this->options['custom_login']['form_button_text_color'] !="") {?>
                        color:<?php echo $this->options['custom_login']['form_button_text_color']?>!important;
                        text-shadow: none;
                        border-color: transparent;
                        box-shadow: none;
                    <?php }?>
                    <?php if($this->options['custom_login']['form_button_color'] !="") {?>
                    background-color:<?php echo $this->options['custom_login']['form_button_color']?>!important;
                    border: 0;
                    box-shadow:none;
                    <?php }?>
                    }
                    <?php }?>

                    <?php if($this->options['custom_login']['form_button_hover_color']!="" or $this->options['custom_login']['form_button_text_hover_color']!="") {?>
                    #loginform input[type=submit]:hover,#loginform .submit input[type=button]:hover{
                    <?php if($this->options['custom_login']['form_button_text_hover_color'] !="") {?>
                        color:<?php echo $this->options['custom_login']['form_button_text_hover_color']?>!important;
                    <?php }?>
                    <?php if($this->options['custom_login']['form_button_hover_color'] !="") {?>
                        background-color:<?php echo $this->options['custom_login']['form_button_hover_color']?>!important;
                    <?php }?>
                    }
                    <?php }?>

                    <?php if($this->options['custom_login']['back_to_register_link_color']!="") {?>
                    p#backtoblog a, p#nav a{color: <?php echo $this->options['custom_login']['back_to_register_link_color']?> !important;}
                    <?php }?>
                    <?php if($this->options['custom_login']['privacy_policy_link_color']!="") {?>
                    a.privacy-policy-link{color: <?php echo $this->options['custom_login']['privacy_policy_link_color']?> !important;}
                    <?php }?>
                     <?php if($this->options['custom_login']['hide_privacy_url']=="1") {?>
                     a.privacy-policy-link{display:none !important;}
                     <?php }?>
                </style>
            <script>
                jQuery('#login h1 a').attr('title','<?php echo  get_bloginfo('name') ?>');
                jQuery('#login h1 a').attr('href','<?php echo  get_bloginfo('url')?>');
            </script>
        <?php 
     }


    function dashboardSetup()
    {
        global $wp_version;

        $dashboardHead = '';

        if ($this->options['custom_dashboard']['dashboard_icon']) {
            $dashboardHead .= '<span class="mb_dashboard_logo"><img src="' . $this->options['custom_dashboard']['dashboard_icon'] . '" align="left" /></span>';
            $dashboardHead .= "<style>.mb_dashboard_logo img { vertical-align : middle;padding-right : 20px;}</style>";
        }

        if ($this->options['custom_dashboard']['title']) {
            $dashboardHead .= '<h1 class="mb_dashboard_title">' . $this->options['custom_dashboard']['title'] . '</h1>';
        }

        if (version_compare($wp_version, '3.8-beta', '>=')) {

            add_action('admin_footer',function() use($dashboardHead) {
                ?>
                <script>
                    jQuery("#wpbody-content .wrap h1:eq(0)").hide(0);
                    jQuery("#wpbody-content .wrap h1:eq(0)").after('<div class="custom_dashboard_head"><?php echo ($dashboardHead)?></div><div style="clear:both;"></div>');
                </script>
                <?php 
             });

            return true;
        }

        add_action('admin_footer',function() use($dashboardHead) {
            ?>
            <script>jQuery("#icon-index").html('<?php echo htmlentities($dashboardHead)?>');</script>
        <?php 
         });

    }



    function addMediaUpload()
    {
        wp_enqueue_media();
        wp_enqueue_editor();
        wp_enqueue_script(array('jquery', 'editor', 'thickbox', 'media-upload'));
    }




}


?>