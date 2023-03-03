<?php
/* Defines */


$_mb_system_ = $_mb_dir_ . "system";
$_mb_functions_ = $_mb_system_ . "/functions";
$_mb_ext_ = $_mb_system_ . "/ext";
$_mb_helpers_ = $_mb_system_ . "/helpers";
$_mb_cache_ = $_mb_ext_ . "/cache";
$_mb_model_ = $_mb_dir_ . "model";
$_mb_app_ = $_mb_dir_ . "app";
$_mb_moduls_ = $_mb_app_ . "/moduls";
$_mb_assets_url_ = $_mb_url_."/assets";
$_mb_icon_url_ = $_mb_url_."/assets/icon";
$_mb_ext_url_ = $_mb_url_ . "/system/ext";
$_mb_assets_img_ = $_mb_url_. "/assets/img";
$_mb_assets_loading_gifs_ =  $_mb_assets_img_ . "/loading-gifs";

$mbAllModulDirs[] = $_mb_moduls_;

$GLOBALS{'_mb_helpers_'} = $GLOBALS{'_mb_helpers_'}==""?$_mb_helpers_:$GLOBALS{'_mb_helpers_'};
$GLOBALS{'_mb_ext_'} = $GLOBALS{'_mb_ext_'}==""?$_mb_ext_:$GLOBALS{'_mb_ext_'};


/* Includes */
include_once($_mb_functions_ . '/functions.php');
include_once($_mb_functions_ . '/date.php');

/* Helpers */
include_once($GLOBALS{'_mb_helpers_'} . '/cacheDriverManager.php');
include_once($GLOBALS{'_mb_helpers_'} . '/googleAuthenticator.php');
include_once($GLOBALS{'_mb_helpers_'} . '/sendgrid.php');
include_once($GLOBALS{'_mb_helpers_'} . '/phpMail.php');

/* Model */
include_once($_mb_model_ . '/magicboxStaff.php');
include_once($_mb_model_ . '/magicbox.php');

/* Dashboard */
include_once($_mb_moduls_ . '/index.php');


$pluginUrl = plugins_url("magicbox");
$pluginExt = $pluginUrl."/system/ext";
$extCss = $pluginExt."/css";


$activePassive = array(
    "1" => _("Active"),
    "2" => _("Passive")
);

$yesNo = array(
    "1" => _("Yes"),
    "2" => _("No")
);

$menuIcons = array(
    "mb_code_manager" => "bi bi-terminal",
    "mb_security" => "bi bi-umbrella",
    "mb_seo" => "bi bi-search",
    "mb_settings" => "bi bi-gear",
    "mb_information" => "bi bi-lightbulb",
    "mb_design" => "bi bi-palette",
    "mb_speed" => "bi bi-speedometer",
    "mb_admin_panel" => "bi bi-display",
    "mb_marketing" => "bi bi-shop-window",
    "mb_contact" => "bi bi-at",
    "mb_faq" => "bi bi-question-circle",
    "mb_documentation" => "bi bi-journal-code",
);


$menuList = array(
    "mb_admin_panel" => array(
        "title" => _("Admin Panel"),
        "subs" => array(
            "mb_user_permissions",
            "mb_admin_menu_manager",
            "mb_custom_dashboard",
            "mb_custom_login",
            "mb_clone_manager",
            "mb_maintenance_mode",
            "mb_user_switch",
            "mb_white_label",
            "mb_gutenberg_editor",
        )
    ),

    "mb_code_manager" => array(
        "title" => _("Code Manager"),
        "subs" => array(
            "mb_code_insert_manager",
            "mb_htaccess_editor",
            "mb_userini_editor",
            "mb_tracking_codes",
        )
    ),
    "mb_security" => array(
        "title" => _("Security"),
        "subs" => array(
            "mb_captcha",
            "mb_google_authenticator",
            "mb_login_url",
            "mb_visit_limitation"
        )
    ),
    "mb_seo" => array(
        "title" => _("Seo"),
        "subs" => array(
            "mb_custom_redirects",
            "mb_duplicate_manager",
            "mb_error_page_manager",
            "mb_error_redirects",
            "mb_robot_txt_editor",
            "mb_seo_image",
            "mb_site_redirects",
            "mb_sitemap",
            "mb_url_replacement",
            "mb_keyword_suggestion",
            "mb_bulk_image_resize",
            "mb_image_upload_optimiser",
        )
    ),

    "mb_settings" => array(
        "title" => _("Settings"),
        "subs" => array(
            "mb_backup_manager",
            "mb_comment_manager",
            "mb_disqus_comment",
            "mb_post_authentication"
        )
    ),
    "mb_information" => array(
        "title" => _("Information"),
        "subs" => array(
            "mb_error_logs",
            "mb_php_information",
            "mb_login_logs"
        )
    ),
    "mb_design" => array(
        "title" => _("Design"),
        "subs" => array(
            "mb_cookie_policy",
            "mb_custom_css",
            "mb_fancybox",
            "mb_live_search",
            "mb_popup",
            "mb_preloader",
        )
    ),
    "mb_speed" => array(
        "title" => _("Speed"),
        "subs" => array(
            "mb_cache_manager",
            "mb_database_repair",
            "mb_lazyload"
        )
    ),

    "mb_marketing" => array(
        "title" => _("Marketing"),
        "subs" => array(
            "mb_bulk_mail"
        )
    ),
    "mb_contact" => array(
        "title" => _("Contact"),
        "subs" => array(
            "mb_form_builder",
            "mb_contact_buttons",
            "mb_smtp"
        )
    ),

);

