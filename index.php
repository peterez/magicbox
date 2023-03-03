<?php
/*
Plugin Name: MagicBox Freemium
Plugin URI: https://wpmagicbox.com
Description: <strong>MagicBox</strong> <code>everything for wordpress</code>. Turn your website into a professional CMS system
Version: 1.2.1
Author: MagicBox
Author URI: https://wpmagicbox.com
Text Domain: magicbox
Domain Path: /languages
*/

/* Sanitizing all datas recursively with MagicboxStaff->sanitizeTextFiles method */
/* Escaping all datas recursively with MagicboxStaff->getOptionHtml method */

@ob_start();

/* Include files */
$_mb_dir_ = plugin_dir_path(__FILE__);
$_mb_url_ = plugins_url('', __FILE__);

$mbAllModulDirs = $mbAllModulDirs ==""?array():$mbAllModulDirs;

include_once($_mb_dir_ . 'system/core.php');

include_once ABSPATH . '/wp-admin/includes/file.php';
include_once ABSPATH . '/wp-admin/includes/post.php';

use MagicBox\MagicBox;

$magicBox = new MagicBox();
$magicBox->toDo();
$magicBox->finalRun();

register_activation_hook(__FILE__, array($magicBox, 'ipin'));
register_deactivation_hook(__FILE__, array($magicBox, 'ipuin'));
register_activation_hook(__FILE__, array($magicBox, 'ips'));



?>