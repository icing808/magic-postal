
//from popup-empty.html
//popups one : id sendForm
var pop1=document.getElementById('pop1');
pop1.addEventListener("click",function(){
 document.querySelector('#bg-model').style.display='flex';
});
var close=document.getElementById('cancel');
close.addEventListener("click",function(){
  document.querySelector('#bg-model').style.display="none";
});


//
// popups two : id succToMailBox
var pop2=document.getElementById('pop2');
pop2.addEventListener("click",function(){

 document.querySelector('#bg-model2').style.display='flex';
});
var stay=document.getElementById('stayOnPage');
stay.addEventListener("click",function(){
  document.querySelector('#bg-model2').style.display="none";
});


//
// popups three : id InputText
var pop3=document.getElementById('pop3');
pop3.addEventListener("click",function(){

 document.querySelector('#bg-model3').style.display='flex';
});
var cancel3=document.getElementById('cancel3');
cancel3.addEventListener("click",function(){
  document.querySelector('#bg-model3').style.display="none";
});
