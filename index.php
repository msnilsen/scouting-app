<?php
session_start();
if (isset($_SESSION["botId"])) {
    unset($_SESSION["botId"]);
}
$letsDoThis = true;
if ($letsDoThis) {
    include("title.php");
}
else {
    include("down.php");
}
?>