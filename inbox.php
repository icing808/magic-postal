<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
      <title>Magic Postal</title>
      <link rel="stylesheet" href="css/main.css" />
      <link rel="stylesheet" href="css/inbox.css" />
      <link rel="icon" type="image/png" href="images/favicon.png"/>
      <meta name="description" content="Anonymous postcard">
      <meta name="keywords" content="anonymous, postcard">
    </head>
    
    <body id="inbox-body">
    <header>
        <div id="header" >
            <?php include("head.php"); ?>
        </div>
    </header>
    
    <div id="inbox-content">

    <div class=flag>
      <div class='col2 left-top'>

      </div>
      <div class='col2 left-bottom'>

      </div>
      <div class='col1 right'>
        <div id="inbox-title">
          <h1>Inbox List</h1>
        </div>

        <div>
          <form action="" id="inbox-date">
            <label for="inbox-date-title">Select date:</label>
            <input type="date" id="inbox-date-input" name="date">
          </form>

          <form id="inbox-search" action="">
            <label for="gsearch">Title:</label>
            <input type="search" id="gsearch" name="gsearch" value="Search title">
            <input type="submit" hidden>
          </form>
        </div>

        <div class="receive-list">
          <?php include("./received-list.php") ?>
        </div>

        <
        



      </div>
    </div>

    </div>


   <!-- <footer><p><b>MagicPostal</b>&nbsp;&nbsp;Copyright ©2020</p></footer> -->
</body>

<script>




</script>


</html>