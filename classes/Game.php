<?php

// Class Game should implement this GameInterface
interface GameInterface {

    public function getAllGames() : array;

    // Get user games by the user id
    public function getUserGames(int $int) : array;

    // Get the best players
    public function getTopWinners(int $count) : array;

    // Get players who played the most
    public function getTopPlayers(int $count) : array;

}

class Game {

    private $db;

    function __construct(Database $db){
        $this->db = $db;
    }

    public function getAllGames() : array {
        return $this->db->select("SELECT * FROM stats");
    }

    public function getUserGames(int $int) : array {
        return $this->db->select("
                                      SELECT * FROM users
                                      JOIN stats ON users.username = stats.username
                                      WHERE users.id = :id
                                      ",
                                        ["id"=>$int]);
    }

    public function getTopWinners(int $count) : array {
        return $this->db->select("SELECT result, stats.username FROM users
                                       JOIN stats ON users.username = stats.username
                                       GROUP BY result DESC LIMIT $count");
    }

    public function getTopPlayers(int $count) : array {
        return $this->db->select("SELECT username, COUNT(username) AS Occurrence FROM stats
                                      GROUP BY username
                                      ORDER BY Occurrence DESC
                                      LIMIT $count;
                                 ");
    }
}