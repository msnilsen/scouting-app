<?php
session_start();
include("../includes/connect.php");
include("functions.php");

$rows = 0;
if (!isset($_SESSION['teamId']) && !isset($_SESSION['botId'])) {
    header("Location: /scouting_main_roundAdd.php?empty_inputs");
}
elseif (isset($_SESSION['teamId']) && isset($_SESSION['botId'])) {
}
elseif (isset($_SESSION['teamId']) && isset($_POST['teamBot'])) {
    $_SESSION['botId'] = $_POST['teamBot'];
}
header("Location: /scouting_main_roundAdd2.php");
?>