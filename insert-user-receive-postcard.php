<?php
session_start();

$userId = $_SESSION["userId"];

include("includes/db-config.php");
$stmt = $pdo->prepare("INSERT INTO `user_postcard_reply` (`reply_user_id`,`user_postcard_id`,`status`) 
                        SELECT '$userId',id,1 FROM `user_postcard` 
                        WHERE `user_id` <> '$userId'
                        AND `send_to` IS NULL
                        AND `id` NOT IN ( 
                            SELECT `user_postcard_id` FROM `user_postcard_reply` WHERE `reply_user_id` = '$userId' 
                            ) ORDER BY `created_on` LIMIT 2 ;");

try{
    $stmt->execute();
} catch(Exception $e) {   
    echo 'Error: ' . $e->getMessage(); 
}

?>

