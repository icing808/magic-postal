

// get postcard template list
var templates = document.querySelectorAll("#send_templates");
templates[0].addEventListener("click", templatesDisplay, false);
var thumbnailBox = document.getElementById("thumbnailBox");

templatesDisplay();
function templatesDisplay(){
    // get from database
    var xhr = new XMLHttpRequest(); 
	xhr.onreadystatechange = function(e){     
		//console.log(xhr.readyState);     
		if(xhr.readyState === 4){  
            var response = JSON.parse(xhr.responseText);    
			//console.log(xhr.responseText);
            //DOM Manipulation
            //console.log(response);
            thumbnailBox.innerHTML = "";
            for(var i=0; i<response.length; i++){
                var divEl = document.createElement("div"); 
                divEl.setAttribute("class", "thumbnail");

                var imgEl1 = document.createElement("img");
                imgEl1.setAttribute("src", "images/"+response[i].icon_url);
                imgEl1.setAttribute("onclick", "addTemToPostcard("+ response[i].id +", 'images/"+ response[i].img_url +"')");
                imgEl1.setAttribute("style", "width:80%");
                
                divEl.appendChild(imgEl1);
                thumbnailBox.appendChild(divEl);
            }
	    } 
	};

	xhr.open("GET", "select-postcard-templates.php", true); //true means it is asynchronous // Send variables through the url
    xhr.send(); 

}

// get stamps template list
var stamps = document.querySelectorAll("#send_stamps");
stamps[0].addEventListener("click", stampsDisplay, false);
function stampsDisplay(){
    // get from database
    var xhr = new XMLHttpRequest(); 
	xhr.onreadystatechange = function(e){     
		//console.log(xhr.readyState);     
		if(xhr.readyState === 4){  
            var response = JSON.parse(xhr.responseText);    
			//console.log(xhr.responseText);
            //DOM Manipulation
            //console.log(response);
            thumbnailBox.innerHTML = "";
            for(var i=0; i<response.length; i++){
                var divEl = document.createElement("div"); 
                divEl.setAttribute("class", "thumbnail");

                var imgEl1 = document.createElement("img");
                imgEl1.setAttribute("src", "images/"+response[i].img_url);
                imgEl1.setAttribute("onclick", "addStamToPostcard("+ response[i].id +", 'images/"+ response[i].img_url +"')");
                imgEl1.setAttribute("style", "width:80%");
                
                divEl.appendChild(imgEl1);
                thumbnailBox.appendChild(divEl);
            }
	    } 
	};

	xhr.open("GET", "select-postcard-stamps.php", true); //true means it is asynchronous // Send variables through the url
    xhr.send(); 

}

//get text icons 
var texts = document.querySelectorAll("#send_texts");
texts[0].addEventListener("click", textsDisplay, false);
function textsDisplay(){
    thumbnailBox.innerHTML = "";
    for(var i=1; i<6; i++){
        var divEl = document.createElement("div"); 
        divEl.setAttribute("class", "thumbnail");
        var imgEl1 = document.createElement("img");
        var imgUrl = "images/canvas/canvas_text"+ i +".png";
        imgEl1.setAttribute("src", imgUrl);
        imgEl1.setAttribute("onclick", "addTextOrPicToPostcard('"+ imgUrl + "')");
        imgEl1.setAttribute("style", "width:80%");
        divEl.appendChild(imgEl1);
        thumbnailBox.appendChild(divEl);
    }

}

//get picture icons 
var pics = document.querySelectorAll("#send_pics");
pics[0].addEventListener("click", picsDisplay, false);
function picsDisplay(){
    thumbnailBox.innerHTML = "";
    for(var i=1; i<9; i++){
        var divEl = document.createElement("div"); 
        divEl.setAttribute("class", "thumbnail");
        var imgEl1 = document.createElement("img");
        var imgUrl = "images/canvas/canvas_picture"+ i +".png";
        imgEl1.setAttribute("src", imgUrl);
        imgEl1.setAttribute("onclick", "addTextOrPicToPostcard('"+ imgUrl + "')");
        imgEl1.setAttribute("style", "width:50%");
        divEl.appendChild(imgEl1);
        thumbnailBox.appendChild(divEl);
    }

}


//============== add something to poscard area =============

var postcard = document.getElementById("postcard");

var discard = document.querySelectorAll("#disgard");
discard[0].addEventListener("click", discardDeal, false);
function discardDeal(){
    //console.log(postcard.innerHTML);
    postcard.innerHTML = "";
}

