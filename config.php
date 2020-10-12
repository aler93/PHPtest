<?php

$uri = "";
$exp = explode("/", $_SERVER["REQUEST_URI"]);
foreach( $exp as $dir ) {
    if( strlen($dir) > 0 ) {
        $uri .= $dir . "/";
    }
}

define("PROJECT", $uri);
define("ROOT", "./");
define("WWW", "http://" . $_SERVER["HTTP_HOST"] . "/" . PROJECT . "/");
define("CSS", WWW . "view/css/");
define("JS", WWW . "view/js/");

define("AUTHOR", "Alisson Naimayer");
define("APPNAME", "CD2Tec - Consulta CEP");
define("MAILTO", "anaimayer3@gmail.com");

define("DB_HOST", "localhost");
define("DB_PORT", "3306");
define("DB_USER", "root");
define("DB_PSWD", "thmpv77d6f");
define("DB_NAME", "cd2_naimayer");

// define("ENV_OS", "Fedora 32 5.8.12-200");
// define("ENV_PHP_VERSION", "7.4.11");
// define("ENV_MYSQLND", "mysqlnd 7.4.11");
