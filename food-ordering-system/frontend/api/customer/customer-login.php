<?php

require_once "db1.php";

$user = postJSON(["email", "password"]);


$email = $user['email'];
$password = $user['password'];

$result =
    sql_fetch_row("SELECT * FROM customers WHERE email='$email' AND password='$password';");



if ($result) {
    echo json_encode(['state' => '1']); //state 1 means login success
    $_SESSION["customer_id"] = $result["id"];
    $_SESSION["name"] = $result["name"];
} else {
    echo json_encode(['state' => '0']); //state 0 means login failure 
    session_destroy();
}

header('Content-Type: application/json');
