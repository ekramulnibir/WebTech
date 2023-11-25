<?php 
session_start();
include 'Header.php'; 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update password</title>
</head>
<body>

	<p align="center" style="color: red">
		<?php 
			if (isset($_GET['msg1'])) {
				echo $_GET['msg1'];
			}
		?>
	</p>
	<form method="post" action="../Controller/UpdatePasswordAction.php" novalidate align='center'>
		<input type="password" name="npassword" placeholder="New password" size="30px"><br><br>
		<input type="password" name="cpassword" placeholder="Confirm password" size="30px"><br><br>
		<input type="submit" value="Update password">
		
	</form>

</body>
</html>

<?php include 'Footer.php'; ?>