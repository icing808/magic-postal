
var templates = document.querySelectorAll("#templates");
templates[0].addEventListener("click", templatesDisplay, false);
var thumbnailBox = document.getElementById("thumbnailBox");
function templatesDisplay(){
    var divEl = document.createElement("div"); 
    divEl.setAttribute("class", "thumbnail");

    var imgEl1 = document.createElement("img");
    imgEl1.setAttribute("src", "images/canvas/templates_thumbnail1.png");
    imgEl1.setAttribute("onclick", "addTemToPostcard('images/canvas/templates_thumbnail1.png')");

    var imgEl2 = document.createElement("img");
    imgEl2.setAttribute("src", "images/canvas/templates_thumbnail2.png");
    imgEl2.setAttribute("onclick", "addTemToPostcard('images/canvas/templates_thumbnail2.png')");

    divEl.appendChild(imgEl1);
    divEl.appendChild(imgEl2);

    thumbnailBox.innerHTML = "";
    thumbnailBox.appendChild(divEl);

}

var stamps = document.querySelectorAll("#stamps");
stamps[0].addEventListener("click", stampsDisplay, false);
function stampsDisplay(){
    var divEl = document.createElement("div"); 
    divEl.setAttribute("class", "thumbnail");

    var imgEl1 = document.createElement("img");
    imgEl1.setAttribute("src", "images/mailbox/mailbox_inbox_card_stamp.png");
    imgEl1.setAttribute("onclick", "addStamToPostcard('images/mailbox/mailbox_inbox_card_stamp.png')");

    divEl.appendChild(imgEl1);

    thumbnailBox.innerHTML = "";
    thumbnailBox.appendChild(divEl);

}

var postcard = document.getElementById("postcard");

var discard = document.querySelectorAll("#disgard");
discard[0].addEventListener("click", discardDeal, false);
function discardDeal(){
    console.log(postcard.innerHTML);
    postcard.innerHTML = "";
}

function addTemToPostcard(imgUrl){
    var hiddenInput = document.createElement("input");
    hiddenInput.setAttribute("type", "hidden");
    hiddenInput.setAttribute("id", "cardTemplateId");
    var imgEl1 = document.createElement("img");
    if("images/canvas/templates_thumbnail1.png" == imgUrl){
        hiddenInput.setAttribute("value", "1");
        imgEl1.setAttribute("src", "images/canvas/sendcard_template1.png");
    }else if("images/canvas/templates_thumbnail2.png" == imgUrl){
        hiddenInput.setAttribute("value", "2");
        imgEl1.setAttribute("src", "images/canvas/sendcard_template2.png");
    }
    imgEl1.setAttribute("style", "width:100%");

    var textareaEl1 = document.createElement("textarea");
    textareaEl1.setAttribute("id", "cardContentId");
    textareaEl1.setAttribute("cols", "60");
    textareaEl1.setAttribute("rows", "15");
    textareaEl1.setAttribute("style", "position:relative;top:-350px;margin-left:-10px");

    postcard.innerHTML = "";
    postcard.appendChild(imgEl1);
    postcard.appendChild(textareaEl1);
    postcard.appendChild(hiddenInput);
}

function addStamToPostcard(imgUrl){
    var hiddenInput = document.createElement("input");
    hiddenInput.setAttribute("type", "hidden");
    hiddenInput.setAttribute("id", "cardStampId");

    var imgEl1 = document.createElement("img");
    hiddenInput.setAttribute("value", "1");
    imgEl1.setAttribute("src", imgUrl);
    imgEl1.setAttribute("style", "width:80px;position:relative;top:-400px;margin-left:500px");
    postcard.appendChild(imgEl1);
    postcard.appendChild(hiddenInput);
}


//=====================save postcard
var sendButton = document.getElementById("send");
sendButton.addEventListener("click", addUserPostcard, false);


function addUserPostcard(event){
    console.log("sendUserId=="+document.getElementById("sendUserId").value);
    if(document.getElementById("sendUserId").value == ""){
        postcard.innerHTML = "Please Sign In";
    }

    var cardTemplateId = document.querySelectorAll("#cardTemplateId")[0];
    var cardStampId = document.querySelectorAll("#cardStampId")[0];
    var cardContentId = document.querySelectorAll("#cardContentId")[0];

    // check null values


    // console.log("cardContentId=="+cardContentId.value);
    // console.log(document.querySelectorAll("#cardTemplateId")[0].value);
    // console.log(document.querySelectorAll("#cardStampId")[0].value);

    var xhr = new XMLHttpRequest(); 
	xhr.onreadystatechange = function(e){     
		console.log(xhr.readyState);     
		if(xhr.readyState === 4){        
			console.log(xhr.responseText);// modify or populate html elements based on response.
		    console.log("CHECK YOUR DATABASE TABLE!");
            postcard.innerHTML = "Save Successful";
            document.getElementById("popup_1").style.visibility = "";
	    } else {
            postcard.innerHTML = "Save Failure";
        }
	};
 

	xhr.open("POST","insert-user-postcard.php",true); 
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
	xhr.send("cardTemplateId=" + cardTemplateId.value+"&cardStampId="+cardStampId.value+"&cardContentId="+cardContentId.value); 
}


var pop1=document.getElementById('send');
pop1.addEventListener("click",function(){
document.querySelector('#bg-model').style.display='flex';
});
var close=document.getElementById('cancel');
close.addEventListener("click",function(){
    document.querySelector('#bg-model').style.display="none";
});

// popups two : id succToMailBox
var pop2=document.getElementById('pop2');
pop2.addEventListener("click",function(){
  // hide popup_1
  document.querySelector('#bg-model2').style.display='flex';
  document.getElementById("popup_1").style.display = "none";
});
var stay=document.getElementById('stayOnPage');
stay.addEventListener("click",function(){
  document.querySelector('#bg-model2').style.display="none";
});
