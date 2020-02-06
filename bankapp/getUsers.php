<?php

require_once "./classes/DB.php";

    $dbclass = new DB();
    $_db = $dbclass->pdo;

            $sql = "SELECT * FROM users;";
            $users = $_db->query($sql);
            $array = array();
            foreach ($users as $data) {
                $data;
                $data = array(
                    'firstName' => $data['firstName'],
                    'lastName' => $data['lastName'],
                    'accountNumber' => $data['accountNumber']
                );
                array_push($array, $data);
            }
            echo $array = json_encode(array("users" => $array));            