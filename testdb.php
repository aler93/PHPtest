<?php

ini_set("display_errors", 0);
error_reporting(E_ERROR);

use app\Database;


require 'app/Database.php';
require 'config.php';
require 'helper.php';

header('Content-Type: text/plain; charset=utf-8');

$db  = new Database(DB_HOST, DB_PORT, DB_USER, DB_PSWD, DB_NAME);
$status = "";

if( !$db->status["link"] ) {
    echo $db->status["status"] . "Não será possível fazer pesquisas.";
}
