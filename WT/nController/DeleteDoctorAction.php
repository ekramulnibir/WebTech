<?php
require_once('../Model/db.php');

session_start();

if (isset($_GET['doctorid'])) {
    $doctorId = $_GET['doctorid'];

    $conn = dbConnection();

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM doctorinfo WHERE Id = $doctorId";

    if (mysqli_query($conn, $sql)) {
        header('Location: ../nView/ManageDoctor.php');
    } else {
        echo "Error deleting doctor: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "No doctor ID provided.";
}
?>
