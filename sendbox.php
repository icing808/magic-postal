<?php
session_start();

include("includes/db-config.php");

if(!isset($_SESSION["userId"])){
  header("Location: ./sign_in.php");
}
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

?>



<!DOCTYPE html>
<html>
    <head>
      <title>Magic Postal</title>
      <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
        <META HTTP-EQUIV="Cache-Control" CONTENT="no-cache">
        <META HTTP-EQUIV="Expires" CONTENT="0">

      <link rel="stylesheet" href="css/main.css" />
      <link rel="stylesheet" href="css/inbox2.css" />
      <link rel="stylesheet" href="css/send-history-inbox-card-open.css" />
      <meta name="description" content="Anonymous postcard">
      <meta name="keywords" content="anonymous, postcard">
    </head>

    <body>
      <!-- <img src="images/mailbox/mailbox_bg.png"> -->
    <header>
        <div id="header" >
          <?php include("head.php"); ?>
        </div>
    </header>

    <div id="inbox-content">

    <div class=flag>
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
      <div class='col1 right'>
            <div id="inbox-title">
              <h1>Send List</h1>
            </div>

            <div id="right-up">
              <form action="" id="inbox-date">
                <label for="inbox-date-title">Select date:</label>
                <input type="date" id="inbox-date-input" name="date">
              </form>

              <!-- <form id="inbox-search" action="">
                  <label for="gsearch">Title:</label>
                  <input type="search" id="gsearch" name="gsearch" value="Search title">
                  <input type="submit" hidden>
                </form> -->
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
                          <!-- <div class="bin" id="bin<?php echo($row['id']) ?>">
                            <img src="images/mailbox/mailbox_message_delete.png" alt="Discard">
                          </div> -->
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
            <div id="down-right">
            <button type="button" class="Button" id="inboxSend" name="sendCard" onclick="location.href='home.php'" >Send a card</button>
            <button type="button" class="Button" id="inboxFetch" name="fetchCard"onclick="location.href='home.php'" >Fetch a card</button>
            </div>
        </div>
    </div>

    </body>
    </html>
