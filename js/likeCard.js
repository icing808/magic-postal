function like_unlike(user_id, card_id){
    var likesphp = document.querySelector("#likesphp");
    if (likesphp.innerHTML == "Like"){
        like(user_id, card_id);
    } else if (likesphp.innerHTML == "Liked"){
        unlike(user_id, card_id);
    }
    
}

function like(user_id, card_id){
    console.log("like"+user_id+" "+card_id);

    var xhr = new XMLHttpRequest(); 
	xhr.onreadystatechange = function(e){  
		console.log("xhr.readyState=" + xhr.readyState);     
		if(xhr.readyState === 4){
            try{
                console.log(xhr.responseText);
                console.log("CHECK YOUR DATABASE TABLE!");
                
                //DOM Manipulation delete row
                likesphp.innerHTML = "Liked";
            } catch (e) {
                console.log("ERROR!");
            } 

	    }
	};
 

	xhr.open("POST","like.php",true); 
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
    xhr.send("userId=" + user_id + "&cardId="+ card_id); 
}

function unlike(user_id, card_id){
    console.log("like"+user_id+" "+card_id);

    var xhr = new XMLHttpRequest(); 
	xhr.onreadystatechange = function(e){  
		console.log("xhr.readyState=" + xhr.readyState);     
		if(xhr.readyState === 4){
            try{
                console.log(xhr.responseText);
                console.log("CHECK YOUR DATABASE TABLE!");
                
                //DOM Manipulation delete row
                likesphp.innerHTML = "Like";
            } catch (e) {
                console.log("ERROR!");
            } 

	    }
	};
 

	xhr.open("POST","unlike.php",true); 
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
    xhr.send("userId=" + user_id + "&cardId="+ card_id); 
}
