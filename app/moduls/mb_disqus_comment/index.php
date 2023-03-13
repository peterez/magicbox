<?php


/* Controller & Like a Model */

class mb_disqus_comment
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
					'disqus_comment',
                )
            );

            $this->magicBox->setUpRes();

        }

    }


    function toDo()
    {

        $return = array();

        if(@$this->options['disqus_comment']['status'] =="1") {
            if(!is_admin()) {

                if($this->options['disqus_comment']['position'] =="after") {
                    $return['add_action']['comment_form_after'][] = array('method' => 'commentIframe');
                } else {
                    $return['add_action']['pre_get_comments'][] = array('method' => 'commentIframe');
                }

            }
        }

        return $return;
    }



    function commentIframe() {
        $url = $this->magicBox->getCurrentUrl();
        ?>
        <div class="mbDisqusComment">
        <script id="dsq-count-scr" src="//<?php echo $this->options['disqus_comment']['app_id']?>.disqus.com/count.js" async></script>
        <div id="disqus_thread"></div>
        <script>
            PAGE_URL = "<?php echo esc_attr($url)?>";
            PAGE_IDENTIFIER = "<?php echo md5($url)?>";
             var disqus_config = function () {
             this.page.url = PAGE_URL;
             this.page.identifier = PAGE_IDENTIFIER;
             };

            (function() {
                var d = document, s = d.createElement('script');
                s.src = 'https://<?php echo $this->options['disqus_comment']['app_id']?>.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
        </div>
        <div style="clear:both;"></div>
        <style>
            .mbDisqusComment {
                width:100%;
                max-width:<?php echo $this->options['disqus_comment']['max_width']==""?"500px":$this->options['disqus_comment']['max_width']?>;
                <?php if($this->options['disqus_comment']['margin'] =="center") { ?>
                margin:auto;
                <?php }?>
                <?php if($this->options['disqus_comment']['margin'] =="left") { ?>
                    float:left;
                <?php }?>
                <?php if($this->options['disqus_comment']['margin'] =="right") { ?>
                    float:right;
                <?php }?>
            }
        </style>
<?php 
     }





}


?>