<?php

$dbServername="localhost";
$dbUsn="root";
$dbPwd="Football*35";
$dbName="2018-19_robots";

$connect = mysqli_connect($dbServername, $dbUsn, $dbPwd, $dbName );
$connectPDO = new PDO("mysql:host=$dbServername;dbname=$dbName", $dbUsn, $dbPwd);
// set the PDO error mode to exception
    $connectPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>