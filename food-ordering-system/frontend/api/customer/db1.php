<?php

require_once 'kawaii-db.php';

$db = new kawaii_db(db_host, db_user, db_pass, database);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");