<?php
session_start();
if (isset($_SESSION["customer_id"]) && isset($_SESSION["name"]))
    echo '{ "state": "1" }'; //state 1 means already logged in
else
echo '{ "state": "0" }'; //state 0 means login required

header('Content-Type: application/json');
