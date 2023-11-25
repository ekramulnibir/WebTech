<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Enter Verification Code</title>
</head>
<body>

	<?php 
	session_start();
	include 'Header.php';
	?>
	<h2 align="center">Enter Verification Code</h2>
	<p align="center" style="color: red">
		<?php 
			if (isset($_GET['msg1'])) {
				echo $_GET['msg1'];
			}
		?>
	</p>

	<form method="post" action="../Controller/VerifyCode.php" novalidate align="center"> 
		<input type="number" name="verificationcode" placeholder="Enter OTP" size="30px"><br><br>
		<input type="submit" value="Submit">
		
	</form>

	<?php include 'Footer.php';?>


</body>
</html>