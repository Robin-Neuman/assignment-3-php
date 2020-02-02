<?php
require_once 'DB.php';
require_once 'AuthTrans.php';

class Transfer
{
    private $_AuthTrans;
    private $_DB;

    public function __construct()
    {
        //Sets up DB link
        $dbclass = new DB();
        $this->_db = $dbclass->pdo;

        //Sets up authorization
        $this->_AuthTrans = new AuthTrans();
    }

    public function transferAmount($amount)
    {
        echo $amount;
    }
}