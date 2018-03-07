<?php
function getTeamNames($connectPDO) {
    $query = "SELECT * FROM teams";
    $stmt = $connectPDO->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        echo "<option value='".$row['teamName']."'>".$row['teamName']."</option>";
    }
}
function analyzeOverall($connectPDO) {
    $query = "SELECT teams.teamName, teams.teamNumber, botstats.*,  FROM botstats INNER JOIN teams ON botstats.team_fk=teams.id where id=:teamId;";
    $stmt = $connectPDO->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        echo "<option value='".$row['teamName']."'>".$row['teamName']."</option>";
    }
}
function getTeamNumbers($connectPDO) {
    $query = "SELECT * FROM teams ORDER BY teamNumber ASC";
    $stmt = $connectPDO->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        echo "<option value='".$row['teamNumber']."'>".$row['teamNumber']."</option>";
    }
}
function getColumns($connectPDO, $table) {
    $query = "SELECT * FROM $table";
    $stmt = $connectPDO->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    foreach ($result as $key=>$value) {
        if ($key != "id" && $key != "date") {
            echo "<p>".$key."</p>";
        }
    }
}
function getOverallData($connectPDO, $part) {
    $query = "SELECT teams.teamName, teams.teamNumber FROM teams;";
    $stmt = $connectPDO->prepare($query);
    $stmt->execute();
    if ($part == 'th') {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        foreach ($result as $key=>$value) {
        echo "<th>".$key."</th>";
        }
    }
    else if ($part == 'td') {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $key=>$innerArray) {
            echo "<tr>";
            foreach ($innerArray as $innerKey=>$value) {
                echo "<td>".$value."</td>";
                if ($innerKey == 'teamName') {
                    $teamName = $value;
                }
            }
            echo "<td>".survivedAll($connectPDO, $teamName)."</td>";
            echo "<td>";
            foreach (getScore($connectPDO, $teamName) as $date=>$value) {
                $value = round ($value, 2, PHP_ROUND_HALF_UP);
                echo "<p>".$value." => ".$date."</p>";
            }
            echo "</td>";
            echo "</tr>";
        }
    }
}
function getBotsData($connectPDO, $part) {
    $query = "SELECT teams.teamName, teams.teamNumber, botstats.leftRung, botstats.middleRung, botstats.rightRung, botstats.scale, botstats.switch, botstats.exchange, botstats.drivetrain, botstats.boxPickupSpeed, botstats.agility, botstats.speed FROM botstats INNER JOIN teams on botstats.team_fk=teams.id";
    $stmt = $connectPDO->prepare($query);
    $stmt->execute();
    if ($part == 'th') {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        foreach ($result as $key=>$value) {
        echo "<th>".$key."</th>";
        }
    }
    else if ($part == 'td') {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $key=>$innerArray) {
            echo "<tr>";
            foreach ($innerArray as $innerKey=>$value) {
                echo "<td>".$value."</td>";
            }
            echo "</tr>";
        }
    }
}
function getRoundsData($connectPDO, $part) {
    $query = "SELECT  botstats.date, teams.teamName, teams.teamNumber, roundstats.scaleAutoBoxes, roundstats.switchAutoBoxes, roundstats.exchangeAutoBoxes, roundstats.scaleBoxes, roundstats.switchBoxes, roundstats.exchangeBoxes, roundstats.totalPoints, roundstats.path
    FROM roundstats
    INNER JOIN teams on roundstats.teamId=teams.id
    INNER JOIN botstats on roundstats.botId=botstats.botId";
    $stmt = $connectPDO->prepare($query);
    $stmt->execute();
    if ($part == 'th') {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        foreach ($result as $key=>$value) {
        echo "<th>".$key."</th>";
        }
    }
    else if ($part == 'td') {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $key=>$innerArray) {
            echo "<tr>";
            foreach ($innerArray as $innerKey=>$value) {
                echo "<td>".$value."</td>";
            }
            echo "</tr>";
        }
    }
}
function getBotNum($connectPDO) {
    $query = "SELECT botstats.*, teams.teamName, teams.teamNumber FROM botstats INNER JOIN teams ON botstats.team_fk=teams.id where id=:teamId;";
    $stmt = $connectPDO->prepare($query);
    $stmt->bindParam(':teamId', $_SESSION['teamId']);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $rows = count($results);
    $teamBots = array(
                      'num_of_bots'=>$rows,
                      'array_of_rows'=>$results
                      );
    return $teamBots;
}
function getBots($connectPDO, $rows) {
    $teamBots = getBotNum($connectPDO);
    $i = 0;
    foreach ($rows as $row) {
        echo "<option value='".array_column( $teamBots['array_of_rows'] , 'botId' )[$i]."'>";
        echo $row['date'];
        echo "</option>";
        $i++;
    }
}
function getWeights($weights) {
    foreach ($weights as $key => $value) {
        echo "<p>".$key."=>".$value."</p>";
    }
}
function survivedAll($connectPDO, $teamName) {
    $query = "SELECT roundstats.survived FROM teams INNER JOIN roundstats ON teams.Id=roundstats.teamId where teamName=:teamName;";
    $stmt = $connectPDO->prepare($query);
    $stmt->bindParam(':teamName', $teamName);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $test = 0;
    foreach ($results as $key=>$innerArray) {
        foreach ($innerArray as $$key=>$value) {
            $test += $value;
        }
    }
    if (count($results) == 0) {
        return "No Rounds Added";
    }
    if ($test / count($results) == 1) {
        return "&#10004;";
    }
    return "&#10006;";
}


