<?php

ini_set('post_max_size', -1);
ini_set('memory_limit', -1);
wp_raise_memory_limit('admin');

function mbFormBuilderAssetsToHtml($assets, $isAdmin = false) {

    $html = "";

    foreach ($assets as $class => $item) {

        if (strstr($item['name'], "[")){
            $item['name'] = str_replace(array("[", "]", "[]"), "", $item['name']);
            $theName      = "form_builder[" . $item['name'] . "][]";
        } else {
            $theName = "form_builder[" . $item['name'] . "]";
        }

        /* if is admin page */
        if ($isAdmin == true){

            if ($item['labelName'] == ""){
                $item['labelName'] = " ";
            }
            if ($item['note'] == ""){
                $item['note'] = " ";
            }
        }

        $mtDiv = $isAdmin == false? "mt-4" : "mt-2";

        $divOrLi = $isAdmin == false? "div" : "li";

        $html
            .= '
         <' . $divOrLi . ' class="item edit ' . $mtDiv . ' ' . $class . ' ' . $item['divWidth'] . '" data-classname="' . $class . '">
        ';
        $hideInputs  = '';
        $formProcess = '';
        if ($isAdmin == true){

            $hideInputs
                = '
               <input type="hidden" class="setLabelName settingOption" name="e[' . $class . '][labelName]"
                       value="' . $item['labelName'] . '"/>
                <input type="hidden" class="setPlaceHolder settingOption" name="e[' . $class . '][placeholder]"
                       value="' . $item['placeholder'] . '"/>
                <input type="hidden" class="setNote settingOption" name="e[' . $class . '][note]"
                       value="' . $item['note'] . '"/>
                <input type="hidden" class="setOptions settingOption" name="e[' . $class . '][options]"
                       value="' . $item['options'] . '"/>
                <input type="hidden" class="setType settingOption" name="e[' . $class . '][type]"
                       value="' . $item['type'] . '"/>
                <input type="hidden" class="setElement settingOption" name="e[' . $class . '][element]"
                       value="' . $item['element'] . '"/>
                <input type="hidden" class="setName settingOption" name="e[' . $class . '][name]"
                       value="' . $item['name'] . '"/>
                <input type="hidden" class="setClass settingOption" name="e[' . $class . '][class]"
                       value="' . $item['class'] . '"/>
                <input type="hidden" class="setMax settingOption" name="e[' . $class . '][max]" value="' . $item['max'] . '"/>
                <input type="hidden" class="setMin settingOption" name="e[' . $class . '][min]" value="' . $item['min'] . '"/>
                <input type="hidden" class="setStep settingOption" name="e[' . $class . '][step]"
                       value="' . $item['step'] . '"/>
                <input type="hidden" class="setRequired settingOption" name="e[' . $class . '][required]"
                       value="' . $item['required'] . '"/>
                <input type="hidden" class="setDivWidth settingOption" name="e[' . $class . '][divWidth]"
                       value="' . $item['divWidth'] . '"/>
                <textarea class="setHtml settingOption" name="e[' . $class . '][html]"
                          style="display:none;">' . $item['html'] . '</textarea>
        
              ';

            $formProcess
                = '
            <div class="formProcess">
                <span class="delete" data-classname="' . $class . '"><i class="fa-solid fa-trash-can"></i></span>
                <span class="edit" data-classname="' . $class . '"><i class="fa-solid fa-pen-to-square"></i></span>
            </div>
            ';
        }

        $inputLabel = '';
        if ($item['labelName'] != ""){
            $inputLabel = '  <label class="form-label-2 labelName">' . $item['labelName'] . '</label>';
        }

        $inputItem = '';
        if ($item['element'] == "input"){
            $inputItem .= '<input ';
            if ($item['min'] != ""){
                $html .= 'min="' . $item['min'] . '" ';
            }
            if ($item['max'] != ""){
                $html .= 'max="' . $item['max'] . '" ';
            }
            if ($item['step'] != ""){
                $html .= 'step="' . $item['step'] . '" ';
            }
            if ($isAdmin == false){
                $inputItem .= $item['required'] == "1"? "required " : " ";
                $inputItem .= 'name="' . $theName . '" ';
            }
            $inputItem .= 'type="' . $item['type'] . '"  class="form-control-2 labelControl ' . $item['class'] . '" placeholder="' . $item['placeholder'] . '">';
        }

        if ($item['element'] == "textarea"){
            $inputItem .= '<textarea ';
            if ($isAdmin == false){
                $inputItem .= $item['required'] == "1"? "required " : " ";
                $inputItem .= 'name="' . $theName . '" ';
            }
            $inputItem .= 'class="form-control-2 ' . $item['class'] . '"';
            $inputItem .= 'placeholder="' . $item['placeholder'] . '"></textarea>';
        }

        if ($item['element'] == "selectbox"){

            $options = explode(",", $item['options']);

            $inputItem .= '<select ';
            if ($isAdmin == false){
                $inputItem .= $item['required'] == "1"? "required " : " ";
                $inputItem .= 'name="' . $theName . '" ';
            }
            $inputItem .= $item['type'] == "multiple"? "multiple class='form-control-2 multiple' >" : " class='form-control-2' >";

            foreach ($options as $value) {
                $inputItem .= '<option>' . $value . '</option>';
            }
            $inputItem .= '  </select>';

        }

        if ($item['element'] == "checkbox"){

            $options = explode(",", $item['options']);

            foreach ($options as $value) {

                $inputItem .= '<div class="form-check ' . $item['class'] . '" value="' . $value . '">';
                $inputItem .= '<input class="form-check-input" ';

                if ($item['type'] == "radio"){
                    if ($isAdmin == false){
                        $inputItem .= $item['required'] == "1"? "required " : " ";
                    }
                }
                if ($isAdmin == false){
                    $inputItem .= 'name="' . $theName . '" ';
                }
                $inputItem .= 'type="' . $item['type'] . '" value="' . $value . '" id="' . $class . '_' . md5($value) . '">';
                $inputItem .= '<label class="form-check-label" for="' . $class . '_' . md5($value) . '">' . $value . '</label>';
                $inputItem .= '</div>';
            }

        }

        if ($item['element'] == "html"){
            $inputItem .= '<div class="' . $item['class'] . '">' . $item['html'] . '</div>';
        }

        $inputText = '';
        if ($item['note'] != ""){
            $inputText .= '<div class="form-text">' . $item['note'] . '</div>';
        }

        $html .= $hideInputs;

        if ($isAdmin == true){
            $html
                .= '
            <div class="mb-row fixedRow align-items-center">
                <div class="mb-col-11">';
        }

        $html
            .= '
                    <div class="mb-row fixedRow">
                        <div class="mb-col-md-12 ' . $class . '_input">
                            <div class="form-group-2">
                                ' . $inputLabel . '
                                ' . $inputItem . '
                            </div>
                            ' . $inputText . '
                        </div>
                    </div>
         ';

        if ($isAdmin == true){
            $html
                .= '
                </div>
                <div class="mb-col-1">
                    ' . $formProcess . '
                </div>
            </div>

            <div class="sortIcon"><i class="fa-solid fa-grip-vertical"></i></div>
         ';
        }
        $html .= '</';
        $html .= $isAdmin == false? "div" : "li";
        $html .= '>';
    }

    return $html;

}


