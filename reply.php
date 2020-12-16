<?php

session_start();


$fdback1 = $_POST["fdback1"];
$reply_user_id = $_POST["reply_user_id"];
$user_postcard_id = $_POST["user_postcard_id"];
$replyId = $_POST["replyId"];

include("includes/db-config.php");

$stmt = $pdo->prepare("INSERT INTO `user_postcard_reply` (`reply_user_id`, `user_postcard_id`, `reply_content`, `status`) VALUES
($reply_user_id, $user_postcard_id, '$fdback1', 2);");    
	
$stmt->execute();

header("Location: inbox-card-open.php?userCardId=" . "$user_postcard_id" . "&replyId=" . "$replyId");

?>

