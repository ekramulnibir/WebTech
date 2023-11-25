<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_SESSION['login_email'])) {
        $email = $_SESSION['login_email'];
    }elseif(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
    }
    $newPassword = $_POST['npassword'];
    $confirmPassword = $_POST['cpassword'];

    if (empty($newPassword) || empty($confirmPassword)) {
        header("Location: ../dView/UpdatePassword.php?msg1=" . "New Password and Confirm Password cannot be empty");
        exit;
    } elseif ($newPassword !== $confirmPassword) {
        header("Location: ../dView/UpdatePassword.php?msg1=" . "New Password and Confirm Password must match");
        exit;
    }

    require_once('../Model/db.php');
    $conn = dbConnection();

    $sql = "UPDATE userinfo SET password = '$newPassword' WHERE email = '$email'";

    if (mysqli_query($conn, $sql)) {
        $dsql = "UPDATE doctorinfo SET password = '$newPassword' WHERE email = '$email'";
        mysqli_query($conn, $dsql);
        header("Location: ../nView/Login.php?msg1=" . "Password updated successfully. Please login again.");
        exit;
    } else {
        echo "Error updating password: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
