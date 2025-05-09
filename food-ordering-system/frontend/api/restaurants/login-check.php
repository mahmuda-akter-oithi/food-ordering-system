<?php
session_start();
if (isset($_SESSION["restaurants_id"]) && isset($_SESSION["name"]))
    echo '{ "state": "1" }';
else
echo '{ "state": "0" }';

header('Content-Type: application/json');