/* Controller & Like a Model */

class mb_form_builder
{
    public $magicBox;
    public $options;

    function __construct($depencyInjection) {

        ini_set('post_max_size', -1);
        ini_set('memory_limit', -1);
        wp_raise_memory_limit('admin');

        if (is_object($depencyInjection)){
            $this->magicBox  = $depencyInjection;
            $this->options   = $this->magicBox->options;
            $this->postValue = $this->magicBox->postValue;
        }

        $this->pureUrl = $pureUrl = "admin.php?page=" . @sanitize_text_field($_REQUEST['page']) . "&sub=" . @sanitize_text_field($_REQUEST['sub']);
        $this->subMenu = array(array("link" => $pureUrl, "title" => __("Form Builder","magicbox")), array("link" => $pureUrl, "title" => __("Form List","magicbox"), "method" => "formList"), array("link" => $pureUrl, "title" => __("Contacts","magicbox"), "method" => "contacts"));

    }

    function index() {

        global $wpdb;

        if ($_GET['formId'] == ""){
            $this->currentForm = array();
            $this->options     = array();
        } else {
            $this->currentForm = $this->getForm($_GET['formId']);

            foreach ($this->currentForm as $key => $value) {
                $this->options['form_builder'][$key] = $value;
            }

            $this->options['form_builder']['data'] = unserialize($this->options['form_builder']['data']);
        }



    }

    function toDo() {

        return array();
    }

    private function getForm($id) {

        global $wpdb;
        $id = intval(sanitize_text_field($id));

        return $this->magicBox->getOptionHtml($wpdb->get_row("select * FROM mb_form_builder WHERE id='" . $id . "'", ARRAY_A));
    }

