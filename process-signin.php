<?php
session_start();
$email = $_POST["email"];
$password = $_POST["password"];

include("includes/db-config.php");

$stmt = $pdo->prepare("SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password';");

$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
if($row){  
    $_SESSION["userId"] = $row["user_id"];
    $_SESSION["roleId"] = $row["role_id"];
    $_SESSION["nickName"] = $row["first_name"] . " " . $row["last_name"];

    echo("<script>console.log('".$_SESSION["userId"]."');</script>");

    header("Location: home.php");
    
    
}else {
    header("Location: sign_in.php?isLogin=0");
}

?>