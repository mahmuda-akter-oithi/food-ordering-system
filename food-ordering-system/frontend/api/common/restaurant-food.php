<?php

require_once "db1.php";
$inputs = get(['restaurant_id']);
$restaurant_id = $inputs['restaurant_id'];

$result = sql_fetch("SELECT * FROM foods WHERE restaurant_id = '$restaurant_id';");

echo json_encode($result);
header('Content-Type: application/json');