<?php

$server = 'ipmysql';
$username = 'agalindo_agalindo';
$password = '*******';
$database = 'agalindo_login';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>
