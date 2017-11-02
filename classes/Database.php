<?php

class Database {

    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "dice_game";

    private $connection;

    // This method connects to database
    function __construct() {
        try {
            $this->connection = new PDO("mysql:host=" . $this->hostname .";dbname=" . $this->database . ";charset=utf8", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // This method allows us to select data from database
    public function select(string $sql, array $param=[]) : array {
        // example SELECT * FROM users WHERE id = :id
        $stmt = $this->connection->prepare($sql);
        // example $param = ["id" => 666];
        $stmt->execute($param);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    // This method allows us to insert information into database
    public function insert(string $sql, array $param=[]){
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($param);
        echo $this->connection->lastInsertId();

    }

    public function remove(string $sql, array $param=[]) : bool {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($param);
    }
    function __destruct() {
        $this->connection = null;
    }
}