<?php
session_start();
include '../nView/Header.php';
require_once('../Model/db.php');
$conn = dbConnection();
    


$email = $_SESSION['login_email'];

$sql = "SELECT * FROM userinfo WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (!$result) {
      die("Error: " . mysqli_error($conn));
  }

  if (mysqli_num_rows($result) == 0) {
      die("User not found.");
  }

  $row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $firstname = $_POST['fname'];
  $lastname = $_POST['lname'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];

  $sql = "UPDATE userinfo SET FirstName='$firstname', LastName='$lastname', phoneno='$phone', Address='$address' WHERE email='$email'";

  if (mysqli_query($conn, $sql)) {
    header('Location: Profile.php');
    
    $row['FirstName'] = $firstname;
    $row['LastName'] = $lastname;
  } else {
    echo "Error updating user: " . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Profile</title>
  <style>

    h1 {
      text-align: center;
      color: #333;
    }

    form {
      margin: 0 auto;
      max-width: 500px;
    }

    table {
      width: 100%;
      margin-top: 20px;
      border-collapse: collapse;
    }

    th, td {
      padding: 10px;
    }

    th {
      text-align: right;
    }

    td {
      text-align: left;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 8px;
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

    #form-field2 {
      margin-top: 20px;
    }

    input[type="submit"]:hover {
      background-color: #66ccff;
    }

  </style>
</head>
<body align='center'>
  <h1>Edit Profile</h1>
  <form method="POST" align='center'>
    <table align="center">

      <tr>
        <th align="center"><label for="fname">First Name:</label></th>
        <td align="left"><input type="text" id="fname" name="fname" value="<?php echo $row['FirstName']; ?>"></td>
      </tr>
      <tr>
        <th align="center"><label for="lname">Last Name:</label></th>
        <td align="left"><input type="text" id="lname" name="lname" value="<?php echo $row['LastName']; ?>"></td>
      </tr>
      <tr>
        <th align="center"><label for="phone">Phone no:</label></th>
        <td align="left"><input type="number" id="phone" name="phone" value="0<?php echo $row['phoneno']; ?>"></td>
      </tr>

      <tr>
        <th align="center"><label for="address">Address:</label></th>
        <td align="left"><input type="text" id="address" name="address" value="<?php echo $row['Address']; ?>"></td>
      </tr>
      <tr>
        <td> </td>
        <td  align="right"><input id="form-field2" type="submit" value="Update"></td>
      </tr>
    </table>
    
  </form>
</body>
</html>


<?php 
  include 'Footer.php';
?>
