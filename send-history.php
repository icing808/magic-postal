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
      <link rel="icon" type="image/png" href="images/favicon.png"/>
      <meta name="description" content="Anonymous postcard">
      <meta name="keywords" content="anonymous, postcard">
    </head>
<style>

body{
  background-image: url('images/mailbox/mailbox_bg.png');
  background-size: cover;
}

#inbox-content{
  height: 700px !important;
  width: 1200px !important;
  margin-top: 8em;
  margin-bottom: 3em;
  margin-left: 5vw;
  margin-right: 7vw;
  color: transparent;
  /* border:1px solid grey; */
  position: absolute;
  top:0;
  left:0;
}


.row {
  display: flex;
  flex-wrap: wrap;
}

.side {
  flex: 20%;
  background-color: #f1f1f1;
  padding: 20px;
}

/* Main column */
.main {
  flex: 80%;
  background-color: white;
  padding: 20px;
}

.flag{
  position:relative;
  display:flex;
  flex-flow:column wrap;
  width:86vw;
  height:80vh;
  /* border:2px solid black; */
}

.right{background:white;}
.left-top{background:#B0C5ED;}
.left-bottom{background:#466085;}

.col1{
  width:80%;
  height:100%;
  border-radius: 10px;
  padding: 30px;
  margin-left: 10px;
  /* border: 1px solid red; */
}

.col2{
  width:20%;
  height:49.5%;
  border-radius: 10px;
  cursor: pointer;
  /* border: 1px solid pink; */
}

.col2 + .col2 {
  margin-top: 0.5%;
}
.col2 p {
  color: white;
  font-weight: bold;

}
.col2 img{
    position: relative;
    margin-top: 50%;
    width: auto;
}
.left-bottom img{
    margin-top: 60%;
}

#inbox-title {
  /* border: 1px solid red; */
  width: 100%;
  float: left;
}

#inbox-title h1 {
  color: black;
  float: left;
  margin-top: 0px;
}
#inbox-title img{
    float:left;
    padding: 10px;

}

.showCard-list{
  margin-top: 5em;
  background-color: #FAFAFA;
  color: black;
  width: 100%;
  height: 70%;
  border-radius: 4px;
  position: relative;


}
.cardLeft{
    /* border: 1px solid red; */
    width: 10%;
    height: 100%;
    float: left;
    font-weight: bold;
}
.likesDiv{
    margin-top: 50%;

}
.reportDiv,.deleteDiv{
    margin-top: 20%;
}
.cardMid{
    /* border: 1px solid red; */
    width: 50%;
    height: 100%;
    float: left;
}
.cardDetail{
    width: 80%;
    background-color:#FFFFFF;
    margin: 10%;
    box-shadow: #EFEFEF 0px 0px 3px 5px;
}
.postcard{
    position: relative;
}
.postcard img{
    position: relative;
    width: 100%;
}
.cardTitle{
    color:purple;
    font-size: 20px;
    font-weight: bold;
    position: relative;
    left: -50px;
    top:-200px;
}
.cardWords{
    position: relative;
    text-align: left;
    margin-left: 10%;
    top:-150px;
    overflow: hidden;
}

.cardWords p{
    overflow: hidden;
}
#signname{
    text-align: right;
    margin-right: 10%;
}


.cardRight{
    /* border: 1px solid red; */
    width: 40%;
    height: 100%;
    float: left;
    overflow: hidden;
}
.cardInfo{
    margin-top: 10%;

}
.cardInfo p{
    font-style: italic;
    text-align: left;
    text-indent: 10%;
}
#feedBack{

}
.feedBackRoll{
    margin-top: 2%;
    width: 90%;
    height: 100px;
    background-color: #FFFFFF;
    text-indent: 10px;
    color:#949595;
    border-radius: 4px;
    text-align: left;
    font-style: italic;
}
#fdback1{
    margin-top:5%;
}

#replyButton{
    margin-top: 8%;
    width: 80%;
    margin-left: auto;
    background-color: #506889;

}
#replyButton:hover{
    background-color: #455975;
}

#rightDown{
  width: 100%;
  position: relative;
  display: flex;
  margin-top: 30px;
  /* border: 1px solid red; */
  height: 40px;
  font-weight: bold;
}
.icon img{
    /* border: 1px solid green; */
    position: relative;
    top:6px;
    width: 14px;
    margin-left: 10px;
    margin-right: 10px;
}
.icon{
    color: black;
    /* border: 1px solid red; */
    margin: 0 auto;
}
#iconNex{
    margin-left: -20%;
}
.Button{
    height: 40px;
    color:white;
    border: 0px;
    border-radius: 4px;
    position: relative;
    margin-right: 0%;
    right: 0px;
}


</style>

    <body>
      <!-- <img src="images/mailbox/mailbox_bg.png"> -->
    <header>
        <div id="header" >
            <?php include("head.php"); ?>
        </div>
    </header>

    <div id="inbox-content">

    <div class=flag>
      <div class='col2 left-top' onclick="location.href='inbox.php'">
            <img src="images/mailbox/mailbox_inbox_icon.png" alt="">
            <p>Inbox</p>

      </div>
      <div class='col2 left-bottom' onclick="location.href='sendbox.php'" >
            <img src="images/mailbox/mailbox_sent_icon.png" alt="">
            <p>Sent</p>
      </div>

<!-- difference from inbox: -->

      <div class='col1 right'>
            <div id="inbox-title">
              <img src="images/back_black.png" alt="">
              <h1>Send History</h1>
            </div>

        <div class="showCard-list">
            <div class="cardLeft">
                    <div class="likesDiv">
                        <img src="images/mailbox/mailbox_inbox_card_likes.png" alt="">
                        <div id="likesphp"> 10likes </div>
                    </div>
                    <!-- <div class="reportDiv">
                        <img src="images/mailbox/mailbox_inbox_card_report.png" alt="">
                        <div id="reportphp"> Report</div>
                    </div> -->
                    <div class="deleteDiv">
                        <img src="images/mailbox/mailbox_inbox_card_delete.png" alt="">
                        <div id="deletephp"> Delete </div>
                    </div>
            </div>
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
                </div>

                <div id="feedBack">
                    <div class="feedBackRoll"id="fdback1">Bitter reality is here that's true</div>
                    <div class="feedBackRoll"id="fdback2">We have to fight it with love and empathy..</div>
                    <div class="feedBackRoll"id="fdback3">Kind hearts makes a difference.</div>
                </div> -->


            </div>


        </div>

<!-- end of changed from inbox-list.php -->

          <div id="rightDown">
                <div class="icon" id="iconPre">
                    <img src="images/back_black.png" alt="">
                     Previous
                </div>
                <div class="icon" id="iconNex">
                       Next
                       <img src="images/back_black2.png" alt="">
                </div>
        </div>

        </div>
    </div>

    </body>
    </html>
