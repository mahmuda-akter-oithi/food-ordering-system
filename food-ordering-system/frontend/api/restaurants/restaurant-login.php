<?php

require_once "db1.php";

$user = postJSON(["email", "password"]);

$email = $user['email'];
$password = $user['password'];

$result =
    sql_fetch_row("SELECT * FROM restaurants WHERE email='$email' AND password='$password';");



if ($result) {
    echo json_encode(['state' => '1']);
    $_SESSION["restaurants_id"] = $result["id"];
    $_SESSION["name"] = $result["name"];
} else {

    echo json_encode(['state' => '0']);
    session_destroy();
}
header('Content-Type: application/json');
