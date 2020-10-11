<?php

namespace app;

use app\Database;

require "Database.php";

class Busca
{
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_HOST, DB_PORT, DB_USER, DB_PSWD);
    }

    private function parseXML(string $data): array
    {
        $result = [];
        $xml    = new \SimpleXMLElement($data);

        $result["cep"]         = (string)$xml->cep[0];
        $result["logradouro"]  = (string)$xml->logradouro[0];
        $result["complemento"] = strlen($xml->complemento[0]) ? $xml->complemento[0] : null;
        $result["bairro"]      = (string)$xml->bairro[0];
        $result["localidade"]  = (string)$xml->localidade[0];
        $result["uf"]          = (string)$xml->uf[0];
        $result["ibge"]        = ((int)$xml->ibge[0] > 0) ? (int)$xml->ibge[0] : null;
        $result["gia"]         = ((int)$xml->gia[0] > 0) ? (int)$xml->gia[0] : null;
        $result["ddd"]         = ((int)$xml->ddd[0] > 0) ? (int)$xml->ddd[0] : null;
        $result["siafi"]       = ((int)$xml->siafi[0] > 0) ? (int)$xml->siafi[0] : null;

        return $result;
    }

    public function fetchCep(int $cep)
    {
        $mask     = substr($cep, 0, 5) . "-" . substr($cep, 5, 9);
        $endereco = $this->db->read("cep", ["cep" => $mask]);

        if (empty($endereco)) {
            $url     = "https://viacep.com.br/ws/" . $cep . "/xml/";
            $content = file_get_contents($url);

            $viacep = $this->parseXML($content);

            if (!$this->db->create("cep", $viacep)) {
                return "";
            }

            return $content;
        }

        $render = [];
        foreach ($endereco as $k => $v) {
            if (strlen($v) <= 0) {
                unset($endereco[$k]);
                continue;
            }

            $render[$v] = $k;
        }

        $xml = new \SimpleXMLElement('<xmlcep/>');
        array_walk_recursive($render, [$xml, 'addChild']);

        return $xml->asXML();
    }
}