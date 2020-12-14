<?php
session_start();

include("includes/db-config.php");

$count = $pdo->query("SELECT count(1) as c FROM `stamp_template` WHERE `order_no` IS NOT NULL;");

$stmt = $pdo->prepare("SELECT * FROM `stamp_template` 
                        WHERE`order_no`IS NOT NULL ORDER BY `order_no`;");
 try{
     $stmt->execute();
     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	 $json = json_encode($results);
     echo($json);
 } catch(PDOException $e) {   
     echo 'Error: ' . $e->getMessage(); 
 }

?>
  
