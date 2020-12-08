
<!DOCTYPE html>
<html>
    <head>
    <title>Magic Postal</title>
    <link rel="stylesheet" href="css/main.css"/>
    <!-- <link rel="stylesheet" href="css/gallery.css" /> -->
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <!-- <meta http-equiv="refresh" content="10"> -->
    <meta name="description" content="Anonymous postcard">
    <meta name="keywords" content="anonymous, postcard">
    <style>
    #main{
    /* border: 1px solid red; */
    position: absolute;
    width: 100%;
    height:100%;
    /* background: url('../images/gallery/gallery_bg.png');
    background-attachment: fixed;
    background-size: cover;*/
}
    p{
        color: white
    }
#leftCol{
    position:relative;
    width: 32%;
    /* border: 1px solid pink; */
    height:100%;
    /* top:10%; */
    left:-40%;

}
#rightCol{
    position:relative;
    width:60rem;
    /* height:100%; */
    left:32rem;
    top:-24rem;
    /* border: 1px solid black; */
    /* flex-wrap: wrap; */
}
.eveRow{
    display:flex;
    justify-content:center;
    align-items:center;
    /* border: 1px solid black; */
}
.eve img{
    width:98%;
    cursor:pointer;
    transition:all 0.1s linear;
    }
.eve img:hover{
    transform: scale(1.1);
    
}
    
  
#welcomeWords{
    font-family: 'Playfair Display', serif;
    font-size:20px;
    /* border: 1px solid yellow; */
    position: relative;
    top:14%;
    left:30%;
    line-height:20px;
    text-align: left;
    animation:show 1.5s linear;
    
}
@-webkit-keyframes show{
						0%{ transform:translateX(-50px);opacity:0;}
						100%{ transform:translateX(0px);opacity: 1;}

}
#wave{
    /* border: 1px solid green; */
    width: 86%;
    height: 160px;
    position: relative;
    top:18%;
}
#wave img{
    width: 100%;

}
#elves{
    /* border: 1px solid pink;
    width: 30%; */
    position: absolute;
    top:24%;
    left: 70%;
    animation: fly 3s linear 0s infinite;
}
@-webkit-keyframes fly{
						0%{ transform:translateY(0px)}
                        50%{ transform:translateY(30px)}
                        100%{ transform:translateY(0px)}

}
#explainWords{
    font-family: 'Playfair Display', serif;
    font-size:20px;
    top:22%;
    /* border: 1px solid white; */
    width: 54%;
    height: 200px;
    position: relative;
    margin-left: 44%;
    line-height:30px;
    text-align: left;
    animation:down 1.5s linear;
}
@-webkit-keyframes down{
						0%{ transform:translateY(-50px);opacity:0;}
						100%{ transform:translateY(0px);opacity: 1;}

}
/* footer{
        width:93.5rem;
        height:12%; 
        position: absolute;
        top:99%;
        left:-30rem;
        background-color:#0A1827;
        color: white;
        display:flex;
        justify-content:center;
        align-items:center;

    } */
    </style>
    </head>

    <body>
    <header>
        <div id="header" >
            <div id="logo"><img class="logo" src="images/logo.png" /><div>
            <div id="nav1">
                <ul class="nav_links1">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="mailbox.php">MailBox</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </div>
            <div id="nav2">
                <ul class="nav_links2">
                    <li><a href="sign_up.php">Sign Up</a></li>
                    <li><a href="sign_in.php">Sign In</a></li>
                </ul>
            </div>
        </div>
    </header>
    <img src="images/gallery/gallery_bg.png" width="100%" height="100%">
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
                <p>Here is an amazing collection of post cards from anonymous.
                    Every single card is one of a kind. Try to click on the envelopes...</p>
            </div>
            <div id="rightCol">
                <div class = "eveRow">
                    <div class="eve">
                        <img src="images/gallery/gallery_env1.png">
                    </div>
                    <div class="eve">
                        <img src="images/gallery/gallery_env2.png">
                    </div>
                    <div class="eve">
                        <img src="images/gallery/gallery_env3.png">
                    </div>
                </div>
                <div class = "eveRow">
                    <div class="eve">
                        <img src="images/gallery/gallery_env4.png">
                    </div>
                    <div class="eve">
                        <img src="images/gallery/gallery_env5.png">
                    </div>
                    <div class="eve">
                        <img src="images/gallery/gallery_env6.png">
                    </div>
                </div>
                <div class = "eveRow">
                    <div class="eve">
                        <img src="images/gallery/gallery_env7.png">
                    </div>
                    <div class="eve">
                        <img src="images/gallery/gallery_env8.png">
                    </div>
                    <div class="eve">
                        <img src="images/gallery/gallery_env9.png">
                    </div>
                <div>
            
        </div>
    </div>
    
        <!-- <footer>
            <p><b>MagicPostal</b>&nbsp;&nbsp;Copyright ©2020</p>
        </footer> -->
        
    </body>
</html>