function addTemToPostcard(cardId, imgUrl){
    var hiddenInput = document.createElement("input");
    hiddenInput.setAttribute("type", "hidden");
    hiddenInput.setAttribute("id", "cardTemplateId");
    var imgEl1 = document.createElement("img");
    hiddenInput.setAttribute("value", cardId);
    imgEl1.setAttribute("src", imgUrl);
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

function addStamToPostcard(stampId, imgUrl){
    var hiddenInput = document.createElement("input");
    hiddenInput.setAttribute("type", "hidden");
    hiddenInput.setAttribute("id", "cardStampId");
    hiddenInput.setAttribute("value", stampId);
    postcard.appendChild(hiddenInput);

    var stampImgs = document.querySelectorAll(".stampId");
    if(stampImgs == null || stampImgs.length == 0){
        var imgEl1 = document.createElement("img");
        imgEl1.setAttribute("src", imgUrl);
        imgEl1.setAttribute("class", "stampId");
        imgEl1.setAttribute("style", "width:80px;position:relative;top:-300px;margin-left:550px");
        postcard.appendChild(imgEl1);
    } else {
        stampImgs[0].setAttribute("src", imgUrl);
    }
    
}

function addTextOrPicToPostcard(imgUrl){
    //document.execCommand("insertImage", false, imgUrl);
    document.execCommand("inserthtml", false, "<img src='"+imgUrl+"' style='width:20%'>");
}

//============= start ========================save postcard
var sendButton = document.getElementById("send");
sendButton.addEventListener("click", addUserPostcard, false);

var currentUserId = document.getElementById("currentUserId");
var spanEl = document.createElement("p");
spanEl.setAttribute("style", "position:relative;color:red;");

var pop1 = document.querySelector("#bg-model");
var popTip = document.querySelector("#send-confirm-tip")

function addUserPostcard(event){
    if(currentUserId.value == ""){
        window.open("sign_in.php","_self");
    }

    var cardTemplateId = document.querySelectorAll("#cardTemplateId")[0];
    var cardStampId = document.querySelectorAll("#cardStampId")[0];
    var cardContentId = document.querySelectorAll("#cardContentId")[0];

    // check null values

    
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

    //choose send type
    pop1.style.display='flex';
    
}

var confirmSend = document.getElementById("confirmSend");
confirmSend.addEventListener("click",function(){

    var cardTemplateId = document.querySelectorAll("#cardTemplateId")[0];
    var cardStampId = document.querySelectorAll("#cardStampId")[0];
    var cardContentId = document.querySelectorAll("#cardContentId")[0];

    var sendTo = document.querySelectorAll(".send-to");
    var emailAddr = document.querySelectorAll("#send-email-addr")[0];
    var sendDate = document.querySelectorAll("#send-email-date")[0];


    var sendToValue = "";
    for(var i = 0; i < sendTo.length; i++){
        if(sendTo[i].checked){
            sendToValue = sendTo[i].value;
            break;
        }
    } 

    if(sendToValue == null || sendToValue == ""){     
        spanEl.innerHTML = ""
        var cText = document.createTextNode("Please choose send type");
        spanEl.appendChild(cText);
        spanEl.setAttribute("style", "position:relative;color:red;font-size:0.8em");
        popTip.appendChild(spanEl);
        setTimeout(clearTip, 1000 * 2);
        return;
    } else {
        if(sendToValue == "toEmail"){
            console.log(emailAddr + "---" + sendDate);
            if(emailAddr == null || emailAddr.value == "" || sendDate == null || sendDate.value == ""){
                spanEl.innerHTML = ""
                var cText = document.createTextNode("Please add email address and send date");
                spanEl.appendChild(cText);
                spanEl.setAttribute("style", "position:relative;color:red;font-size:0.8em");
                popTip.appendChild(spanEl);
                setTimeout(clearTip, 1000 * 2);
                return;
            } else {
                if(judgeDate(sendDate.value) <= 0){
                    spanEl.innerHTML = ""
                    var cText = document.createTextNode("Only be sent to future date");
                    spanEl.appendChild(cText);
                    spanEl.setAttribute("style", "position:relative;color:red;font-size:0.8em");
                    popTip.appendChild(spanEl);
                    setTimeout(clearTip, 1000 * 2);
                    return;
                }
            }
        }    
    }

    var xhr = new XMLHttpRequest(); 
	xhr.onreadystatechange = function(e){     
		//console.log(xhr.readyState);     
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

            // hide popup_1
            document.querySelector('#bg-model').style.display="none";
            document.querySelector('#bg-model2').style.display = "flex";

	    } else {
            postcard.innerHTML = "";
            spanEl.innerHTML = "";
            // spanEl.setAttribute("style", "position:relative;color:red;");
            // var cText = document.createTextNode("Save Failure");
            // spanEl.appendChild(cText);
            // postcard.appendChild(spanEl);
            // setTimeout(clearTip, 1000 * 2);
            var cText = document.createTextNode("Save Failure");
            spanEl.appendChild(cText);
            spanEl.setAttribute("style", "position:relative;color:red;font-size:0.8em");
            popTip.appendChild(spanEl);
            setTimeout(clearTip, 1000 * 2);
            return;
        }
	};
    console.log("cardTemplateId=" + cardTemplateId.value +
    "&cardStampId=" + cardStampId.value +
    "&cardContentId=" + cardContentId.innerHTML +
    "&sendToEmail=" + emailAddr.value +
    "&sendDate=" + sendDate.value);

	xhr.open("POST","insert-user-postcard.php",true); 
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
    xhr.send("cardTemplateId=" + cardTemplateId.value +
            "&cardStampId=" + cardStampId.value +
            "&cardContentId=" + cardContentId.innerHTML +
            "&sendToEmail=" + emailAddr.value +
            "&sendDate=" + sendDate.value);

  
}, false);

//=============== end =========== save postcard ==============



//add Editor functions
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

//other 
var clearTip = function(){
    if(spanEl != null){
        spanEl.remove();
    }
}

var close = document.getElementById('cancel');
close.addEventListener("click",function(){
    document.querySelector('#bg-model').style.display="none";
});

var stay = document.getElementById('stayOnPage');
stay.addEventListener("click",function(){
  document.querySelector('#bg-model2').style.display="none";
  
});

function judgeDate(sendDateStr){
    return new Date(sendDateStr).getTime()-new Date().getTime();
}