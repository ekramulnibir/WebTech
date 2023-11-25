<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forget password page</title>
	<link rel="stylesheet" href="style.css">
	<script src="Javascript.js"> </script>
</head>
<body>
	<?php include '../nView/Header.php';?>
	<h2 align="center">Forget Password</h2>
	
	<p align="center" style="color: red">
		<?php 
			if (isset($_GET['msg1'])) {
				echo $_GET['msg1'];
			}
		?>
	</p>

	<form method="post" action="../nController/VerificationCode.php" novalidate align="center"> 
		<input type="email" id='email' name="email" placeholder="Email" size="30px"><br><br>
		<input id="#form-field1"  type="submit" value="Forget Password" size="30px" onclick="checkForgetPass()">
		
	</form>

	<?php include 'Footer.php';?>
</body>
</html>