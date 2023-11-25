<?php
	if($_SERVER['REQUEST_METHOD'] === "POST"){
 
        $email = $_POST['email'];
        $flag=true;

        $random_number = rand(10000, 99999);

		setcookie("number", $random_number, time() + 180);


        if(empty($email)){
        header("Location: ../View/ForgetPassword.php?msg1="."Email can not be empty");
        $flag = false;
        }
        if($flag === true){    
		require_once('../Model/db.php');
        
        $conn = dbConnection();
        
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
    
        $sql = "SELECT * FROM admininfo WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)){
        	$_SESSION['login_email'] = $email;

        	$phone = $row['phoneno'];

				  $to = "0".$phone;
			      $token = "972414094316891493834d5c8b370a35c98ff76939604962776b";

			      $message = "The OTP is: " . $random_number;

			      $url = "http://api.greenweb.com.bd/api.php?json";

			      $data = array(
			        'to' => "$to",
			        'message' => "$message",
			        'token' => "$token"
			      );
			      $ch = curl_init();
			      curl_setopt($ch, CURLOPT_URL, $url);
			      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			      curl_setopt($ch, CURLOPT_ENCODING, '');
			      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			      $smsresult = curl_exec($ch);
			      sleep(3);

			      header('Location: VerifyCode.php?email = $email');
			  	
			  	
				}
	        }
	    }else{
	    	header("Location: ../View/ForgetPassword.php?msg1="."This email is not registerd. Check your email again.");
	    }
	}
?>

