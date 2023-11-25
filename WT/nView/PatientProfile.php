<?php
session_start();
include 'Header.php';

if (isset($_GET['patientid'])) {
    $patientId = $_GET['patientid'];

    require_once('../Model/db.php');

    $conn = dbConnection();

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM patientinfo WHERE pid = $patientId";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        
        $row = mysqli_fetch_assoc($result);

        $first_name = $row['firstname'];
        $last_name = $row['lastname'];
        $email = $row['email'];
        $gender = $row['gender'];
        $address = $row['address'];
        $date_of_birth = $row['dob'];
        $blood_group = $row['bg'];
        $picture = $row['picture'];
    }

   
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patient Profile</title>
</head>
<body>
    <h2 align="center">Patient Profile</h2>
    <div align="center">
        <?php if (isset($picture)) : ?>
            <img src="../upload/<?php echo $picture; ?>" alt="patient Picture" style="width: 10%; height: 10%;">
        <?php else : ?>
            <p>No picture available</p>
        <?php endif; ?>
        <p><strong>Name:</strong> <?php echo isset($first_name) ? $first_name . ' ' . $last_name : 'N/A'; ?></p>
        <p><strong>Email:</strong> <?php echo isset($email) ? $email : 'N/A'; ?></p>
        <p><strong>Gender:</strong> <?php echo isset($gender) ? $gender : 'N/A'; ?></p>
        <p><strong>Address:</strong> <?php echo isset($address) ? $address : 'N/A'; ?></p>
        <p><strong>Date of Birth:</strong> <?php echo isset($date_of_birth) ? $date_of_birth : 'N/A'; ?></p>
        <p><strong>Blood Group:</strong> <?php echo isset($blood_group) ? $blood_group : 'N/A'; ?></p>
    </div>
</body>
</html>

<?php include 'Footer.php'; ?>
