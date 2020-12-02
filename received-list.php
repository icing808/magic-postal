<?php
session_start();
include("includes/db-config.php");

?>
<div id="received_list">
    <p>Received List</p>
    <?php
        if(!isset($_SESSION["userId"])){
            echo("<p>Please Login!</p>");
        } else {
            $userId = $_SESSION["userId"];
            $count = $pdo->query("SELECT count(1) as c FROM `user_postcard_reply` AS a1 
                                    INNER JOIN `user_postcard` AS a4 ON a4.`id` = a1.`user_postcard_id`
                                    WHERE a1.`status` = 2 
                                    AND a1.`reply_user_id` = '$userId';");

            $stmt = $pdo->prepare("SELECT a1.id,a1.`reply_content`,a1.`country_code` AS r_country,a1.`city_code` AS r_city,a1.`area_code` AS r_area,a1.`status`,a1.`receive_on`,a1.`reply_on`,a1.`modified_on`, 
                                            a4.`card_id`,a4.`stamp_id`,a4.`content`,a4.`country_code` AS f_country,a4.`city_code` AS f_city,a4.`area_code` AS f_area, 
                                            a2.`card_name`,a2.`img_url` AS card_url, 
                                            a3.`stamp_name`,a3.`img_url` AS stamp_url 
                                            FROM `user_postcard_reply` AS a1 
                                            INNER JOIN `user_postcard` AS a4 ON a4.`id` = a1.`user_postcard_id` 
                                            LEFT JOIN `postcard_template` AS a2 ON a2.`id` = a4.`card_id` 
                                            LEFT JOIN `stamp_template` AS a3 ON a3.`id` = a4.`stamp_id` 
                                            WHERE a1.`status` = 2 
                                            AND a1.`reply_user_id` = '$userId' 
                                            ORDER BY a1.`reply_on` DESC, a1.`id` DESC");


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
                                <li>Come From:   <?php echo($row['f_country'] . ' ' . $row['f_city'] . ' ' . $row['f_area']) ?></li>
                                <li>I Received Date:   <?php echo($row['receive_on']) ?></li>
                                <li>I Reply Date:   <?php echo($row['reply_on']) ?></li>
                                <li>I Reply Content:   <?php echo($row['reply_content']) ?></li>
                            </ul>
                        </section>
    <?php
                    }
                }
            }
        }
    ?>
</div>    
