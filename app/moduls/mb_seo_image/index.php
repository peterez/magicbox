<?php


/* Controller & Like a Model */

class mb_seo_image
{
    public $magicBox;
    public $options;

    private $excludeSql
        = "
		post_status NOT IN ('inherit', 'trash', 'auto-draft')
		AND post_type NOT IN ('attachment', 'shop_order', 'shop_order_refund', 'nav_menu_item', 'revision', 'auto-draft', 'wphb_minify_group', 'customize_changeset', 'oembed_cache', 'nf_sub', 'jp_img_sitemap')
		AND post_type NOT LIKE 'dlssus_%'
		AND post_type NOT LIKE 'ml-slide%'
		AND post_type NOT LIKE '%acf-%'
		AND post_type NOT LIKE '%edd_%'
	";

    function __construct($depencyInjection) {

        if (is_object($depencyInjection)){
            $this->magicBox  = $depencyInjection;
            $this->options   = $this->magicBox->options;
            $this->postValue = $this->magicBox->postValue;
        }
    }

    function index() {

        if ($this->postValue){
            $this->magicBox->opUp($this->postValue, array('seo_image',));

            $this->magicBox->setUpRes();

        }

    }


    function toDo() {

        if ($this->options['seo_image']['status'] == "1"){
            add_action('the_content', array($this, 'addTag'));

            if ($this->options['seo_image']['replace_image_name'] == "1"){
            add_action('save_post', array($this, 'postSave'));
            add_action('wp_handle_upload_prefilter', array($this, 'uploadPrefilter'));
            }

        }

        return false;
    }

