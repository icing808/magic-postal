<?php
session_start();
include("includes/db-config.php");

?>
<div id="send_list">
    <p>Sent List</p>
    <?php
        if(!isset($_SESSION["userId"])){
            echo("<p>Please Login!</p>");
        } else {
            $userId = $_SESSION["userId"];
            $count = $pdo->query("SELECT count(1) as c FROM `user_postcard`
                                    WHERE `status` = 2 
                                    AND `user_id` = '$userId';");

            $stmt = $pdo->prepare("SELECT a1.id,a1.`card_id`,a1.`stamp_id`,a1.`content`,a1.`country_code`,a1.`city_code`,a1.`area_code`,a1.`created_on`, 
                                            a2.`card_name`,a2.`img_url` AS card_url, 
                                            a3.`stamp_name`,a3.`img_url` AS stamp_url 
                                            FROM `user_postcard` AS a1 
                                            LEFT JOIN `postcard_template` AS a2 ON a2.`id` = a1.`card_id` 
                                            LEFT JOIN `stamp_template` AS a3 ON a3.`id` = a1.`stamp_id` 
                                            WHERE a1.`status` = 2 
                                            AND a1.`user_id` = '$userId'
                                            ORDER BY a1.`created_on` DESC, a1.`id` DESC;");
            try{
                $stmt->execute();
            } catch(PDOException $e) {   
                echo 'Error: ' . $e->getMessage(); 
            }
            foreach($count as $s){
                if ($s['c']=='0'){
                    echo ("<p>No result</p>");
                } else {
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
                        <section id="user_card_id_<?php echo($row['id']) ?>">
                            <ul>
                                <li>Card Name: <?php echo($row['card_name']) ?></li>
                                <li>Card Pic:  <img src="images/<?php echo($row['card_url']) ?>" width="25%" /></li>
                                <li>Stamp Name:<?php echo($row['stamp_name']) ?></li>
                                <li>Stamp Pic: <img src="images/<?php echo($row['stamp_url']) ?>" width="10%" /></li>
                                <li>Content:   <?php echo($row['content']) ?></li>
                                <li>Sent Date:   <?php echo($row['created_on']) ?></li>
                                <li><a href="reply-list.php?userCardId=<?php echo($row['id']) ?>">Who reply me?</a></li>
                            </ul>
                        </section>
    <?php
                    }
                }
            }
        }
    ?>
</div>    
