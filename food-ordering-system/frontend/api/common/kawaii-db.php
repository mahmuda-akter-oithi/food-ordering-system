<?php

//Default Config
const db_host = "localhost";
const db_user = "root";
const db_pass = "";
const database = "food-ordering-system";

date_default_timezone_set('Asia/Dhaka');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);




//don't edit below this section. The is the main kawaii-php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}


function post($elements)
{
  $array = [];
  foreach ($elements as $element) {
    if (isset($_POST[$element]))
      $array[$element] = $_POST[$element];
    else
      die($element . " is missing");
  }
  return $array;
}

function postJSON($elements)
{
  $jsonData = file_get_contents('php://input');
  $formData = json_decode($jsonData, true);
  $array = [];
  foreach ($elements as $element) {
    if (isset($formData[$element])) {
      $array[$element] = $formData[$element];
    } else
      die($element . " is missing");
  }
  return $array;
}

function get($elements)
{
  $array = [];
  foreach ($elements as $element) {
    if (!empty($_GET[$element]))
      $array[$element] = $_GET[$element];
    else
      die($element . " is missing");
  }
  return $array;
}


function sql($query)
{
  // global db_host, db_user, db_pass, db_name;
  
  $conn = mysqli_connect(db_host, db_user, db_pass, database);
  $result = mysqli_query($conn, $query);
  mysqli_close($conn);
  //print_r($result);
  return $result;
}

function sql_fetch($query)
{
  return mysqli_fetch_all(sql($query), MYSQLI_ASSOC);
}

function sql_fetch_row($query)
{
  $x = sql_fetch($query);
  if (count($x) == 1)
    return $x[0];
}

function match_table($table, $key_value_array = null, $parm = "*")
{
  $query = "SELECT * FROM {$table}";

  if ($key_value_array != null) {

    $conditions = [];

    foreach ($key_value_array as $key => $value)
      $conditions[] = "`$key` = '$value'";

    $query .= " WHERE " . implode(" AND ", $conditions) . ";";
  }
  return sql_fetch($query);
}

function match_row($table, $key_value_array = null, $parm = "*")
{
  $x = match_table($table, $key_value_array, $parm);
  if (count($x) == 1)
    return $x[0];
}
