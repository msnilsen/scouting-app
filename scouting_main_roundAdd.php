<?php
include "scouting_header.php";
if (isset($_SESSION["botId"])) {
    unset($_SESSION["botId"]);
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
                <h1>Scouting Form: Round Add</h1>
            </div>
            <form action="/resources/php/round_nav.php" method="post">
                <div class="row bg-faded pt-2 pb-2">
                    <div class="col-sm-6 mb-2">
                        <div class="form-group">
                            <h4 for="inputTeamNumber">Team</h4>
                            <select required name="teamNumber" class="custom-select ml-3">
                                <option value="" disabled selected hidden>Pick a Team</option>
                                <?php getTeamNumbers($connectPDO); ?>
                            </select>
                            <br>
                        </div>
                    </div>
                    <div class="col-sm-6">
                    </div>
                    <button type="submit" class="btn btn-primary ml-auto mr-4 mb-2">Submit</button>
                </div>
            </form>
        </div>

    
<?php
include "scouting_footer.php"
?>