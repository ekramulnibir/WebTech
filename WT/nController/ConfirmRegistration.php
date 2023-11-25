<?php
	include '../View/Header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Confirm Registration page</title>
</head>
<body align="center">
	<h3>Confirm Registration</h3>
	<?php

	$random_number = "";

	if (isset($_COOKIE['number'])) {

	    $random_number = $_COOKIE['number'];

	} else {

	    echo "<p style='color: red'><b>Time out.</b></p>";

	}

	if($_SERVER['REQUEST_METHOD'] === "POST"){
		$otp = $_POST['otp'];

		if(empty($otp)){
			echo "<p align='center' style='color: red'>Enter the OTP</p>";
		}
		else{
			if($random_number === $otp){
				header('Location: ../View/Homepage.php');
			}else{

				require_once('../Model/db.php');

				if (isset($_GET['adminemail'])) {
				    $email = $_GET['adminemail'];

				    $conn = dbConnection();

				    if (!$conn) {
				        die("Connection failed: " . mysqli_connect_error());
				    }

				    $sql = "DELETE FROM admininfo WHERE email = '$email'";

				    if (mysqli_query($conn, $sql)) {
				        echo "<p style='color: red'><b>Time out.</b></p>";
				    } else {
				        echo "Error deleting admin: " . mysqli_error($conn);
				    }

				    mysqli_close($conn);
				} 
				
			}
		}
	}

?>

	<form method='post' align="center" novalidate>
		<input type="number" id="otp" name="otp" placeholder="Enter OTP" size="30px">
		<input type="submit" value="Submit">
	</form>
	

</body>
</html>

<?php
	include '../View/Footer.php';
?>