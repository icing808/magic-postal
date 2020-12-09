<div id="logo"><img class="logo" src="images/logo.png" /><div>
<div id="nav1">
    <ul class="nav_links1">
        <li><a href="home.php">Home</a></li>
        <li><a href="inbox.php">MailBox</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="#">About</a></li>
    </ul>
    <input type="hidden" id="currentUserId" value="<?php if(isset($_SESSION["userId"])){echo($_SESSION["userId"]);} ?>"/>
</div>
<div id="nav2">
    <?php
        
        if(isset($_SESSION["nickName"])){
    ?>
            <ul class="nav_links2">
            <li>Hi，<?php echo($_SESSION["nickName"]); ?></li>
            <li><a href="sign-out.php">Sign Out</a></li>
            </ul>
    <?php
        } else {
    ?>
            <ul class="nav_links2">
                <li><a href="sign_up.php">Sign Up</a></li>
                <li><a href="sign_in.php">Sign In</a></li>
            </ul>
    <?php 
        }
    ?>
</div> 