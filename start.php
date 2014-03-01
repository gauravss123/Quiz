<html>
<head>
<title>Test</title>
<link rel="stylesheet" type="text/css" href="css/start.css">	
</head>

<?php
//to check if user hasn't opened this page directly
if(!array_key_exists('fname', $_POST)){
		session_start();
		$_SESSION['error1']="Unauthorised Access";
		session_write_close();
		echo("<script >location.href = 'index.php';</script>");
	}
	else ///
	echo("<div id='tex' class='start'>Hi, ".$_POST['fname']."<br>");
try {
    $conn = new PDO('mysql:host=localhost;dbname=exam3', 'root', '');	
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

$sql = "INSERT INTO user (NAME,MOBILE) VALUES (:n1,:n2)";

try{
$query = $conn->prepare($sql);
$query->bindParam(":n1", $_POST["fname"],PDO::PARAM_STR);
$query->bindParam(":n2", $_POST["contact"],PDO::PARAM_INT);
$query->execute();
}

catch(PDOException $e){
    if($e->getCode()==23000)
		{
		session_start();
		$_SESSION['error']="User already exists";
		echo("<script >location.href = 'index.php';</script>");
	
		}
}

session_start();
$_SESSION["m"]=$_POST['fname'];
session_write_close();
?>
Rules: <br>
1. The examination will consist of 30 multiple questions.<br>
2. Duration of examination will be 20 minutes.<br>
3. Each correct answer will give you 3 mark and each wrong answer negative 2 marks.<br><br></div>
<div style="width:300px;">
<div id ='but' class='but1'><a href = "exam_st.php">Start</a></div>
</html> 