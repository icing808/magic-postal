
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


    var textareaEl1 = document.createElement("div");
    textareaEl1.setAttribute("id", "cardContentId");
    textareaEl1.setAttribute("contenteditable", "true");
    textareaEl1.setAttribute("style", "position:relative;margin-top:-400px;margin-left:70px;width:600px;min-height:300px;border:2px dashed #ccc;text-align:left;");

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
    imgEl1.setAttribute("style", "width:80px;position:relative;top:-300px;margin-left:550px");
    postcard.appendChild(imgEl1);
    postcard.appendChild(hiddenInput);
}


//=====================save postcard
var sendButton = document.getElementById("send");
sendButton.addEventListener("click", addUserPostcard, false);

var currentUserId = document.getElementById("currentUserId");
var spanEl = document.createElement("p");
spanEl.setAttribute("style", "position:relative;color:red;");

function addUserPostcard(event){
    if(currentUserId.value == ""){
        window.open("sign_in.php","_self");
    }
    document.querySelector('#bg-model').style.display='flex';

    var cardTemplateId = document.querySelectorAll("#cardTemplateId")[0];
    var cardStampId = document.querySelectorAll("#cardStampId")[0];
    var cardContentId = document.querySelectorAll("#cardContentId")[0];

    // check null values
    console.log("cardContentId=="+cardContentId.innerHTML);
    // console.log(document.querySelectorAll("#cardTemplateId")[0].value);
    // console.log(document.querySelectorAll("#cardStampId")[0].value);

    
    if(cardTemplateId == null || cardTemplateId.value == null || cardTemplateId.value == ""){
        spanEl.innerHTML = "";
        var cText = document.createTextNode("Please add one template");
        spanEl.appendChild(cText);
        postcard.appendChild(spanEl);
        setTimeout(clearTip, 1000 * 2);
        return;
    }
    if(cardStampId == null || cardStampId.value == null || cardStampId.value == ""){
        spanEl.innerHTML = "";
        spanEl.setAttribute("style", "position:relative;color:red;top:-300px");
        var cText = document.createTextNode("Please add one stamp");
        spanEl.appendChild(cText);
        postcard.appendChild(spanEl);
        setTimeout(clearTip, 1000 * 2);
        return;
    }
    if(cardContentId == null || cardContentId.innerHTML == ""){
        spanEl.innerHTML = "";
        spanEl.setAttribute("style", "position:relative;color:red;top:-300px");
        var cText = document.createTextNode("Please add some word");
        spanEl.appendChild(cText);
        postcard.appendChild(spanEl);
        setTimeout(clearTip, 1000 * 2);
        return;
    }

    

    var xhr = new XMLHttpRequest(); 
	xhr.onreadystatechange = function(e){     
		console.log(xhr.readyState);     
		if(xhr.readyState === 4){        
			console.log(xhr.responseText);// modify or populate html elements based on response.
            console.log("CHECK YOUR DATABASE TABLE!");
            postcard.innerHTML = "";
            spanEl.innerHTML = "";
            spanEl.setAttribute("style", "position:relative;color:green;");
            var cText = document.createTextNode("Save Successful");
            spanEl.appendChild(cText);
            postcard.appendChild(spanEl);
            setTimeout(clearTip, 1000 * 2);
	    } else {
            postcard.innerHTML = "";
            spanEl.innerHTML = "";
            spanEl.setAttribute("style", "position:relative;color:red;");
            var cText = document.createTextNode("Save Failure");
            spanEl.appendChild(cText);
            postcard.appendChild(spanEl);
            setTimeout(clearTip, 1000 * 2);
        }
	};
 

	xhr.open("POST","insert-user-postcard.php",true); 
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
	xhr.send("cardTemplateId=" + cardTemplateId.value+"&cardStampId="+cardStampId.value+"&cardContentId="+cardContentId.innerHTML); 
}

var clearTip = function(){
    if(spanEl != null){
        spanEl.remove();
    }
}


//var pop1=document.getElementById('send');
//pop1.addEventListener("click",function(){
//document.querySelector('#bg-model').style.display='flex';
//});
var close=document.getElementById('cancel');
close.addEventListener("click",function(){
    document.querySelector('#bg-model').style.display="none";
});

// popups two : id succToMailBox
var pop2=document.getElementById('pop2');
pop2.addEventListener("click",function(){
  // hide popup_1
  document.querySelector('#bg-model2').style.display='flex';
  //document.getElementById("popup_1").style.display = "none";
  document.getElementById("popup_1").innerHTML = "";
});
var stay=document.getElementById('stayOnPage');
stay.addEventListener("click",function(){
  document.querySelector('#bg-model2').style.display="none";
  document.getElementById("popup_1").style.display = "none";
});


document.querySelector("#fontColor").addEventListener("change", function () {
    console.log(this.value)
    document.execCommand("forecolor", false, this.value);

});
document.querySelector("#fontStyle").addEventListener("change", function () {
    console.log(this.value)
    document.execCommand(this.value, false, null); 

});

document.querySelector("#fontFamily").addEventListener("change", function () {
    console.log(this.value)
    document.execCommand("fontname", false, this.value); 

});


document.querySelector("#fontSize").addEventListener("change", function () {
    console.log(this.value)
    document.execCommand("fontSize", false, this.value); 

});

document.querySelector("#textAlign").addEventListener("change", function () {
    console.log(this.value)
    document.execCommand(this.value, false, null); 

}); 