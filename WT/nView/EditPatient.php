<?php
require_once('../Model/db.php');
session_start();
include 'Header.php';

$conn = dbConnection();

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM patientinfo";
$result = mysqli_query($conn, $sql);
?>

    <h1 align="center">Patient Information</h1>
    <table align="center" width="50%" border="1" style="border-collapse: collapse;">
        <tr>
            <th align="center">Patient Picture</th>
            <th align="center">Name</th>
            <th align="center">Address</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $patientid = $row['pid'];
                $dfirstname = $row['firstname'];
                $dlastname = $row['lastname'];
                $patientpic = $row['picture'];
                $address = $row['address'];
                ?>
                <tr>
                    <td align="center" width="30%">
                        <a href="patientProfile.php?id=<?php echo $patientid; ?>">
                            <img src="../upload/<?php echo $patientpic; ?>" width='50%' hight='50%'>
                        </a>
                    </td>
                    <td align="center"><?php echo $dfirstname; echo " "; echo $dlastname; ?></td>
                    <td align="center"><?php echo $address; ?></td>
                    <td align="center">
                        <button style="background-color: lightgreen;">
                            <a href="EditPatientProfile.php?patientid=<?php echo $patientid;?>" style="text-decoration:none;">Edit patient Profile</a>
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