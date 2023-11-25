<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forget password page</title>
	<script src="script.js"> </script>
	<link rel="stylesheet" href="forgetStyle.css">
	
</head>
<body>
	<?php 
	session_start();
	include 'Header.php';
	?>
	
	<p align="center" style="color: red">
		<?php 
			if (isset($_GET['msg1'])) {
				echo $_GET['msg1'];
			}
		?>
	</p>

	<br>
	<br>
	<br>

	<form id="forogtForm" method="post" action="../Controller/VerificationCode.php" novalidate align="center"> 
		<h2 align="center">Forget Password</h2>
		<input type="email" id="email" name="email" placeholder="Email" size="30px"><br><br>
		<input type="submit" value="Forget Password" size="30px" onclick="checkForgetField()">
		
	</form>

	<br>
	<br>
	<br>

	<?php include 'Footer.php';?>
</body>
</html>