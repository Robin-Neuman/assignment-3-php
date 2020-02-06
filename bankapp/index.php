<?php 
require_once "./classes/RandUser.php";

$random = new RandUser();

$randUser;

session_start();

if (!isset($_SESSION["username"])) {
    if ($randUser = $random->getRandomUser()) 
    {
        $_SESSION["username"] = $randUser[0];
        $_SESSION["userAccountNumber"] = $randUser[1]; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bank page</title>
    <link rel="stylesheet" href="/css/bankappCss.css">
</head>
<body>
    <div id="welcomeMsg">
        <h1>Welcome to the bank page <span class="boldType"><?php if (isset($_SESSION["username"])) echo $_SESSION["username"]; ?></span>!</h1>
    </div>

    <div id="options">
        <div class="opt">
            <a href="account.php">
                Your account
            </a>
        </div>
        <div class="opt">
            <a href="transPage.php">
                Make transaction
            </a>
        </div>
        <div class="opt">
            <a href="logout.php">Randomize user</a>
        </div>
    </div>
</body>

</html>