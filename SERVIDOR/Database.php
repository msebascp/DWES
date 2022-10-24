<?php
use FFI\Exception;
    class Database  {
        private $user;
        private $password;
        private $host;
        private $port;
        private $name;
        private $pdo;
        //CONSTRUCTOR
        public function __construct($user, $password, $host, $port, $name) {
            $this->user = $user;
            $this->password = $password;
            $this->host = $host;
            $this->port = $port;
            $this->name = $name;

            $dsn = 'mysql:host=' . $host . ';port=' . $port . ';dbname=' . $name;
            $this->pdo = new PDO($dsn, $user, $password);
        }
        //METODOS
        public function query($query) {
            try {
                $consulta = $this->pdo->query($query);
                return $consulta->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                return null;
            }
        }
    }
?>