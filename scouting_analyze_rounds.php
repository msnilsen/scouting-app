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
        <a class="nav-link" href="scouting_main.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item active">
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
        <h1>Round Stats</h1>
        <div class="text-center pb-4">
            <a class="btn btn-outline-secondary btn-analyze" href="scouting_analyze_overall.php">Overall</a>
            <a class="btn btn-outline-secondary btn-analyze" href="scouting_analyze_bots.php">Bots</a>
            <a class="btn btn-primary btn-analyze" href="scouting_analyze_rounds.php">Rounds</a>
            <a class="btn btn-outline-secondary btn-analyze" href="scouting_analyze_test.php">Custom(alpha)</a>
        </div>
    <div class="row">
        <table id="analyze" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Scale Auto</th>
                    <th>Switch Auto</th>
                    <th>Exchange Auto</th>
                    <th>Scale</th>
                    <th>Switch</th>
                    <th>Exchange</th>
                    <th>Total Pts.</th>
                    <th>Path</th>
                </tr>
            </thead>
            <tbody>
                <?php getRoundsData($connectPDO, 'td')?>
            </tbody>
        </table>
    </div>
</div>


<?php
include "scouting_footer.php"
?>