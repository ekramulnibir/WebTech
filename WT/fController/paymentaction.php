<?php
session_start();
require_once('../Model/db.php');
$conn = dbConnection();
$email = $_SESSION['login_email'];

$sql = "SELECT * FROM userinfo WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    while($patient = mysqli_fetch_assoc($result)){
        $patientId = $patient['id'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $payment_method = $_POST['payment_method'] ?? "";
    $doctorId = $_POST['doctorId'];
    $date = $_POST['date'];
    $flag = true;

    if (empty($payment_method)) {
        $flag = false;
        header("Location: ../fview/payment.php?error=invalid_payment_method");
        exit();
    }
    
    if ($payment_method === "Card") {
        $card_number = $_POST['cardnumber'] ?? "";
        $card_password = $_POST['card_password'] ?? "";

        if (empty($card_number) || empty($card_password)) {
            $flag = false;
            header("Location: ../fview/payment.php?error=card_fields");
            exit();
        }

        } elseif ($payment_method === "Bkash") {
        $bkash_number = $_POST['bkash_phonenumber'] ?? "";
        $bkash_password = $_POST['bkash_password'] ?? "";

        if (empty($bkash_number) || empty($bkash_password)) {
            $flag = false;
            header("Location: ../fview/payment.php?error=bkash_fields");
            exit();
        }

        } elseif ($payment_method === "Nagad") {
        $nagad_number = $_POST['nagad_accountnumber'] ?? "";
        $nagad_password = $_POST['nagad_password'] ?? "";

        if (empty($nagad_number) || empty($nagad_password)) {
            $flag = false;
            header("Location: ../fview/payment.php?error=nagad_fields");
            exit();
        }

        } elseif ($payment_method === "Rocket") {
        $rocket_number = $_POST['rocket_accountnumber'] ?? "";
        $rocket_password = $_POST['rocket_password'] ?? "";

        if (empty($rocket_number) || empty($rocket_password)) {
            $flag = false;
            header("Location: ../fview/payment.php?error=rocket_fields");
            exit();
        }
    }

    if ($flag === true) {
        $status = "Assigned";
        $sql = "INSERT INTO appointment (pid, did, appointmentdate, status) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssss", $patientId, $doctorId, $date, $status);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            header("Location: ../fview/ShowAppointment.php");
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
}

header("Location: ../fview/payment.php");
exit();
?>
