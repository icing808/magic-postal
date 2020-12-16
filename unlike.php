<?php

session_start();

$userId = $_POST["userId"];
$cardId = $_POST["cardId"];

// echo "$userId" + " $cardId";

include("includes/db-config.php");

$stmt = $pdo->prepare("UPDATE `postcard_user_like` SET `is_like` = 0 WHERE `user_id` = $userId AND `card_id` = $cardId;");    
	
$stmt->execute();



?>