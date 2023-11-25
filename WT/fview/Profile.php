<?php
	session_start();
	if(isset($_SESSION['login_email'])){
		$email = $_SESSION['login_email'];
	}
	require_once('../Model/db.php');
	$conn = dbConnection();

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
            $picture = $row['picture'];
        }
    }
    include '../nView/Header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		h2, h3 {
		  text-align: center;
		  color: #333;
		}

		table {
		  width: 25%;
		  border-collapse: collapse;
		  margin: 20px auto;
		}

		table, th, td {
		  border: 1px solid #ccc;
		}

		th, td {
		  padding: 10px;
		}

		th {
		  background-color: #f2f2f2;
		}

		button {
		  padding: 8px 16px;
		  background-color: #4CAF50;
		  color: #fff;
		  border: none;
		  border-radius: 5px;
		  cursor: pointer;
		  text-decoration: none;
		}

		button a {
		  color: #fff;
		  text-decoration: none;
		}

		button:hover {
		  background-color: #66ccff;
		}

		#form-field2 {
		  margin: 20px auto;
		}

	</style>
	<title>Profile page</title>
	<link rel="stylesheet" href="style.css">
</head>
<body align='center'>
	<h2 align='center'>Profile page</h2>

	<p align="center"><img src="../upload/<?php echo $picture; ?>" alt="Profile Picture" width="200" height="200" ></p>
	

	<h3><?php echo $first_name." " . $last_name; ?></h3>
	<table align="center" border="1" width="25%" style="border-collapse: collapse;">
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
	<div id="form-field2" align="center">
		<button><a href="EditProfile.php" style="text-decoration:none;">Edit profile</a></button>
	</div>

	<div id="form-field2" align="center">
		<button><a href="ChangePassword.php" style="text-decoration:none;">Change Password</a></button>
	</div>

	<div align="center" id="form-field2" >
		<button><a href="../nController/Logout.php" style="text-decoration:none;">Logout</a></button>
	</div>

</body>
</html>

<?php include 'Footer.php'; ?>