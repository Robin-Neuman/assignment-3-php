<?php
require_once 'DB.php';

class RandUser
{
    private $_db;

    public function __construct()
    {
        //Sets up DB link
        $dbclass = new DB();
        $this->_db = $dbclass->pdo;
    }

    public function getRandomUser()
    {
        $user;
        $array = array();
        $sql = "SELECT * FROM users;";
            $data = $this->_db->query($sql);

            $randomNum = rand(1, 10);
            $sql = "SELECT * FROM users WHERE id = $randomNum;";
            $randomUser = $this->_db->query($sql);
            
            foreach ($randomUser as $row) {
                array_push($array, $row["username"]);
                array_push($array, $row["accountNumber"]);
                return $array;
                
            }
            
    }
}