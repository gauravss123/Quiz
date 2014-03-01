<html>
<head>
<title>WELCOME</title>
<script src="javascript/head.min.js"></script>  <!-- to handle script loading functions-->
<script>
            head.load("http://code.jquery.com/jquery-1.9.1.min.js","javascript/index.js");
</script>

</head>
<body>

<form id="fo" action="start.php" method="post" >
	<table>
	<tbody>
	<tr>
		<td><label for="fname">Name:</label><br></td>
		<td><input name="fname"  type="text" autocomplete="off">&nbsp; <span id="1"> Field is required </span>
		<!-- used to give error if team name already exists -->
		
		<?php 
		session_start();
		if(isset($_SESSION['error1'])){
		echo($_SESSION['error1']);
		}
		else if(isset($_SESSION['error'])){
		echo($_SESSION['error']);	
		}
		session_destroy();?>
		</td>
	</tr>   
	<tr>
		<td><label for="contact">Contact :</label> </td>
		<td><input type="text"  maxlength = "10" autocomplete = "off" name="contact" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"> &nbsp;
		<span id="2"> Field is required </span>
		<span id="3">Contact should be of 10 digits </span></td>
	</tr>   
	 
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" ></td>
		<td>&nbsp;</td>
	</tr>
	</tbody>
	</table>
</form>

</body>
</html> 