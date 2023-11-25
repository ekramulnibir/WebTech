<?php
session_start();

if (isset($_GET['aid'])) {
    $aid = $_GET['aid'];
    require_once('../Model/db.php');
    $conn = dbConnection();

    $sql = "DELETE FROM appointment WHERE id = '$aid'";
    
    if (mysqli_query($conn, $sql)) {
        // Appointment canceled successfully, redirect to the dashboard
        header("Location: ../dView/Homepage.php");
        exit(); // Make sure to exit after a header redirect
    } else {
        echo "Error cancelling appointment: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Invalid appointment ID.";
}
?>
