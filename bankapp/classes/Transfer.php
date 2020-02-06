<?php
require_once 'AuthTrans.php';

class Transfer
{
    private $_AuthTrans;

    public function __construct(DB $_db)
    {
        //Sets up authorization
        $this->_AuthTrans = new AuthTrans($_db);
    }

    public function transferAmount($amount, $userAccount, $targetAccount)
    {
            if ($this->_AuthTrans->authTransfer($amount, $userAccount, $targetAccount)) 
            {                
                header('Location: successPage.php');
            }      
            else 
            {
                echo "Not enough balance on your account";
            }      
    }
}