<?php
include "scouting_header.php";
if (isset($_SESSION["botId"])) {
    unset($_SESSION["botId"]);
}
if (!$_SESSION['loggedIn']) {
    header("Location: /index.php");
}
?>
</nav>
<div class="container">
    <div class="row">
        <h1>Song List:</h1>
    </div>
    <div class="row">
        <ul>
            <li>
                <p>Big Enough</p>
                <audio controls>
                <source src="/resources/audio/big_enough.mp3" type="audio/ogg">
                Your browser does not support the audio element.
                </audio>
            </li>
            <li>
                <p>Space Jam</p>
                <audio controls>
                <source src="/resources/audio/space_jam.mp3" type="audio/ogg">
                Your browser does not support the audio element.
                </audio>
            </li>
            <li>
                <p>Gold Digger</p>
                <audio controls>
                <source src="/resources/audio/gold_digger.mp3" type="audio/ogg">
                Your browser does not support the audio element.
                </audio>
            </li>
            <li>
                <p>Gimme Dat</p>
                <audio controls>
                <source src="/resources/audio/gimme_dat.mp3" type="audio/ogg">
                Your browser does not support the audio element.
                </audio>
            </li>
            <li>
                <p>Look At Me Now</p>
                <audio controls>
                <source src="/resources/audio/look_at_me_now.mp3" type="audio/ogg">
                Your browser does not support the audio element.
                </audio>
            </li>
        </ul>
    </div>
</div>

<?php
include "scouting_footer.php"
?>