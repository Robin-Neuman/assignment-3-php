<?php 
require_once "./classes/DB.php";
require_once "./classes/Fetch.php";

$fetch = new Fetch(new DB());

session_start();

if (isset($_SESSION["userAccountNumber"])) {    
    $userAccountNumber = $_SESSION["userAccountNumber"];
    $GLOBALS["userBalance"] = $fetch->getUserBalance($userAccountNumber);
}
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account</title>
    <link rel="stylesheet" href="/css/bankappCss.css">
</head>

<body>
    <h1>Welcome to the account page <span class="boldType"><?php if (isset($_SESSION["username"])) echo $_SESSION["username"]; ?>!</h1>

    <h3><span class="boldType">Current balance:</span> <?php if (isset($GLOBALS["userBalance"])) echo $GLOBALS["userBalance"]; ?></h3>

    <div id="options">
        <div class="opt">
            <a href="index.php">
                Home
            </a>
        </div>
        <div class="opt">
            <a href="transPage.php">
                Make transaction
            </a>
        </div>
    </div>
</body>

</html>