<?php

session_start();

$receivedId = $_POST["receivedId"];

include("includes/db-config.php");

$stmt = $pdo->prepare("DELETE FROM `user_postcard_reply` WHERE `id` = '$receivedId' ; ");
	
$stmt->execute();


header("Location: inbox.php");


?>