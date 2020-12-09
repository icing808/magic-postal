<?php
session_start();
if(!isset($_SESSION["userId"])){
    header("Location: ./sign_in.php");
}?>
<!DOCTYPE html>
<html>
    <head>
        <title>Magic Postal</title>
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="css/sendcard.css" />
        <link rel="icon" type="image/png" href="images/favicon.png"/>
        <meta name="description" content="Anonymous postcard">
        <meta name="keywords" content="anonymous, postcard">
    </head>
    
    <body>
    <header>
        <div id="fetch_card_header" >
            <div id="nav">
                <div id="back">
                    <img src="images/back.png" width="14px" height="25px">
                    <a href="home.php"><div><p>Back</p></div></a>
                <div>
                <div id="download">
                    <img src="images/download.png"width="28px" height="28px">
                    <a href="#"><div><p>Download</p></div></a>
                </div>  
            </div>
        </div>
    </header>
    <div>
        <div id="elementsBox">
           <div id="allElements">
                <div class="elements" id="template">
                <img src="images/canvas/canvas_templates.png">
                <p><a href="#" id="templates">Templates</a></p>
                </div>
                <div class="elements">
                <img src="images/canvas/canvas_text.png">
                <p>Text</p>
                </div>
                <div class="elements">
                <img src="images/canvas/canvas_pictures.png">
                <p>pictures</p>
                </div>
                <div class="elements">
                <img src="images/canvas/canvas_stamps.png">
                <p><a href="#" id="stamps">Stamps</a></p>
                </div>
            </div>
       </div>

       <div id="elementsSelector">
           <div id="thumbnailBox">
                <div class="thumbnail">
                <img src="images/canvas/templates_thumbnail1.png" onclick="addTemToPostcard('images/canvas/templates_thumbnail1.png')">
                </div>
                <div class="thumbnail">
                <img src="images/canvas/templates_thumbnail2.png" onclick="addTemToPostcard('images/canvas/templates_thumbnail2.png')">
                </div>
          </div>
       </div>
      
       <div id="canvas">
           <div id="toolsBar">
            <div id="allTools">
                    <select class="tools" id="fontFamily">
                        <option value ="Open Sans" selected>Open sans</option>
                        <option value ="Playfair Display">Playfair Display</option>
                        <option value="Caveat">Caveat</option>
                    </select>
                    <select class="tools" id="fontSize">
                        <option value="1">Small </option> 
                        <option value="4">Middle </option> 
                        <option value="7">Large </option>
                    </select>
                    <select class="tools" id="fontColor">
                        <option value="black">Black </option> 
                        <option value="white">White </option>
                        <option value="red">Red </option>
                        <option value="orange">Orange </option>
                        <option value="yellow">Yellow </option>
                        <option value="green">Green </option>
                        <option value="cyan">Cyan </option>
                        <option value="blue">Blue </option>
                        <option value="purple">Purple </option>
                    </select>
                    <select class="tools" id="fontStyle"> 
                        <option value="bold">Bold</option> 
                        <option value="italic">Italic</option> 
                        <option value="underline">Underline</option> 
                        <option value="strikeThrough">Strike Through</option> 
                    </select>
                    <select class="tools" id="textAlign"> 
                        <option value="justifyLeft">&#8676; Left </option> 
                        <option value="justifyCenter">&#8596; Center </option> 
                        <option value="justifyRight">&#8677; Right </option> 
                    </select>
                    
                </div>
           </div>
           <div id="postcard"></div>
           <div id="buttons">
               <button id="disgard">Reset</button>
               <button id="send">Send</button>
           </div>
       </div>

       <div id="popup_1">

        <div class="bg-model" id="bg-model">
          <div class="model-content" id="bg-model">
            <div class="title">
              <p>You want it send to..</p>
              <div id="cancel">
                  <img src="images/close_popup.png">
              </div>
            </div>

              <form class="sendForm">
                  <input type="radio" style="zoom:150%; float:left" name="sendTo" value="toPublic">
                  Send to to Public<br><br>

                  <input type="radio" style="zoom:150%; float:left"  name="sendTo" value="toEmail">

                  Send to to an Email address<br><br>

                  <input class="showbox" id="emailEnter; float:left" type="text" placeholder="Enter email address"><br>

                  <p>Sending time</p>
                  <input class="showbox" id="DateEnter; float:left" type="date" name="setDate"><br>

                  <input class="button" id="pop2" type="submit" name="ConfirmSend" value="confirm" />
              </form>
          </div>
        </div>
       </div>


       <div id="popup_2">
        <div class="bg-model" id="bg-model2">
              <div class="model-content" id="model-content2">
                  <div class="title" id="titleSuccess">
                    <p>Your Card has been sent out Successfully!
                        To view the sent cards, please check the mailbox.</p>
                  </div>

                      <form class="sendForm" id="succToMailBox">
                          <a href=""><p>Head to the Mailbox</p></a>
                          <input class="button" id="stayOnPage" type="submit" name="ConfirmSend" value="Stay on this page" />
                          <input class="button" id="leave" type="submit" name="ConfirmSend" value="Leave" />
                      </form>


              </div>
          </div>


       </div>
       
    <div>

    <input type="hidden" id="currentUserId" value="<?php if(isset($_SESSION["userId"])){echo($_SESSION["userId"]);} ?>"/>
    <script src="js/sendcard.js"></script>
    <!-- <div><footer><p><b>MagicPostal</b>&nbsp;&nbsp;Copyright ©2020</p></footer><div> -->
    </body>
</html>