<?php
session_start();
include("../includes/connect.php");
include("functions.php");

if (!isset($_POST['teamName']) || !isset($_POST['teamNumber'])) {
    header("Location: /scouting_main_botAdd.php?empty_inputs");
}
else {
    $teamName = $_POST['teamName'];
    $teamNumber = $_POST['teamNumber'];

    $query1 = "SELECT * FROM teams where teamName=:teamName";
    $stmt1 = $connectPDO->prepare($query1);
    $stmt1->bindParam(':teamName', $teamName);
    $stmt1->execute();
    
    $query2 = "SELECT * FROM teams where teamNumber=:teamNumber";
    $stmt2 = $connectPDO->prepare($query2);
    $stmt2->bindParam(':teamNumber', $teamNumber);
    $stmt2->execute();
    if ($stmt1->fetch() || $stmt2->fetch()) {
        header("Location: /scouting_main.php?Team_already_exists");
    }
    else {
        $query = "insert into teams (teamName, teamNumber)
    VALUES (:teamName, :teamNumber);";
        $stmt = $connectPDO->prepare($query);
        $stmt->bindParam(':teamName', $teamName);
        $stmt->bindParam(':teamNumber', $teamNumber);
        $stmt->execute();
        header("Location: /scouting_main_botAdd.php?Success");
    }
}
    
    /*$query = "insert into botStats (team_fk, leftRung, middleRung, rightRung, scale, switch, drivetrain, autoPoints, boxPickupSpeed, agility, speed)
    VALUES (:team_fk, :leftRung, :middleRung, :rightRung, :scale, :switch, :drivetrain, :autoPoints, :boxPickupSpeed, :agility, :speed);
    ;";
    $stmt = $connectPDO->prepare($query);
    $stmt->bindParam(':team_fk', $team_fk);
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
    header("Location: /scouting_main_botAdd.php");
}
    $query = "insert into botStats (teamName, teamNumber, leftRung, middleRung, rightRung, scale, switch, drivetrain, autoPoints, boxPickupSpeed, agility, speed)
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