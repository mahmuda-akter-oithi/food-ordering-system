<?php

require_once "db1.php";

$food_name;
if (isset($_GET['query'])) {
    $food_name = $_GET['query'];
} else {
    die("Query not provided");
}

$result = sql_fetch("SELECT * FROM foods WHERE name LIKE '%$food_name%' or description LIKE '%$food_name%';");

echo json_encode($result);
header('Content-Type: application/json');