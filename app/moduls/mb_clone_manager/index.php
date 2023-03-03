<?php

/* Controller & Like a Model */

class mb_clone_manager
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
                    'clone_manager',
                )
            );

            $this->magicBox->setUpRes();

        }

        $this->postTypes = $this->magicBox->postTypes();
    }


    function toDo()
    {

        if(!is_admin()) { return false; }

        if(@$this->options['clone_manager']['status'] =="1") {

        $postTypes = $this->magicBox->postTypes();
        foreach ($postTypes as $item) {
            $item = (array)$item;
            if ($this->options['clone_manager']['cloner'][$item['name']] == "1") {
                add_filter($item['name'] . '_row_actions', array($this, 'clonerLink'), 10, 2);
            }
        }

        }

        return false;
    }


    function clonerLink($actions, $post)
    {

        if (current_user_can('edit_posts') and $post->ID != "" and is_numeric($post->ID)) {
            $pureUrl = "admin.php?page=mb_admin_panel&sub=mb_clone_manager&postId=" . $post->ID . "&method=cloner";
            $actions['duplicate'] = '<a href="' . $pureUrl . '"  rel="permalink">' . __('Clone',"magicbox") . '</a>';
        }

        return $actions;
    }


    function cloner()
    {
        if (is_admin()) {
            global $wpdb;

            $postId = intval(sanitize_text_field($_REQUEST['postId']));
            $post = get_post($postId);

            if (is_numeric($post->ID)) {

                $currentUser = wp_get_current_user();

                $args = array(
                    'comment_status' => $post->comment_status,
                    'ping_status' => $post->ping_status,
                    'post_author' => $currentUser->ID,
                    'post_content' => $post->post_content,
                    'post_excerpt' => $post->post_excerpt,
                    'post_name' => $post->post_name,
                    'post_parent' => $post->post_parent,
                    'post_password' => $post->post_password,
                    'post_status' => 'draft',
                    'post_title' => $post->post_title,
                    'post_type' => $post->post_type,
                    'to_ping' => $post->to_ping,
                    'menu_order' => $post->menu_order
                );

                $newPostId = wp_insert_post($args);

                $taxonomies = get_object_taxonomies($post->post_type);
                foreach ($taxonomies as $taxonomy) {
                    $postTerms = wp_get_object_terms($postId, $taxonomy, array('fields' => 'slugs'));
                    wp_set_object_terms($newPostId, $postTerms, $taxonomy, false);
                }


                $postMetas = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=".$post->ID);
                if (count($postMetas) != 0) {
                    $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
                    foreach ($postMetas as $metaInfo) {
                        $metaKey = $metaInfo->meta_key;
                        $metaValue = $wpdb->_real_escape($metaInfo->meta_value);
                        $sqlQuerySsel[] = "SELECT $newPostId, '$metaKey', '$metaValue'";
                    }
                    $sql_query .= implode(" UNION ALL ", $sqlQuerySsel);
                    $wpdb->query($sql_query);
                }

                magicbox_redirect(admin_url('post.php?action=edit&post=' . $newPostId));
                die;
            } else {
                magicbox_redirect(admin_url('edit.php'));
            }
        } else {
            magicbox_redirect(admin_url('edit.php'));

        }
    }


}


?>