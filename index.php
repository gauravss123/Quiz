<html>
<head>
<title>WELCOME</title>
<script src="javascript/head.min.js"></script>  <!-- to handle script loading functions-->
<script>
            head.load("http://code.jquery.com/jquery-1.9.1.min.js","javascript/index.js");
</script>
<link rel="stylesheet" href="css/index.css" type="text/css">
</head>
<body>
<form id="fo" action="start.php" method="post" >
	<table class="box" id="43" >
	<tbody>
	<tr>
		<td><label for="fname"style="font-size:1.5vw">Name:</label><br></td>
		<td><input name="fname"  type="text" autocomplete="off">&nbsp </td>
		<td><br><br><span id="1"style="font-size:1.5vw"> Field is required </span>
		<!-- used to give error if team name already exists -->

		<?php 
		session_start();
		if(isset($_SESSION['error1'])){
		echo("<script>var w = (.35)*window.innerWidth;$('#43').width(w);</script>");
		echo("<span id='1'style='font-size:1.5vw'>". $_SESSION['error1']."</span>");
		}
		else if(isset($_SESSION['error'])){
		echo("<script>var w = (.35)*window.innerWidth;$('#43').width(w);</script>");
		echo("<span id='1'style='font-size:1.5vw'>". $_SESSION['error']."</span>");	
		}
		session_destroy();?>
		</td>
	</tr>   
	<tr>
		<td><label for="contact"style="font-size:1.5vw">Contact :</label> </td><br>
		<td><input type="text"  maxlength = "10" autocomplete = "off" name="contact" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"> &nbsp </td>
		<td><br><br><span id="3"style="font-size:1.5vw">Contact number can not be less than 10 digits </span></td>
	</tr>   
	</tbody>
	</table> 
	<div class='but'><input type="submit"></div>
</form>

</body>
</html> 