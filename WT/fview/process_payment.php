<?php
session_start();
include '../nView/Header.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_SESSION['appointment'])) {
        $appointment = $_SESSION['appointment'];
        $dname = $appointment['doctorname'];
        $pname = $appointment['patientname'];
        $appointmentDate = $appointment['appointmentdate'];

       
        if (isset($_POST['payment_method'])) {
            $paymentMethod = $_POST['payment_method'];

            switch ($paymentMethod) {
                case 'card':
                    echo "<h2 align='center'>Payment Successful</h2>";
                    echo "<p>Doctor: $dname</p>";
                    echo "<p>Patient: $pname</p>";
                    echo "<p>Appointment Date: $appointmentDate</p>";
                    echo "<p>Payment Method: Card</p>";
                    break;
                case 'bkash':
                    echo "<h2 align='center'>Payment Successful</h2>";
                    echo "<p>Doctor: $dname</p>";
                    echo "<p>Patient: $pname</p>";
                    echo "<p>Appointment Date: $appointmentDate</p>";
                    echo "<p>Payment Method: Bkash</p>";
                    break;
                case 'nagad':
                    echo "<h2 align='center'>Payment Successful</h2>";
                    echo "<p>Doctor: $dname</p>";
                    echo "<p>Patient: $pname</p>";
                    echo "<p>Appointment Date: $appointmentDate</p>";
                    echo "<p>Payment Method: Nagad</p>";
                    break;
                case 'rocket':
                    echo "<h2 align='center'>Payment Successful</h2>";
                    echo "<p>Doctor: $dname</p>";
                    echo "<p>Patient: $pname</p>";
                    echo "<p>Appointment Date: $appointmentDate</p>";
                    echo "<p>Payment Method: Rocket</p>";
                    break;
                default:
                    echo "<h2 align='center'>Payment Failed</h2>";
                    echo "<p>Invalid payment method selected</p>";
            }
        } else {
            echo "<h2 align='center'>Payment Failed</h2>";
            echo "<p>Payment method not selected</p>";
        }
    } else {
        echo "<h2 align='center'>Payment Failed</h2>";
        echo "<p>Appointment details not found</p>";
    }
} else {
    echo "<h2 align='center'>Payment Failed</h2>";
    echo "<p>Invalid request method</p>";
}

include 'Footer.php'; 
?>
