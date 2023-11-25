<?php
require_once('../Model/db.php');

session_start();
include 'Header.php';

    $conn = dbConnection();

    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    
$email = $_SESSION['login_email'];

$sql = "SELECT * FROM admininfo WHERE email='$email'";
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

  $sql = "UPDATE admininfo SET FirstName='$firstname', LastName='$lastname', phoneno='$phone', Address='$address' WHERE email='$email'";

  if (mysqli_query($conn, $sql)) {
    header('Location: Profile.php');
    // echo "User updated successfully";
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
</head>
<body align='center'>
  <h1>Edit Profile</h1>
  <form method="POST" align='center'>
    <table align="center">

      <tr>
        <th align="center"><label for="fname">First Name</label></th>
        <td align="left">:<input type="text" id="fname" name="fname" value="<?php echo $row['FirstName']; ?>"></td>
      </tr>
      <tr>
        <th align="center"><label for="lname">Last Name</label></th>
        <td align="left">:<input type="text" id="lname" name="lname" value="<?php echo $row['LastName']; ?>"></td>
      </tr>
      <tr>
        <th align="center"><label for="phone">Phone no</label></th>
        <td align="left">:<input type="number" id="phone" name="phone" value="0<?php echo $row['phoneno']; ?>"></td>
      </tr>

      <tr>
        <th align="center"><label for="address">Address</label></th>
        <td align="left">:<input type="text" id="address" name="address" value="<?php echo $row['Address']; ?>"></td>
      </tr>
      <tr>
        <td> </td>
        <td align="right"><input type="submit" value="Update"></td>
      </tr>
    </table>
    
  </form>
</body>
</html>


<?php 
  include 'Footer.php';
?>
