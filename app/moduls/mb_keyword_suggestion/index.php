<?php


/* Controller & Like a Model */

class mb_keyword_suggestion
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
                    'keyword_suggestion',
                )
            );

            $this->magicBox->setUpRes();

        }
    }


    function toDo()
    {
        if(!is_admin()) { return false; }
        $return = array();
        if (@$this->options['keyword_suggestion']['status'] == "1") {
            $return['add_action']['add_meta_boxes'][] = array('method' => 'keywordSuggestion');
        }

        return $return;
    }

    function keywordSuggestion()
    {
        $screens = ['post', 'page', 'product'];
        foreach ($screens as $screen) {
            add_meta_box(
                'mb_ks_id',
                'Keyword Suggestion',
                array($this, 'keywordSuggestionHtml'),
                $screen
            );
        }
    }


    function keywordSuggestionHtml($post)
    {

        $lang = get_locale();
        if(strstr($lang,"_")) {
            $ex = explode("_",$lang);
            $lang = $ex[0];
        }

        ?>

        <input type="text" class="mbKeywordSuggestion ks"/>

        <div class="keywordSuggestionResults">
            <ul></ul>
        </div>

        <style>
             .keywordSuggestionResults ul  {
                padding-top:10px;
             }
            .keywordSuggestionResults ul li {
                display: inline-block;
                padding: 5px 10px;
                margin: 2px;
                color: #fff;
                background: #2271b1;
                border: 1px solid #0f4f83;
                border-radius: 2px;
                cursor: pointer;
            }
             .keywordSuggestionResults ul li.clicked {
                 display: inline-block;
                 padding: 5px 10px;
                 margin: 2px;
                 color: #fff;
                 background: #091b2e;
                 border: 1px solid #03070d;
                 border-radius: 2px;
                 cursor: pointer;
             }


        </style>

        <script>
            function sKs(keyword) {
                jQuery.getJSON("//suggestqueries.google.com/complete/search?callback=?",
                    {
                        "hl":"<?php echo $lang?>",
                        "q":keyword,
                        "client":"firefox"
                    },function(data) {
                        jQuery.each(data[1], function(key, val) {
                            jQuery('.keywordSuggestionResults ul').append('<li>'+val+'</li>');
                        });
                    }
                );
            }

            jQuery(document).on('keyup', '.mbKeywordSuggestion', function () {
               var keyword = jQuery(this).val();

                if(keyword.length <=0) {
                    return false;
                }
                jQuery('.keywordSuggestionResults ul').html('');
                sKs(keyword);
            });

            jQuery(document).on('blur', 'input[name="post_title"]', function () {
              var  keyword = jQuery(this).val();
                sKs(keyword);
            });


            lastInsertedTitle = "";

            setInterval(function(){

                keyword = jQuery.trim(jQuery('input[name="post_title"]').val());

                if(keyword.length >0) {
                    if(lastInsertedTitle != keyword) {
                        sKs(keyword);
                        lastInsertedTitle = keyword;
                    }
                }

                keyword = jQuery.trim(jQuery('.editor-post-title__input').val());

                if(keyword.length >0) {
                    if(lastInsertedTitle != keyword) {
                        sKs(keyword);
                        lastInsertedTitle = keyword;
                    }
                }

            }, 1000);




            jQuery(document).on('click', '.keywordSuggestionResults ul li', function () {
                keyword = jQuery(this).html();
               /* jQuery(this).remove(); */
                jQuery(this).addClass('clicked');
                addTagHtml = '<li><button type="button" id="post_tag-check-num-0" class="ntdelbutton"><span class="remove-tag-icon" aria-hidden="true"></span><span class="screen-reader-text">Terimi kaldır: '+keyword+'</span></button>&nbsp;'+keyword+'</li>';
                jQuery('.tagchecklist').append(addTagHtml);
                currentVal = jQuery('.the-tags').val()+","+keyword;
                jQuery('.the-tags').val(currentVal);

                copyToClipboard(jQuery(this));

            });

        </script>

    <?php
    }

}


?>