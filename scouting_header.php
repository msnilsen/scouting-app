<?php
session_start();
if (!$_SESSION['loggedIn'] || !$_SESSION['isUp']) {
    header("Location: /index.php");
}
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">            
            <link rel="stylesheet" href="/resources/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="/resources/bootstrap/css/dataTables.bootstrap4.min.css">
            <link rel="icon" href="http://www.dsatulsa.org/images/links/8eac4a736e4a094688c3b54b43588308">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <script>
              (adsbygoogle = window.adsbygoogle || []).push({
                google_ad_client: "ca-pub-6851851058987087",
                enable_page_level_ads: true
              });
            </script>
            <style>
                .bg-faded {
                    background-color: #CECECE;
                    border-radius: 10px;
                }
                .vertical-line{
                      width: 1px; /* Line width */
                      background-color: black; /* Line color */
                      height: 100%; /* Override in-line if you want specific height. */
                      left: 50.9%;
                      position: absolute;
                }
                .bc {
                  height: 20px;
                  width: 20px;
                }
                .box{
                    position: relative;
                    width: 100%;		/* desired width */
                    left: 0px;
                    margin-left: 0.5%;
                }
                .box:before{
                    content: "";
                    display: block;
                    padding-top: 45%; 	/* initial ratio of 1:1*/
                }
                .content {
                    position:  absolute;
                    top: 0;
                    left: 0;
                    bottom: 0;
                    right: 0;
                }
                .left-nav {
                    width: 22%;
                    position: fixed;
                    background-color: rgb(224, 224, 224);
                    border-radius: 10px;
                    box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
                }
                .autoBox {
                    height: 10%;
                    width: 8%;
                    font-size: 1.7vw;
                }
                .btn-analyze {
                    font-size: 2.5vw;
                    min-width: 150px;
                    margin-left: 10px;
                    margin-right: 10px;
                    margin-bottom: 30px;
                    width: calc(90% / 4);
                    vertical-align: middle;
                }
                .block {
                    display: block;
                }
            </style>
            <?php
              include_once("resources/includes/connect.php");
              include("resources/php/functions.php");
            ?>
        </head>
        <body>
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="scouting_main.php">Matthew's Super Scouting Algorithm</a>
