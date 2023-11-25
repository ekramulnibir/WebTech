<?php

require_once('../Model/db.php');

session_start();
include 'Header.php';

$conn = dbConnection();

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM doctorinfo";
$result = mysqli_query($conn, $sql);
?>

    <h1 align="center">Doctor Information</h1>
    <table align="center" width="50%" border="1" style="border-collapse: collapse;">
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
                    <td align="center">
                        <button>
                            <a href="EditDoctorProfile.php?doctorid=<?php echo $doctorid;?>" style="text-decoration:none;">Edit Doctor Profile</a>
                        </button>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='5' align='center' style='color: red'>No records found</td></tr>";
        }
        mysqli_close($conn);
        ?>
    </table>

    <?php include 'Footer.php'; ?>