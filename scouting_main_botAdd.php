<?php
include "scouting_header.php";
if (isset($_SESSION["botId"])) {
    unset($_SESSION["botId"]);
}
if (!$_SESSION['loggedIn']) {
    header("Location: /index.php");
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
                <a class="nav-link active" href="scouting_main_botAdd.php">Team Bot Add</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="scouting_main_roundAdd.php">Round Add</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
              </li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="row">
                <h1>Scouting Form: Bot Add</h1>
            </div>
            <form action="/resources/php/bot_add.php" method="post">
                <div class="row bg-faded pt-2 pb-2">
                    <div class="col-md-12">
                        <div class="row" style="position: relative;">
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <h4 for="inputTeamName">Team</h4>
                                    <select required name="teamName" class="custom-select ml-3">
                                        <option value="" disabled selected hidden>Pick a Team</option>
                                        <?php getTeamNames($connectPDO); ?>
                                    </select>
                                    <br>
                                </div>
                                <div class="form-group">
                                    <h4 for="inputClimbingSpecs">Can Climb From:</h4>
                                    <input class="form-check form-check-inline ml-3 bc" type="hidden" name="leftRung" value="0">                            
                                    <input class="form-check form-check-inline ml-3 bc" type="checkbox" name="leftRung" value=1>Left Rung
                                    <input class="form-check form-check-inline ml-3 bc" type="hidden" name="middleRung" value="0">
                                    <input class="form-check form-check-inline ml-3 bc" type="checkbox" name="middleRung" value=1>Middle Rung
                                    <input class="form-check form-check-inline ml-3 bc" type="hidden" name="rightRung" value=0><br>
                                    <input class="form-check form-check-inline ml-3 bc" type="checkbox" name="rightRung" value=1>Right Rung
                                </div>
                                <div class="form-group">
                                    <h4 for="inputPlacementSpecs">Can put boxes in:</h4>
                                    <input class="form-check form-check-inline ml-3 bc" type="hidden" name="scale" value=0>
                                    <input class="form-check form-check-inline ml-3 bc" type="checkbox" name="scale" value=1>Scale
                                    <input class="form-check form-check-inline ml-3 bc" type="hidden" name="switch" value=0><br>
                                    <input class="form-check form-check-inline ml-3 bc" type="checkbox" name="switch" value=1>Switch
                                    <input class="form-check form-check-inline ml-3 bc" type="hidden" name="exchange" value=0><br>
                                    <input class="form-check form-check-inline ml-3 bc" type="checkbox" name="exchange" value=1>Exchange
                                </div>
                                <div class="form-group">
                                    <h4>Drivetrain</h4>
                                    <select required name="drivetrain" class="custom-select ml-3">
                                      <option value="" disabled selected hidden>Pick a Drivetrain</option>
                                      <option value="Tank Drive">Tank Drive</option>
                                      <option value="Mecanum">Mecanum</option>
                                      <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group ml-2">
                                    <h4 for="inputGenStats">General Stats</h4><br>
                                    <label for="inputBoxPickupSpeed">Box Pickup Speed</label>
                                    <input type="range" name="boxPickupSpeed" min="1" max="12" class="form-control my-0 py-0">
            
                                    <label for="robotAgility">Robot Agility</label>
                                    <input type="range" name="agility" min="1" max="12" class="form-control my-0 py-0">
                            
                                    <label for="robotSpeed">Robot Movement Speed</label>
                                    <input type="range" name="speed" min="1" max="12" class="form-control my-0 py-0">
                            
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