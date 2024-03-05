<?php
// host
$host = 'http://localhost';

//db conn
$db_name = 'inventory-manegement';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';

try {
  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
} catch (\Throwable $th) {
  throw $th;
}