$lkrp  = array(
    "is_end" => "1",
    "result" => "fail",
    "end_date" => "N/A",
    "msg" => __(base64_decode("WW91ciBsaWNlbmNlIGtleSBpcyBpbnZhbGlkLiBQbGVhc2UgY2hlY2sgeW91ciBsaWNlbmNlIGtleQ=="), "magicbox")
);


$mimeTypes = array
(
    "application/bmp" => "bmp",
    "application/cdr" => "cdr",
    "application/coreldraw" => "cdr",
    "application/excel" => "xl",
    "application/gpg-keys" => "gpg",
    "application/java-archive" => "jar",
    "application/json" => "json",
    "application/mac-binary" => "bin",
    "application/mac-binhex" => "hqx",
    "application/mac-binhex40" => "hqx",
    "application/mac-compactpro" => "cpt",
    "application/macbinary" => "bin",
    "application/msexcel" => "xls",
    "application/msword" => "doc",
    "application/octet-stream" => "pdf",
    "application/oda" => "oda",
    "application/ogg" => "ogg",
    "application/pdf" => "pdf",
    "application/pgp" => "pgp",
    "application/php" => "php",
    "application/pkcs-crl" => "crl",
    "application/pkcs10" => "p10",
    "application/pkcs7-mime" => "p7c",
    "application/pkcs7-signature" => "p7s",
    "application/pkix-cert" => "crt",
    "application/pkix-crl" => "crl",
    "application/postscript" => "ai",
    "application/powerpoint" => "ppt",
    "application/rar" => "rar",
    "application/s-compressed" => "zip",
    "application/smil" => "smil",
    "application/videolan" => "vlc",
    "application/vnd.google-earth.kml+xml" => "kml",
    "application/vnd.google-earth.kmz" => "kmz",
    "application/vnd.mif" => "mif",
    "application/vnd.mpegurl" => "m4u",
    "application/vnd.ms-excel" => "xlsx",
    "application/vnd.ms-office" => "ppt",
    "application/vnd.ms-powerpoint" => "ppt",
    "application/vnd.msexcel" => "csv",
    "application/vnd.openxmlformats-officedocument.presentationml.presentation" => "pptx",
    "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" => "xlsx",
    "application/vnd.openxmlformats-officedocument.wordprocessingml.document" => "docx",
    "application/wbxml" => "wbxml",
    "application/wmlc" => "wmlc",
    "application/x-binary" => "bin",
    "application/x-binhex40" => "hqx",
    "application/x-bmp" => "bmp",
    "application/x-cdr" => "cdr",
    "application/x-compress" => "z",
    "application/x-compressed" => "7zip",
    "application/x-coreldraw" => "cdr",
    "application/x-director" => "dcr",
    "application/x-dos_ms_excel" => "xls",
    "application/x-dvi" => "dvi",
    "application/x-excel" => "xls",
    "application/x-gtar" => "gtar",
    "application/x-gzip" => "gzip",
    "application/x-gzip-compressed" => "tgz",
    "application/x-httpd-php" => "php",
    "application/x-httpd-php-source" => "php",
    "application/x-jar" => "jar",
    "application/x-java-application" => "jar",
    "application/x-javascript" => "js",
    "application/x-mac-binhex40" => "hqx",
    "application/x-macbinary" => "bin",
    "application/x-ms-excel" => "xls",
    "application/x-msdownload" => "exe",
    "application/x-msexcel" => "xls",
    "application/x-pem-file" => "pem",
    "application/x-photoshop" => "psd",
    "application/x-php" => "php",
    "application/x-pkcs10" => "p10",
    "application/x-pkcs12" => "p12",
    "application/x-pkcs7" => "rsa",
    "application/x-pkcs7-certreqresp" => "p7r",
    "application/x-pkcs7-mime" => "p7c",
    "application/x-pkcs7-signature" => "p7a",
    "application/x-rar" => "rar",
    "application/x-rar-compressed" => "rar",
    "application/x-shockwave-flash" => "swf",
    "application/x-stuffit" => "sit",
    "application/x-tar" => "tar",
    "application/x-troff-msvideo" => "avi",
    "application/x-win-bitmap" => "bmp",
    "application/x-x509-ca-cert" => "crt",
    "application/x-x509-user-cert" => "pem",
    "application/x-xls" => "xls",
    "application/x-zip" => "zip",
    "application/x-zip-compressed" => "zip",
    "application/xhtml+xml" => "xhtml",
    "application/xls" => "xls",
    "application/xml" => "xml",
    "application/xspf+xml" => "xspf",
    "application/zip" => "zip",
    "audio/ac3" => "ac3",
    "audio/aiff" => "aif",
    "audio/midi" => "mid",
    "audio/mp3" => "mp3",
    "audio/mp4" => "m4a",
    "audio/mpeg" => "mp3",
    "audio/mpeg3" => "mp3",
    "audio/mpg" => "mp3",
    "audio/ogg" => "ogg",
    "audio/wav" => "wav",
    "audio/wave" => "wav",
    "audio/x-acc" => "aac",
    "audio/x-aiff" => "aif",
    "audio/x-au" => "au",
    "audio/x-flac" => "flac",
    "audio/x-m4a" => "m4a",
    "audio/x-ms-wma" => "wma",
    "audio/x-pn-realaudio" => "ram",
    "audio/x-pn-realaudio-plugin" => "rpm",
    "audio/x-realaudio" => "ra",
    "audio/x-wav" => "wav",
    "font/otf" => "otf",
    "font/ttf" => "ttf",
    "font/woff" => "woff",
    "font/woff2" => "woff2",
    "image/bmp" => "bmp",
    "image/cdr" => "cdr",
    "image/gif" => "gif",
    "image/jp2" => "jp2",
    "image/jpeg" => "jpeg",
    "image/jpm" => "jp2",
    "image/jpx" => "jp2",
    "image/ms-bmp" => "bmp",
    "image/pjpeg" => "jpeg",
    "image/png" => "png",
    "image/svg+xml" => "svg",
    "image/tiff" => "tiff",
    "image/vnd.adobe.photoshop" => "psd",
    "image/vnd.microsoft.icon" => "ico",
    "image/webp" => "webp",
    "image/x-bitmap" => "bmp",
    "image/x-bmp" => "bmp",
    "image/x-cdr" => "cdr",
    "image/x-ico" => "ico",
    "image/x-icon" => "ico",
    "image/x-ms-bmp" => "bmp",
    "image/x-png" => "png",
    "image/x-win-bitmap" => "bmp",
    "image/x-windows-bmp" => "bmp",
    "image/x-xbitmap" => "bmp",
    "message/rfc822" => "eml",
    "multipart/x-zip" => "zip",
    "text/calendar" => "ics",
    "text/comma-separated-values" => "csv",
    "text/css" => "css",
    "text/html" => "html",
    "text/json" => "json",
    "text/php" => "php",
    "text/plain" => "txt",
    "text/richtext" => "rtx",
    "text/rtf" => "rtf",
    "text/srt" => "srt",
    "text/vtt" => "vtt",
    "text/x-comma-separated-values" => "csv",
    "text/x-log" => "log",
    "text/x-php" => "php",
    "text/x-scriptzsh" => "zsh",
    "text/x-vcard" => "vcf",
    "text/xml" => "xml",
    "text/xsl" => "xsl",
    "video/3gp" => "3gp",
    "video/3gpp" => "3gp",
    "video/3gpp2" => "3g2",
    "video/avi" => "avi",
    "video/mj2" => "jp2",
    "video/mp4" => "mp4",
    "video/mpeg" => "mpeg",
    "video/msvideo" => "avi",
    "video/ogg" => "ogg",
    "video/quicktime" => "mov",
    "video/vnd.rn-realvideo" => "rv",
    "video/webm" => "webm",
    "video/x-f4v" => "f4v",
    "video/x-flv" => "flv",
    "video/x-ms-asf" => "wmv",
    "video/x-ms-wmv" => "wmv",
    "video/x-msvideo" => "avi",
    "video/x-sgi-movie" => "movie",
    "zz-application/zz-winassoc-cdr" => "cdr",
);



?>