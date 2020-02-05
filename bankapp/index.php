<?php 
require_once "./classes/RandUser.php";

$random = new RandUser();

session_start();

if (!isset($_SESSION["username"])) {
$randUser = $random->getRandomUser();

$_SESSION["username"] = $randUser[0];
$_SESSION["userAccountNumber"] = $randUser[1];
echo $_SESSION["userAccountNumber"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bank page</title>
</head>
<body>
    <h1>Welcome to the bank page <?php echo $_SESSION["username"]; ?>!</h1>

    <div>
        <a href="account.php">
        Your account
        </a>
    </div>
    <div>
        <a href="transPage.php">
        Make transaction
        </a>
    </div>
    <div>
        <a href="logout.php">Randomize user</a>
    </div>
</body>

</html>