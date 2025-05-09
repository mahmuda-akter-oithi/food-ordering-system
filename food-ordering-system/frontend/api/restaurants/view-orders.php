<?php

require_once "db1.php";
require_once './access.php';

$restaurant_id = $_SESSION['restaurants_id'];

$result = sql_fetch("SELECT * FROM orders WHERE restaurant_id = '$restaurant_id';");

echo json_encode($result);
header('Content-Type: application/json');