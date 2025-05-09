<?php
require_once './db1.php';

require_once './access.php';

$customer_id = $_SESSION["customer_id"];
$input = post(['food_id', 'restaurant_id', 'quantity', 'rate', 'address', 'phone']);

$food_id = $input["food_id"];
$restaurant_id = $input["restaurant_id"];
$quantity = $input["quantity"];
$rate = $input["rate"];
$address = $input["address"];
$phone = $input["phone"];

if (sql(
    "INSERT INTO orders
    (customer_id, food_id, restaurant_id, quantity, rate, address, phone, order_state)
    VALUES
    ('$customer_id', '$food_id', '$restaurant_id', '$quantity', '$rate', '$address', $phone, 1);
"))
    echo "Order Placed";
else
    echo "Something went wrong. Try again later";
