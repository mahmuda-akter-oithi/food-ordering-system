<?php

require_once "db1.php";

$food_id = get(['food_id'])['food_id'];

$result = sql_fetch_row("SELECT * FROM foods WHERE id = '$food_id';");

echo json_encode($result);
header('Content-Type: application/json');