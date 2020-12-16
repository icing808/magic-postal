<?php
session_start();

$userCardId = $_GET["userCardId"];

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
                                AND a1.`user_id` = '$userId'
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

  try{
      $stmt->execute();
      $stmt2->execute();
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
              <h1>Send History</h1>
            </div>

        <div class="showCard-list">
            <!-- <div class="cardLeft">
                    <div class="likesDiv">
                        <img src="images/mailbox/mailbox_inbox_card_likes.png" alt="">
                        <div id="likesphp"> 10likes </div>
                    </div>
                    <div class="reportDiv">
                        <img src="images/mailbox/mailbox_inbox_card_report.png" alt="">
                        <div id="reportphp"> Report</div>
                    </div>
                    <div class="deleteDiv">
                        <img src="images/mailbox/mailbox_inbox_card_delete.png" alt="">
                        <div id="deletephp"> Delete </div>
                    </div>
            </div> -->

            <div class="cardMid">
                <div class="cardDetail">

            <?php
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
                        <div class="postcard">

                            <img src="images/<?php echo($row['card_url']) ?>" alt=""/>
                        </div>
                        <!-- <div class="cardTitle">
                            <?php echo($row['card_name']) ?>
                        </div> -->
                        <div class="cardWords">
                            <?php echo($row['content']) ?>
                        </div>
            <?php
                    }
            ?>
                </div>

            </div>
        <!-- different from inbox-list.php -->
            <div class="cardRight">
            <?php
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
                <!-- <div class="cardInfo">

                    <p>Sent Date: Dec 8th, 2020</p>
                    <p>Reply From anonymous:</p>
                </div>-->
                <div id="feedBack">
                    <div class="feedBackRoll"id="fdback1">Bitter reality is here that's true</div>
                    <div class="feedBackRoll"id="fdback2">We have to fight it with love and empathy..</div>
                    <div class="feedBackRoll"id="fdback3">Kind hearts makes a difference.</div>
                </div>
            </div>
        </div>
        </div>
    </div>

    </body>
    </html>
