<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home page</title>
</head>
<body>
	<?php
		session_start();
		if(empty($_SESSION['login_email']) || empty($_SESSION['login_password'])){
			include 'Login.php';
		}
		else{
			include 'Deshboard.php';
		}
	?>

</body>
</html>