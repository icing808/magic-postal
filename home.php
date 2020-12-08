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
    #cta{
        width:80%;
        height:40%;
        text-align:left;
        padding-left:5%;
        position:absolute;
        top:36%;
    }
    #cta p{
        color:white;
        font-family: 'Playfair Display', serif;
        font-size: 60px;
        font-weight:700;
        font-style:italic;
        line-height:100px;
        -webkit-animation:down 1s linear;
    }
    @-webkit-keyframes down{
						0%{transform:translateY(-20%); opacity: 0}
						
						100%{transform:translateY(0); opacity: 1}
					}
    #cta p b:last-child{
       color:#13090C;
    }
    #home2{
        background-color:white;
        padding:0;
        margin:0;
        border:2px solid black;
    }
    #home2_title{
        color:#102033;
        position:relative;
        padding-top:2%;
        font-size:60px;
        font-family: 'Open Sans', sans-serif;
        -webkit-animation:up 1s linear 2s;
    }
    @-webkit-keyframes up{
						0%{transform:translateY(20%); opacity: 0}
                        100%{transform:translateY(0); opacity: 1}
    }
    #container{
        position:relative;
        padding-top:4%;
        display:flex;
        justify-content:center;
        align-items:flex-start;
        /* border:1px solid black; */
    }
    .description{
        position:relative;
        padding:0 5%;
        transition: all 0.2s ease;
        /* border:1px solid black; */
        
    }
    .description:hover{
        transform: scale(1.2);
					}
    .description .text{
        font-weight:400;
    }
    .description .text{
        width:20rem;
        /* border:1px solid black; */
    }
    .description #t3{
        position:absolute;
        top:58%;
    }
    #home3 #bg3{
        position:absolute;
        /* top:0;
        padding:0;
        margin:0; */
    }
    #home3{
        position:relative;
        display:flex;
        /* justify-content:center; */
        /* align-items:center; */
    }
    
    #h3picBox{
        width:100%;
        position:absolute;
        margin-top:10%;
        /* margin-left:6%; */
        display:flex;
        flex-direction:row;
        justify-content:center;
        align-items:center;
        /* border:1px solid black; */
        
    }
    #home3send,#home3fetch{
        margin:10% 0;
        transition: all 0.2s ease;
        cursor: pointer;
        /* border:1px solid black; */
        /* z-index:1; */
    }
    #home3send:hover,#home3fetch:hover{
        transform:scale(1.2);
    }
    #h3picBox p{
        color:white;
        font-size:60PX;
        font-weight:600;
    }
    #home3title{
        color:white;
        position:absolute;
        top:-20%;
        font-size:30px;
        font-weight:200;
    }
    #or{
        color:white;
        position:absolute;
        top:64%;
        font-size:24px;
        font-weight:100;
    }
    footer{
        width:100%;
        height:12%; 
        position: absolute;
        margin-top:55%;
        background-color:#0A1827;
        color: white;
        display:flex;
        justify-content:center;
        align-items:center;

    }
    </style>
    </head>
    
    <body>
    <header>
        <div id="header" >
            <?php include("head.php"); ?>
        </div>
    </header>
    <div ><img id="bg1" src="images/homepage/homepage_bg1.png" width="100%"><div id="cta"><p>Start your Wonderful<br> 
Spiritual Journey With <b>Anonymous<b>.<p></div></div>
    <div id="home2">
        <div id="home2_title"><p>How It Works</p></div>
        <div id="container">
            <div class="description">
                <div class="hiwpic">
                    <img src="images/homepage/howitworks_1.png" width="258px">
                </div>
                <div class="text">
                    <p>Use our canvas to create your original post card.</p>
                </div>
            </div>
            <div class="description">
                <div class="hiwpic">
                    <img src="images/homepage/howitworks_2.png" width="256px">
                </div>
                <div class="text">
                    <p>Use our canvas to create your original post card.</p>
                </div>
            </div>
            <div class="description">
                <div class="hiwpic">
                    <img src="images/homepage/howitworks_3.png" width="350px">
                </div>
                <div class="text" id="t3">
                    <p>Use our canvas to create your original post card.</p>
                </div>
            </div>  
        </div>
        <div><img src="images/homepage/homepage2_bottom.png" width="100%"></div>
    </div>
   
        <div id="home3">
            <div><img id="bg3" src="images/homepage/homepage_bg3.png" width="100%"></div>
           
            <div id="h3picBox">
            <div id="home3title"><p>Now you wanna</p></div>
                <div>
                    <div id="home3send">
                        <img src="images/homepage/homepage3_send.png" width="60%">
                    </div>
                    <div><p><a href="sendcard.php">Send</a></p></div>
                </div>
                <div>
                    <div id="home3fetch">
                        <img src="images/homepage/homepage3_fetch.png" width="60%">
                    </div>
                    <div><p>Fetch</p></div>
                </div>
                <div id="or"><p><i>or</i></p></div>
            </div>
        </div>
   <footer><p><b>MagicPostal</b>&nbsp;&nbsp;Copyright ©2020</p></footer>
</body>
</html>