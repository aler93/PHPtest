<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

use app\Busca;


require 'app/Busca.php';
require 'config.php';

header('Content-Type: text/json; charset=utf-8');

$cep = preg_replace('/\D/', "", $_GET["cep"]);
if (strlen($cep) != 8) {
    echo json_encode(["state" => 400, "msg" => "CEP inválido", "data" => ["cep" => $cep]]);

    die();
}


$db = new Busca();
$db->fetchCep($cep);

//echo json_encode(["state" => 200, "msg" => "end", "data" => []]);
