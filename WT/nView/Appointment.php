<?php
require_once('../Model/db.php');

session_start();
include 'Header.php';

$conn = dbConnection();

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Appointment Table</title>
</head>

<body align='center'>
    <h1>Appointment Table</h1>
    <table align="center" width="60%" border="1" style="border-collapse: collapse;">

        <tr>
            <th>Appointment ID</th>
            <th>Patient Name</th>
            <th>Doctor Name</th>
            <th>Appointment Date</th>
            <th>Status</th>
            <th>Additional Note</th>
        </tr>
        <?php

        $sql = "SELECT * FROM appointment";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $appointmentId = $row['id'];
                $patientId = $row['pid'];
                $doctorId = $row['did'];
                $appointmentDate = $row['appointmentdate'];
                $status = $row['status'];
                $additionalNote = $row['additionalnote'];

                // Initialize variables
                $patientfname = "";
                $patientlname = "";

                $sqlPatient = "SELECT * FROM userinfo where id = '$patientId'";
                $resultPatient = mysqli_query($conn, $sqlPatient);
                if (mysqli_num_rows($resultPatient) > 0) {
                    while ($patient = mysqli_fetch_assoc($resultPatient)) {
                        $patientfname = $patient['FirstName'];
                        $patientlname = $patient['LastName'];
                    }
                }

                $sqlDoctor = "SELECT * FROM doctorinfo where id = '$doctorId'";
                $resultDoctor = mysqli_query($conn, $sqlDoctor);
                if (mysqli_num_rows($resultDoctor) > 0) {
                    while ($doctor = mysqli_fetch_assoc($resultDoctor)) {
                        $doctorfname = $doctor['firstname'];
                        $doctorlname = $doctor['lastname'];
                    }
                }

                ?>
                <tr>
                    <td><?php echo $appointmentId; ?></td>
                    <td><?php echo $patientfname . " " . $patientlname; ?></td>
                    <td><?php echo $doctorfname . " " . $doctorlname; ?></td>
                    <td><?php echo $appointmentDate; ?></td>
                    <td><?php echo $status; ?></td>
                    <td><?php echo $additionalNote; ?></td>
                    <td align="center">
                        <button style="background-color: orangered;">
                            <a href="../Controller/DeleteAppointmentAction.php?appointmentid=<?php echo $appointmentId;?>" style="text-decoration:none;">Delete Appointment Profile</a>
                        </button>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='6' style='color: red' align='center'>No records found</td></tr>";
        }
        mysqli_close($conn);
        ?>
    </table>
</body>

</html>

<?php include 'Footer.php'; ?>
