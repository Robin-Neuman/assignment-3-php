<?php

session_start();

echo '<input id="accountNumber" value="'.$_SESSION["userAccountNumber"].'" hidden>';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transfer page</title>
    <script src="./js/request.js"></script>
    <link rel="stylesheet" href="/css/bankappCss.css">
</head>

<body>
    <h1>Welcome to the transfer page!</h1>

    <div id="options">
        <div class="opt">
            <a href="index.php">
                Home
            </a>
        </div>
        <div class="opt">
            <a href="account.php">
                Your account
            </a>
        </div>
    </div>

    <h3>List of account holders to transfer to:</h3>

    <div id="accContainer">
    </div>
</body>

</html>