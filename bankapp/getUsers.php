<?php

require_once "./classes/DB.php";

    $dbclass = new DB();
    $_db = $dbclass->pdo;

            $sql = "SELECT * FROM users;";
            $users = $_db->query($sql);
            echo '<ul>';
            $randNumber = RAND(1, 1000000);
            foreach ($users as $row) {
                echo 
                '<form action="/transRedirectPage.php" method="POST">
                <li>
                    <div id="userAccounts">
                    <input value="'.$row["accountNumber"].'" name="accountNumber" hidden>
                    <p><span class="boldType">Name:</span> ' .$row["firstName"]. ' ' .$row["lastName"].'</p>
                    <p><span class="boldType">Account number:</span> ' .$row["accountNumber"]. ' <button type="submit">Make transfer</button></p>
                    </div>
                </li>
                </form>';
            }
            echo '</ul>';
            