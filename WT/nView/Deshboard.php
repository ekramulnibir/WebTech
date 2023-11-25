<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Deshboard page</title>
</head>
<body>
	

	<?php
	require_once('../Model/db.php');

	include 'Header.php';
		if(!empty($_SESSION['login_email'])){
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
				$adminId = $row['id'];	
			}
        }
        mysqli_close($conn);
	?>

	<h3 align="center">Welcome, <?php echo $first_name; echo " "; echo $last_name?></h3>
	
	<table>
		<tr>
			<td align="center">

				<a href="ManageDoctor.php" style="text-decoration:none;"><img src="https://cdn-icons-png.flaticon.com/512/607/607414.png" hight="30%" width="30%"></a>
				<br>
				<a href="ManageDoctor.php" style="text-decoration:none;"><p>Manage Doctor</p></a>

			</td>
			<td align="center">
				<a href="ManagePatient.php" style="text-decoration:none;"><img src="https://img.freepik.com/free-vector/hospital-patient-concept-illustration_114360-8322.jpg" hight="30%" width="30%"></a>
				<br>
				<a href="ManagePatient.php" style="text-decoration:none;"><p>Manage Patient</p></a>
				
			</td>
			<td align="center">
				<a href="Appointment.php" style="text-decoration:none;"><img src="https://img.freepik.com/free-vector/event-management-performance-efficiency-time-optimization-reminder-task-project-deadline-flat-design-element-appointment-date-reminding-concept-illustration_335657-2011.jpg" hight="30%" width="30%"></a>
				<br>
				<a href="Appointment.php" style="text-decoration:none;"><p>Appointment</p></a>
			</td>
			<td align="center">
				<a href="Feedback.php" style="text-decoration:none;"><img src="https://media.istockphoto.com/id/1276662661/vector/feedback-speech-bubble-icon-vector-design.jpg?s=612x612&w=0&k=20&c=_zkKd_Am_djsPmfBJC4rOao_ulnecADEk08e5BrO7YQ=" hight="30%" width="30%"></a>
				<br>
				<a href="Feedback.php" style="text-decoration:none;"><p>Feedbaks</p></a>
			</td>
		</tr>
	</table>

	<?php include 'Footer.php'; ?>


</body>
</html>