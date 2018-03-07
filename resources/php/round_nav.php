<?php
session_start();
include("../includes/connect.php");
include("functions.php");

$rows = 0;
if (!isset($_POST['teamNumber'])) {
    header("Location: /scouting_main_roundAdd.php?empty_inputs");
}
elseif (isset($_POST['teamNumber'])) {
    $query = "SELECT id FROM teams where teamNumber=:teamNumber;";
    $stmt = $connectPDO->prepare($query);
    $stmt->bindParam(':teamNumber', $_POST['teamNumber']);
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['teamNumber'] = $_POST['teamNumber'];
    $_SESSION['teamId'] = $results['id'];
    $teamBots = getBotNum($connectPDO);
    $rows = $teamBots['num_of_bots'];
    if ($rows < 1) {
        header("Location: /scouting_main_botAdd.php?team_did_not_have_a_bot");
    }
    elseif ($rows == 1) {
        $_SESSION['botId'] = array_column( $teamBots['array_of_rows'] , 'botId' )['0'];
        header("Location: /scouting_main_roundAdd2.php?");
    }
    elseif ($rows > 1) {
        header("Location: /scouting_main_roundAdd1.php");
    }
}
?>