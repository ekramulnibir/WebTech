<?php
require_once('../Model/db.php');

session_start();
include 'Header.php';

$error = ""; 

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    
    $conn = dbConnection();

  
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $blood_group = $_POST['blood_group'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    
    if (empty($first_name) || empty($last_name) || empty($email) || empty($gender) || empty($date_of_birth) || empty($blood_group) || empty($address) || empty($password)) {
        $error = "All fields are required.";
    } else {

        $picture = $_FILES['picture']['name'];
        $picture_tmp = $_FILES['picture']['tmp_name'];
        $picture_path = "../upload/" . $picture;
        move_uploaded_file($picture_tmp, $picture_path);

        $sql = "INSERT INTO patientinfo (firstname, lastname, email, gender, dob, bg, address, password, picture) 
        VALUES ('$first_name', '$last_name', '$email', '$gender', '$date_of_birth', '$blood_group', '$address', '$Password', '$picture')";

        if (mysqli_query($conn, $sql)) {
            $sql = "INSERT INTO userinfo (FirstName, LastName, email, Password, usertype, Address, DOB, phoneno, gender, picture) 
            VALUES ('$first_name', '$last_name', '$email', '$password', 'Patient', '$address', '$date_of_birth', $phone, '$gender', '$picture')";
            if(mysqli_query($conn, $sql)){
                header("Location: ManagePatient.php");
            }
            
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insert Doctor Information</title>
</head>
<body>
    <h2 align="center">Insert Doctor Information</h2>
    <?php
        if (!empty($error)) {
            echo "<p align='center' style='color: red'>$error</p>";
        }
    ?>
    <form method="post" action="" enctype="multipart/form-data" align="center">
        <table align="center">
            <tr>
                <td align="right"><label for="first_name">First Name:</label></td>
                <td align="left"><input type="text" name="first_name" id="first_name" placeholder="First Name" size="30px"></td>
            </tr>
            <tr>
                <td align="right"><label for="last_name">Last Name:</label></td>
                <td align="left"><input type="text" name="last_name" id="last_name" placeholder="Last Name" size="30px"></td>
            </tr>
            <tr>
                <td align="right"><label for="email">Email:</label></td>
                <td align="left"><input type="email" name="email" id="email" placeholder="Email" size="30px"></td>
            </tr>
            <tr>
                <td align="right"><label for="phone">Phone:</label></td>
                <td align="left"><input type="number" name="phone" id="phone" placeholder="Phone" size="30px"></td>
            </tr>
            <tr>
                <td align="right"><label for="gender">Gender:</label></td>
                <td align="left">
                    <select name="gender" id="gender">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right"><label for="date_of_birth">Date of Birth:</label></td>
                <td align="left"><input type="date" name="date_of_birth" id="date_of_birth" placeholder="Date of Birth" size="30px"></td>
            </tr>
            <tr>
                <td align="right"><label for="blood_group">Blood Group:</label></td>
                <td align="left"><input type="text" name="blood_group" id="blood_group" placeholder="Blood Group" size="30px"></td>
            </tr>
            <tr>
                <td align="right"><label for="address">Address:</label></td>
                <td align="left"><textarea name="address" id="address" placeholder="Address" size="30px"></textarea></td>
            </tr>
            <tr>
                <td align="right"><label for="picture">Picture:</label></td>
                <td align="left"><input type="file" name="picture" id="picture"></td>
            </tr>
            <tr>
                <td align="right"><label for="password">Password:</label></td>
                <td align="left"><input type="password" name="password" id="Password"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <br>
                    <input type="submit" value="Insert">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php include 'Footer.php'; ?>