/* BEGGINNING OF MY SCOUTING ALGORITHM
 * Climbing: any->8pts, each->4pts
 * Can Place: any->8pts, each->4pts
 * # Auto boxes scored: each->6pts, where
 *      (1 / rank of avg # placed out of everyone) * 6 = pts
 * # Teleop boxes scored: each->6pts, where
 *      (1 / rank of avg # placed out of everyone) * 6 = pts
 * Total Points: max->6pts, where
 *      (1 / rank of avg # points scored out of everyone) * 6 = pts
 * General Stats: each->6pts, where
 *      (value/2) = score*/


 
function getScore($connectPDO, $teamName) {
    $query = "SELECT * FROM weights";
    $stmt = $connectPDO->prepare($query);
    $stmt->execute();
    $weights = $stmt->fetch(PDO::FETCH_ASSOC);

    $totalScore = 0;
    $scoresArray = array();
    //Get Array Of Averages
    
    $query = "SELECT teams.teamName, botstats.botId
    FROM botstats
    INNER JOIN teams on botstats.team_fk=teams.id
    WHERE teamName=:teamName";
    $stmt = $connectPDO->prepare($query);
    $stmt->bindParam(':teamName', $teamName);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $botNum = count($results);
    //GET NUM OF BOTS
    
    //GET TABLE OF BOTSTATS
    $query = "SELECT teams.teamName, botstats.*
    FROM botstats
    INNER JOIN teams on botstats.team_fk=teams.id
    WHERE teamName=:teamName";
    $stmt = $connectPDO->prepare($query);
    $stmt->bindParam(':teamName', $teamName);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
    //ARRAY OF TEAMS WITH ROUNDS
    
    //GET ASSOC ARRAY OF ALL AVERAGES FOR scaleAutoBoxes
    
    
    
    $leftRung = array_column($results, 'leftRung');
    $middleRung = array_column($results, 'middleRung');
    $rightRung = array_column($results, 'rightRung');;
    $climbing = array();
    for ($i = 0; $i < $botNum; $i++) {
        $climbing[] = ($leftRung[$i]*$weights['eachRung'])+($middleRung[$i]*$weights['eachRung'])+($rightRung[$i]*$weights['eachRung']);
        if ($leftRung[$i] == 1 && $middleRung[$i] == 1 && $rightRung[$i] == 1) {
            $climbing[$i]+= $weights['anyRung'];
        }
    }
    //MAKES $CLIMBING ARRAY WHICH HOLDS TOTAL SCORE PARTS FOR EACH BOT
    
    $scale = array_column($results, 'scale');
    $switch = array_column($results, 'switch');
    $exchange = array_column($results, 'exchange');
    $placement = array();
    for ($i = 0; $i < $botNum; $i++) {
        $placement[] =
        ($scale[$i]*$weights['eachPlace'])+($switch[$i]*$weights['eachPlace'])+($exchange[$i]*$weights['eachPlace']);
        if ($scale[$i] == 1 && $switch[$i] == 1 && $exchange[$i] == 1) {
            $placement[$i]+= $weights['anyPlace'];
        }
    }
    //MAKES $Placement ARRAY WHICH HOLDS TOTAL SCORE PARTS FOR EACH BOT
    
    $boxPickupSpeed = array_column($results, 'boxPickupSpeed');
    $speed = array_column($results, 'speed');
    $agility = array_column($results, 'agility');
    $generalStats = array();
    for ($i = 0; $i < $botNum; $i++) {
        $generalStats[] =
        ($boxPickupSpeed[$i]/(12/$weights['eachStat']))+($speed[$i]/(12/$weights['eachStat']))+($agility[$i]/(12/$weights['eachStat']));
    }
    //MAKES $generalStats ARRAY WHICH HOLDS TOTAL SCORE PARTS FOR EACH BOT
    
    
    $scaleAutoBoxesRank = getRanks($connectPDO, $teamName, 'scaleAutoBoxes');
    $switchAutoBoxesRank = getRanks($connectPDO, $teamName, 'switchAutoBoxes');
    $exchangeAutoBoxesRank = getRanks($connectPDO, $teamName, 'exchangeAutoBoxes');
    $auto = array();
    for ($i = 0; $i < $botNum; $i++) {
        $auto[] =
        ($weights['eachAutoBoxSet']/$scaleAutoBoxesRank[$i])+($weights['eachAutoBoxSet']/$switchAutoBoxesRank[$i])+($weights['eachAutoBoxSet']/$exchangeAutoBoxesRank[$i]);
    }
    //MAKES $auto ARRAY WHICH HOLDS TOTAL SCORE PARTS FOR EACH BOT
    
    $scaleBoxesRank = getRanks($connectPDO, $teamName, 'scaleBoxes');
    $switchBoxesRank = getRanks($connectPDO, $teamName, 'switchBoxes');
    $exchangeBoxesRank = getRanks($connectPDO, $teamName, 'exchangeBoxes');
    $teleop = array();
    for ($i = 0; $i < $botNum; $i++) {
        $teleop[] =
        ($weights['eachTeleopBoxSet']/$scaleBoxesRank[$i])+($weights['eachTeleopBoxSet']/$switchBoxesRank[$i])+($weights['eachTeleopBoxSet']/$exchangeBoxesRank[$i]);
    }
    //MAKES $teleop ARRAY WHICH HOLDS TOTAL SCORE PARTS FOR EACH BOT
    
    $totalPoints = getRanks($connectPDO, $teamName, 'totalPoints');
    $totalPts = array();
    for ($i = 0; $i < $botNum; $i++) {
        $totalPts[] =
        ($weights['totalPoints']/$totalPoints[$i]);
    }
    //MAKES $totalPts ARRAY WHICH HOLDS TOTAL SCORE PARTS FOR EACH BOT

    
    $final = array();
    
    $query = "SELECT botstats.date
    FROM botstats
    INNER JOIN teams on botstats.team_fk=teams.id
    WHERE teamName=:teamName
    ORDER BY botstats.date ASC";
    $stmt = $connectPDO->prepare($query);
    $stmt->bindParam(':teamName', $teamName);
    $stmt->execute();
    $dates = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dates = array_column($dates, 'date');

    for ($x = 0; $x < $botNum; $x++) {
        $final[$dates[$x]] = $climbing[$x]+$placement[$x]+$generalStats[$x]+$auto[$x]+$teleop[$x]+$totalPts[$x];
    }
    return $final;
    //return ARRAY OF SCORES WHERE VALUE IS SCORE//
    
    
}
function getStat($connectPDO, $teamName, $stat) {
    $query = "SELECT teams.teamName, botstats.$stat
    FROM botstats
    INNER JOIN teams on botstats.team_fk=teams.id
    WHERE teamName=:teamName";
    $stmt = $connectPDO->prepare($query);
    $stmt->bindParam(':teamName', $teamName);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ${$stat. 'Array'} = array();
    foreach ($results as $row) {
        ${$stat. 'Array'}[] = $row[$stat];
    }
    return (${$stat. 'Array'});
}
function getRanks($connectPDO, $teamName, $stat) {
    $query = "SELECT botstats.botId
    FROM botstats
    INNER JOIN teams on botstats.team_fk=teams.id
    WHERE teamName=:teamName";
    $stmt = $connectPDO->prepare($query);
    $stmt->bindParam(':teamName', $teamName);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $results = array_column($results, 'botId');
    
    $allAvgs = getAllAvgs($connectPDO, $stat);
    
    $avgs = array();
    foreach ($allAvgs as $teamId=>$botId) {
        foreach ($botId as $avg) {
            $avgs[] = $avg;
        }
    }
    rsort($avgs);
    //RETURN ARRAY OF ALL AVGS FOR STAT IN DESCENDING ORDER
    
    $ranks = array();
    $r = 1;
    foreach ($avgs as $avg) {
        if (count($ranks) == 0) {
            $ranks[$r] = $avg;
            $r++;
        }
        elseif (count($ranks) > 0) {
            if ($avg < $ranks[$r-1]) {
                $ranks[$r] = $avg;
                $r++;
            }
        }
    }
    //RETURNS $ranks ARRAY OF rank=>avg
    
    $teamAvgs = array();
    foreach ($results as $botId) {
        $teamAvgs[$botId] = getAvg($connectPDO, $botId, $stat);
    }
    $botRanks = array();
    foreach ($teamAvgs as $avg) {
        $botRanks[] = array_search ( $avg , $ranks);
    }
    return $botRanks;
    //Sort through array to get places for the stat
    /* array(
        value=>rank,
    )
    */
    
    //Get rank foreach in places array, if key == teamAvg, place = value
    //Add to array
    //LOOP
    
    //Return array of bot ranks for team
}
function getAllAvgs($connectPDO, $stat) {
    $query = "SELECT teams.id
    FROM teams";
    $stmt = $connectPDO->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $teamIds = array_column ($results, 'id');
    //RETURNS $teamIds NUM ARRAY OF ALL TEAM IDs
    
    $allAvgs = array();
    foreach ($teamIds as $teamId) {
        $allAvgs[$teamId] = getBotIds($connectPDO, $teamId, $stat);
    }
    return $allAvgs;
    /*RETURNS array where
        teamId => botId => avg
                  botId => avg
        teamId => botId => avg
    */
}
function getBotIds($connectPDO, $teamId, $stat) {
    $avg = 0;
    $query = "SELECT botstats.botId
    FROM botstats
    INNER JOIN teams on botstats.team_fk=teams.id
    WHERE team_fk=:teamId";
    $stmt = $connectPDO->prepare($query);
    $stmt->bindParam(':teamId', $teamId);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $currentBot = 0;
    $botIds = array();
    foreach ($results as $row=>$rowArray) {
        foreach ($rowArray as $key=>$value) {
            if ($key == 'botId') {
                $currentTeam = $value;
                if (count($botIds) == 0) {
                    $botIds[] = $currentTeam;
                }
                elseif ($currentTeam > $botIds[count($botIds)-1]) {
                    $botIds[] = $currentTeam;
                }
            }
        }
    }
    //returns $botIds for given teamId
    $avgArray = array();
    foreach ($botIds as $value) {
        $avgArray[$value] = getAvg($connectPDO, $value, $stat);
    }
    return $avgArray;
}
function getAvg($connectPDO, $botId, $stat) {
    $avg = 0;
    $query = "SELECT roundstats.$stat
    FROM roundstats
    WHERE botId=:botId";
    $stmt = $connectPDO->prepare($query);
    $stmt->bindParam(':botId', $botId);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $results = array_column($results, $stat);
    ${$stat. 'Array'} = array();
    foreach ($results as $value) {
        ${$stat. 'Array'}[] = $value;
    }
    //Adds each value for the team to the $statArray
    foreach (${$stat. 'Array'} as $value) {
        $avg += $value;
    }
    //Adds numerator of avg using values from $statArray
    if (count(${$stat. 'Array'}) > 0) {
        $avg /= count(${$stat. 'Array'});
    }
    else {
        $avg = 0;
    }
    return $avg;
}
?>