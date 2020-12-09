var currentUserId = document.getElementById("currentUserId");
console.log("currentUserId==="+currentUserId.value);


var home3fetchDiv = document.querySelector("#home3fetch");
home3fetchDiv.addEventListener("click", receiveCard, false);

function receiveCard(event){
    if(currentUserId.value == ""){
        console.log("No Sign In");
        window.open("sign_in.php","_self"); 
    }

    var receiveTip = document.querySelector("#receiveTip");
    console.log("receiveTip="+receiveTip);
    if(receiveTip != null){
        receiveTip.remove();
    }
    receiveTip = document.createElement("p");
    receiveTip.setAttribute("style", "color:purple; text-align:center; position:relative; font-size: 24px; top: -150px;")

    var xhr = new XMLHttpRequest(); 
	xhr.onreadystatechange = function(e){  
		console.log("xhr.readyState=" + xhr.readyState);     
		if(xhr.readyState === 4){        
			console.log(xhr.responseText);
            console.log("CHECK YOUR DATABASE TABLE!");
               
            //DOM Manipulation
            receiveTip.innerHTML = "Receive postcard Successful"
            home3fetchDiv.appendChild(receiveTip);
            
	    } else {
            receiveTip.innerHTML = "Receive postcard Failure"
        }
        console.log("receiveTip="+receiveTip.innerHTML);
        setTimeout(removeTip, 1000 * 3);
	};
 

	xhr.open("POST","insert-user-receive-postcard.php",true); 
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
    xhr.send(""); 
    
    var removeTip = function (){
        if(receiveTip != null){
            receiveTip.remove();
        }
    }
}




