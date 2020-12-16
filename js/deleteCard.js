function deleteCard(id){

    console.log("clicked"+id);

    var selectInboxRow = document.querySelector("#line"+ id);

    var xhr = new XMLHttpRequest(); 
	xhr.onreadystatechange = function(e){  
		console.log("xhr.readyState=" + xhr.readyState);     
		if(xhr.readyState === 4){
            try{
                console.log(xhr.responseText);
                console.log("CHECK YOUR DATABASE TABLE!");
                
                //DOM Manipulation delete row
                selectInboxRow.remove();
            } catch (e) {
                console.log("ERROR!");
            } 

	    }
	};
 

	xhr.open("POST","inbox-delete.php",true); 
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
    xhr.send("receivedId=" + id); 
    
}


function deleteInnerCard(id){

    console.log("clicked"+ id);

    // var selectInboxRow = document.querySelector("#line"+ id);

    var xhr = new XMLHttpRequest(); 
	xhr.onreadystatechange = function(e){  
		console.log("xhr.readyState=" + xhr.readyState);     
		if(xhr.readyState === 4){
            try{
                console.log(xhr.responseText);
                console.log("CHECK YOUR DATABASE TABLE!");
                
                //DOM Manipulation delete row
                // selectInboxRow.remove();
            } catch (e) {
                console.log("ERROR!");
            } 

	    }
	};
 

	xhr.open("POST","inbox-delete.php",true); 
	xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
    xhr.send("receivedId=" + id); 

    history.back();
    
}
