<?php

class Transfer
{
    private $_db;

    public function __construct(DB $_db)
    {
        //Sets up DB link
        $this->_db = $_db->pdo;
    }

    public function checkBalance($amount, $userAccount)
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
        if ($userBalance >= $amount) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function transferAmount($amount, $userAccount, $targetAccount)
    {


        // Adds amount to target account and removes amount from requesting user's account if 
        // amount is not higher than requesting user's account balance        
        $authentication = $this->checkBalance($amount, $userAccount);
        // If checkBalance returns true, run transaction
        if ($authentication)
        {                
            try 
            {
            $sql = "SELECT * FROM account WHERE userAccountNumber = $userAccount;";
            $userAcc = $this->_db->query($sql);
            $newUserBalance;

            foreach ($userAcc as $balance) 
            {
                $newUserBalance = $balance["balance"] -= $amount;
            }
            // If user account can be found in DB, update user account balance
            if ($this->_db->query($sql))
            {
                    $sql = "SELECT * FROM account WHERE userAccountNumber = $targetAccount;";
                    $targetAcc = $this->_db->query($sql);
                    $newTargetBalance;
        
                        foreach ($targetAcc as $balance) 
                        {
                            $newTargetBalance = $balance["balance"] += $amount;
                        }

                            // Prepare to execute UPDATE of user balance
                            $sqlUser = "UPDATE account SET balance = :newUserBalance WHERE userAccountNumber = :userAccount;";
                            $statementUser = $this->_db->prepare($sqlUser);
                            $statementUser->bindValue(':userAccount', $userAccount, PDO::PARAM_INT);
                            $statementUser->bindValue(':newUserBalance', $newUserBalance, PDO::PARAM_INT);
                            
                            // Prepare to execute UPDATE of target balance
                            $sqlTarget = "UPDATE account SET balance = :newTargetBalance WHERE userAccountNumber = :targetAccount;";
                            $statementTarget = $this->_db->prepare($sqlTarget);
                            $statementTarget->bindValue(':newTargetBalance', $newTargetBalance, PDO::PARAM_INT);
                            $statementTarget->bindValue(':targetAccount', $targetAccount, PDO::PARAM_INT);
                    
                            // If user UPDATE executes, execute target UPDATE                    
                            if ($statementUser->execute())
                            {
                                if ($statementTarget->execute())
                                {                         
                                    $query = "INSERT INTO transactions (`from_amount`, `from_account`, `to_amount`, `to_account`, `date`) VALUES (:from_amount, :from_account, :to_amount, :to_account, :date)";
                                    $statementTrans = $this->_db->prepare($query);
                                    $statementTrans->bindValue(':from_amount', $amount, PDO::PARAM_INT);
                                    $statementTrans->bindValue(':from_account', $userAccount, PDO::PARAM_INT);           
                                    $statementTrans->bindValue(':to_amount', $amount, PDO::PARAM_INT);           
                                    $statementTrans->bindValue(':to_account', $targetAccount, PDO::PARAM_INT);    
                                    $statementTrans->bindValue(':date', date('Y-m-d H:i:s', time()), PDO::PARAM_STR);    
                                    if ($statementTrans->execute())
                                    {
                                        header("location: /successPage.php");
                                    }
                                }
                            }                                
                    }                    
                }
                catch (PDOException $e)
                    {
                        echo "Error: " . $e->getMessage() . '<br>
                        <div id="options">
                        <div class="opt">
                        <a href="/index.php">Back to home</a>
                        </div>
                        </div>';
                        die();
                    }
        }           
        else 
        {
        echo "Balance not high enough for transaction";
        }
    }
}