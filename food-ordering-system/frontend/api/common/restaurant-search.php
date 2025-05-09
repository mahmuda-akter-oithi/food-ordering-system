<?php

require_once "db1.php";

$restaurant_name = get(['restaurant_name'])['restaurant_name'];

$result = sql_fetch("SELECT id, name, address, email, description FROM restaurants WHERE name LIKE '%$restaurant_name%';");

echo json_encode($result);
header('Content-Type: application/json');