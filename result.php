<html>
<head>
<script src="javascript/head.min.js"></script>  <!-- to handle script loading functions-->
<script>
            head.load("http://code.jquery.com/jquery-1.9.1.min.js","javascript/result.js");
</script>
<link rel="stylesheet" type="text/css" href="css/result.css">
</head>
<body>

<?php
session_start();
if(!array_key_exists('ans',$_SESSION)){

		$_SESSION['error']="Unauthorised Access";
		echo("<script >location.href = 'index.php';</script>");
		echo("<div class='result'>Hi,".$_SESSION['m']."<br>");
		$q=$_SESSION['m'];
		}
else{
$ans = array();
$ans = $_SESSION['ans'];
unset($_SESSION['ans']);
}

echo("<div class='result'>Hi, ".$_SESSION['m']."<br>");
$marks=-10;
for($i=0;$i<30;$i++)
{
	if(isset($_POST[$i]))
	{
		$selected_radio = $_POST[$i];
		$flag=array_search($selected_radio,$ans);
		if($flag===false)
			$marks = $marks -2;
		else
			$marks = $marks +3;
	}

}
if ($marks!=NULL)
	echo("<br>You have obtained  ".$marks." marks. <br></div>");
else 
	echo("You have not answered any questions. <br></div>");

$con=mysqli_connect("localhost","root","","exam3");
 if (mysqli_connect_errno())
   {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();

   }
   
$z = array();
$i = 0;

try {
    $conn = new PDO('mysql:host=localhost;dbname=exam3', 'root', '');	
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
$sql = "UPDATE user SET MARKS=:l WHERE NAME = :k";
$query = $conn->prepare($sql);
$query->bindParam(':l', $marks,PDO::PARAM_INT);
$query->bindParam(':k',$q,PDO::PARAM_STR);
$query->execute();

?>
<div style="width:300px;">
<br>
<div id="time" class="result" style= "text-align:center";>Resetting in 60:00</div></div>

</body>
</html>