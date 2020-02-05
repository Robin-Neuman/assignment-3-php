<?php
require_once 'AuthTrans.php';

class Transfer
{
    private $_AuthTrans;

    public function __construct()
    {
        //Sets up authorization
        $this->_AuthTrans = new AuthTrans();
    }

    public function transferAmount($amount, $userAccount, $targetAccount)
    {
            if ($this->_AuthTrans->authTransfer($amount, $userAccount, $targetAccount)) 
            {
                
                header('Location: successPage.php');
            }      
            else 
            {
                echo "Not enough balance";
            }      
    }
}