<?php 
session_start();
include 'Header.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change password</title>
</head>
<body>
	<h2 align="center">Change password</h2>

<?php
if (isset($_SESSION['login_email'])) {
    $email = $_SESSION['login_email'];
}


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $oldpassword = $_POST['oldpassword'];

    if (empty($oldpassword)) {
        echo "<p align='center' style='color: red'>Enter the old password.</p>";
    } else {
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "HMS";

        $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT password FROM admininfo WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row['password'];

            if ($oldpassword === $storedPassword) {
                
                $newpassword = $_POST['npassword'];
                $confirmpassword = $_POST['cpassword'];

                if (empty($newpassword)) {
				    echo "<p align='center' style='color: red'>New password is required.";
				} elseif(strlen($newpassword) <= 5){

                    echo "New password must contain more than 5 characters";
                    
                    $flag = false;
                
                }

				if (empty($confirmpassword)) {
				    echo "<p align='center' style='color: red'>Confirm password is required.";
				} elseif(strlen($newpassword) <= 5){

                    echo "Confirm password must contain more than 5 characters";
                    
                    $flag = false;
                
                }

                elseif ($newpassword !== $confirmpassword) {
                    echo "<p align='center' style='color: red'>New password and confirm password do not match.</p>";
                } else {
                    
                    $updateSql = "UPDATE admininfo SET password = '$newpassword' WHERE email = '$email'";
                    if (mysqli_query($conn, $updateSql)) {
                        echo "<p align='center' style='color: green'>Password changed successfully.</p>";
                    } else {
                        echo "<p align='center' style='color: red'>Error updating password: " . mysqli_error($conn) . "</p>";
                    }
                }
            } else {
                echo "<p align='center' style='color: red'>Incorrect old password.</p>";
            }
        } else {
            echo "<p align='center' style='color: red'>Incorrect old password.</p>";
        }
    }
}
?>


    <form method="post" align='center' novalidate>
        <input type="password" name="oldpassword" placeholder="Old password" size="30"><br><br>

        <input type="password" id="npassword" name="npassword" placeholder="New password" size="30" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"><br><br>

        <input type="password" id="cpassword" name="cpassword" placeholder="Change password" size="30" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"><br><br>
        <input type="submit" value="Change Password">
    </form>
</body>
</html>

<?php
	include 'Footer.php';
?>
