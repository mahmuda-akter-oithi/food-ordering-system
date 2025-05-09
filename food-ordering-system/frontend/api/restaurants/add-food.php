<?php
require_once './db1.php';
require_once './access.php';
header('Content-Type: application/json');

$restaurant_id = $_SESSION["restaurants_id"];
$input = postJSON(['name', 'price', 'description', 'photo_link']);

$name = $input["name"];
$price = $input["price"];
$description = $input["description"];
$photo_link = $input["photo_link"];

if (sql(
    "INSERT INTO foods
    (restaurant_id, name, price, description, photo_link)
    VALUES
    ('$restaurant_id' ,'$name', '$price', '$description', '$photo_link');"
))
    echo '{"state": "1"}'; //state 1 means food added
else
    echo '{"state": "2"}'; //state 2 means try again
