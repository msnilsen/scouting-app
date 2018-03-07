<?php
include("../includes/connect.php");

$query = "SELECT * FROM weights";
$stmt = $connectPDO->prepare($query);
$stmt->execute();
$weights = $stmt->fetch(PDO::FETCH_ASSOC);

$ok = true;
$test = 0;
foreach ($weights as $key=>$value) {
    if (!isset($key)) {
        $ok = false;
    }
}
$test += ($weights['eachRung']*3);
$test += ($weights['anyRung']);
$test += ($weights['eachPlace']*3);
$test += ($weights['anyPlace']);
$test += ($weights['eachStat']*3);
$test += ($weights['eachAutoBoxSet']*3);
$test += ($weights['eachTeleopBoxSet']*3);
$test += ($weights['totalPoints']);
$total = ($_POST['eachRung']*3) + ($_POST['anyRung']) + ($_POST['eachPlace']*3) + ($_POST['anyPlace']) + ($_POST['eachStat']*3) + ($_POST['eachAutoBoxSet']*3) + ($_POST['eachTeleopBoxSet']*3) + ($_POST['totalPoints']);
if ( $total != 100) {
    header("Location: /scouting_main.php?adds_to_".$total."_not_100");
}
else {
    header("Location: /scouting_main_botAdd.php?Success");
}

?>