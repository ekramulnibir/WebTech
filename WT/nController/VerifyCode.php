<?php

	include '../View/Header.php';

	$random_number = "";

	if (isset($_COOKIE['number'])) {

	    $random_number = $_COOKIE['number'];

	} else {

	    echo "<p style='color: red' align='center'><b>Time out.</b></p>";

	}

	if($_SERVER['REQUEST_METHOD'] === "POST"){
 
        $verificationcode = $_POST['verificationcode'];
        $flag=true;
    
    
        if(empty($verificationcode)){
        	echo "Please enter OTP";
        $flag = false;
        }else{
        	if($random_number === $verificationcode){
        		header('Location: ../View/UpdatePassword.php');
        	}else{
        		echo "<p style='color: red' align='center'><b>Please enter correct OTP within 3 minutes.</b></p>";
        	}
        }
    }
    
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Enter Verification Code</title>
</head>
<body>

	
	<h2 align="center">Enter Verification Code</h2>
	<p align="center" style="color: red">
		<?php 
			if (isset($_GET['msg1'])) {
				echo $_GET['msg1'];
			}
		?>
	</p>

	<form method="post" novalidate align="center"> 
		<input type="number" name="verificationcode" placeholder="Enter OTP" size="30px"><br><br>
		<input type="submit" value="Submit">
		
	</form>

	<?php include '../View/Footer.php';?>


</body>
</html>