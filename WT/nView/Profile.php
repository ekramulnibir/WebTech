<?php
	require_once('../Model/db.php');
	
	session_start();
	if(isset($_SESSION['login_email'])){
		$email = $_SESSION['login_email'];
	}
	
    $conn = dbConnection();
    
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM userinfo WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)){
            $first_name = $row['FirstName'];
            $last_name = $row['LastName'];
            $gender = $row['gender'];
            $dob = $row['DOB'];
            $phone = $row['phoneno'];
            $address = $row['Address'];
        }
    }
    include 'Header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile page</title>
</head>
<body align='center'>
	<h2 align='center'>Profile page</h2>
	

	<h3><?php echo $first_name; echo " "; echo $last_name; ?></h3>
	<table align="center" width="25%" border="1" style="border-collapse: collapse;">

		<tr>
			<td align="right" width="30%">Email</td>
			<td align="left">: <?php echo $email; ?></td>
		</tr>
		<tr>
			<td align="right" width="20%">Phone No</td>
			<td align="left">: 0<?php echo $phone; ?></td>
		</tr>
		<tr>
			<td align="right" width="20%">Date of birth</td>
			<td align="left">: <?php echo $dob; ?></td>
		</tr>
		<tr>
			<td align="right" width="20%">Address</td>
			<td align="left">: <?php echo $address; ?></td>
		</tr>

	</table>

	<br>
	<div align="center">
		<button><a href="ChangePassword.php" style="text-decoration:none;">Change Password</a></button>
	</div>
	<br>
	<div align="center">
		<button><a href="EditProfile.php" style="text-decoration:none;">Edit profile</a></button>
	</div>
	<br>
	<div align="center">
		<button><a href="../nController/Logout.php" style="text-decoration:none;">Logout</a></button>
	</div>


</body>
</html>

<?php include 'Footer.php'; ?>