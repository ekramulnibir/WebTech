<?php
    session_start();
    include '../nView/Header.php';
    require_once('../Model/db.php');
    $conn = dbConnection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        h2 {
		  text-align: center;
		  color: #333;
		}

		table {
		  width: 60%;
		  border-collapse: collapse;
		}

		th, td {
		  padding: 10px;
		  text-align: center;
		}

		th {
		  background-color: #f2f2f2;
		}

		td img {
		  width: 50%;
		  height: 50%;
		  max-width: 100px;
		  max-height: 100px;
		}

		button {
		  padding: 8px 16px;
		  background-color: #4CAF50;
		  color: #fff;
		  border: none;
		  border-radius: 5px;
		  cursor: pointer;
		}

		button a {
		  color: #fff;
		  text-decoration: none;
		}

		button:hover {
		  background-color: #45a049;
		}

		tr:hover {
		  background-color: #ddd;
		}

		p {
		  text-align: center;
		  color: red;
		}
        .search-container {
            text-align: center;
            margin-top: 20px;
        }

        .search-box {
            padding: 8px;
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .search-button {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <title>Show Doctor</title>
</head>
<body>

    <h2 align="center">Doctor Information</h2>

   
    <div class="search-container">
        <form method="post" action="">
            <input type="text" class="search-box" name="doctor_name" placeholder="Search by Doctor Name">
            <input type="submit" class="search-button" value="Search">
        </form>
    </div>
	<br>

    <table align="center" width="40%" border="1" style="border-collapse: collapse;">
        <tr>
            <th align="center">Doctor image</th>
            <th align="center">Doctor Name</th>
            <th align="center">Degree</th>
            <th align="center">Specialist</th>
            <th align="center">Book Appointment</th>
        </tr>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $search_name = mysqli_real_escape_string($conn, $_POST['doctor_name']);
            $sql = "SELECT * FROM doctorinfo WHERE CONCAT(firstname, ' ', lastname) LIKE '%$search_name%'";
            $result = mysqli_query($conn, $sql);
        } else {
            $sql = "SELECT * FROM doctorinfo";
            $result = mysqli_query($conn, $sql);
        }

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $did = $row['id'];
                $dfname = $row['firstname'];
                $dlname = $row['lastname'];
                $degree = $row['degree'];
                $specialist = $row['specialist'];
                $dpicture = $row['picture'];
        ?>

                <tr>
                    <td align="center" width="30%">
                        <img src="../upload/<?php echo $dpicture; ?>" width='50%' height='50%'>
                    </td>
                    <td align="center"><?php echo $dfname . " " . $dlname; ?></td>
                    <td align="center"><?php echo $degree; ?></td>
                    <td align="center"><?php echo $specialist; ?></td>
                    <td align="center"><button><a href="ConfirmAppointment.php?did=<?php echo $did; ?>" style="text-decoration:none;">Appointment</td>
                </tr>

        <?php
            }
        } else {
            echo "<p align='center' style='color: red'>No doctor available right now!</p>";
        }
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>

<?php include 'Footer.php'; ?>
