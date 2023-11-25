<?php
    session_start();
	include 'Header.php';
    
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manage Doctor</title>
</head>
<body>
    <h2 align="center">Manage Doctor</h2>
    <table align="center" width="70%">
        <tr>
            <td align="center">
            	<a href="AddDoctor.php" style="text-decoration:none;"><img src="https://thumbs.dreamstime.com/b/doctor-icon-add-sign-new-plus-positive-symbol-vector-illustration-116307542.jpg" hight="40%" width="40%"></a>
            	<br>
            	<button><a href="AddDoctor.php" style="text-decoration:none;">Add Doctor</a></button>
            </td>
            
            <td align="center">
                <a href="EditDoctor.php" style="text-decoration:none;"><img src="https://i.pinimg.com/736x/92/4e/80/924e80768ac4f0d2560e898e4d0d7d3f--medical-icon-information-design.jpg" hight="40%" width="40%"></a>
                <br>
                <button><a href="EditDoctor.php" style="text-decoration:none;">Edit Doctor Info</a></button>
            </td>

            <td align="center">
                <a href="DeleteDoctor.php" style="text-decoration:none;"><img src="https://st2.depositphotos.com/8440746/11626/v/450/depositphotos_116261110-stock-illustration-delete-user-icon-man-account.jpg" hight="40%" width="40%"></a>
                <br>
                <button><a href="DeleteDoctor.php" style="text-decoration:none;">Delete Doctor Info</a></button>
            </td>

        </tr>

    </table>
	
<?php
require_once('../Model/db.php');

if(!empty($_SESSION['login_email'])){
    $email = $_SESSION['login_email'];
}

$conn = dbConnection();

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM doctorinfo";
$result = mysqli_query($conn, $sql);
?>

    <h1 align="center">Doctor Information</h1>
    <table align="center" width="60%" border="1" style="border-collapse: collapse;">
        <tr>
            <th align="center">Doctor Picture</th>
            <th align="center">Name</th>
            <th align="center">Degree</th>
            <th align="center">Specialist</th>
            <th align="center">Address</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $doctorid = $row['id'];
                $dfirstname = $row['firstname'];
                $dlastname = $row['lastname'];
                $doctorpic = $row['picture'];
                $degree = $row['degree'];
                $specialist = $row['specialist'];
                $address = $row['address'];
                ?>
                <tr>
                    <td align="center" width="30%">
                        <a href="DoctorProfile.php?id=<?php echo $doctorid; ?>">
                            <img src="../upload/<?php echo $doctorpic; ?>" width='50%' hight='50%'>
                        </a>
                    </td>
                    <td align="center"><?php echo $dfirstname; echo " "; echo $dlastname; ?></td>
                    <td align="center"><?php echo $degree;?></td>
                    <td align="center"><?php echo $specialist; ?></td>
                    <td align="center"><?php echo $address; ?></td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='5' align='center' style='color: red'>No records found</td></tr>";
        }
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>


<?php include 'Footer.php'; ?>