<?php

require_once "db1.php";

$user = postJSON(["email", "password", "name", "address"]);

$email = $user['email'];
$password = $user['password'];
$name = $user['name'];
$address = $user['address'];

$result = sql_fetch_row("SELECT * FROM restaurants WHERE email='$email';");

if ($result) {
    echo json_encode(['state' => '2']);
    session_destroy();
} else {
    $result = sql("INSERT INTO restaurants
        (`email`, `password`, `name`, `address`)
        VALUES
        ('$email', '$password', '$name', '$address');"
    );

    if ($result) {
        echo json_encode(['state' => '1']);
    } else {
        echo json_encode(['state' => '0']);
        session_destroy();
    }
}

header('Content-Type: application/json');
