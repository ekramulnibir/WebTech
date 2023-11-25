<?php
    session_start();
    require_once('../Model/db.php');
    $conn = dbConnection();

    if (isset($_GET['appointmentId'])) {
        $appointmentId = $_GET['appointmentId'];

        $sql = "DELETE FROM appointment WHERE id = $appointmentId";


    if (mysqli_query($conn, $sql)) {
        header('Location: ../fView/CancelAppointment.php');
    } else {
        echo "Error deleting appointment: " . mysqli_error($conn);
    }

        mysqli_close($conn);
    } else {
        echo "No appointment Id provided.";
}
?>
