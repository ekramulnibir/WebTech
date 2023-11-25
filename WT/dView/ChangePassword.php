<?php 
    session_start();
    include '../nView/Header.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

        h2 {
          text-align: center;
          color: #333;
        }

        form {
          margin: 0 auto;
          max-width: 300px;
        }

        input[type="password"] {
          width: 100%;
          padding: 10px;
          margin-bottom: 15px;
          border: 1px solid #ccc;
          border-radius: 5px;
        }

        input[type="submit"] {
          padding: 10px 20px;
          background-color: #4CAF50;
          color: #fff;
          border: none;
          border-radius: 5px;
          cursor: pointer;
        }

        input[type="submit"]:hover {
          background-color: #66ccff;
        }

        p {
          text-align: center;
          color: red;
        }

        p.success {
          color: green;
        }

    </style>
    <title>Change password</title>
</head>
<body>
	<h2 align="center">Change password</h2>

<?php
if (isset($_SESSION['loginemail'])) {
    $email = $_SESSION['loginemail'];
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $oldpassword = $_POST['oldpassword'];

    if (empty($oldpassword)) {
        echo "<p align='center' style='color: red'>Enter the old password.</p>";
    } else {
        require_once('../Model/db.php');
	    $conn = dbConnection();

        $sql = "SELECT password FROM userinfo WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row['password'];

            if ($oldpassword === $storedPassword) {    
                $newpassword = $_POST['npassword'];
                $confirmpassword = $_POST['cpassword'];

                if (empty($newpassword)) {
				    echo "<p align='center' style='color: red'>New password is required.";
				} elseif (strlen($newpassword) <= 5) {
                    echo "<p align='center' style='color: red'>New password must contain more than 5 characters.</p>";
                } 

				if (empty($confirmpassword)) {
				    echo "<p align='center' style='color: red'>Confirm password is required.";
				} elseif (strlen($confirmpassword) <= 5) {
                   
                }

                elseif ($newpassword !== $confirmpassword) {
                    echo "<p align='center' style='color: red'>New password and confirm password do not match.</p>";
                } else {
                  
                    $updateSql = "UPDATE patientinfo SET password = '$newpassword' WHERE email = '$email'";
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


    <form method="post" align='center'>
        <input type="password" name="oldpassword" placeholder="Old password" size="30"><br><br>
        <input type="password" id="npassword" name="npassword" placeholder="New password" size="30"><br><br>
        <input type="password" id="cpassword" name="cpassword" placeholder="Change password" size="30"><br><br>
        <input type="submit" value="Change Password">
    </form>
</body>
</html>

<?php
	include 'Footer.php';
?>
