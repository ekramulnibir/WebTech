<?php

$json = $_REQUEST['json'];
$user = json_decode($json);


$host = '127.0.0.1';
$dbuser = 'root';
$dbpass = '';
$dbname = 'hms';

$con = mysqli_connect($host, $dbuser, $dbpass, $dbname);

$sql = "SELECT * FROM admininfo WHERE email = '$user->username'";
$result = mysqli_query($con, $sql);


if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $registeredUsername = $row['LastName'];
    echo "Email already registered by Admin $registeredUsername";
}
?>

