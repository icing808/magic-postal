<?php
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
    <title>Magic Postal</title>
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="css/gallery.css" />
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <!-- <meta http-equiv="refresh" content="10"> -->
    <meta name="description" content="Anonymous postcard">
    <meta name="keywords" content="anonymous, postcard">
    <style>
    </style>
    </head>

    <body>
    <header>
        <div id="header" >
            <?php include("head.php"); ?> 
        </div>
    </header>
    <div id="main">
        <div id="leftCol">

            <div id="welcomeWords" class="leftWords">
                <p>Welcome to </P>
                    <p>Magic Gallery :)</p>
            </div>

            <div id="wave">
                <img src="images/gallery/gallery_dec1.png"/>
            </div>

            <div id="elves">
              <img src="images/gallery/gallery_fairy.png"/>
            </div>

            <div id="explainWords" class="leftWords">
                <p>Here is an amazing collection of post card from anonymous.
                    Every single card is one of a kind. Try to click on the envelopes...</p>
            </div>

        </div>

        <div class="rightCol" style="border:1px solid red;width:75%;height:100vh;position:relative;">
            <div id="showTable" style="width:98%;height:98%;border:1px solid white;margin: 0 auto;margin-top:50px;overflow:hidden">

                <div class="env" style="border:1px solid pink;width:260px;height:150px;display:inline-block;position:relative;margin:50px;">
                    <img src="images/gallery/gallery_env1.png" style="width:95%"/>
                </div>

                <div class="env" style="border:1px solid pink;width:260px;height:150px;display:inline-block;position:relative;margin:50px;">
                    <img src="images/gallery/gallery_env2.png" style="width:95%"/>
                </div>

                <div class="env" style="border:1px solid pink;width:260px;height:150px;display:inline-block;position:relative;margin:50px;">
                    <img src="images/gallery/gallery_env3.png" style="width:95%"/>
                </div>

                <div class="env" style="border:1px solid pink;width:260px;height:150px;display:inline-block;position:relative;margin:50px;">
                    4<img src="images/gallery/gallery_env4.png" style="width:95%"/>
                </div>

                <div class="env" style="border:1px solid pink;width:260px;height:150px;display:inline-block;position:relative;margin:50px;">
                    5<img src="images/gallery/gallery_env5.png" style="width:95%"/>
                </div>

                <div class="env" style="border:1px solid pink;width:260px;height:150px;display:inline-block;position:relative;margin:50px;">
                    6<img src="images/gallery/gallery_env6.png" style="width:95%"/>
                </div>

                <div class="env" style="border:1px solid pink;width:260px;height:150px;display:inline-block;position:relative;margin:50px;">
                7<img src="images/gallery/gallery_env7.png" style="width:95%"/>
                </div>

                <div class="env" style="border:1px solid pink;width:260px;height:150px;display:inline-block;position:relative;margin:50px;">
                8<img src="images/gallery/gallery_env8.png" style="width:95%"/>
                </div>

                <div class="env" style="border:1px solid pink;width:260px;height:150px;display:inline-block;position:relative;margin:50px;">
                9<img src="images/gallery/gallery_env9.png" style="width:95%"/>
                </div>

            </div>

         </div>

</div>






        <!-- <footer>
            <p><b>MagicPostal</b>&nbsp;&nbsp;Copyright ©2020</p>
        </footer>
         -->
    </body>
</html>
