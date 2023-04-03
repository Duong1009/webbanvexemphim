<?php

class DB{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "ql_ve_xem_phim";

    protected function connect() {
        $conn = 'mysql:host='.$this->host.';dbname='.$this->dbname.';charset=utf8';
        $pdo = new PDO($conn, $this->username, $this->password);
        $pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    }
}