    private function renameInContents($oldFileUrl, $newFileUrl, $postId = false) {

        global $wpdb;
        $oldFileUrl = sanitize_text_field($oldFileUrl);
        $newFileUrl = sanitize_text_field($newFileUrl);
        $query = $wpdb->prepare("SELECT ID FROM $wpdb->posts
			WHERE post_content LIKE '%s'
			AND {$this->excludeSql}", '%' . $oldFileUrl . '%');
        $ids   = $wpdb->get_col($query);

        if ($ids){
            return false;
        }

        $inIds = array_map(function ($id) { return "'" . esc_sql($id) . "'"; }, $ids);
        $inIds = implode(',', $inIds);

        $query = $wpdb->prepare("UPDATE $wpdb->posts 
			SET post_content = REPLACE(post_content, '%s', '%s')
			WHERE ID IN (" . $inIds . ")", $oldFileUrl, $newFileUrl);
        $wpdb->query($query);

        $query = $wpdb->prepare("UPDATE $wpdb->posts
			SET post_excerpt = REPLACE(post_excerpt, '%s', '%s')
			WHERE ID IN (" . $inIds . ")", $oldFileUrl, $newFileUrl);
        $wpdb->query($query);

        return true;

    }


    function uploadPrefilter($file) {

        global $mimeTypes;
        $newName = false;

        $lastName = $mimeTypes[$file['type']];

        if ($_POST['post_id'] == "" and $_POST['post'] != "" and is_numeric($_POST['post'])){
            $postId = sanitize_text_field($_POST['post']);
        }
        if ($_POST['post_id'] != ""){
            $postId = sanitize_text_field($_POST['post_id']);
        }

        $postId = sanitize_text_field($postId);

        if ($postId != "" and is_numeric($postId)){
            $post = get_post($postId);

            if ($post->post_title != ""){
                $newName = $post->post_title;
            }
            if ($post->post_name != "" and $newName == ""){
                $newName = $post->post_name;
            }
        } else {

            $exif = wp_read_image_metadata($file['tmp_name']);

            if ($exif['title'] != ""){
                $newName = $exif['title'];
            }

        }

        if ($newName != ""){
            $newName      = strtolower($newName);
            $file['name'] = $newName . "." . $lastName;
        }

        return $file;
    }

    function newFile($id, $fileName, $lastName) {

        $upload_dir = wp_upload_dir();

        $meta = wp_get_attachment_metadata($id);

        $ex       = explode("/", $meta['file']);
        $pathTime = "";
        unset($ex[count($ex)-1]);
        foreach ($ex as $item) {
            $pathTime .= $item . "/";
        }

        $path    = rtrim(rtrim($upload_dir['basedir'], "/") . "/" . $pathTime, "/");
        $pathUrl = rtrim(rtrim($upload_dir['baseurl'], "/") . "/" . $pathTime, "/");

        $time    = date('Y-m-d');
        $uploads = wp_upload_dir($time);
        if (!($uploads && false === $uploads['error'])){
            return call_user_func_array('wp_handle_upload_error', array(array(), $uploads['error']));
        }

        $newFileName = $fileName . "." . $lastName;

        $newPath = $path . "/" . $newFileName;
        $oldPath = $path . "/" . str_replace($pathTime, "", trim($meta['file'], "/"));

        $newFileUrl = $pathUrl . "/" . $newFileName;
        $oldFileUrl = $pathUrl . "/" . str_replace($pathTime, "", trim($meta['file'], "/"));

      /*  echo $oldPath . "\r\n" . $newPath . " \r\n\r\n"; */

        $rename = rename($oldPath, $newPath);

        $meta['file'] = $pathTime . $newFileName;


        if ($rename){

            $this->renameInContents($oldFileUrl, $newFileUrl);

            global $wpdb;
            $query = $wpdb->prepare("UPDATE $wpdb->posts SET guid = '%s' WHERE ID = '%d'", $newFileUrl, $id);
            $wpdb->query($query);

            $query = $wpdb->prepare("UPDATE $wpdb->posts SET guid = '%s' WHERE guid = '%d'", $newFileUrl, $oldFileUrl);
            $wpdb->query($query);

            foreach ($meta['sizes'] as $key => $item) {

                $oldPath = $path . "/" . $item['file'];
                $newPath = $path . "/" . $fileName . "-" . $item['width'] . "x" . $item['height'] . "." . $lastName;

                $oldFileUrl = $pathUrl . $item['file'];
                $newFileUrl = $pathUrl . $fileName . "-" . $item['width'] . "x" . $item['height'] . "." . $lastName;

                $rena = rename($oldPath, $newPath);


               /* echo $oldPath . "\r\n" . $newPath . " \r\n\r\n";  var_dump($rena);*/


                if ($rena){
                    $meta['sizes'][$key]['file'] = $fileName . "-" . $item['width'] . "x" . $item['height'] . "." . $lastName;
                    $this->renameInContents($oldFileUrl, $newFileUrl);
                }

            }

            wp_update_attachment_metadata($id, $meta);

            update_attached_file($id, $newFileUrl);

        }

    }

    function postSave($post_id) {

        /* $uploads = wp_upload_dir( time() ); */
        global $mimeTypes;
        $post = get_post($post_id);

        if ($post->post_title != ""){
            $newName = $post->post_title;
        }
        if ($post->post_name != "" and $newName == ""){
            $newName = $post->post_name;
        }

        $filename = sanitize_file_name($newName);

        $args   = array('post_type' => 'attachment', 'numberposts' => -1, 'post_status' => 'any', 'post_parent' => $post_id);
        $medias = get_posts($args);
        if (is_array($medias)){

            foreach ($medias as $item) {

                $needRename = true;
                $guidName   = end(explode("/", $item->guid));

                $lastName = $mimeTypes[$item->post_mime_type];

                if (strstr($guidName, $filename)){
                    $needRename = false;
                }

                if ($needRename){
                    /* Burada dosya adını tekrardan düzenle */
                    $this->newFile($item->ID, $filename, $lastName);
                }

            }
        }

    }


    function addTag($content) {

        $title = get_the_title();

        if ($content == ""){
            return $content;
        }

        $doc           = new DOMDocument();
        $doc->encoding = 'utf-8';
        libxml_use_internal_errors(true);
        $doc->loadHTML($content);

        $images = $doc->getElementsByTagName('img');

        foreach ($images as $image) {
            if ($title != ""){
                $image->setAttribute('alt', $title);
                $image->setAttribute('title', $title);
            } else {
                $image->removeAttribute('alt');
                $image->removeAttribute('titlet');
            }
        }

        return $doc->saveHTML($doc->documentElement);

        return $doc->saveHTML();
    }

}


?>