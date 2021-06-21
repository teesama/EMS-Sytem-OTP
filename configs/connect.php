<?php
// $host = "https://c2a2d16869a2.ngrok.io/";
$host = "localhost";
$user = "root";
$pass = "";
$database = "ems_db";

try {
    $dbcon = new PDO("mysql:host=$host;dbname=$database", $user, $pass);
    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOEXCEPTION $e) {
    $e->getMessage();
}

?>