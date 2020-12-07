
<!DOCTYPE html>
<html>
    <head>
    <title>Magic Postal</title>
    <link rel="stylesheet" href="css/main.css" />
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <meta name="description" content="Anonymous postcard">
    <meta name="keywords" content="anonymous, postcard">
    <style>  
    footer{
        width:100%;
        height:10%; 
        position: fixed;
        bottom:0;
        background-color:#0A1827;
        color: white;
        display:flex;
        justify-content:center;
        align-items:center;

    }
    #main #button{
        margin-top:10%;
    }
    </style>
    </head>
    
    <body>
    <header>
        <div id="header" >
            <?php include("head.php"); ?>  
        </div>
    </header>
    <div id="bgImage">
        <div id="main">
            <div id="sign_in">
                <form action="process-signup.php" method="POST"> 
                    <h1>Sign Up</h1>
                    <div id="image"><img src="images/signin&signup/signup_img.png" width="140px"></div>
                    <input type="email" name="emailAddr" placeholder="Email Address">
                    <input type="password" name="password" placeholder="Password">
                    <input type="password" name="cPassword" placeholder="Confirm Password">
                    <input id="button" type="submit" name="submit2" value="Sign Up" />
                </form>
            </div>
        </div>
    <div>
    <div><footer><p><b>MagicPostal</b>&nbsp;&nbsp;Copyright ©2020</p></footer><div>
    </body>
</html>