    function shortcodeMbForm($attr = array()) {

        $item = $this->getForm($attr['id']);

        if ($item['id'] == ""){
            return null;
        }

        $formUniqId     = "mbFormBuilder_" . $item['id'];
        $formUniqIdForm = "mbFormBuilder_" . $item['id'] . "Form";

        $item['label_data'] = unserialize($item['label_data']);

        $buttonName = trim($item['label_data']['button_name']);
        $buttonName = $buttonName == ""? __("Send", "magicbox") : $buttonName;

        $item['data'] = unserialize($item['data']);

        $html
            = '<div class="mbFrontendContentArea">
        <form method="post" class="mbForm_' . $item['id'] . '" enctype="multipart/form-data">
        <div class="card mb-card bg-light">';

        if ($item['label_data']['title'] != ""){
            $html
                .= '<div class="card-header">
         <h6 class="my-0">' . $item['label_data']['title'] . '</h6>
         </div>';
        }

        $html
            .= '<div class="card-body">
                        ' . $this->formBuilderSend($item['id']) . '
                        ' . mbFormBuilderAssetsToHtml($item['data'], false) . '
                        <div class="mt-4">
                            <button type="submit" name="upsert" value="' . $item['id'] . '"
                                    class="btn btn-success sendContact ">' . $buttonName . '</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        ';

        return $html;
    }

    function formBuilderSend($id) {

        if (count($_POST)>0 and $_POST['upsert'] == $id and $GLOBALS['formIsAdded'] == ""){

            $item = $this->getForm($id);

            if ($item['id'] == ""){
                return null;
            }

            $item['label_data'] = unserialize($item['label_data']);

            $GLOBALS['formIsAdded']          = $id;
            $options['form_builder']         = $this->getForm($id);
            $options['form_builder']['data'] = unserialize($options['form_builder']['data']);

            global $wpdb;
            $array    = array();
            $theNames = array();

            $acceptedFiles = array("audio/aac", "application/x-abiword", "application/x-freearc", "video/x-msvideo", "application/vnd.amazon.ebook", "application/octet-stream", "image/bmp", "application/x-bzip", "application/x-bzip2", "application/x-cdf", "application/x-csh", "text/csv", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/vnd.ms-fontobject", "application/epub+zip", "application/gzip", "image/gif", "image/vnd.microsoft.icon", "text/calendar", "image/jpeg", "application/json", "application/ld+json", "audio/midi audio/x-midi", "audio/mpeg", "video/mp4", "video/mpeg", "application/vnd.apple.installer+xml", "application/vnd.oasis.opendocument.presentation", "application/vnd.oasis.opendocument.spreadsheet", "application/vnd.oasis.opendocument.text", "audio/ogg", "video/ogg", "application/ogg", "audio/opus", "font/otf", "image/png", "application/pdf", "application/vnd.ms-powerpoint", "application/vnd.openxmlformats-officedocument.presentationml.presentation", "application/vnd.rar", "application/rtf", "application/x-sh", "image/svg+xml", "application/x-tar", "image/tiff", "video/mp2t", "font/ttf", "text/plain", "application/vnd.visio", "audio/wav", "audio/webm", "video/webm", "image/webp", "font/woff", "font/woff2", "application/xhtml+xml", "application/vnd.ms-excel", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", "application/xml if not readable from casual users (RFC 3023, section 3)", "text/xml", "application/vnd.mozilla.xul+xml", "application/zip", "video/3gpp", "audio/3gpp", "video/3gpp2", "audio/3gpp2", "application/x-7z-compressed");

            foreach ($_POST['form_builder'] as $key => $value) {

                $pureClass      = str_replace(array("[", "]", "[]"), "", $key);
                $theNames[$key] = $options['form_builder']['data'][$pureClass]['labelName'];
                if ($theNames[$key] == ""){
                    $theNames[$key] = $options['form_builder']['data'][$pureClass]['placeholder'];
                }
                if ($theNames[$key] == ""){
                    $theNames[$key] = ucfirst($options['form_builder']['data'][$pureClass]['type']);
                }

                if (is_array($value)){
                    foreach ($value as $k => $v) {
                        $array[$key][$k] = strip_tags(sanitize_text_field($v));
                    }
                } else {
                    $array[$key] = strip_tags(sanitize_text_field($value));
                }
            }

            $newFiles = array();
            if (is_array($_FILES['form_builder'])){
                foreach ($_FILES['form_builder'] as $keyy => $values) {
                    foreach ($values as $key => $value) {
                        $newFiles[$key][$keyy] = sanitize_text_field($value);
                    }
                }
            }

            foreach ($newFiles as $key => $value) {
                $pureClass = str_replace(array("[", "]", "[]"), "", $key);

                if (in_array($value['type'], $acceptedFiles)){

                    $theNames[$key] = $options['form_builder']['data'][$pureClass]['labelName'];
                    if ($theNames[$key] == ""){
                        $theNames[$key] = $options['form_builder']['data'][$pureClass]['placeholder'];
                    }
                    if ($theNames[$key] == ""){
                        $theNames[$key] = ucfirst($options['form_builder']['data'][$pureClass]['type']);
                    }

                    $lastName = trim(end(explode(".", $value['name'])));
                    if (strstr($lastName, "php") or strstr($lastName, "py") or strstr($lastName, "asp") or strstr($lastName, "exe") or strstr($lastName, "sh") or strstr($lastName, "conf")
                    ){
                        $lastName = "danger" . uniqid();
                    }

                    $fileName    = uniqid(rand(1, 9999999)) . "." . $lastName;
                    $upload      = wp_upload_dir();
                    $newFile     = $upload['path'] . "/" . $fileName;
                    $newFilelink = $upload['url'] . "/" . $fileName;
                    $uploaded    = move_uploaded_file($value['tmp_name'], $newFile);

                    if ($uploaded){
                        $array[$key] = $newFilelink;
                    }
                }
            }

            $insert = array("date" => date("Y-m-d H:i:s"), "data" => serialize($array), "ip" => magicbox_getUserIp(), "status" => "3", "form_id" => $options['form_builder']['id']);

            $return = $wpdb->insert("mb_contact", $insert);

            if (function_exists('mail') and !strstr(ini_get('disable_functions'), 'mail')){
                if (filter_var($options['form_builder']['mail'], FILTER_VALIDATE_EMAIL)){

                    if ($this->options['smtp']['status'] == "1"){
                        $headers = "";
                    } else {
                        $from    = "no-replay@" . $_SERVER['host'];
                        $headers = "From:" . $from;
                    }

                    $subject = __("Magicbox New FormBuilder Message", "magicbox");
                    $message = "<h1>" . __("Magicbox New FormBuilder Message", "magicbox") . "</h1><br><br>";
                    foreach ($theNames as $key => $value) {
                        $message .= "<p><b>" . $value . "</b> : " . $array[$key] . "</p>";
                    }

                    wp_mail($options['form_builder']['mail'], $subject, $message, $headers);

                }
            }

            if ($return){
                if (trim($item['label_data']['success_text']) == ""){
                    return null;
                } else {
                    return __('<div class="card-body"><div class="success">' . $item['label_data']['success_text'] . '</div></div>', 'magicbox');
                }

            } else {

                if (trim($item['label_data']['fail_text']) == ""){
                    return null;
                } else {
                    return __('<div class="card-body"><div class="fail">' . $item['label_data']['fail_text'] . '</div></div>', 'magicbox');
                }

            }

        }

    }

