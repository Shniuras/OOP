<?php

interface UserInterface {
    public function getAllUsers() : array;
    public function getUserById(int $id) : array;
    public function getUserByUsername(string $username) :array;
    public function addUser(string $username, string $password) :int;
    public function removeUser(int $id) : bool;
}

class User implements UserInterface {

    private $db;

    function __construct(Database $db){
        $this->db = $db;
    }

    public function getAllUsers() : array {
        return $this->db->select("SELECT id,username FROM users");
    }

    public function getUserById(int $id) : array {
        return $this->db->select("SELECT * FROM users WHERE id = :id", ["id" => $id]);
    }

    public function getUserByUsername(string $username): array {
        return $this->db->select("SELECT * FROM users WHERE username = :username" , ["username" => $username]);
    }

    public function addUser(string $username, string $password): int {
        echo $this->db->insert("INSERT INTO users (username, password) VALUES (:username, :password)",
            [
                "username" => $username,
                "password" => password_hash($password,PASSWORD_DEFAULT)
            ]);
    }

    public function removeUser(int $id): bool{
        return $this->db->remove("DELETE FROM users WHERE id = :id", ["id" => $id]);
    }
}