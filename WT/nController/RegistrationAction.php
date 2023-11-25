<?php
session_start();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];
  $dob = $_POST['dob'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $blood_group = $_POST['blood_group'];
  // $userType = $_POST['userType'];
  $flag = true;
  $picture = "";


  if (empty($first_name)) {
    $_SESSION['first_name'] = "First Name is required.";
    $flag = false;
  } else {
    $_SESSION['first_name'] = "";
  }

  if (empty($last_name)) {
    $_SESSION['last_name'] = "Last Name is required.";
    $flag = false;
  } else {
    $_SESSION['last_name'] = "";
  }

  if (empty($gender)) {
    $_SESSION['gender'] = "Gender is required.";
    $flag = false;
  } else {
    $_SESSION['gender'] = "";
  }

  if (empty($phone)) {
    $_SESSION['phone'] = "Phone number is required.";
    $flag = false;
  } else {
    $_SESSION['phone'] = "";
  }

  if (empty($dob)) {
    $_SESSION['dob'] = "Date of birth is required.";
    $flag = false;
} else {
    $dobTimestamp = strtotime($dob);
    $year2010Timestamp = strtotime("2010-01-01");

    if ($dobTimestamp < $year2010Timestamp) {
        $_SESSION['dob'] = "";
    } else {
        $_SESSION['dob'] = "Date of birth must be before 2010.";
        $flag = false;
    }
}


  if (empty($address)) {
    $_SESSION['address'] = "Address is required.";
    $flag = false;
  } else {
    $_SESSION['address'] = "";
  }

  if (empty($email)) {
    $_SESSION['email'] = "Email cannot be empty";
    $flag = false;
} else {
    $atPos = false;
    $hasUppercase = false; 

    for ($i = 0; $i < strlen($email); $i++) {
        if ($email[$i] === '@') {
            $atPos = $i;
        }elseif (ctype_upper($email[$i])) {
            $hasUppercase = true;
        }
    }

    if ($atPos === false || $hasUppercase) {
        $_SESSION['email'] = "Invalid email format";
        $flag = false;
    }
}



if (empty($password)) {
  $_SESSION['pass'] = "Password cannot be empty";
  $flag = false;
} elseif (strlen($password) <= 5) {
  $_SESSION['pass'] = "Password must contain more than 5 characters";
  $flag = false;
} else {
  $hasUppercase = false;
  $hasLowercase = false;

  for ($i = 0; $i < strlen($password); $i++) {
      if (ctype_upper($password[$i])) {
          $hasUppercase = true;
      } elseif (ctype_lower($password[$i])) {
          $hasLowercase = true;
      }
  }

  if (!$hasUppercase || !$hasLowercase) {
      $_SESSION['pass'] = "Password must contain both uppercase and lowercase letters";
      $flag = false;
  }
}


  if ($flag === true) {
    $_SESSION['first_name'] = "";
    $_SESSION['last_name'] = "";
    $_SESSION['gender'] = "";
    $_SESSION['phone'] = "";
    $_SESSION['dob'] = "";
    $_SESSION['address'] = "";
    $_SESSION['email'] = "";
    $_SESSION['password'] = "";

    if (isset($_FILES['image'])) {
      $picture = $_FILES['image']['name'];
      $picture_tmp = $_FILES['image']['tmp_name'];
      $picture_path = "../upload/" . $picture;
      move_uploaded_file($picture_tmp, $picture_path);
    }



    require_once('../Model/db.php');
    $conn = dbConnection();

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "INSERT INTO userinfo (FirstName, LastName, gender, phoneno, DOB, Address, email, password, usertype, picture) 
        VALUES ('$first_name', '$last_name', '$gender', '$phone', '$dob', '$address', '$email', '$password', 'Patient', '$picture')";


// Execute the SQL query
if (mysqli_query($conn, $sql)) {
    $sqlPatientInfo = "INSERT INTO patientinfo (FirstName, LastName, gender, phoneno, DOB, Address, email, password, picture, bg) 
                      VALUES ('$first_name', '$last_name', '$gender', '$phone', '$dob', '$address', '$email', '$password', '$picture', '$blood_group')";

    if (mysqli_query($conn, $sqlPatientInfo)) {
        header("Location: ../nView/Login.php");
    } else {
        header('Location: ../nView/Registration.php');
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header('Location: ../nView/Registration.php');
    echo "Error: " . mysqli_error($conn);
}


mysqli_close($conn);
  }
}
?>
