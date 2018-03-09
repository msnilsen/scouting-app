<?php

$dbServername="localhost";
$dbUsn="u339075805_4189";
$dbPwd="300million";
$dbName="u339075805_a";

$connect = mysqli_connect($dbServername, $dbUsn, $dbPwd, $dbName );
$connectPDO = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsn, $dbPwd);
// set the PDO error mode to exception
    $connectPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>