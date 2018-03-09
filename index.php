<?php
$letsDoThis = false;
session_start();
$_SESSION['isUp'] = $letsDoThis;
if (isset($_SESSION["botId"])) {
    unset($_SESSION["botId"]);
}
if (isset($_SESSION["loggedIn"])) {
    unset($_SESSION["loggedIn"]);
}
if ($letsDoThis) {
    include("title.php");
}
else {
    include("down.php");
}
?>