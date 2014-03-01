var m=0; /*this value may be edited to suit your requirements*/
 var k=60;
   var s=30;
   var temp=m-1;

window.onload=function() {
   tenMinutes();
 }
 
function tenMinutes(){
   s--;   k--;
 if(m==0&&s==0)
 { window.location.assign("index.php");
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




   document.getElementById('time').firstChild.nodeValue='Resetting in '+mins+':'+secs;
   cd=setTimeout('tenMinutes()',1000);
}
