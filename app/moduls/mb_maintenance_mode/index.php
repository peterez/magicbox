<?php


/* Controller & Like a Model */

class mb_maintenance_mode
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

            $this->magicBox->opUp($this->postValue, array('maintenance'));

            $this->magicBox->setUpRes();

        }

    }


    function toDo() {

        $return = array();
        if (@$this->options['maintenance']['status'] == "1"){
            $return['add_action']['wp_loaded'][] = array('method' => 'maintenance','priority'=>1);
        }

        return $return;
    }


    /* Font Inits */

    function maintenance() {

        if ($this->options['user_login_url'] != ""){
            $hasLogin = magicbox_hasTextInUrl($this->options['user_login_url']);
        } else {
            $hasLogin = magicbox_hasTextInUrl("wp-login.php");
        }

        $hasAdmin = magicbox_hasTextInUrl("/wp-admin");

        if ($hasLogin or $hasAdmin){
            return false;
        }

        if (!is_admin()){

            $user = wp_get_current_user();
            if ($user->ID == "" or $user->ID == 0 or !in_array('administrator', $user->roles)){
                ?>
                <div class="htmlArea">
                <?php echo  $this->options['maintenance']['detail_html']; ?>
                </div>
                <?php if ($this->options['maintenance']['status'] == "1"){ ?>
                    <style>
                        body {
                            font-family: arial;
                            margin: 0px;
                            margin: auto;
                            padding: 0px;
                            width: 100%;
                            height: 100%;
                        <?php if($this->options['maintenance']['background_fullsize'] =="1") { ?> -webkit-background-size: cover !important;
                            -moz-background-size: cover !important;
                            -o-background-size: cover !important;
                            background-size: cover !important;
                        <?php }?> <?php if($this->options['maintenance']['color'] !="") {?> color: <?php echo $this->options['maintenance']['color']?> !important;
                        <?php }?> <?php if($this->options['maintenance']['background_color'] !="") {?> background-color: <?php echo $this->options['maintenance']['background_color']?> !important;
                        <?php }?> <?php if($this->options['maintenance']['background_image'] !="") {?> background-image: url('<?php echo $this->options['maintenance']['background_image']?>') !important;
                        <?php }?> <?php if($this->options['maintenance']['background_position'] !="") {?> background-position: <?php echo $this->options['maintenance']['background_position']?> !important;
                        <?php }?> <?php if($this->options['maintenance']['background_repeat'] !="") {?> background-repeat: <?php echo $this->options['maintenance']['background_repeat']?> !important;
                        <?php }?>
                        }

                        .htmlArea {
                        <?php if($this->options['maintenance']['vertical_align'] =="1") {?> position: fixed;
                            box-sizing: border-box;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                        <?php } else {?> height: 100%;
                        <?php }?>
                        }
                    </style>
                <?php 
                 }
                die;
            }

        }

    }

}


?>