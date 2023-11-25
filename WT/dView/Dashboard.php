<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
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
    
        $sql = "SELECT * FROM doctorinfo WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)){
            $first_name = $row['firstname'];
            $last_name = $row['lastname'];
            $id = $row['id'];
            
        	
        
	?>

	<h3 align="center">Welcome, <?php echo $first_name; echo " "; echo $last_name?></h3>
    <table align="center" width="50%" border="1" style="border-collapse: collapse;">
        <tr>
            <th>
                Patient name
            </th>
            <th>
                Appointment date
            </th>
            <th>
                Status
            </th>
            <th>
            </th>
        </tr>
    <?php
            
            $appointment = "SELECT * FROM appointment WHERE did = '$id'";
            $appointment_result = mysqli_query($conn, $appointment);

            if(mysqli_num_rows($appointment_result) > 0){
                while($appointment_row = mysqli_fetch_assoc($appointment_result)){
                    $aid = $appointment_row['id'];
                    $pid = $appointment_row['pid'];
                    $date = $appointment_row['appointmentdate'];
                    $status = $appointment_row['status'];
                    $patient = "SELECT * FROM userinfo WHERE id = '$pid'";
                    $patient_result = mysqli_query($conn, $patient);

                    if(mysqli_num_rows($patient_result) > 0){
                        while($patient_row = mysqli_fetch_assoc($patient_result)){
                            ?>

                            <tr>
                                <td align="center" width="20%">
                                    <?php echo $patient_row['FirstName'] . " " . $patient_row['LastName'] ?>
                                </td>
                                <td align="center" width="20%">
                                    <?php echo $date ?>
                                </td>
                                <td align="center" width="20%">
                                    <?php 
                                    if ($status == "Assigned") {
                                        echo '<p style="background-color: #ADBBB3; padding: 5px; border-radius: 5px; width: 40%;" >Assigned</p>';
                                    } elseif ($status == "Confirmed") {
                                        echo '<p style="background-color: #4CAF50; color: white; padding: 5px; border-radius: 5px; width: 40%;">Confirmed</p>';
                                    }
                                    ?>
                                </td>

                                <td align="center" width="10%">
                                    <?php if($status == "Assigned"){ ?>
                                    <button style="background-color: #4CAF50; color: white; padding: 8px 16px; border: none; border-radius: 5px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; margin: 4px 2px; cursor: pointer;">
                                        <a href="../dController/ConfirmAppointment.php?aid=<?php echo $aid; ?>" style="text-decoration: none; color: white;">Confirm</a>
                                    </button>
                                    <button style="background-color: #FF5733; color: white; padding: 8px 16px; border: none; border-radius: 5px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; margin: 4px 2px; cursor: pointer;">
                                        <a href="../dController/CancelAppointment.php?aid=<?php echo $aid; ?>" style="text-decoration: none; color: white;">Cancel</a>
                                    </button>
                                    <?php } ?>
                                </td>
                            <?php

                        }
                    }
                }
            }
        }
    }
    
    mysqli_close($conn);
    ?>
    </table>