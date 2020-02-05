<?php 

if (!isset($_SESSION["username"])) {
$_SESSION["username"] = $randUser;
}
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account</title>
</head>

<body>
    <h1>Welcome to the account page!</h1>

    <h3>Current balance: 412412</h3>

    <div>
    <a href="index.php">
        Home
    </a>
    </div>
    <div>
    <a href="transPage.php">
        Make transaction
    </a>
    </div>
</body>

</html>