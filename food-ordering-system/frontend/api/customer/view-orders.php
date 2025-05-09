<?php

require_once "db1.php";
require_once './access.php';

$customer_id = $_SESSION['customer_id'];

$result = sql_fetch("SELECT * FROM orders WHERE customer_id = '$customer_id';");

echo json_encode($result);
header('Content-Type: application/json');