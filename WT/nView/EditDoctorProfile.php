<?php

require_once('../Model/db.php');

session_start();
include 'Header.php';

$conn = dbConnection();

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$doctorid = $_GET['doctorid']; //doctorid


$sql = "SELECT * FROM doctorinfo WHERE id='$doctorid'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) == 0) {
    die("Doctor not found.");
}

$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $dob = $_POST['dob'];
    $degree = $_POST['degree'];
    $specialist = $_POST['specialist'];
    $address = $_POST['address'];
    $bg = $_POST['blood_group'];

    $sql = "UPDATE doctorinfo SET firstname='$firstname', lastname='$lastname', degree='$degree', specialist='$specialist', address='$address', bg='$bg' WHERE id='$doctorid'";

    if (mysqli_query($conn, $sql)) {

        header('Location: ManageDoctor.php');
       
    } else {
        echo "Error updating doctor information: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Doctor Information</title>
</head>
<body align='center'>
<h1>Edit Doctor Information</h1>
<form method="POST" align='center'>
    <table align="center">
        <tr>
            <th align="center"><label for="fname">First Name</label></th>
            <td align="left">:<input type="text" id="fname" name="fname" value="<?php echo $row['firstname']; ?>">
            </td>
        </tr>
        <tr>
            <th align="center"><label for="lname">Last Name</label></th>
            <td align="left">:<input type="text" id="lname" name="lname" value="<?php echo $row['lastname']; ?>">
            </td>
        </tr>
        <tr>
            <th align="center"><label for="degree">Degree</label></th>
            <td align="left">:<input type="text" id="degree" name="degree" value="<?php echo $row['degree']; ?>">
            </td>
        </tr>
        <tr>
            <th align="center"><label for="specialist">Specialist</label></th>
            <td align="left">:<input type="text" id="specialist" name="specialist"
                                    value="<?php echo $row['specialist']; ?>"></td>
        </tr>
        <tr>
            <th align="center"><label for="address">Address</label></th>
            <td align="left">:<input type="text" id="address" name="address"
                                    value="<?php echo $row['address']; ?>"></td>
        </tr>
        <tr>
            <th align="center"><label for="blood_group">Blood Group</label></th>
            <td align="left">:<input type="text" id="blood_group" name="blood_group"
                                    value="<?php echo $row['bg']; ?>"></td>
        </tr>
        <tr>
            <td> </td>
            <td align="right"><input type="submit" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>

<?php
include 'Footer.php';
?>
