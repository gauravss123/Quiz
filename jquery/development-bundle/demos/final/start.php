<html>
<head>
<title>Test</title>
<html lang="en">
	<meta charset="utf-8">
	<title>Test</title>
	<link rel="stylesheet" href="../../themes/base/jquery.ui.all.css">
	<script src="../../jquery-1.9.1.js"></script>
	<script src="../../ui/jquery.ui.core.js"></script>
	<script src="../../ui/jquery.ui.widget.js"></script>
	<script src="../../ui/jquery.ui.mouse.js"></script>
	<script src="../../ui/jquery.ui.button.js"></script>
	<script src="../../ui/jquery.ui.draggable.js"></script>
	<script src="../../ui/jquery.ui.position.js"></script>
	<script src="../../ui/jquery.ui.resizable.js"></script>
	<script src="../../ui/jquery.ui.button.js"></script>
	<script src="../../ui/jquery.ui.dialog.js"></script>
	<script src="../../ui/jquery.ui.effect.js"></script>
	<link rel="stylesheet" href="../demos.css">
		<style>
		body { font-size: 62.5%; }
		label, input { display:block; }
		input.text { margin-bottom:12px; width:95%; padding: .4em; }
		fieldset { padding:0; border:0; margin-top:25px; }
		h1 { font-size: 1.2em; margin: .6em 0; }
		div#users-contain { width: 350px; margin: 20px 0; }
		div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
		div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
		.ui-dialog .ui-state-error { padding: .3em; }
		.validateTips { border: 1px solid transparent; padding: 0.3em; }
	</style>
	<script>
	$(function() {
		var	password = $( "#password" ),
		
			allFields = $( [] ).add( password ),
			tips = $( ".validateTips" );
		
	function updateTips( t ) {
			tips
				.text( t )
				.addClass( "ui-state-highlight" );
			setTimeout(function() {
				tips.removeClass( "ui-state-highlight", 1500 );
			}, 500 );
		}

		function check(o) {
			
			if ( o.val()=="9650434944" ) 
			{
			return true;
			}
			else
			{
				o.addClass( "ui-state-error" );
				updateTips( "Wrong passcode" );
				return false;
			} 
		}


		$( "#dialog-form" ).dialog({
			autoOpen: false,
			height: 300,
			width: 350,
			modal: true,
			buttons: {
				"Ok": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );

	
	
	

					bValid = bValid && check( password);

					if ( bValid ) {
						$( this ).dialog( "close" );
						window.location.href = 'exam_st.php';
					}
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});

		$( "#start" )
			.button()
			.click(function() {
				$( "#dialog-form" ).dialog( "open" );
			});
	});
	</script>

</head>

<?php
/*
try {
    $conn = new PDO('mysql:host=localhost;dbname=exam3', 'root', '');	
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
$sql = "INSERT INTO user (TEAMNAME,MOBILE,MOBILE2) VALUES (:n1,:n2,:m)";


$query = $conn->prepare($sql);
$query->bindParam(":n1", $_POST["fname"],PDO::PARAM_STR);
$query->bindParam(":n2", $_POST["contact"],PDO::PARAM_INT);
$query->bindParam(":m", $_POST["contact2"],PDO::PARAM_INT);
$query->execute();*/
$que=array();
for ($i=1;$i<=4;)
	{
	$x = rand(1,10);
	$flag=array_search($x,$que);
	if($flag===FALSE)
		{
		$que[]=$x;
		++$i;
		}
	}
	
	
	
//$con = mysqli_connect("localhost","root","") or die("Could not connect to MySql server");

session_start();
$_SESSION['q']=$que;
$_SESSION['m']=$_POST['fname'];
session_write_close();
?>
<div class="demo-description">
Rules: <br>
1. The examination will consist of 4 multiple questions.<br>
2. Duration of examination will be 10 minutes.<br>
3. Each correct answer will give you 1 mark and each wrong answer negative 2 marks.<br>
</div>

<div id="dialog-form" title="Validate">
	<p class="validateTips">Enter Passcode to continue</p>
	<form>
	<fieldset>
		<label for="password">Password</label>
		<input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all" />
	</fieldset>
	</form>
</div>
<button id="start">Start</button>
</html> 