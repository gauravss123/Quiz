$(document).ready(function () {
			var i;
			for(i=0;i<=29;i++) // to hide reset response text
				{
				var k='#'+i;
				$(k).hide();
			var name = document.getElementsByName(i);
			for (j=0; j < name.length; j++)  //uncheck radio box by default
				{ 
					name[j].checked = false; 
				} }

    
			});

var m=20; /*these value may be edited to suit your requirements*/
 var k=60;
   var s=0;
   var temp=m-1;

window.onload=function() {
   tenMinutes();
 }
 //function for timer
function tenMinutes(){
   s--;   k--;
/*if(k==0)
 { document.forms["questions"].submit();
 }*/
 if(m==0&&s==0)
 { document.getElementById("question").submit();
 }
if(s<0) {
   s=59;
   m--;
 }
if(m==-1) {
   m=temp;
 }
if(m<10) {
   mins='0'+m;
 }
else {
   mins=m;
 }
if(s<10) {
   secs='0'+s;
 }
else {
   secs=s;
 }


   document.getElementById('time').firstChild.nodeValue=mins+':'+secs;
   cd=setTimeout('tenMinutes()',1000);
}
//function to display "reset" option on answering question
$('body').on('click','input:radio',(function() { 
  var n = $(this).attr('name');
  var k ='#' + n;
  $(k).show(400);
}));
//functionality of "reset" defined
function clear(radio) {
    //alert(radio); 
var name = document.getElementsByName(radio);
	for (i=0; i < name.length; i++) 
	{ 
		if (name[i].checked == true) 
		{ // if a button in group is checked, 
		name[i].checked = false; 
		name="#"+radio;
		$(name).hide(400);
		// uncheck it 
		} 
		
	}
	}
