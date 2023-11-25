<?php
require_once('../Model/db.php');

session_start();
include 'Header.php';

$conn = dbConnection();
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM feedback";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback Table</title>
</head>
<body align='center'>
    <h1>Feedback Table</h1>
    <table align="center" width="60%" border="1" style="border-collapse: collapse;">
 
        <tr>
            <th>Feedback ID</th>
            <th>Patient Name</th>
            <th>Doctor Name</th>
            <th>Feedbacks</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $feedbackId = $row['id'];
                $patientId = $row['pid'];
                $doctorId = $row['did'];
                $feedback = $row['feedback'];


                $sql = "SELECT * FROM userinfo where id = '$patientId'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($patient = mysqli_fetch_assoc($result)) {
                        $patientfname = $patient['FirstName'];
                        $patientlname = $patient['LastName'];
                    }
                }

                $sql = "SELECT * FROM userinfo where id = '$doctorId'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($doctor = mysqli_fetch_assoc($result)) {
                        $doctorfname = $doctor['FirstName'];
                        $doctorlname = $doctor['LastName'];
                    }
                }
                ?>
                <tr>
                    <td><?php echo $feedbackId; ?></td>
                    <td><?php echo $patientfname; echo " "; echo $patientlname; ?></td>
                    <td><?php echo $doctorfname; echo " "; echo $doctorlname; ?></td>
                    <td><?php echo $feedback; ?></td>
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

<?php include 'Footer.php';?>
