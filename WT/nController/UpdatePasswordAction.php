<?php
    session_start();
    $email = $_SESSION['login_email'];
    if($_SERVER['REQUEST_METHOD'] === "POST"){
 
        $newPassword = $_POST['npassword'];
        $confirmPassword = $_POST['cpassword'];
    
    
        if(empty($newPassword) && empty($confirmPassword)){
            header("Location: ../View/UpdatePassword.php?msg1="."New Password and confirm Password can not be empty");
        }
        else{
    
            if(empty($newPassword)){
                header("Location: ../View/UpdatePassword.php?msg1="."New Password can not be empty");
            }
        
        
            if(empty($confirmPassword)){
                header("Location: ../View/UpdatePassword.php?msg1="."Confirm Password can not be empty");
            }
    
        }
        if($newPassword === $confirmPassword){
            require_once('../Model/db.php');
            
            $conn = dbConnection();
           
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "UPDATE admininfo SET password = '$newPassword' WHERE email = ";

            if (mysqli_query($conn, $sql)) {
                header("Location: ../View/Login.php?msg2="."New password has been updated. PLease login now.");
                echo "Password updated successfully.";
            } else {
                echo "Error updating password: " . mysqli_error($conn);
            }
        }
    }
?>

