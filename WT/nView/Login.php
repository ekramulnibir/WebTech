<?php
	include 'Header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login page</title>
	<script src="script.js"> </script>
	<link rel="stylesheet" href="style.css">
</head>
<body id="loginBody">
	<form id="loginFrom" method="post" action="../nController/LoginAction.php" novalidate>
		<h2 id="h2_1">Login Page</h2>
		<table align="center">
			<tr>
				
				<td>
					<table>
						</tr>
							<td  id="errortd">
								<?php 
									if (isset($_GET['msg1'])) {
										echo $_GET['msg1'];
									}
								?>
							</td>
						<tr>
						<tr>
							<td><input type="email" id="email" name="email" placeholder="Email" size="30px"></td>
						</tr>
						<tr>
							<td><input type="password" id="password" name="password" placeholder="Password" size="30px"></td>
						</tr>
						<tr>
							<td colspan="2" id="tdCenter"><input type="submit" name="submit" value="Login" onclick="checkUser()"></td>
						</tr>
						<tr>
							<td colspan="2" id="tdCenter" style="text-align: center;">
								<button id="Linkbutton" style="background-color: #4CAF50; /* Green */
															border: none;
															color: white;
															padding: 10px 20px;
															text-align: center;
															text-decoration: none;
															display: inline-block;
															font-size: 16px;
															margin: 4px 2px;
															transition-duration: 0.4s;
															cursor: pointer;">
									<a href="ForgetPassword.php" style="text-decoration: none; color: white;">Forget password?</a>
								</button>
							</td>
						</tr>
						<tr>
							<br>
						</tr>
						<tr>
							<td colspan="2" id="tdCenter" style="text-align: center;">
								<button id="Linkbutton" style="background-color: #008CBA; /* Blue */
															border: none;
															color: white;
															padding: 10px 20px;
															text-align: center;
															text-decoration: none;
															display: inline-block;
															font-size: 16px;
															margin: 4px 2px;
															transition-duration: 0.4s;
															cursor: pointer;">
									<a href="Registration.php" style="text-decoration: none; color: white;">Create new account</a>
								</button>
							</td>
						</tr>

					</table>
				</td>
			</tr>
		</table>

		<video width="400" height="300" autoplay muted controlsList="nodownload">
			<source src="../upload/Doctor.mp4" type="video/mp4">
		</video>


		
	</form>

</body>
</html>

<?php
	include 'Footer.php';
?>