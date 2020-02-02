<?php

require_once "./classes/transfer.php";

$trans = new Transfer();

if (!empty($_POST['amount'])) {
        $trans->transferAmount($_POST['amount']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transfer page</title>
</head>

<body>
    <h1>How much do you wish to transfer?</h1>
    <form action="transRedirectPage.php" method="POST">
    <input type="number" name="amount">
    <button type="submit">Send</button>
    </form>
        
    
    <a href="transPage.php">
        <h3>Back</h3>
    </a>
</body>

</html>