<?php
require_once('../Model/db.php');

if (isset($_GET['patientid'])) {
    $patientId = $_GET['patientid'];

    $conn = dbConnection();

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM patientinfo WHERE pid = $patientId";

    if (mysqli_query($conn, $sql)) {
        header('Location: ../nView/ManagePatient.php');
    } else {
        echo "Error deleting doctor: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "No doctor ID provided.";
}
?>
