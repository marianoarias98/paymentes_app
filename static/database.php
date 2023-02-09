<?php

$host = "127.0.0.1";
$database = "payments_app";
$user = "root";
$password = "12345";
$port = "3307";

try{
    $conn  = new PDO("mysql: host=$host;port=$port;dbname=$database", $user, $password);
} catch(PDOException $e){
    die("PDO ERROR: ". $e);
}