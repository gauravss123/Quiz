<html>
<head>
<script src="javascript/head.min.js"></script>  <!-- to handle script loading functions-->
<script>
            head.load("http://code.jquery.com/jquery-1.9.1.min.js","javascript/exam_st.js");
</script
<link rel="stylesheet" href="jquery/development-bundle/demos/demos.css">
<title>Test</title>
</head>
<body>
<div id="time">60:00</div></div>

<?php
session_start();
if(!array_key_exists('m',$_SESSION)){
		$_SESSION['error']="Unauthorised Access";
		session_write_close();
		echo("<script >location.href = 'index.php';</script>");
		session_write_close();
		}
$que=array();
//retrieve 30 random question number
for ($i=1;$i<=30;)
	{
	$x = rand(1,100);
	$flag=array_search($x,$que);
	if($flag===FALSE)
		{
		$que[]=$x;
		++$i;
		}
	}

$con=mysqli_connect("localhost","root","","exam3");
 if (mysqli_connect_errno())
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();

   }
$z = array();// to store correct answer for each question
$i = 0;
$result= mysqli_query($con,"SELECT * FROM que WHERE sr in ($que[0],$que[1],$que[2],$que[3],$que[4],$que[5],$que[6],$que[7],$que[8],$que[9],$que[10],$que[11],$que[12],$que[13],$que[14],$que[15],$que[16],$que[17],$que[18],$que[19],$que[20],$que[21],$que[22],$que[23],$que[24],$que[25],$que[26],$que[27],$que[28],$que[29])");
if(!$result)
	echo (mysqli_error($con));

echo("<form name ='input' id='question' action = 'result.php' method = 'POST'>");
while($row = mysqli_fetch_array($result,MYSQLI_NUM))
{
	echo(($i+1)." ".$row[1]."<br>");
	echo("
	<input type = 'radio' value = $row[2] name = '$i'>$row[2]&nbsp&nbsp&nbsp&nbsp
	<input type = 'radio' value = $row[3] name = '$i'>$row[3]<br>
	<input type = 'radio' value = $row[4] name = '$i'>$row[4]&nbsp&nbsp&nbsp&nbsp
	<input type = 'radio' value = $row[5] name = '$i'>$row[5]&nbsp&nbsp
	<a id='$i' href='javascript:clear($i)'>Reset</a><br>");
	$i++;
	$z[]=$row[6];
}


echo("<input type = 'submit' onclick='sub'>
</form>");

$_SESSION["ans"]=$z;
session_write_close();
?>
</body>
</html>
