<?php


add_action('wp_ajax_nopriv_mbGetPostSearch', 'mbGetPostSearch');
add_action('wp_ajax_mbGetPostSearch', 'mbGetPostSearch');


function remove_shortcode_from_home( $content ) {
    if ( is_home() ) {
        $content = strip_shortcodes( $content );
    }
    return $content;
}



function mbGetPostSearch()
{
    $magicBox = new \MagicBox\MagicBox();
    $options = $magicBox->getOptionFromDb();
    $limit = 10;
    if (intval($options['live_search']['post_limit']) > 0) {
        $limit = (intval($options['live_search']['post_limit']));
    }

    $the_query = new WP_Query(array('posts_per_page' => sanitize_text_field($limit), 's' => sanitize_text_field($_REQUEST['keyword']), 'post_type' => array("post", "page", "product")));
    ?>
    <ul>
        <?php 
         if ($the_query->have_posts()) {
            while ($the_query->have_posts()): $the_query->the_post(); ?>
                <li><?php 
 
                    $content = strip_shortcodes(get_the_excerpt());
                    if ($options['live_search']['show_img'] == "1") {
                        $imgUrl = esc_attr(get_the_post_thumbnail(null, "post-thumbnail", "align=absmiddle"));
                    } else {
                        $imgUrl = "";
                    }

                    $title = esc_attr(get_the_title());
                    if (intval($options['live_search']['cut_title']) > 0) {
                        $title = mb_substr(strip_tags($title), 0, $options['live_search']['cut_title'], 'UTF-8');
                    }
                    ?>
                    <a href="<?php the_permalink() ?>">
                        <?php if ($imgUrl != "") { ?>
                            <?php echo  $imgUrl; ?>
                        <?php } ?>
                        <?php echo  esc_attr($title) ?></a>
                    <?php if (intval($options['live_search']['cut_desc']) > 0) { ?>
                        <div
                            class="desc"><?php echo  esc_attr(mb_substr(strip_tags(($content)), 0, $options['live_search']['cut_desc'], 'UTF-8'));?></div>
                    <?php } ?>
                </li>
            <?php endwhile;
            wp_reset_postdata();
        } else {
            ?>
            <li><?php _e("No Results","magicbox"); ?> </li> <?php 
         }?>
    </ul>
    <?php 
     die;
}

/* Controller & Like a Model */

class mb_live_search
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
                               'live_search',
                           )
            );

            $this->magicBox->setUpRes();

        }
    }

    function toDo()
    {

        $return = array();

        if (@$this->options['live_search']['status'] == "1") {
            $return['add_action']['wp_footer'][] = array('method' => 'instantSearch');
        }

        return $return;
    }


    function instantSearch()
    {
        ?>
        <style>
            .instantSearchArea {
                position: absolute;
                width: 100%;
                color: #f9f9f9;
            }

            .instantSearchArea ul {
                position: absolute;
                width: 100%;
                min-height: 30px;
                background: rgb(36 36 36 / 90%);
                min-width: 280px;
                -webkit-border-bottom-right-radius: 10px;
                -webkit-border-bottom-left-radius: 10px;
                -moz-border-radius-bottomright: 10px;
                -moz-border-radius-bottomleft: 10px;
                border-bottom-right-radius: 10px;
                border-bottom-left-radius: 10px;
            }

            .instantSearchArea li {
                display: block;
                margin: 10px 0px;
                color: #f9f9f9;
            }
            .instantSearchArea a {
                color: #fff;
                font-weight:bold;
                text-decoration: none;
            }

            .instantSearchArea li img {
                display: initial;
                width: 60px !important;
                height: auto;
                max-height: 60px;
            }


            .instantSearchArea {
                min-height: 30px;
                width: 96% !important;
                margin-left: 3%;
                margin-right: 3%;
                left: 0px;
                top: 0px;
            }

        </style>

        <script>

            var mbLiveRequest = "";
            jQuery(document).on('keyup', 'input[name="s"]', function () {
                var keyword = jQuery(this).val();

                if (mbLiveRequest != "") {
                    isAbort = mbLiveRequest.abort();
                } else {
                    isAbort = true;
                }

                if (keyword.length < 2) {
                    jQuery('.instantSearchArea').hide(0).html("");
                } else {

                    theForm = jQuery(this).closest("form");

                    formWidth = theForm.width();
                    formHeight = theForm.height();

                    if (typeof theForm.find('.instantSearchArea').html() == "undefined") {
                        jQuery('.instantSearchArea').remove();
                        theSearchResults = '<div class="instantSearchArea" style="width:' + formWidth + 'px; margin-top: ' + formHeight + 'px;"></div>';
                        jQuery(theForm).append(theSearchResults);
                    }

                    if (isAbort) {
                        mbLiveRequest = jQuery.ajax({
                            type: "GET",
                            url: "<?php echo site_url()?>/wp-admin/admin-ajax.php",
                            data: {action: "mbGetPostSearch", "keyword": keyword},
                            success: function (response) {

                                jQuery('.instantSearchArea').show(0).html(response);
                                jQuery('.instantSearchArea').show(0);
                            }
                        });
                    }
                }
            });


            jQuery('body').on("click", function (event) {
                if (!jQuery(event.target).hasClass("instantSearchArea") & !jQuery(event.target).hasClass("instantSearchArea") & !jQuery(event.target).hasClass("search-field") & !jQuery(event.target).parents().hasClass("instantSearchArea")
                    ) {
                    jQuery('.instantSearchArea').hide(150).remove();
                }
            });
        </script>
    <?php 
     }


}


?>