<html>
<head>
<title>WELCOME</title>
<link rel="stylesheet" href="../final/jquery/development-bundle/demos/demos.css">

</head>
<body>
<div class="demo-description">
<form action="start.php" method="post">
Team Name: <input type="text" name="fname" autocomplete = "off"><br>
Contact : &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" maxlength = "10" autocomplete = "off" name="contact" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"><br>
Contact 2 :&nbsp&nbsp&nbsp<input type="text" maxlength = "10" autocomplete = "off" name="contact2" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"><br>
<input type="submit">
</div>
</form>
</body>
<!-- Script to enter only numeric values in enrollment number and contact no -->
    <script type="text/javascript">
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
	specialKeys.push(9); //Tab
	specialKeys.push(35); // Home
        specialKeys.push(36); //End
        specialKeys.push(37); // Left Arrow
        specialKeys.push(39); //Right Arrow
        specialKeys.push(46); // Delete
	function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57)||specialKeys.indexOf(keyCode) != -1 );
           
            return ret;
        }
    </script>


</html> 