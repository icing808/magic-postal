<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Magic Postal</title>
    <link rel="stylesheet" href="css/main.css" />
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <meta name="description" content="Anonymous postcard">
    <meta name="keywords" content="anonymous, postcard">
    <style>  
    /* footer{
        width:100%;
        height:10%; 
        position: fixed;
        bottom:0;
        background-color:#0A1827;
        color: white;
        display:flex;
        justify-content:center;
        align-items:center;

    } */
    a {
        color: white;
    }
    #fetch_card_header{
        background: linear-gradient(to right,#322033 40%, #102033 90%);
        z-index: 1;
        width:100%;
        height:10%; 
        margin:0 auto; 
        position:fixed;
        top:0;
        display: flex;
        justify-content:space-between;
        align-items: center;
    }
   #nav{
       width:100%;
       height:80%;
       position:absolute;
       /* border:1px solid black; */
   }
    #back, #download{
        width:30%;
        /* border:1px solid black; */
        position:absolute;
        display: flex;
        align-items: center;
    }
    #back{
        position:absolute;
        align:left;
        float:left;
        left:2%;
    }
    #download{
        align:right;
        float:right;
        position:absolute;
        top:1%;
        left:282%;
       
    }
    #back p, #download p{
        margin-left:30%;
        color:white;
    }
    #elementsBox{
        position:absolute;
        background-color:#1E2033;
        width:10%;
        height:100%;
        /* border:1px solid black; */

    }
    #allElements{
        position:relative;
        top:14%;
        left:4%;
        text-align:left;
        /* border:1px solid black; */
    }
    .elements{
        padding:0 14px;
        color:white;
        display:flex;
        flex-direction:row;
        align-items:center;
        /* border:1px solid black; */
        margin: 0 0 30%;
    }
    .elements p{
        padding-left:14px;
    }
     #template{
        background-color:#32354E;
    }
    #elementsSelector{
        position:absolute;
        background-color:#32354E;
        width:16%;
        left:10%;
        height:100%;
        /* border:1px solid black; */
    }
    #thumbnailBox{
        position:absolute;
        top:14%;
        left:14%;
        /* border:1px solid black; */
    }
    .thumbnail {
        display:block;
        margin-bottom:40%;
    }
    .thumbnail:hover {
        border:2px solid #0088A9;
        border-radius:5px;
    }
    #canvas{
        position:absolute;
        top:0%;
        margin-left:26%;
        width:74%;
        height:100%;
        background-color:#E6E6E6;       
    }
    #toolsBar{
        position:relative;
        top:10%;
        /* left:14%; */
        background-color:white;
        width:100%;
        height:8%;
        box-shadow: 6px 6px 16px #B9B6BA;
        border-radius:2px; 
       
    }
    #allTools{
        position:relative;
        left:16%;
        top:10%;
        display:flex;
        flex-direction:row;
        align-items:center;
        /* border:1px solid black;   */

    }
    .tools{
        margin:0 2%;
    }
    #undo,#redo{
        
        display:block;
        
    }
    #fontSelector,#fontSize{
       height:40px;
       font-size:16px;
       border-radius:5px;
    }

    #colorPicker{
        /* position:absolute; */
        background-color:black;
        /* top:40%;
        left:50%; */
        width:30px;
        height:30px;
        border:1px solid black;
    }
    #postcard{
        position:absolute;
        top:22%;
        left:14%;
        background-color:white;
        width:70%;
        height:68%;
        box-shadow: 6px 6px 16px #B9B6BA;
        /* border:1px solid black; */
    }
    #buttons{
        width:70%;
        position:absolute;
        top:92%;
        left:14%;
        /* border:1px solid black;  */
    }
    #disgard,#send{
        font-size:20px;
        width:20%;
        height:44px;
        border-radius:5px;
        border:none;
        /* margin:0 12%; */
        cursor:pointer;

    }
    #disgard{
        background-color:#466186;
        color:white;
        align:left;
        float:left;
    }
    #send{
        background-color:#69426C;
        color:white;
        align:right;
        float:right;
    }
    .dropbtn {
    height:30px;
    padding: 10px;
    font-size: 16px;
    border:1px solid #D9D9D9;
    border-radius:4px;
    cursor: pointer;
    
  
}


    </style>
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
            
                    <div class="tools" id="undo">
                            <img src="images/canvas/canvas_undo.png" width="40px">
                    </div>
                    <div class="tools" id="redo">
                            <img src="images/canvas/canvas_redo.png" width="40px">
                    </div>
                    <select class="tools" id="fontSelector">
                        <option value ="volvo" selected>Open sans</option>
                        <option value ="saab">Playfair Display</option>
                        <option value="opel">Caveat</option>
                    </select>
                    <select class="tools" id="fontSize">
                        <option value ="saab">18</option>
                        <option value ="volvo" selected>24</option>
                        <option value ="saab">36</option>
                        <option value="opel">48</option>
                        <option value="opel">64</option>
                        <option value="opel">72</option>
                        <option value="opel">96</option>
                    </select>
                    <button class="tools" id="colorPicker"></button>
                    <div class="tools" id="bold">
                            <img src="images/canvas/canvas_text_bold.png">
                    </div>
                    <!-- <div>
                            <img src="images/canvas/canvas_text_underline.png">
                    </div> -->
                    <div class="tools" id="italic">
                            <img src="images/canvas/canvas_text_italic.png">
                    </div>
                    <div class="tools" id="lineheight">
                            <img src="images/canvas/canvas_text_lineheight.png">
                    </div>
                </div>
           </div>
           <div id="postcard"></div>
           <div id="buttons">
               <button id="disgard">Discard</button>
               <button id="send">Send</button>
               <input type="hidden" id="sendUserId" value="<?php if(isset($_SESSION["userId"])){echo($_SESSION["userId"]);} ?>"/>
           </div>
       </div>
       
    <div>


    <script src="js/sendcard.js"></script>
    <!-- <div><footer><p><b>MagicPostal</b>&nbsp;&nbsp;Copyright ©2020</p></footer><div> -->
    </body>
</html>