<!DOCTYPE html>
<html>
  <head>
    <title>Registration Form</title>
	<script src="script.js"> </script>
  </head>
  <body>
    <?php 
    	session_start();
    	include('Header.php'); 
    ?>
    
    <table align="center">
    	<tr>
    		<td>
      
    			<form method="post" action="../nController/RegistrationAction.php" novalidate align="center" enctype="multipart/form-data">
				<h2 align="center">Registration Form</h1>
      				<p id="Registration"></p>

      				<table>
        				<tr>
          					<td align="right">
            					<label for="first_name">First Name:</label>
          					</td>
          					<td align="left">
            					<input type="text" id="first_name" name="first_name">
          					</td>
        				</tr>
        				<tr>
							<td align="left" colspan="2" style="color: #ff0000;">
								<?php 
									if (isset($_SESSION['first_name'])) {
										echo $_SESSION['first_name'];
									}
								?>
							</td>
						</tr>
        				<tr>
          					<td align="right">
            					<label for="last_name">Last Name:</label>
          					</td>
          					<td align="left">
            					<input type="text" id="last_name" name="last_name">
          					</td>
        				</tr>
        				<tr>
							<td align="left" colspan="2" style="color: #ff0000;">
								<?php 
									if (isset($_SESSION['last_name'])) {
										echo $_SESSION['last_name'];
									}
								?>
							</td>
						</tr>
        				<tr>
          					<td align="right">
            					<label for="gender">Gender:</label>
          					</td>
          					<td align="left">
            					<select name="gender">
              						<option value="">Select Gender</option>
              						<option value="male">Male</option>
              						<option value="female">Female</option>
            					</select>
          					</td>
        				</tr>
        				<tr>
							<td align="left" colspan="2" style="color: #ff0000;">
								<?php 
									if (isset($_SESSION['gender'])) {
										echo $_SESSION['gender'];
									}
								?>
							</td>
						</tr>
						<tr>
							<td align="right"><label for="blood_group">Blood Group:</label></td>
							<td align="left"><input type="text" name="blood_group" id="blood_group"></td>
						</tr>
        				<tr>
          					<td align="right">
            					<label for="phone">Phone:</label>
          					</td>
          					<td align="left">
            					<input type="number" id="phone" name="phone">
          					</td>
        				</tr>
        				<tr>
							<td align="left" colspan="2" style="color: #ff0000;">
								<?php 
									if (isset($_SESSION['phone'])) {
										echo $_SESSION['phone'];
									}
								?>
							</td>
						</tr>
        				<tr>
          					<td align="right">
            					<label for="dob">Date of Birth:</label>
          					</td>
          					<td align="left">
            					<input type="date" id="dob" name="dob">
          					</td>
        				</tr>
        				<tr>
							<td align="left" colspan="2" style="color: #ff0000;">
								<?php 
									if (isset($_SESSION['dob'])) {
										echo $_SESSION['dob'];
									}
								?>
							</td>
						</tr>
        				<tr>
          					<td align="right">
            					<label for="address">Address:</label>
          					</td>
          					<td align="left">
            					<input type="text" name="address" id="address">
          					</td>
        				</tr>
        				<tr>
							<td align="left" colspan="2" style="color: #ff0000;">
								<?php 
									if (isset($_SESSION['address'])) {
										echo $_SESSION['address'];
									}
								?>
							</td>
						</tr>
        				<tr>
          					<td align="right">
            					<label for="email">Email:</label>
          					</td>
          					<td align="left">
							  <input type="text" name="email" id="email">
          					</td>
        				</tr>

						<tr>
          					<td align="center" colspan="2">
								<h5 id="emailCheck"></h5>
          					</td>
        				</tr>

        				<tr>
							<td align="left" colspan="2" style="color: #ff0000;">
								<?php 
									if (isset($_SESSION['email'])) {
										echo $_SESSION['email'];
									}
									
								?>
							</td>
						</tr>
        				<tr>
          					<td align="right">
            					<label for="password">Password:</label>
          					</td>
          					<td align="left">
            					<input type="password" id="password" name="password" onkeypress="ajax()">
          					</td>
        				</tr>
						<tr>
							<td align="right">
								<label for="image">Picture:</label>
							</td>
							<td align="left">
								<input type="file" name="image" id="image">
							</td>
						</tr>
						

						<tr>
          					<td align="center" colspan="2">
							  <h5 id="passCheck"></h5>
          					</td>
        				</tr>

        				<tr>
							<td align="left" colspan="2" style="color: #ff0000;">
								<?php 
									if (isset($_SESSION['pass'])) {
										echo $_SESSION['pass'];
										unset($_SESSION['pass']);
									}
								?>
							</td>
						</tr>
      				</table>
      
      				<input type="submit" value="submit"">
    			</form>
    		</td>
    	</tr>
    </table>
    <?php include('Footer.php'); ?>
  </body>
</html>


 