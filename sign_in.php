
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
    <div id="sign_in_up_main">
        <div id="sign_in_up_main_container">
            <div id="sign_in_form">
                <form action="process-signin.php" method="POST"> 
                    <h1>Sign In</h1>
                    <div id="image"><img src="images/signin&signup/signin_img.png" width="140px"></div>
                    <?php
                        if(isset($_GET["isLogin"]) && $_GET["isLogin"] == 0){
                            echo("<span style='color:red'>Sorry, Incorrect email/password, please sign in again</span>");
                        }
                        if(isset($_GET["isRegister"]) && $_GET["isRegister"] == 1){
                            echo("<span style='color:green'>Sign up successful, please sign in </span>");
                        }
                    ?>
                    <input type="email" name="email" placeholder="Email Address">
                    <input type="password" name="password" placeholder="Password">
                    <input id="button" type="submit" name="submit1" value="Sign In" />
                </form>
                <!-- <p><a href="#">Forget your ID or password?</a></p> -->
                <p><a href="sign_up.php">Create an account Now</a></p>
            </div>
        </div>
    <div>
    <footer><p><b>MagicPostal</b>&nbsp;&nbsp;Copyright ©2020</p></footer>
    </body>
</html>