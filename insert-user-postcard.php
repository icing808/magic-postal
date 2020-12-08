<?php
session_start();

$templateId = $_POST["cardTemplateId"];
$stampId = $_POST["cardStampId"];
$content = $_POST["cardContentId"];

$userId = $_SESSION["userId"];


if( empty($templateId) 
     || empty($stampId) 
     || empty($content) 
    ){
    header("Location: sendcard.php?isSave=0");
}
include("includes/db-config.php");


$stmt = $pdo->prepare("INSERT INTO `user_postcard` (`user_id`, `card_id`, `content`, `stamp_id`, `status`) 
VALUES ('$userId', '$templateId', '$content', '$stampId', 2);");

try{
    $stmt->execute();
} catch(Exception $e) {   
    echo 'Error: ' . $e->getMessage(); 
}

header("Location: sendcard.php?isSave=1");

?>