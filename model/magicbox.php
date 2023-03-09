<?php
namespace MagicBox;

/* Sanitizing all datas recursively with MagicboxStaff->sanitizeTextFiles method */
/* Escaping all datas recursively with MagicboxStaff->getOptionHtml method */

use MagicboxStaff;

class MagicBox extends
    MagicboxStaff
{

    public $version = "1.2.1";
    public $categories;
    public $oldCategories;
    public $subModul;
    public $options;
    public $postValue = array();
    private $isRunnedMethod = false;

    public $licence;
    public $isFree = true;
    public $isLicenced = false;
    public $isLicencedEnded = false;
    public $news;
    public $isChecked = false;

    function __construct() {

        global $magicBox;
        $this->oldCategories = $magicBox->categories;

        $this->setPluginLang();
        $this->getOptionFromDb();
        $this->loadModules();

        if (is_admin()){
            if ($this->isChecked == false){
                $this->licence = $this->getlk();
                $this->getNewsFromApi();
                $this->isChecked = true;
            }
        }

        $this->caa();

    }


    function toDo($categories = "") {

        if ($categories == ""){
            $categories = $this->categories;
        }

        if (strstr($_SERVER['REQUEST_URI'], "page=")){
            @$reqPage = sanitize_text_field($_REQUEST['page']);
        } else {
            $reqPage = "";
        }

        if ($reqPage != ""){
            if (@$categories[$reqPage] != "" or $reqPage == "magic-box" or $reqPage == "magic-box-2"){
                add_action('admin_enqueue_scripts', array($this, 'themeAssets'));
                add_action('admin_footer', array($this, 'themeAssetsFooter'));
            }
        }

        foreach ($categories as $modulSlug => $theValue) {
            $modulSlugCallback = str_replace("-", "_", $modulSlug);

            if (class_exists($modulSlugCallback)){

                $newClass = New $modulSlugCallback($this);

                if (method_exists($modulSlugCallback, 'toDo')){

                    $returns = $newClass->toDo();

                    if (is_array($returns)){
                        foreach ($returns as $function => $values) {
                            if (is_array($values)){
                                foreach ($values as $key => $value) {

                                    if ($function == "add_action"){
                                        if (is_array($value)){
                                            foreach ($value as $name) {
                                                @$methodName = $name['method'];
                                                @$args = $name['args'];
                                                @$priority = ($name['priority']);
                                                if ($priority == "" or !is_numeric($priority) or $priority<=-1){
                                                    $priority = 10;
                                                }
                                                $newClass->args = $args;

                                                add_action($key, function () use ($newClass, $methodName, $args) {

                                                    $newClass->$methodName($args);
                                                }, $priority);

                                            }
                                        }
                                    }

                                    if ($function == "add_filter"){
                                        if (is_array($value)){
                                            foreach ($value as $name) {
                                                $methodName = $name['method'];
                                                $args       = $name['args'];
                                                $priority   = ($name['priority']);
                                                if ($priority == "" or !is_numeric($priority) or $priority<=-1){
                                                    $priority = 10;
                                                }
                                                $newClass->args = $args;

                                                add_filter($key, function () use ($newClass, $methodName, $args) {

                                                    $newClass->$methodName($args);
                                                }, $priority);

                                            }
                                        }
                                    }

                                }
                            }
                        }
                    }
                }
            }

            if (@count($theValue['subs'])>0){
                $this->toDo($theValue['subs']);
            }

        }

    }


    function checkCanRunModul($modul, $subModul = "") {

        if ($modul == "magic-box" or strtolower($subModul) == "magicboxstaff" or strtolower($subModul) == "updateplugin" or strtolower($subModul) == "magicbox\magicbox"){
            return true;
        }

        if ($modul != ""){
            if ($this->categories[$modul]['has'] == 0){
                return false;
            }
        }

        if ($subModul != ""){
            $has = false;

            foreach ($this->categories as $key => $values) {

                if ($key == $subModul and $values['has'] == 1){
                    $has = true;
                }
                foreach ($values['subs'] as $k => $v) {
                    {
                        if ($k == $subModul and $v['has'] == 1){
                            $has = true;
                        }
                    }
                }
            }

            return $has;
        }

        return true;
    }


    function runPage() {

        global $activePassive;
        global $yesNo;

        $magicBox = $this;

        /* For Master Page */
        $modul = sanitize_text_field($_REQUEST['page']);
        $modul = str_replace("-", "_", $modul);
        /* $modul = strtolower($modul)=="magicbox"?"MagicBox\MagicBox":$modul; */
        $sub   = sanitize_text_field($_GET['sub']);
        $sub   = str_replace("-", "_", $sub);

        /* define load page */
        if ($sub != ""){
            /* if sub paremeter is not empty if is right, make it subModul */
            if ($this->categories[$modul]['subs'][$sub]['title'] != ""){
                $subModul    = $sub;
                $_GET['sub'] = "";
            }
        }

        /* For Master Page */
        $methodName = $_REQUEST['method'] == ""? "index" : magicbox_justTextNumber(esc_attr($_REQUEST['method']), "_");
        $canRun     = $this->checkCanRunModul($modul, $subModul);
        $canRun == false & $_REQUEST['is_ajax'] == "true"? die : "";

        /* For Master Page */
        if ($subModul != ""){
            $modulPath = $modul . "/" . $subModul;
            $modul     = $subModul;
        } else {
            $modulPath = $modul;
        }

        /* For Master Page */
        $categories = $this->categories;

        /* dont run same method again */
        if ($this->isRunnedMethod == false){
            /* Run Class is Has */

            $this->isRunnedMethod = $modul;

            if (class_exists($modul)){
                if (method_exists($modul, $methodName)){
                    $theClass = new $modul($this);
                    $theClass->$methodName();
                }
            }
            /* For view page */
            $options = $this->options;

            include $GLOBALS{'_mb_moduls_'} . '/masterPage.php';
        }
    }

    /* For WP Ajax Call */
    function runMethodAsPure() {

        $modul = sanitize_text_field($_REQUEST['action']);
        $modul = str_replace("-", "_", $modul);
        $modul = strtolower($modul)=="magicbox"?"MagicBox\MagicBox":$modul;

        $methodName = $_REQUEST['method'] == ""? "index" : magicbox_justTextNumber(esc_attr($_REQUEST['method']), "_");
        $canRun = $this->checkCanRunModul("", $modul);

        if ($canRun == false or method_exists($modul, $methodName) == false){
            echo json_encode(array("result" => "fail", "error" => _("Invalid Process")));
            $_REQUEST['is_ajax'] == "true"?die:"";
            return false;
        }

        $theClass = new $modul($this);
        $theClass->$methodName();
        $_REQUEST['is_ajax'] == "true"?die:"";

    }


    function caa() {

        if ($this->isMagicboxPage()){

            if (count($_POST)>0){
                add_action('init', array($this, 'userCan'));
            }
            $this->postValue = $_POST;

        }

    }


    function adminInit() {

        global $menu, $submenu, $magicBox;

        $hasMenu = false;
        foreach ($menu as $item) {
            if ($item['2'] == "magic-box"){
                $hasMenu = true;
            }
        }

        if ($hasMenu == false){
            add_menu_page('MagicBox', 'MagicBox', 'manage_options', 'magic-box', array($magicBox, 'runPage'));
            add_submenu_page('magic-box', 'MagicBox Dashboard', 'Dashboard', 'manage_options', 'magic-box', array($magicBox, 'runPage'));
        }

        foreach ($this->categories as $modulSlug => $value) {
            if ($value['has'] == 1){

                $hasMenu = false;
                foreach ($submenu['magic-box'] as $item) {
                    if ($item['2'] == $modulSlug){
                        $hasMenu = true;
                    }
                }

                if ($hasMenu == false){

                    add_submenu_page('magic-box', $value['title'], $value['title'], 'manage_options', $modulSlug, array($magicBox, 'runPage'));
                }
            }
        }

    }


    function loadModules() {

        global $menuList;

        $this->categories = $this->oldCategories == ""? array() : $this->oldCategories;

        if (@is_array($menuList)){
            foreach ($menuList as $modulSlug => $value) {

                $this->categories[$modulSlug]['title'] = $value['title'];

                $incFile = $GLOBALS{'_mb_moduls_'} . '/main/' . $modulSlug . '.php';

                if (file_exists($incFile)){
                    $this->categories[$modulSlug]['has'] = 1;
                    @include_once($incFile);
                } else {
                    if ($this->categories[$modulSlug]['has'] == 0){
                        $this->categories[$modulSlug]['has'] = 0;
                    }
                }

                /* Sub 1 */
                if (@is_array($value['subs'])){

                    $checkAllHas = count($value['subs']);

                    if (count($value['subs'])>0){
                        foreach ($value['subs'] as $modulSlugSub => $title) {

                            if (is_numeric($modulSlugSub)){
                                $modulSlugSub = $title;
                                $title        = magicbox_makeTitle2Filename($modulSlugSub);
                            }

                            $this->categories[$modulSlug]['subs'][$modulSlugSub]['title'] = $title;

                            $theSubFile = $GLOBALS{'_mb_moduls_'} . '/' . $modulSlugSub . '/index.php';
                            if (file_exists($theSubFile)){

                                if(!file_exists($theSubFile.'.demo')) {
                                $this->categories[$modulSlug]['subs'][$modulSlugSub]['has'] = 1;
                                } else {
                                    $this->categories[$modulSlug]['subs'][$modulSlugSub]['has'] = 0;
                                }
                                include_once($theSubFile);
                                $checkAllHas++;

                            } else {
                                if ($this->categories[$modulSlug]['subs'][$modulSlugSub]['has'] == 0){
                                    $checkAllHas--;
                                    $this->categories[$modulSlug]['subs'][$modulSlugSub]['has'] = 0;
                                }
                            }

                        }

                        /* Hiç birisi olmadığı için bunu yok sayıyoruz */
                        if ($checkAllHas<=0){
                            $this->categories[$modulSlug]['has'] = 0;
                        } else {
                            $this->categories[$modulSlug]['has'] = 1;
                        }

                    }
                }

            }

        }

    }


    function finalRun() {

        add_action('admin_menu', array(&$this, 'adminInit'), 99999999);

        if (@$_REQUEST['is_ajax']){
            add_action('wp_ajax_' . sanitize_text_field($_REQUEST['action']), array(&$this, 'runMethodAsPure'));
        } else {
            add_action('admin_menu', array(&$this, 'ourPropaganda'), 99999999);
        }

    }

}


?>