    function contacts() {

        global $wpdb;

        $page  = intval(sanitize_text_field($_GET['pn']))+1;
        $limit = 20;
        $page  = $page*$limit-$limit;

        $this->results = $wpdb->get_results("
        SELECT c.*, f.mail, f.label_data
        FROM  mb_contact AS c
        INNER JOIN mb_form_builder AS f
        ON f.id = c.form_id
        order by c.id desc limit $page,$limit
        ", ARRAY_A);

        $this->count = count($this->results);
    }


    function formList() {

        global $wpdb;

        $page  = intval(sanitize_text_field($_GET['pn']))+1;
        $limit = 20;
        $page  = $page*$limit-$limit;

        $this->results = $wpdb->get_results("
        SELECT *
        FROM  mb_form_builder
        order by id desc limit $page,$limit
        ", ARRAY_A);

        $this->count = count($this->results);
    }

    function deleteForm() {

        global $wpdb;

        $formId = intval(sanitize_text_field($_GET['formId']));
        $wpdb->delete('mb_form_builder', array('id' => $formId));

        $url = $pureUrl = "admin.php?page=" . sanitize_text_field($_REQUEST['page']) . "&sub=" . sanitize_text_field($_REQUEST['sub']) . "&method=formList";

        magicbox_redirect($url);
    }

    function view() {

        global $wpdb;

        $id = intval(sanitize_text_field($_GET['contactId']));

        $this->result         = $wpdb->get_row("
        SELECT *
        FROM  mb_contact
        where id='" . $id . "'
        ", ARRAY_A);
        $this->result['data'] = unserialize($this->result['data']);

        $this->result['form'] = $wpdb->get_row("
        SELECT *
        FROM  mb_form_builder
        where id='" . intval(sanitize_text_field($this->result['form_id'])) . "'
        ", ARRAY_A);

        $this->result['form']['data']       = unserialize($this->result['form']['data']);
        $this->result['form']['label_data'] = unserialize($this->result['form']['label_data']);

        $wpdb->update("mb_contact", array("status" => "1"), array("id" => $id));

    }

}


?>