<?php
include "scouting_header.php";
if (!(isset($_SESSION['teamId']))) {
    header("Location: /scouting_main_roundAdd.php");
}
?>
<ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link active" href="scouting_main.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="scouting_analyze_overall.php">Analyze</a>
    </li>
</ul>
    <button type="button" class="btn btn-light px-1 py-1 mr-2" data-toggle="modal" data-target="#map">
        <img class="mx-auto my-auto" src="\resources\images\map.png" height="30px" width="30px">
    </button>
    <button type="button" class="btn btn-light px-1 py-1" data-toggle="modal" data-target="#settings">
        <img class="mx-auto my-auto" src="\resources\images\cog.png" height="30px" width="30px">
    </button>
</nav>
<div class="container-fluid">
    <div class="row mt-5 pr-3">
        <div class="col-md-3">
            <ul class="nav nav-pills flex-column">
              <li class="nav-item">
                <a class="nav-link" href="scouting_main.php">Team Add</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="scouting_main_botAdd.php">Team Bot Add</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="scouting_main_roundAdd.php">Round Add</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
              </li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="row">
                <h1>Scouting Form: Round Add Final</h1>
            </div>
            <form action="/resources/php/round_add.php" method="post">
                <div class="row bg-faded pt-3 pb-2 pr-2">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <?php echo "<h2 class='pb-3'>Team # ".$_SESSION['teamNumber']."</h2>"; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row mb-3" style="position: relative">
                                    <div class="col-sm-6 mb-2">
                                        <div class="form-group">
                                            <h4 for="inputClimbingSpecs">Scale Auto Boxes:</h4>
                                            <input required class="form-control ml-3" type="number" name="scaleAutoBoxes" placeholder="Boxes placed in scale during autonomous">                            
                                        </div>
                                        <div class="form-group">
                                            <h4 for="inputClimbingSpecs">Switch Auto Boxes:</h4>
                                            <input required class="form-control ml-3" type="number" name="switchAutoBoxes" placeholder="Boxes placed in switch during autonomous">                            
                                        </div>
                                        <div class="form-group">
                                            <h4 for="inputClimbingSpecs">Exchange Auto Boxes:</h4>
                                            <input required class="form-control ml-3" type="number" name="exchangeAutoBoxes" placeholder="Boxes placed in exchange this round">                            
                                        </div>
                                        <div class="form-group">
                                            <h4 for="inputClimbingSpecs">Scale Teleop Boxes:</h4>
                                            <input required class="form-control ml-3" type="number" name="scaleBoxes" placeholder="Boxes placed on scale during teleop">                            
                                        </div>
                                        <div class="form-group">
                                            <h4 style="display: inline-block;">Stayed Active During Teleop?</h4>
                                            <input class="form-check form-check-inline ml-3 bc" type="hidden" name="survived" value="0">
                                            <input checked class="form-check form-check-inline ml-3" style="height:30px; width:30px;" type="checkbox" name="survived" value=1>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <h4 for="inputClimbingSpecs">Switch Teleop Boxes:</h4>
                                            <input required class="form-control ml-3" type="number" name="switchBoxes" placeholder="Boxes placed on switch during teleop">                            
                                        </div>
                                        <div class="form-group">
                                            <h4 for="inputClimbingSpecs">Exchange Teleop Boxes:</h4>
                                            <input required class="form-control ml-3" type="number" name="exchangeBoxes" placeholder="Boxes placed in exchange this round">                            
                                        </div>
                                        <div class="form-group">
                                            <h4 for="inputClimbingSpecs">Total Points:</h4>
                                            <input required class="form-control ml-3" type="number" name="totalPoints" placeholder="Total points scored by alliance">                            
                                        </div>
                                    </div>
                                </div>
                                <h4 class="text-center">Bot Auto Path</h4>
                                <div class="row box">
                                    <div id="field" class="col-md-12 content" style=" background: no-repeat url('/resources/images/field_br.jpg'); background-size: contain;"></div>
                                    <a id="1" class="btn btn-light content autoBox" style="top: 12%; left: 17%;" onclick="addLoc('BT-1, ');">BT-1</a>
                                    <a id="2" class="btn btn-light content autoBox" style="top: 40%; left: 17%;" onclick="addLoc('BM-1, ');">BM-1</a>
                                    <a id="3" class="btn btn-light content autoBox" style="top: 70%; left: 17%;" onclick="addLoc('BB-1, ');">BB-1</a>
                                    <a id="4" class="btn btn-light content autoBox" style="top: 12%; left: 37%;" onclick="addLoc('BT-1, ');">BT-2</a>
                                    <a id="5" class="btn btn-light content autoBox" style="top: 40%; left: 37%;" onclick="addLoc('BM-2, ');">BM-2</a>
                                    <a id="6" class="btn btn-light content autoBox" style="top: 70%; left: 37%;" onclick="addLoc('BB-2, ');">BB-2</a>
                                    <a id="7" class="btn btn-light content autoBox" style="top: 12%; left: 57%;" onclick="addLoc('RT-2, ');">RT-2</a>
                                    <a id="8" class="btn btn-light content autoBox" style="top: 40%; left: 57%;" onclick="addLoc('RM-2, ');">RM-2</a>
                                    <a id="9" class="btn btn-light content autoBox" style="top: 70%; left: 57%;" onclick="addLoc('RB-2, ');">RB-2</a>
                                    <a id="10" class="btn btn-light content autoBox" style="top: 12%; left: 77%;" onclick="addLoc('RT-1, ');">RT-1</a>
                                    <a id="11" class="btn btn-light content autoBox" style="top: 40%; left: 77%;" onclick="addLoc('RM-1, ');">RM-1</a>
                                    <a id="12" class="btn btn-light content autoBox" style="top: 70%; left: 77%;" onclick="addLoc('RB-1, ');">RB-1</a>
                                </div>
                                <div class="text-center">
                                    <a class="btn btn-outline-secondary" onclick="change();">Switch Orientation</a>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h4>Bot Path and Actions</h4>
                                            <p>Instruction: Press button of start position, followed by a marker or action, followed by a marker or action, etc. If the bot does not cross the auto line, press the button of the start position and then the "stop" position.</p>
                                            <p>Exchanges are in RM-1 and BM-1</p>
                                            <input required id="instructions" class="form-control" type="text" name="path" placeholder="i.e. RT-1, RM-1, Box in exchange, RB-1, RB-2, RB-3">
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <h4>Quick Add</h4>
                                        <a id="pickUp" class="btn btn-light block mb-2" style="top: 70%; left: 77%;" onclick="addLoc('Pick Up Box, ');">Pick Up Box</a>
                                        <a id="onScale" class="btn btn-light block mb-2" style="top: 70%; left: 77%;" onclick="addLoc('Place Box On Scale, ');">Place Box On Scale</a>
                                        <a id="onSwitch" class="btn btn-light block mb-2" style="top: 70%; left: 77%;" onclick="addLoc('Place Box On Switch, ');">Place Box On Switch</a>
                                        <a id="inExchange" class="btn btn-light block mb-2" style="top: 70%; left: 77%;" onclick="addLoc('Place Box In Exchange, ');">Place Box In Exchange</a>
                                        <a id="inExchange" class="btn btn-light block mb-2" style="top: 70%; left: 77%;" onclick="addLoc('Stop');">Stop</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary ml-auto mr-4 mb-2">Submit</button>
                </div>

            </form>
        </div>

    
<?php
include "scouting_footer.php"
?>