<?php
include("../includes/connect.php");
include("functions.php");

/*function testRealTeam($connectPDO) {
    $query = "SELECT COUNT(*) FROM teams WHERE teamName=:teamName AND teamNumber=:teamNumber";
    $stmt = $connectPDO->prepare($query);
    $stmt->bindParam(':teamName', $teamName);
    $stmt->bindParam(':teamNumber', $teamNumber);
    $stmt->execute();
    $result = $stmt->fetchColumn();
    return $result;
}*/
if (!isset($_POST['teamName']) || !isset($_POST['leftRung'])
    || !isset($_POST['middleRung']) || !isset($_POST['rightRung']) || !isset($_POST['scale'])
    || !isset($_POST['switch']) || !isset($_POST['drivetrain']) || !isset($_POST['boxPickupSpeed'])
    || !isset($_POST['agility']) || !isset($_POST['speed'])) {
    header("Location: /scouting_main_botAdd.php?empty_inputs");
}
else {
    $teamName = $_POST['teamName'];
    $leftRung = $_POST['leftRung'];
    $middleRung = $_POST['middleRung'];
    $rightRung = $_POST['rightRung'];
    $scale = $_POST['scale'];
    $switch = $_POST['switch'];
    $drivetrain = $_POST['drivetrain'];
    $boxPickupSpeed = $_POST['boxPickupSpeed'];
    $agility = $_POST['agility'];
    $speed = $_POST['speed'];
    $exchange = $_POST['exchange'];
    
    $query = "SELECT id FROM teams where teamName=:teamName";
    $stmt = $connectPDO->prepare($query);
    $stmt->bindParam(':teamName', $teamName);
    $stmt->execute();
    $team_fk = $stmt->fetch();
    $team_fk = $team_fk['id'];
    
    $query = "insert into botstats (team_fk, leftRung, middleRung, rightRung, scale, switch, exchange, drivetrain, boxPickupSpeed, agility, speed)
    VALUES (:team_fk, :leftRung, :middleRung, :rightRung, :scale, :switch, :exchange, :drivetrain, :boxPickupSpeed, :agility, :speed);
    ;";
    $stmt = $connectPDO->prepare($query);
    $stmt->bindParam(':team_fk', $team_fk);
    $stmt->bindParam(':leftRung', $leftRung);
    $stmt->bindParam(':middleRung', $middleRung);
    $stmt->bindParam(':rightRung', $rightRung);
    $stmt->bindParam(':scale', $scale);
    $stmt->bindParam(':switch', $switch);
    $stmt->bindParam(':drivetrain', $drivetrain);
    $stmt->bindParam(':boxPickupSpeed', $boxPickupSpeed);
    $stmt->bindParam(':agility', $agility);
    $stmt->bindParam(':speed', $speed);
    $stmt->bindParam(':exchange', $exchange);
    $stmt->execute();
    header("Location: /scouting_main_roundAdd.php?Success");
}
    /*$query = "insert into botStats (teamName, teamNumber, leftRung, middleRung, rightRung, scale, switch, drivetrain, autoPoints, boxPickupSpeed, agility, speed)
    VALUES (:teamName, :teamNumber, :leftRung, :middleRung, :rightRung, :scale, :switch, :drivetrain, :autoPoints, :boxPickupSpeed, :agility, :speed);
    ;";
    $stmt = $connectPDO->prepare($query);
    $stmt->bindParam(':teamName', $teamName);
    $stmt->bindParam(':teamNumber', $teamNumber);
    $stmt->bindParam(':leftRung', $leftRung);
    $stmt->bindParam(':middleRung', $middleRung);
    $stmt->bindParam(':rightRung', $rightRung);
    $stmt->bindParam(':scale', $scale);
    $stmt->bindParam(':switch', $switch);
    $stmt->bindParam(':drivetrain', $drivetrain);
    $stmt->bindParam(':autoPoints', $autoPoints);
    $stmt->bindParam(':boxPickupSpeed', $boxPickupSpeed);
    $stmt->bindParam(':agility', $agility);
    $stmt->bindParam(':speed', $speed);
    $stmt->execute();
    */
?>