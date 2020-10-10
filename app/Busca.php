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

    private function parseXML(string $data)
    {
        $xml = new \SimpleXMLElement($data);
        var_dump($xml);
    }

    public function fetchCep(int $cep)
    {
        $endereco = $this->db->read("cep", ["cep" => $cep]);

        if (empty($endereco)) {
            $url = "https://viacep.com.br/ws/" . $cep . "/xml/";

            $opt = ['http' =>
                ['method' => 'GET']
            ];
            $context = stream_context_create($opt);
            $content = file_get_contents($url, false, $context);

            $this->parseXML($content);
        }
    }
}