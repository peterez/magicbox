<?php



/* Controller & Like a Model */

class mb_duplicate_manager
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
        $this->duplicates = $this->getDuplicates();
    }


    function toDo()
    {
        return false;
    }


    private function getDuplicates()
    {

        $_REQUEST['pn'] = intval(sanitize_text_field($_REQUEST['pn']));
        if ($_REQUEST['pn'] <= 0) {
            $_REQUEST['pn'] = 0;
            $offset = 0;
        } else {
            $offset = intval(sanitize_text_field($_REQUEST['pn'])) * 50;
        }

        global $wpdb;


        $query = "SELECT a.ID, a.post_title, a.guid, a.post_type, a.post_status, b.min_id as target_id, a.post_content, b.post_content as target_content, b.post_title as target_title, b.guid as target_guid
FROM {$wpdb->posts} AS a
INNER JOIN (
SELECT post_content, guid, post_title, MIN( id ) AS min_id
FROM {$wpdb->posts}
WHERE post_type = 'post'
AND post_status = 'publish'
GROUP BY post_content
HAVING COUNT(*) >= 1
) AS b ON b.post_content = a.post_content
AND b.min_id <> a.id  and a.post_type = 'post' and a.post_status = 'publish'  and a.post_content != ''
limit {$offset},50
";
        $results = $wpdb->get_results($query, ARRAY_A);

        return $results;
    }


}


?>