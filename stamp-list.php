<?php
session_start();

include("includes/db-config.php");

$count = $pdo->query("SELECT count(1) as c FROM `stamp_template` WHERE `order_no` IS NOT NULL;");

$stmt = $pdo->prepare("SELECT * FROM `stamp_template` 
                        WHERE`order_no`IS NOT NULL ORDER BY `order_no`;");
 try{
 	$stmt->execute();
 } catch(PDOException $e) {   
     echo 'Error: ' . $e->getMessage(); 
 }

?>
<div id="stamp_list">
    <?php	
        foreach($count as $s){
            if ($s['c']=='0'){
                echo ("No result");
            } else {
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
                    <ul>
                        <li>Stamp Name:<?php echo($row['stamp_name']) ?></li>
                        <li><img src="images/<?php echo($row['img_url']) ?>" width="10%" /></li>
                        <li>Description:<?php echo($row['description']) ?></li>
                    </ul>
    <?php
                }
            }
        }
    ?>
</div>    
