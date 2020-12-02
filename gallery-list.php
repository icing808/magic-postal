<?php
session_start();

include("includes/db-config.php");

$count = $pdo->query("SELECT count(1) as c FROM `postcard_template` WHERE `order_no` IS NOT NULL;");

$stmt = $pdo->prepare("SELECT * FROM `postcard_template` 
                        WHERE`order_no`IS NOT NULL ORDER BY `order_no`;");
 try{
 	$stmt->execute();
 } catch(PDOException $e) {   
     echo 'Error: ' . $e->getMessage(); 
 }

?>
<div id="gallery_list">
    <?php	
        foreach($count as $s){
            if ($s['c']=='0'){
                echo ("No result");
            } else {
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
                    <ul>
                        <li>Card Name:<?php echo($row['card_name']) ?></li>
                        <li><img src="images/<?php echo($row['img_url']) ?>" width="25%" /></li>
                        <li>Description:<?php echo($row['description']) ?></li>
                    </ul>
    <?php
                }
            }
        }
    ?>
</div>    
