<html>
<body>

<?php
$ans = array();
session_start();
$ans = $_SESSION['ans'];
$mob = $_SESSION['m'];
unset($_SESSION['ans']);
//unset($_SESSION['m']);
session_destroy();
$marks=0;
echo("<br>".$mob."<br>");
for($i=0;$i<4;$i++)
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
echo("<br>Marks obtained are ".$marks."<br>");

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
$sql = "UPDATE user SET MARKS=:l WHERE TEAMNAME = :k";
$query = $conn->prepare($sql);
$query->bindParam(':l', $marks,PDO::PARAM_INT);
$query->bindParam(':k',$mob,PDO::PARAM_STR);
$query->execute();

//echo($query);

?>
<a href = "index.php">start</a>
</body>
</html>