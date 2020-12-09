<?php
// $firstName = $_POST["fName"];
// $lastName = $_POST["lName"];
$emailAddress = $_POST["emailAddr"];
// $bod = $_POST["bod"];
$password = $_POST["password"];
$cPassword = $_POST["cPassword"];
$roleId = 2;

if( 
     empty($emailAddress) 
     || empty($password) 
     || empty($cPassword)
    || ($password != $cPassword) 
    ){
    header("Location: sign_up.php?isRegister=0");
}
include("includes/db-config.php");
$firstName = explode('@', $emailAddress)[0];
// $stmt = $pdo->prepare("INSERT INTO `user` (`first_name`, `last_name`, `email`, `role_id`, `born_date`, `password`) 
// VALUES ('$firstName', '$lastName', '$emailAddress', '$roleId', '$bod', '$password');");
$stmt = $pdo->prepare("INSERT INTO `user` (`first_name`, `last_name`, `email`, `role_id`, `born_date`, `password`) 
VALUES ('$firstName', null, '$emailAddress', '$roleId', null, '$password');");

$stmt->execute();

header("Location: sign_in.php?isRegister=1");

?>