<?php

class AuthTrans
{
    private $_db;

    public function __construct(DB $_db)
    {
        //Sets up DB link
        $this->_db = $_db->pdo;
    }

    public function authTransfer($amount, $userAccount, $targetAccount)
    {
        // Select account belonging to requesting user in db
        $sql = "SELECT * FROM account WHERE userAccountNumber = $userAccount;";
        $userAcc = $this->_db->query($sql); 
        $userBalance;        

        // Look through db object for the "balance" item
        foreach ($userAcc as $balance) 
        {
            $userBalance = $balance["balance"];
        }

        // Adds amount to target account and removes amount from requesting user's account if 
        // amount is not higher than requesting user's account balance 
        if ($userBalance >= $amount) 
        {
            $sql = "SELECT * FROM account WHERE userAccountNumber = $userAccount;";
            $userAcc = $this->_db->query($sql);
            $newUserBalance;

            foreach ($userAcc as $balance) 
            {
            $newUserBalance = $balance["balance"] -= $amount;
            }
            $sql = "UPDATE account SET balance = $newUserBalance WHERE userAccountNumber = $userAccount;";
            $statement = $this->_db->query($sql);

            $sql = "SELECT * FROM account WHERE userAccountNumber = $targetAccount;";
            $targetAcc = $this->_db->query($sql);
            $newTargetBalance;

            foreach ($targetAcc as $balance) 
            {
            $newTargetBalance = $balance["balance"] += $amount;
            }

            $sql = "UPDATE account SET balance = $newTargetBalance WHERE userAccountNumber = $targetAccount;";
            $statement = $this->_db->query($sql);
            return $statement;
        } else {
            $GLOBALS['failedReg'] = "Username already exists";
        }
        
    }
}