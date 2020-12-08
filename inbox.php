<?php
session_start();
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
    </head>

    <body>
      <!-- <img src="images/mailbox/mailbox_bg.png"> -->
    <header>
    <div id="header" >
            <div id="logo"><img class="logo" src="images/logo.png" /><div>
            <div id="nav1">
                <ul class="nav_links1">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="mailbox.php">MailBox</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </div>
            <div id="nav2">
                <ul class="nav_links2">
                    <li><a href="sign_up.php">Sign Up</a></li>
                    <li><a href="sign_in.php">Sign In</a></li>

                </ul>
            </div>
        </div>
    </header>

    <div id="inbox-content">

    <div class=flag>
      <div class='col2 left-top'>
            <img src="images/mailbox/mailbox_inbox_icon.png" alt="">
            <p>Inbox</p>

      </div>
      <div class='col2 left-bottom'>
            <img src="images/mailbox/mailbox_sent_icon.png" alt="">
            <p>Sent</p>
      </div>
      <div class='col1 right'>
            <div id="inbox-title">
              <h1>Inbox List</h1>
            </div>

         <div id="right-up">
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
            <div class="line" id="line1">
                <div class="Title" id="TitleNum1">Tile 123456</div>
                <div class="Time" id="TimeNum1">11:40AM</div>
                <div class="bin"i d="bin1">
                <img src="images/mailbox/mailbox_message_delete.png" alt="">
                </div>
            </div>

            <div class="line" id="line2">
                <div class="Title" id="TitleNum2">Tile 123456</div>
                <div class="Time" id="TimeNum2">11:09AM</div>
                <div class="bin"i d="bin2">
                <img src="images/mailbox/mailbox_message_delete.png" alt="">
                </div>
            </div>

            <div class="line" id="line3">
                <div class="Title" id="TitleNum3">Tile 123456</div>
                <div class="Time" id="TimeNum3">YESTERDAY</div>
                <div class="bin"i d="bin3">
                <img src="images/mailbox/mailbox_message_delete.png" alt="">
                </div>
            </div>

            <div class="line" id="line4">
                <div class="Title" id="TitleNum4">Tile 123456</div>
                <div class="Time" id="TimeNum4">YESTERDAY</div>
                <div class="bin"i d="bin4">
                <img src="images/mailbox/mailbox_message_delete.png" alt="">
                </div>
            </div>

            <div class="line" id="line5">
                <div class="Title"  id="TitleNum5">Tile 123456</div>
                <div class="Time" id="TimeNum5">YESTERDAY</div>
                <div class="bin"i d="bin5">
                <img src="images/mailbox/mailbox_message_delete.png" alt="">
                </div>
            </div>

        </div>
          <div id="rightDown">
            <div class="showCardsNum">
                <!-- php -->
           </div>

            <button type="button" class="Button"name="Send a card">Send a card</button>
            <button type="button" class="Button" id="fetchButton"name="Send a card">Fetch a card</button>

        </div>
    </div>

    </body>
    </html>
