<?php
    require_once('../Model/db.php');


if (isset($_GET['appointmentid'])) {
    $appointmentId = $_GET['appointmentid'];

    $conn = dbConnection();


    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


    $sql = "DELETE FROM appointment WHERE id = $appointmentId";

  
    if (mysqli_query($conn, $sql)) {
        header('Location: ../View/Appointment.php');
        
    } else {
        echo "Error deleting doctor: " . mysqli_error($conn);
    }

   
    mysqli_close($conn);
} else {
    echo "No doctor ID provided.";
}
?>
