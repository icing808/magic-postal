<?php
session_start();

?>

<!DOCTYPE html>
<html>
    <head>
    <title>Magic Postal</title>
    <link rel="stylesheet" href="css/main.css" />
    <link rel="icon" type="image/png" href="images/favicon.png"/>
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
    <div id="home_container">
    <div id="home1">
        <img id="home_bg1" src="images/homepage/homepage_bg1.png" width="100%">
        <div id="cta"><p>Start your Wonderful<br> 
        Spiritual Journey With <b>Anonymous<b>.</p></div>
    </div>
    <div id="home2">
        <div id="home2_title"><p>How It Works</p></div>
        <div id="home2_hiws_container">
            <div class="home2_hiws_description">
                <div class="hiwpic">
                    <img src="images/homepage/howitworks_1.png" width="258px">
                </div>
                <div class="text">
                    <p>Use our canvas to create your own post card, write down your inner thoughts.
</p>
                </div>
            </div>
            <div class="home2_hiws_description">
                <div class="hiwpic">
                    <img src="images/homepage/howitworks_2.png" width="256px">
                </div>
                <div class="text">
                    <p>Send your card to our card-pool, so anonymous can fetch it. Or send it privately to a specific Email address on a specific time.
</p>
                </div>
            </div>
            <div class="home2_hiws_description">
                <div class="hiwpic">
                    <img src="images/homepage/howitworks_3.png" width="350px">
                </div>
                <div class="text" id="t3">
                    <p>Fetch a card from card-pool and interactive with anonymous. All the sent and fetched history can be found in the “mailbox”.</p>
                </div>
            </div>  
        </div>
        <div ><img id="home2_bottom_img" src="images/homepage/homepage2_bottom.png" width="100%"></div>
    </div>
   
        <div id="home3">
            <div id="home3_main">
                
            <div id="home3title"><p>Now you wanna</p></div>
                
                <div id="send_fetch_container">
                    <div id="home3_send">
                        <div id="home3send" onclick="location.href='sendcard.php'">
                            <img src="images/homepage/homepage3_send.png">
                        </div>
                        <div><p>Send</p></div>
                    </div>
                    
                    <div id="home3_or"><p><i>or</i></p></div>
                    
                    <div id="home3_fetch">
                        <div id="home3fetch">
                            <img src="images/homepage/homepage3_fetch.png">
                        </div>
                        <div><p>Fetch</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div><footer><p><b>MagicPostal</b>&nbsp;&nbsp;Copyright ©2020</p></footer></div>
   <script src="js/receiveCard.js"></script>
</body>
</html>