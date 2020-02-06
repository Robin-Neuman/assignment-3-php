<?php

class Fetch
{
    private $_db;

    public function __construct(DB $_db)
    {
        //Sets up DB link
        $this->_db = $_db->pdo;
    }

    public function getUserBalance($userAccountNumber)
    {
            $sql = "SELECT * FROM account WHERE userAccountNumber = $userAccountNumber;";
            $userBalance = $this->_db->query($sql);
            $balance;
            foreach ($userBalance as $row) {
                $balance = $row["balance"];                 
            }   
            return $balance;         
    }
}