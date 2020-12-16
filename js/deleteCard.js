

// var currentInboxRow = document.getElementById("currentInboxRow");
// if (currentInboxRow){
//     console.log("currentInboxRow==="+currentInboxRow.value);


//     var home3fetchDiv = document.querySelector("#bin"+currentInboxRow.value);
//     home3fetchDiv.addEventListener("click", deleteCard, false);
// }


function deleteCard(id){

    console.log("clicked"+id);

    // var receiveTip = document.querySelector("#receiveTip");
    // console.log("receiveTip="+receiveTip);
    // if(receiveTip != null){
    //     receiveTip.remove();
    // }
    // receiveTip = document.createElement("p");
    // receiveTip.setAttribute("style", "color:purple; text-align:center; position:relative; font-size: 24px; top: -150px;")

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
