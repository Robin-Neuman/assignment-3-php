<?php
require_once "./classes/DB.php";
require_once "./classes/Transfer.php";

session_start();
if (!empty($_POST['amount'])) {
    $trans = new Transfer(new DB());
    $trans->transferAmount($_POST['amount'], $_SESSION["userAccountNumber"], $_POST["accountNumber"]);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transfer page</title>
    <link rel="stylesheet" href="/css/bankappCss.css">
</head>

<body>
    
    <h1>How much do you wish to transfer?</h1>

    <div id="options">
    <div class="opt">    
    <form method="POST">
    <input type="number" name="amount">
    <?php
    echo '<input name="accountNumber" id="accountNumber" value="'.$_POST["accountNumber"].'" hidden>';
    ?>
    <button type="submit">Send</button>
    </form>
    </div>
    <div class="opt">      
        <a href="/transPage.php">
            Back
        </a>
    </div>
    </div>
</body>

</html>