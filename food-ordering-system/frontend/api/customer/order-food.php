<?php
require_once './db1.php';

require_once './access.php';

$customer_id = $_SESSION["customer_id"];
$input = postJSON(['food_id', 'quantity', 'address', 'phone']);

$food_id = $input["food_id"];
$quantity = $input["quantity"];
$address = $input["address"];
$phone = $input["phone"];

$food = sql_fetch_row("SELECT name, restaurant_id, price FROM foods WHERE id = '$food_id';");

$restaurant_id = $food["restaurant_id"];
$rate = $food["price"];
$food_name = $food["name"];


if (sql(
    "INSERT INTO orders
    (customer_id, food_id, food_name, restaurant_id, quantity, rate, address, phone, order_state)
    VALUES
    ('$customer_id', '$food_id', '$food_name', '$restaurant_id', '$quantity', '$rate', '$address', $phone, 1);
"))
    echo "Order Placed";
else
    echo "Something went wrong. Try again later";
