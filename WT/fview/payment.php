<?php
session_start();
include '../nView/Header.php';

if (isset($_GET['patientId']) && isset($_GET['doctorId']) && isset($_GET['date'])) {
    
    $patientId = $_GET['patientId'];;
    $doctorId = $_GET['doctorId'];
    $date = $_GET['date'];
    
}
?>

<?php
$errors = array(
    "card_fields" => "Please fill in both Card Number and Card Password.",
    "bkash_fields" => "Please fill in both Bkash Number and Bkash Password.",
    "nagad_fields" => "Please fill in both Nagad Number and Nagad Password.",
    "rocket_fields" => "Please fill in both Rocket Number and Rocket Password.",
    "invalid_payment_method" => "Please select a payment method selected."
);

if (isset($_GET["error"]) && array_key_exists($_GET["error"], $errors)) {
    $errorMessage = $errors[$_GET["error"]];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h2 {
            text-align: center;
            padding: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
    
    
    <script>
        function showPaymentFields(paymentMethod) {
            let cardFields = document.getElementById('cardholder_fields');
            let cardsFields = document.getElementById('card_password_fields');
            
            let bkashFields = document.getElementById('bkash_fields');
            let bkashsFields = document.getElementById('bkash_password_fields');

            let nagadFields = document.getElementById('nagad_fields');
            let nagadsFields = document.getElementById('nagad_password_fields');

            let rocketFields = document.getElementById('rocket_fields');
            let rocketsFields = document.getElementById('rocket_password_fields');

            cardFields.style.display = (paymentMethod === 'Card') ? 'block' : 'none';
            cardsFields.style.display = (paymentMethod === 'Card') ? 'block' : 'none';

            bkashFields.style.display = (paymentMethod === 'Bkash') ? 'block' : 'none';
            bkashsFields.style.display = (paymentMethod === 'Bkash') ? 'block' : 'none';

            nagadFields.style.display = (paymentMethod === 'Nagad') ? 'block' : 'none';
            nagadsFields.style.display = (paymentMethod === 'Nagad') ? 'block' : 'none';

            rocketFields.style.display = (paymentMethod === 'Rocket') ? 'block' : 'none';
            rocketsFields.style.display = (paymentMethod === 'Rocket') ? 'block' : 'none';
        }
    </script>
</head>
<body>
    <h2>Payment</h2>

    <form align="center" method="post" action="../fController/paymentaction.php" novalidate>
        <label align="center">Payment Method:</label>
        <input type="radio" name="payment_method" value="Card" onclick="showPaymentFields('Card');"> Card
        <input type="radio" name="payment_method" value="Bkash" onclick="showPaymentFields('Bkash');"> Bkash
        <input type="radio" name="payment_method" value="Nagad" onclick="showPaymentFields('Nagad');"> Nagad
        <input type="radio" name="payment_method" value="Rocket" onclick="showPaymentFields('Rocket');"> Rocket
        <br>

        
        <table align="center">
            <tr id="cardholder_fields" style="display: none;">
                <td>Card Number:</td>
                <td><input type="text" name="cardnumber"></td>
            </tr>
            <tr id="card_password_fields" style="display: none;">
                <td>Card Password:</td>
                <td><input type="password" name="card_password"></td>
            </tr>

            <tr id="bkash_fields" style="display: none;">
                <td>Bkash Number:</td>
                <td><input type="text" name="bkash_phonenumber"></td>
            </tr>
            <tr id="bkash_password_fields" style="display: none;">
                <td>Bkash Password:</td>
                <td><input type="password" name="bkash_password"></td>
            </tr>

            <tr id="nagad_fields" style="display: none;">
                <td>Nagad Number:</td>
                <td><input type="text" name="nagad_accountnumber"></td>
            </tr>
            <tr id="nagad_password_fields" style="display: none;">
                <td>Nagad Password:</td>
                <td><input type="password" name="nagad_password"></td>
            </tr>

            <tr id="rocket_fields" style="display: none;">
                <td>Rocket Number:</td>
                <td><input type="text" name="rocket_accountnumber"></td>
            </tr>
            <tr id="rocket_password_fields" style="display: none;">
                <td>Rocket Password:</td>
                <td><input type="password" name="rocket_password"></td>
            </tr>
        </table>

        <input type="hidden" name="patientId" value="<?php echo $patientId; ?>">
        <input type="hidden" name="doctorId" value="<?php echo $doctorId; ?>">
        <input type="hidden" name="date" value="<?php echo $date; ?>">

        <div style="text-align: center;">
            <input type="submit" value="Submit Payment">
        </div>
    </form>

    <?php
    
    if (isset($errorMessage)) {
        echo '<div class="error-message">' . $errorMessage . '</div>';
    }
    ?>

</body>
</html>

<?php
include 'Footer.php'; 
?>
