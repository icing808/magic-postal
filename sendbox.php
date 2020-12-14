<?php
session_start();

include("includes/db-config.php");

if(!isset($_SESSION["userId"])){
  header("Location: ./sign_in.php");
} 
  $userId = $_SESSION["userId"];

  $sql1 = "";
  $sql2 = "";
  $createdOn = "";
  if(isset($_POST["sbox-date-input"])){
    $createdOn = $_POST["sbox-date-input"];
    $sql1 = "SELECT count(1) as c FROM `user_postcard`
            WHERE `status` = 2 
            AND date_format(`created_on`,'%Y-%m-%d') = '$createdOn'
            AND `user_id` = '$userId';";
    $sql2 = "SELECT a1.id,a1.`card_id`,a1.`stamp_id`,a1.`content`,a1.`country_code`,a1.`city_code`,a1.`area_code`,a1.`created_on`, 
            a2.`card_name`,a2.`img_url` AS card_url, 
            a3.`stamp_name`,a3.`img_url` AS stamp_url 
            FROM `user_postcard` AS a1 
            LEFT JOIN `postcard_template` AS a2 ON a2.`id` = a1.`card_id` 
            LEFT JOIN `stamp_template` AS a3 ON a3.`id` = a1.`stamp_id` 
            WHERE a1.`status` = 2 
            AND date_format(a1.`created_on`,'%Y-%m-%d') = '$createdOn'
            AND a1.`user_id` = '$userId'
            ORDER BY a1.`created_on` DESC, a1.`id` DESC;";
  } else {
    $sql1 = "SELECT count(1) as c FROM `user_postcard`
            WHERE `status` = 2 
            AND `user_id` = '$userId';";
    $sql2 = "SELECT a1.id,a1.`card_id`,a1.`stamp_id`,a1.`content`,a1.`country_code`,a1.`city_code`,a1.`area_code`,a1.`created_on`, 
            a2.`card_name`,a2.`img_url` AS card_url, 
            a3.`stamp_name`,a3.`img_url` AS stamp_url 
            FROM `user_postcard` AS a1 
            LEFT JOIN `postcard_template` AS a2 ON a2.`id` = a1.`card_id` 
            LEFT JOIN `stamp_template` AS a3 ON a3.`id` = a1.`stamp_id` 
            WHERE a1.`status` = 2 
            AND a1.`user_id` = '$userId'
            ORDER BY a1.`created_on` DESC, a1.`id` DESC;";
  }


  $count = $pdo->query($sql1);

  $stmt = $pdo->prepare($sql2);


  try{
      $stmt->execute();
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

#inbox-date,#inbox-search{
  color: black;
  font-size: 16px;
  font-weight: bold;
  float: left;
  margin-top: 10px;
}

#inbox-date-input,#gsearch{
    width: 160px;
    height: 28px;
    margin-left: 10px;
    background-color: #E2E8F0;
    border: 0px;
    border-radius: 4px;
    font-weight: bold;
    text-indent: 10px;
}
#gsearch{
    color:grey;
}
#inbox-search {
  color: black;
  font-size: large;
  float: right;
  margin-top: 10px;
}

.receive-list{
  margin-top: 8em;
  background-color: #FAFAFA;
  color: black;
  width: 100%;
  height: 70%;
  border-radius: 4px;
  position: relative;
  overflow-y: scroll;
}

#rightDown{
  width: 100%;
  position: relative;
  display: flex;
  margin-top: 20px;
}

.showCardsNum{
    width: 300px;
    height: 40px;
    border: 1px solid green;
    margin-right: 50px;
    color: purple;
}

#fetchButton{
    left: 30px;
    margin-left: 2%;
    margin-right: 6%;
}
.Button{
    width: 180px;
    height: 40px;
    background-color: #69426C;
    color:white;
    border: 0px;
    border-radius: 4px;
    position: relative;
    margin-left: 14%;
    margin-right: 0%;
    right: 0px;
}
.Button:hover{
    background-color: #4F3251;
}
.line{
    width: 100%;
    border:0px 0px 1px 0px;
    border-bottom: 1px solid #DEDEDE;
    border-width: thin;
    height: 20%;
    display:flex;
}
.Title{

    width: 70%;
    margin-left: 0px;
    text-align: left;
    text-indent: 30px;
    font-weight: bold;
    line-height: 60px;
    overflow:hidden;

}
.Time{

    width: 20%;
    text-align: left;
    font-weight: bold;
    font-size: 14px;
    line-height: 60px;
    overflow:hidden;
    margin-left: 10px;
}
.bin{
    width:10%;
}
.bin img{
    width: 14px;
    margin-top: 30%;
    margin-left: 10%;
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
      <div class='col2 left-bottom'onclick="location.href='sendbox.php'" >
            <img src="images/mailbox/mailbox_sent_icon.png" alt="">
            <p>Sent</p>
      </div>
      <div class='col1 right'>
            <div id="inbox-title">
              <h1>Send List</h1>
            </div>

            <div id="right-up">
              <form action="sendbox.php" id="inbox-date" method="POST">
                <label for="inbox-date-title">Select date:</label>
                <input type="date" id="sbox-date-input" name="sbox-date-input" value="<?php echo($createdOn) ?>">
                  <!-- <label for="gsearch">Title:</label>
                  <input type="search" id="gsearch" name="gsearch" value="Search title"> -->
                  <input type="submit" value="search">
                </form>
            </div>
            <div class="receive-list">
         <?php 
          $total = "0";
          foreach($count as $s){
                  if ($s['c']=='0'){
                      echo ("<div id='right-up'>No result</div>");
                  } else {
                    $total = $s['c'];
                      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
                        
                        <div class="line" id="line<?php echo($row['id']) ?>">
                          <div class="Title" id="TitleNum<?php echo($row['id']) ?>" onclick="location.href='send-history.php?userCardId=<?php echo($row['id']) ?>'">
                            <?php echo(strip_tags($row['content'])) ?>
                          </div>
                          <div class="Time" id="TimeNum<?php echo($row['id']) ?>"><?php echo($row['created_on']) ?></div>
                          <div class="bin" id="bin<?php echo($row['id']) ?>">
                            <a href="sendbox-delete.php?sendId=<?php echo($row['id']) ?>"><img src="images/mailbox/mailbox_message_delete.png" alt="Discard"></a>
                          </div>
                        </div>

        <?php
                      }
                  }
            }  
        ?> 
            </div>

            <div id="rightDown">
            <div class="showCardsNum">
                <p>Total: <?php echo($total) ?></p>
            </div>

            <button type="button" class="Button" id="inboxSend" name="sendCard" onclick="location.href='home.php'" >Send a card</button>
            <button type="button" class="Button" id="inboxFetch" name="fetchCard"onclick="location.href='home.php'" >Fetch a card</button>

        </div>
    </div>

    </body>
    </html>
