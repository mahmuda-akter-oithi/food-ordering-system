<?php

require_once "db1.php";

$user = postJSON(["email", "password", "name", "date_of_birth", "address", "phone"]);

$email = $user['email'];
$password = $user['password'];
$name = $user['name'];
$date_of_birth = $user['date_of_birth'];
$address = $user['address'];
$phone = $user['phone'];

$result = sql_fetch_row("SELECT * FROM customers WHERE email='$email';");

if ($result) {
    echo json_encode(['state' => '2']); //state 2 means user already exists
    session_destroy();
} else {
    $result = sql(
        "INSERT INTO customers
        (`email`, `password`, `name`, date_of_birth, `address`, `phone`)
        VALUES
        ('$email', '$password', '$name', '$date_of_birth', '$address', '$phone');"
    );

    if ($result) {
        echo json_encode(['state' => '1']); //state 1 means registration success
    } else {
        echo json_encode(['state' => '0']); //state 0 means registration failed
        session_destroy();
    }
}

header('Content-Type: application/json');
