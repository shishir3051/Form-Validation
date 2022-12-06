<?php

$host   = 'localhost';
$dbname = 'se32132a';
$dbuser = 'root';
$dbpass = '';

$con = new PDO("mysql:host={$host}; dbname={$dbname}", $dbuser, $dbpass);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>