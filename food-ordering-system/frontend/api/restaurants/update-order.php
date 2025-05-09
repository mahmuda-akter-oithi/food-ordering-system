<?php

require_once "db1.php";
require_once './access.php';

$input = postJSON(["order_id", "state"]);

$order_id = $input['order_id'];
$state = $input['state'];
$restaurant_id = $_SESSION["restaurants_id"];

if (!($state >= 0 && $state <= 3))
    die("Invalid state");

$result = sql_fetch_row("SELECT * FROM orders WHERE 
id = '$order_id' AND restaurant_id = '$restaurant_id';");

if ($result) {
    $result = sql("UPDATE orders
        SET order_state = '$state'
        WHERE 
        id = '$order_id' AND restaurant_id = '$restaurant_id';"
    );
    if ($result)
        echo "Order state updated";
    else
        echo "Something went wrong";
} else {
    echo "You don't have any such orders";
}
