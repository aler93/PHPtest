<?php

namespace app;

class Database
{
    private $host;
    private $port;
    private $user;
    private $pswd;
    private $base = "cd2";
    private $con;

    public function __construct($host = "localhost", $port = 3306, $user = "root", $pswd = "")
    {
        $this->host = $host;
        $this->port = $port;
        $this->user = $user;
        $this->pswd = $pswd;

        if (!$this->connect()) {
            echo "Erro ao conectar com o banco de dados.";
        }
    }

    private function connect(): bool
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->pswd, $this->base, $this->port);

        if (!$this->con) {
            return false;
        }

        return $this->con->ping();
    }

    public function read(string $table, $where = []): array
    {
        $query = "SELECT * FROM " . $table;

        if( !empty($where) ) {
            $query .= " WHERE ";
            foreach( $where as $key => $val ) {
                $query .= "{$key} = {$val} AND";
            }

            $query = substr($query, 0, -5);
        }

        $row = $this->con->query($query);
        if ($row->num_rows <= 0) {
            return [];
        }

        return [];
    }

    public function create(string $table, array $columns): bool
    {
        if (strlen($table) <= 0) {
            return false;
        }

        if (count($columns) <= 0) {
            return false;
        }

        return true;
    }
}
