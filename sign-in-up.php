<?php
session_start();

?>

<!DOCTYPE html>
<html>
    <head></head>
    <title>magic postal - start page</title>
    <body>
    <header></header>
    <div id="main">
    <?php
        if(isset($_GET["isLogin"]) && $_GET["isLogin"] == 0){
            echo("<span style='color:red'>Sorry, Incorrect email/password, please sign in again</span>");
        }
        if(isset($_GET["isRegister"]) && $_GET["isRegister"] == 1){
            echo("<span style='color:green'>Sign up successful, please sign in </span>");
        }
    ?>
    <div id="sign_in">
        <form action="process-signin.php" method="POST"> 
            <p>Sign In</p>
            Email: <input type="email" name="email">
            Password: <input type="password" name="password">
            <input type="submit" name="submit1" value="Sign In" />
        </form>
    </div>

    <div id="sign_up">
        <form action="process-signup.php" method="POST"> 
            <p>Sign Up</p>
            <ul>
            <li>First Name:       <input type="text" name="fName">         </li>
            <li>Last Name:        <input type="text" name="lName">         </li>
            <li>Email Address:    <input type="email" name="emailAddr">    </li>
            <li>Password:         <input type="password" name="password">  </li>
            <li>Confirm Password: <input type="password" name="cPassword"> </li>
            <li>Born Date:        <input type="date" name="bod">
            <li><input type="submit" name="submit2" value="Sign Up" /></li>
            <ul>
        </form>
    </div>
    </div>
    <footer></footer>
    </body>
</html>