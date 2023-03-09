<?php

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

        wp_raise_memory_limit('admin');

        if (is_object($depencyInjection)){
            $this->magicBox  = $depencyInjection;
            $this->options   = $this->magicBox->options;
            $this->postValue = $this->magicBox->postValue;
        }

        $this->pureUrl = $pureUrl = "admin.php?page=" . @sanitize_text_field($_REQUEST['page']) . "&sub=" . @esc_attr($_REQUEST['sub']);
        $this->subMenu = array(array("link" => $pureUrl, "title" => __("Form Builder","magicbox")), array("link" => $pureUrl, "title" => __("Form List","magicbox"), "method" => "formList"), array("link" => $pureUrl, "title" => __("Contacts","magicbox"), "method" => "contacts"));

    }

    function index() {

        $this->currentForm = array();
        $this->options     = array();

    }

    function toDo() {

        return array();
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