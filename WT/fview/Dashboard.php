<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		h3 {
		  text-align: center;
		  color: #333;
		}

		table {
		  width: 60%;
		  margin-top: 20px;
		}

		td {
		  padding: 20px;
		  text-align: center;
		}

		td a {
		  text-decoration: none;
		}

		td p {
		  margin: 10px 0;
		  font-size: 18px;
		}

		td img {
		  width: 40%;
		  height: auto;
		  max-width: 200px;
		}

		td:hover {
		  background-color: #f2f2f2;
		  cursor: pointer;
		}

	</style>
	<title>Patient dashboard</title>
</head>
<body>
	

<?php
	
	include '../nView/Header.php';
	$email = "";
	$first_name = "";
	$last_name = "";
		
		if(!empty($_SESSION['login_email'])){
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
            
        	}
        }
        mysqli_close($conn);
	?>

	<h3 align="center">Welcome, <?php echo $first_name; echo " "; echo $last_name?></h3>
	<table align="center">
		<tr>
			<td align="center">

				<a href="ShowDoctor.php" style="text-decoration:none;"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrEmHEW9bS7CkrUbzw6bfWlCXHcQy9nfVmkHGxbF5ys1BU8oLi71rBE42LCtfZctAHFbo&usqp=CAU" hight="40%" width="40%"></a>
				<br>
				<a href="ShowDoctor.php" style="text-decoration:none;"><p>Available Doctor</p></a>

			</td>
			<td align="center">
				<a href="ShowAppointment.php" style="text-decoration:none;"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR8__BfN15mIIuCc93UqkhgXhW-yB8Z9ODWGHqPvZu9Bma7G2mFLzlPfQ1zEPQGeSUogGM&usqp=CAU" hight="40%" width="40%"></a>
				<br>
				<a href="ShowAppointment.php" style="text-decoration:none;"><p>Show Appoinment</p></a>
				
			</td>
			<td align="center">
				<a href="CancelAppointment.php" style="text-decoration:none;"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQP9F8QTEzDGe4-tWjkB4DP5oMnp3g2tcbf6e0MeT5IEuX2YhKdpBt6E2ZQcTnxQvpYDSE&usqp=CAU" hight="40%" width="40%"></a>
				<br>
				<a href="CancelAppointment.php" style="text-decoration:none;"><p>Cancel Appointment</p></a>
			</td>
		</tr>
	</table>



	<?php include 'Footer.php'; ?>


</body>
</html>