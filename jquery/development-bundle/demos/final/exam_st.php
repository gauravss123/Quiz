<html>
<head>
<?php
//$time = time();
//$_SESSION['time_started'] = $time;
  ?>

<title>Test</title>
</head>
<body>
        <style type="text/css">
#notice {font-size:150%; float:left; padding-right:10px;}
#time {font-size:150%;}
</style>

<script type="text/javascript">
var m=25; /*this value may be edited to suit your requirements*/
 var k=60;
   var s=0;
   var temp=m-1;

window.onload=function() {
   tenMinutes();
 }
 
function tenMinutes(){
   s--;   k--;
/*if(k==0)
 { document.forms["questions"].submit();
 }*/
 if(m==0&&s==0)
 { document.forms["questions"].submit();
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
</script>
<div style="width:300px;">
<div id="notice">This Website will reset in:</div>
<div id="time">60:00</div></div>

<?php
session_start();
$que=array();
/*for ($i=1;$i<=4;)
	{
	$x = rand(1,10);
	$flag=array_search($x,$que);
	if($flag===FALSE)
		{
		$que[]=$x;
		echo($que[$i-1]."is".$flag."<br>") ;
		++$i;
		}
	}

*/
$que = $_SESSION['q'];
unset($_SESSION['q']);
session_write_close();

/*$dbhandle = mysqli_connect($hostname, $username, $password)
  or die("Unable to connect to MySQL");
*/
$con=mysqli_connect("localhost","root","","exam3");
 if (mysqli_connect_errno())
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();

   }

$z = array();
$i = 0;
$result= mysqli_query($con,"SELECT * FROM que WHERE sr in ($que[0],$que[1],$que[2],$que[3])");
if(!$result)
	echo (mysqli_error($con));
while($row = mysqli_fetch_array($result,MYSQLI_NUM))
{
	echo("$i ".$row[1]."<br>");
	echo("<form name ='questions' action = 'result.php' method = 'POST'><input type = 'radio' value = $row[2] name = $i>$row[2]&nbsp&nbsp&nbsp&nbsp<input type = 'radio' value = $row[3] name = $i>$row[3]<br><input type = 'radio' value = $row[4] name = $i>$row[4]&nbsp&nbsp&nbsp&nbsp<input type = 'radio' value = $row[5] name = $i>$row[5]<br>");
	$i++;
	$z[]=$row[6];
}
// $oldtime = $time//$_SESSION['time_started'];
//$newtime = time();
//$difference = $newtime - $oldtime;

echo("<input type = 'submit'></form>");
session_start();
$_SESSION["ans"]=$z;
session_write_close();
//handle = window . setTimeout( echo"<form name ='q' action = 'result.php' method = 'POST'></form>", 1000 ] );
//echo $_POST['fname'];

?>
<?php session_start();?>
<script type="text/javascript">
function t()
{
$(window).load(function () {
     $("#questions").submit(function(e) {
          e.preventDefault();

          setTimeout(function(){
              alert("me after 30000 mili seconds");
          }, 0);
    });
});
}

 /*  var ye = "<?php
$_SESSION["ans"]=$z;
session_write_close();
 ?>"
 } */
</script>
<a href="index.php">go to</a>
</body>
</html>
