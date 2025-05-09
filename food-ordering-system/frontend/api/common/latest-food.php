<?php


require_once "db1.php";

$result = sql_fetch("SELECT * FROM foods ORDER BY id DESC LIMIT 10;");

echo json_encode($result);
header('Content-Type: application/json');