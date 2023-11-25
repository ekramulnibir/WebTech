<?php
session_start();
include '../nView/Header.php';
$email = $_SESSION['login_email'];

$did = ""; 

if (isset($_GET['did'])) {
    $did = $_GET['did'];
}

require_once('../Model/db.php');
$conn = dbConnection();

$sql = "SELECT * FROM doctorinfo WHERE id = '$did'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($doctor = mysqli_fetch_assoc($result)) {
        $dfname = $doctor['firstname'];
        $dlname = $doctor['lastname'];
        $doctorId = $doctor['id'];
    }
}

$sql = "SELECT * FROM userinfo WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($patient = mysqli_fetch_assoc($result)) {
        $pfirstname = $patient['FirstName'];
        $plastname = $patient['LastName'];
        $patientId = $patient['id'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

        h2 {
          text-align: center;
          color: #333;
        }

        table {
          width: 25%;
          border-collapse: collapse;
          margin-top: 10px;
        }

        th{
            padding: 10px;
            text-align: right;
        }

        td {
          padding: 10px;
          text-align: left;
        }


        td input[readonly] {
          border: none;
          background-color: transparent;
          font-size: inherit;
        }

        td input[type="date"] {
          padding: 5px;
          border: 1px solid #ccc;
          border-radius: 5px;
        }
        #submit{
            left: 50px;
        }

        input[type="submit"] {
          display: block;
          margin: 0 auto; /* Centers the button horizontally */
          padding: 8px 16px;
          background-color: #4CAF50;
          color: #fff;
          border: none;
          border-radius: 5px;
          cursor: pointer;
        }

        input[type="submit"]:hover {
          background-color: #45a049;
        }

        p {
          color: red;
          text-align: center;
        }

    </style>
    <title>Confirm appointment</title>
</head>
<body>
    <h2 align="center">Book Appointment</h2>
    <form method="post" action="../fController/ConfirmAppointmentAction.php" novalidate>
        <table align="center" style="border-collapse: collapse;"> 
            <tr>
                <td align="center" colspan="2">
                    <p style="color: red">
                        <?php
                            if (isset($_GET['msg1'])) {
                                echo $_GET['msg1'];
                            }
                        ?>
                    </p>
                </td>
            </tr>
            <tr>
                <th align="right">Doctor Name:</th>
                <td>
                    <input type="text" readonly placeholder="<?php echo $dfname." ".$dlname; ?>">
                    <input type="hidden" name="doctorname" value="<?php echo $dfname." ".$dlname; ?>">
                </td>
                <td><input type="hidden" name="doctorId" value="<?php echo $doctorId ?>"></td>
            </tr>
            <tr>
                <th align="right">Patient Name:</th>
                <td>
                    <input type="text" readonly placeholder="<?php echo $pfirstname . " " . $plastname; ?>">
                    <input type="hidden" name="patientname" value="<?php echo $pfirstname . " " . $plastname; ?>">
                </td>
                <td><input type="hidden" name="patientId" value="<?php echo $patientId ?>"></td>
            </tr>
            <tr>
                <th align="right"><label for='appointmentdate'>Date:</label></th>
                <td align="left"><input type="date" name="appointmentdate" id="appointmentdate"></td>
            </tr>
            <tr>
                <td align="center" id="submit" colspan="2"><input type="submit" value="Proceed to Payment"></td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
	mysqli_close($conn); 
	include 'Footer.php'; 
?>
