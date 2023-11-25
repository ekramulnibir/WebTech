<?php

if (isset($_GET['aid'])) {
    $aid = $_GET['aid'];
    require_once('../Model/db.php');
    $conn = dbConnection();

    $sql = "UPDATE appointment SET status = 'Confirmed' WHERE id = '$aid'";
    if (mysqli_query($conn, $sql)) {
        header("Location: ../dView/Homepage.php?");
        exit;
    } else {
        echo "Error updating appointment: " . mysqli_error($conn);
    }

    mysqli_close($conn);

}