<?php
session_start();
if (!isset($_POST['password']) || $_POST['password'] != "300million") {
    header("Location: /title.php?Wrong_password");
}
else {
    $_SESSION['loggedIn'] == true;
    echo $_SESSION['loggedIn'];
}
?>