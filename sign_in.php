
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
            <div id="logo"><img class="logo" src="images/logo.png" /><div>
            <div id="nav1">
                <ul class="nav_links1">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">MailBox</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </div>
            <div id="nav2">
                <ul class="nav_links2">
                    <li><a href="#">Sign Up</a></li>
                    <li><a href="#">Sign In</a></li>
                
                </ul>
            </div>  
        </div>
    </header>
    <div id="bgImage">
        <div id="main">
            <div id="sign_in">
                <form action="process-signin.php" method="POST"> 
                    <h1>Sign In</h1>
                    <div id="image"><img src="images/signin&signup/signin_img.png" width="140px"></div>
                    <input type="email" name="email" placeholder="Email Address">
                    <input type="password" name="password" placeholder="Password">
                    <input id="button" type="submit" name="submit1" value="Sign In" />
                </form>
                <p><a href="#">Forget your ID or password?</a></p>
                <p><a href="sign_up.php">Create an account Now</a></p>
            </div>
        </div>
    <div>
    <div><footer><p><b>MagicPostal</b>&nbsp;&nbsp;Copyright ©2020</p></footer><div>
    </body>
</html>