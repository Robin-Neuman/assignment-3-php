<?php
require_once 'DB.php';

class AuthTrans
{
    private $_DB;

    public function __construct()
    {
        //Sets up DB link
        $dbclass = new DB();
        $this->_db = $dbclass->pdo;
    }

    public function authTransfer($amount)
    {
        echo $amount;
    }
}