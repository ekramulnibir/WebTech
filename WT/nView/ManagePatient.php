<?php
    session_start();
	include 'Header.php';
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Patient</title>
</head>
<body>
    <h2 align="center">Manage Patient</h2>
    <table align="center" width="70%">
        <tr>
            <td align="center">
                <a href="AddPatient.php" style="text-decoration:none;"><img src="https://images.template.net/83797/free-patient-vector-xjh4h.jpg" hight="40%" width="40%"></a>
                <br>
                <button><a href="AddPatient.php" style="text-decoration:none;">Add Patient</a></button>
                <br><br>
            </td>
            
            <td align="center">
                <a href="EditPatient.php" style="text-decoration:none;"><img src="https://static4.depositphotos.com/1030387/398/v/950/depositphotos_3989422-stock-illustration-patient-care.jpg" hight="35%" width="35%"></a>
                <br>
                <button><a href="EditPatient.php" style="text-decoration:none;">Edit Patient Info</a></button>
                <br><br>
            </td>

            <td align="center">
                <br>
                <a href="DeletePatient.php" style="text-decoration:none;"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTD2EOs2zv_sRatO5dzBql7xdJdTvwWkJzVJg&usqp=CAU" hight="90%" width="90%"></a>
                <br>
                <button><a href="DeletePatient.php" style="text-decoration:none;">Delete Patient Info</a></button>
                <br>

            </td>

        </tr>

    </table>
	
	<?php
    require_once('../Model/db.php');

    $conn = dbConnection();

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM patientinfo";
    $result = mysqli_query($conn, $sql);
    ?>

    <h3 align="center">Patient Information</h3>

    <table align="center" width="60%" border="1" style="border-collapse: collapse;">
        <tr>
            <th>Patient Image</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Email</th>
            <th>Blood group</th>
            <th>Date of birth</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $patientid = $row['pid'];
                $pfirstname = $row['firstname'];
                $plastname = $row['lastname'];
                $pemail = $row['email'];
                $pgender = $row['gender'];
                $pbloodgroup = $row['bg'];
                $pdob = $row['dob'];
                $paddress = $row['address'];
                $patientpic = $row['picture'];
                ?>
                <tr>
                    <td align="center" width="30%">
                        <a href="PatientProfile.php?patientid=<?php echo $patientid; ?>">
                            <img src="../upload/<?php echo $patientpic; ?>" width='50%' hight='50%'>
                        </a>
                    </td>
                    <td align="center"><?php echo $pfirstname; echo " "; echo $plastname;  ?></td>
                    <td align="center"><?php echo $pgender; ?></td>
                    <td align="center"><?php echo $paddress; ?></td>
                    <td align="center"><?php echo $pemail; ?></td>
                    <td align="center"><?php echo $pbloodgroup; ?></td>
                    <td align="center"><?php echo $pdob; ?></td>
                    
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='6' align='center' style='color:red'>No records found</td></tr>";
        }
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>


</body>
</html>

<?php
    include 'Footer.php';
?>

<!-- <td align="center"><button><a href="../Controller/DeletePatient.php?id=<?php echo $patientid;?>" style="text-decoration:none;">Delete Patient</a></button></td> -->