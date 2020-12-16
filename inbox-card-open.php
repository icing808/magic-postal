<?php
session_start();

$userCardId = $_GET["userCardId"];
$replyId = $_GET["replyId"];


include("includes/db-config.php");

if(!isset($_SESSION["userId"])){
  header("Location: ./sign_in.php");
}

$userId = $_SESSION["userId"];


$stmt = $pdo->prepare("SELECT a1.id,a1.`card_id`,a1.`stamp_id`,a1.`content`,a1.`country_code`,a1.`city_code`,a1.`area_code`,a1.`created_on`,
                                a2.`card_name`,a2.`img_url` AS card_url,
                                a3.`stamp_name`,a3.`img_url` AS stamp_url
                                FROM `user_postcard` AS a1
                                LEFT JOIN `postcard_template` AS a2 ON a2.`id` = a1.`card_id`
                                LEFT JOIN `stamp_template` AS a3 ON a3.`id` = a1.`stamp_id`
                                WHERE a1.`id` = '$userCardId'                   
                                ORDER BY a1.`created_on` DESC, a1.`id` DESC;");

$count = $pdo->query("SELECT count(1) as c FROM `user_postcard_reply` AS a1
                        INNER JOIN `user_postcard` AS a4 ON a4.`id` = a1.`user_postcard_id`
                        WHERE a1.`status` = 2
                        AND a1.`user_postcard_id` = '$userCardId';");

$stmt2 = $pdo->prepare("SELECT a1.id,a1.`reply_content`,a1.`country_code` AS r_country,a1.`city_code` AS r_city,a1.`area_code` AS r_area,a1.`status`,a1.`receive_on`,a1.`reply_on`,a1.`modified_on`,
                                a4.`card_id`,a4.`stamp_id`,a4.`content`,a4.`country_code` AS f_country,a4.`city_code` AS f_city,a4.`area_code` AS f_area,
                                a2.`card_name`,a2.`img_url` AS card_url,
                                a3.`stamp_name`,a3.`img_url` AS stamp_url
                                FROM `user_postcard_reply` AS a1
                                INNER JOIN `user_postcard` AS a4 ON a4.`id` = a1.`user_postcard_id`
                                LEFT JOIN `postcard_template` AS a2 ON a2.`id` = a4.`card_id`
                                LEFT JOIN `stamp_template` AS a3 ON a3.`id` = a4.`stamp_id`
                                WHERE a1.`status` = 2
                                AND a1.`user_postcard_id` = '$userCardId'
                                ORDER BY a1.`reply_on` DESC, a1.`id` DESC");

$stmt3 = $pdo->prepare("SELECT * FROM `postcard_user_like` WHERE `user_id` = $userId AND `card_id` = $userCardId;");

$stmt4 = $pdo->exec("INSERT IGNORE INTO `postcard_user_like` (`user_id`, `card_id`, `is_like`) VALUE ($userId, $userCardId, 0);");


// echo "$userId";
// echo "$userCardId";
  try{
      $stmt->execute();
      $stmt2->execute();
      $stmt3->execute();
      
  } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
  }


?>



<!DOCTYPE html>
<html>
    <head>
      <title>Magic Postal</title>
      <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
        <META HTTP-EQUIV="Cache-Control" CONTENT="no-cache">
        <META HTTP-EQUIV="Expires" CONTENT="0">

      <link rel="stylesheet" href="css/main.css" />
      <link rel="stylesheet" href="css/send-history-inbox-card-open.css" />
      <script type="text/javascript" src="./js/deleteCard.js"></script>
      <script type="text/javascript" src="./js/likeCard.js"></script>
      <link rel="icon" type="image/png" href="images/favicon.png"/>
      <meta name="description" content="Anonymous postcard">
      <meta name="keywords" content="anonymous, postcard">
    </head>
<style>
</style>

    <body>
      <!-- <img src="images/mailbox/mailbox_bg.png"> -->
    <header>
        <div id="header" >
            <?php include("head.php"); ?>
        </div>
    </header>

    <div id="inbox-content">

    <div class="flag">
    <div id="sendinbox">
      <div class='col2 left-top' onclick="location.href='inbox.php'">
            <img src="images/mailbox/mailbox_inbox_icon.png" alt="">
            <p>Inbox</p>

      </div>
      <div class='col2 left-bottom' onclick="location.href='sendbox.php'" >
            <img src="images/mailbox/mailbox_sent_icon.png" alt="">
            <p>Sent</p>
      </div>
  </div>

<!-- difference from inbox: -->

      <div class='col1 right'>
            <div id="inbox-title">
              <img src="images/back_black.png" alt="">
              <h1>Inbox List</h1>
            </div>
    <?php
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <div class="showCard-list">
            <div class="cardLeft">
                    <div class="likesDiv">
                        <img id="like_img" src="images/mailbox/mailbox_inbox_card_likes.png" alt="unlike" onclick="like_unlike(<?php echo $userId ?>, <?php echo $userCardId ?>)">                      
                        <?php

                        while($likeRow = $stmt3->fetch(PDO::FETCH_ASSOC)){
                            if ($likeRow['is_like'] == 0){
                                echo "<div id='likesphp'>Like</div>";
                            } else {
                                echo "<div id='likesphp'>Liked</div>";
                            }
                        }
                        ?>
                        
                        
                        <!-- <div id="likesphp"> Like </div> -->
                    </div>
                    <!-- <div class="reportDiv">
                        <img src="images/mailbox/mailbox_inbox_card_report.png" alt="">
                        <div id="reportphp"> Report</div>
                    </div> -->
                    <div class="deleteDiv" >
                        <img src="images/mailbox/mailbox_inbox_card_delete.png" alt="" onclick="deleteInnerCard(<?php echo $replyId ?>)">
                        <div id="deletephp"> Delete </div>
                    </div>
            </div>

            <div class="cardMid">
                <div class="cardDetail">

            
                        <div class="postcard">

                            <img src="images/<?php echo($row['card_url']) ?>" alt=""/>
                        </div>
                        <!-- <div class="cardTitle">
                            <?php echo($row['card_name']) ?>
                        </div> -->
                        <div class="cardWords">
                            <?php echo($row['content']) ?>
                        </div>
            
                </div>

            </div>
        <?php
            }
        ?>
        <!-- different from inbox-list.php -->
            <div class="cardRight">
                <div class="cardInfo">
            <?php
            // ?????changing???///
                    foreach($count as $s){
                        if ($s['c']=='0'){
                            echo ("<p>No Reply</p>");
                        } else {
                            while($row2= $stmt2->fetch(PDO::FETCH_ASSOC)) {
            ?>
                                <div class="cardInfo">
                                    <p><?php echo($row2['reply_on']) ?></p>
                                    <p>Reply From anonymous:</p>
                                    <div id="feedBack">
                                        <div class="feedBackRoll" id="fdback<?php echo($row2['id']) ?>">
                                            <?php echo($row2['reply_content']) ?>
                                        </div>
                                    </div>
                                </div>
            <?php
                            }
                        }
                    }
            ?>
            </div>
                <!--
                    <p>Sent Date: Dec 8th, 2020</p>
                    <p>Reply From anonymous:</p>
                -->
                <form action="reply.php" method="POST">
                    <input id="fdback1" type="text" name="fdback1" value="" placeholder="Something want to tell him/her?">
                    <input id="replyButton" type="submit" name="replyButton" value="Reply">
                    <input type="hidden" name="reply_user_id" value="<?php echo $userId ?>">
                    <input type="hidden" name="user_postcard_id" value="<?php echo $userCardId ?>">
                    <input type="hidden" name="replyId" value="<?php echo $replyId ?>">
                </form>
                 
            </div>
        </div>
        </div>
    </div>

    </body>
    </html>
