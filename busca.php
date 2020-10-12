<?php

ini_set("display_errors", 0);
error_reporting(E_ERROR);

use app\Busca;


require 'app/Busca.php';
require 'config.php';

header('Content-Type: text/xml; charset=utf-8');

$cep = preg_replace('/\D/', "", $_GET["cep"]);
if (strlen($cep) != 8) {
    echo json_encode(["state" => 400, "msg" => "CEP inválido", "data" => ["cep" => $cep]]);

    die();
}

$db  = new Busca();
$xml = $db->fetchCep($cep);

if (is_string($xml)) {
    echo $xml;
}
