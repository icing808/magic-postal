<?php

session_start();

$sendId = $_GET["sendId"];

include("includes/db-config.php");

$stmt = $pdo->prepare("DELETE FROM `user_postcard` WHERE `id` = '$sendId' ; ");
	
$stmt->execute();


header("Location: sendbox.php");

?>