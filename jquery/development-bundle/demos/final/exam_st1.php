<html>
<head>
<title>Test</title>
</head>
<body>

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
	echo($row[1]." $i<br>");
	echo("<form name ='questions' action = 'result.php' method = 'POST'><input type = 'radio' value = $row[2] name = $i>$row[2]&nbsp&nbsp&nbsp&nbsp<input type = 'radio' value = $row[3] name = $i>$row[3]<br><input type = 'radio' value = $row[4] name = $i>$row[4]&nbsp&nbsp&nbsp&nbsp<input type = 'radio' value = $row[5] name = $i>$row[5]<br>");
	$i++;
	$z[]=$row[6];
}
echo("<input type = 'submit'></form>");

session_start();
$_SESSION["ans"]=$z;
session_write_close();

//echo $_POST['fname']; 

?>
<a href="index.php">go to</a>
</body>
</html> 