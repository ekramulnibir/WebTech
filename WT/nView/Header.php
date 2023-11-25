<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Header page</title>
</head>
<body>

	<?php
		require_once('../Model/db.php');
		$conn = dbConnection();
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		if (empty($_SESSION['login_email']) || empty($_SESSION['login_password'])) {
			echo '<h2 align="center"><a href="../nView/Login.php" style="text-decoration:none;">WT Hospital Management System</a></h2>';
		} else {
			$email = $_SESSION['login_email'];
			$sql = "SELECT usertype FROM userinfo WHERE email = '$email'";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					$userType = $row['usertype'];

					if ($userType === "Admin") {
						echo '<h2 align="center"><a href="../nView/Homepage.php" style="text-decoration:none;">WT Hospital Management System</a></h2>
		
						<div align="right">
							<button ><a href="../nView/Profile.php?" style="text-decoration:none;"> Profile</a></button>
						</div>';
					} else if ($userType === "Patient") {
						echo '<h2 align="center"><a href="../fView/Homepage.php" style="text-decoration:none;">WT Hospital Management System</a></h2>
		
						<div align="right">
							<button ><a href="../fView/Profile.php?" style="text-decoration:none;"> Profile</a></button>
						</div>';
					}else if ($userType === "Doctor") {
						echo '<h2 align="center"><a href="../dView/Homepage.php" style="text-decoration:none;">WT Hospital Management System</a></h2>
		
						<div align="right">
							<button ><a href="../dView/Profile.php?" style="text-decoration:none;"> Profile</a></button>
						</div>';
					}
					
				}
			} else {
				// Handle the case when no rows are returned
			}
		}
		?>

</body>
</html>
