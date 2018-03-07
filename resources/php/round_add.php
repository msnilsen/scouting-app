<?php
session_start();
include("../includes/connect.php");
include("functions.php");
if (!isset($_SESSION['teamId'])|| !isset($_SESSION['botId']) || !isset($_POST['scaleAutoBoxes'])
    || !isset($_POST['switchAutoBoxes']) || !isset($_POST['exchangeAutoBoxes']) || !isset($_POST['scaleBoxes'])
    || !isset($_POST['switchBoxes']) || !isset($_POST['exchangeBoxes']) || !isset($_POST['totalPoints']) || !isset($_POST['path'])) {
    header("Location: /scouting_main_roundAdd2.php?empty_inputs");
}
else {
    $teamId = $_SESSION['teamId'];
    $botId = $_SESSION['botId'];
    $scaleAutoBoxes = $_POST['scaleAutoBoxes'];
    $switchAutoBoxes = $_POST['switchAutoBoxes'];
    $exchangeAutoBoxes = $_POST['exchangeAutoBoxes'];
    $scaleBoxes = $_POST['scaleBoxes'];
    $switchBoxes = $_POST['switchBoxes'];
    $exchangeBoxes = $_POST['exchangeBoxes'];
    $totalPoints = $_POST['totalPoints'];
    $path = $_POST['path'];
    $survived = $_POST['survived'];
    
    $query = "insert into roundstats (teamId, botId, scaleAutoBoxes, switchAutoBoxes, exchangeAutoBoxes, scaleBoxes, switchBoxes, exchangeBoxes, totalPoints, path, survived)
    VALUES (:teamId, :botId, :scaleAutoBoxes, :switchAutoBoxes, :exchangeAutoBoxes, :scaleBoxes, :switchBoxes, :exchangeBoxes, :totalPoints, :path, :survived);
    ;";
    $stmt = $connectPDO->prepare($query);
    $stmt->bindParam(':teamId', $teamId);
    $stmt->bindParam(':botId', $botId);
    $stmt->bindParam(':scaleAutoBoxes', $scaleAutoBoxes);
    $stmt->bindParam(':switchAutoBoxes', $switchAutoBoxes);
    $stmt->bindParam(':exchangeAutoBoxes', $exchangeAutoBoxes);
    $stmt->bindParam(':scaleBoxes', $scaleBoxes);
    $stmt->bindParam(':switchBoxes', $switchBoxes);
    $stmt->bindParam(':exchangeBoxes', $exchangeBoxes);
    $stmt->bindParam(':totalPoints', $totalPoints);
    $stmt->bindParam(':path', $path);
    $stmt->bindParam(':survived', $survived);
    $stmt->execute();
    header("Location: /scouting_main_roundAdd.php?Success");
}

?>