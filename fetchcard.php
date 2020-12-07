
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
    #bg{
        
        position:fixed;
    }
    #canvas{
        position:absolute;
        top:0%;
        margin-left:20%;
        width:80%;
        height:100%;
        background-color:#E6E6E6;
        
        
    }
    #decorations{
        z-index:2;
        position:absolute;
        top:10%;
        left:2%;
        /* border:1px solid black; */
    }
    #message{
        font-size:1.3rem;
        font-style:italic;
        line-height:30px;
        color:white;
        position:absolute;
        width:16%;
        text-align:left;
        top:40%;
        left:2%;
        /* border:1px solid black; */
    }
    #mail1{
        position:absolute;
        top:20%;
        left:70%;
    }
    #mail2{
        position:absolute;
        top:50%;
        left:100%;
    }
    #location_n_date{
        font-size:22px;
        font-style:italic;
        position:absolute;
        top:8%;
        left:6%;
        color:#030404;
        display: flex;
        flex-direction:row;
        align-items: center;
        /* border:1px solid black; */

    }
    #postcard{
        position:absolute;
        top:16%;
        left:6%;
        background-color:white;
        width:48%;
        height:42%;
        box-shadow: 6px 6px 16px #B9B6BA;
        /* border:1px solid black; */
    }
    #buttons{
        width:48%;
        position:absolute;
        top:60%;
        left:6%;
        /* border:1px solid black;  */
    }
    #reply,#next{
        font-size:20px;
        width:24%;
        height:44px;
        border-radius:5px;
        border:none;
        /* margin:0 12%; */
        cursor:pointer;

    }
    #reply{
        background-color:#466186;
        color:white;
        align:left;
        float:left;
    }
    #next{
        background-color:#69426C;
        color:white;
        align:right;
        float:right;
    }
    #sidebuttons{
        position:absolute;
        top:40%;
        left:65%;
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
    <div id="bg">
        <div id="decorations">
           <img src="images/fetchcard/fetchcard_dec_postalbox.png" width="90%">
           <img id="mail1" src="images/fetchcard/fetchcard_dec_mail1.png" width="70%">
           <img id="mail2" src="images/fetchcard/fetchcard_dec_mail2.png" width="80%">
       </div>
       <div id="message">
           <p> You just received a postcard from Toronto! </p>
       </div>
       <img src="images/fetchcard/fetchcard_bg.png">
       <div id="canvas">
           <div id="location_n_date"><p>From: Toronto, Ontario, Canada</p>&nbsp;&nbsp;&nbsp;&nbsp;<p>Sent Date: December 8th, 2020</p></div>
           <div id="postcard"></div>
           <div id="buttons">
               <button id="reply">Reply</button>
               <button id="next">Next</button>
           </div>
       </div>
       <div id="sidebuttons">
            <div id="likes">
                <img src="images/mailbox/mailbox_inbox_card_likes.png"> 
                <p>10 Likes</p>
            </div>
            <div id="report">
                <img src="images/mailbox/mailbox_inbox_card_report.png"> 
                <p>Report</p>
            </div>
       </div>
    <div>
    
    <!-- <div><footer><p><b>MagicPostal</b>&nbsp;&nbsp;Copyright ©2020</p></footer><div> -->
    </body>
</html>