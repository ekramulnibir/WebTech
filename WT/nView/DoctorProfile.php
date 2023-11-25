<?php
require_once('../Model/db.php');

session_start();
include 'Header.php';

if (isset($_GET['id'])) {
    $doctorId = $_GET['id'];
    
    $conn = dbConnection();

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $sql = "SELECT * FROM doctorinfo WHERE id = $doctorId";
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
        $degree = $row['degree'];
        $specialist = $row['specialist'];
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
    <title>Doctor Profile</title>
</head>
<body>
    <h2 align="center">Doctor Profile</h2>
    <div align="center">
        <?php if (isset($picture)) : ?>
            <img src="../upload/<?php echo $picture; ?>" alt="Doctor Picture" style="width: 200px; height: 200px;">
        <?php else : ?>
            <p>No picture available</p>
        <?php endif; ?>
        <p><strong>Name:</strong> <?php echo isset($first_name) ? $first_name . ' ' . $last_name : 'N/A'; ?></p>
        <p><strong>Email:</strong> <?php echo isset($email) ? $email : 'N/A'; ?></p>
        <p><strong>Gender:</strong> <?php echo isset($gender) ? $gender : 'N/A'; ?></p>
        <p><strong>Address:</strong> <?php echo isset($address) ? $address : 'N/A'; ?></p>
        <p><strong>Date of Birth:</strong> <?php echo isset($date_of_birth) ? $date_of_birth : 'N/A'; ?></p>
        <p><strong>Blood Group:</strong> <?php echo isset($blood_group) ? $blood_group : 'N/A'; ?></p>
        <p><strong>Degree:</strong> <?php echo isset($degree) ? $degree : 'N/A'; ?></p>
        <p><strong>Specialist:</strong> <?php echo isset($specialist) ? $specialist : 'N/A'; ?></p>
    </div>
</body>
</html>

<?php include 'Footer.php'; ?>
