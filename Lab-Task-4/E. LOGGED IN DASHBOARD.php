</html>
<!DOCTYPE HTML>  
<html>
<head>
  <title>xCompany</title>
  <link rel="stylesheet" type="text/css" href="Table.css">
</head>
<body>
	<table style="width: 50%;">
		<tr>
			<td colspan="2">
			<br><img src="companylogo.jpg" alt="company" width="100" height="40">
			<p style="text-align: right;">
			Logged in as <a href="F. VIEW PROFILE.php"> Bob |</a>
            <a href="J. LOGOUT.php"> Logout  </a><br><br><br>
			</p>
			</td>
		</tr>
		<tr>
			<td style="width: 25px;">
				<span>Account</span><hr>
				<ul>
					<li><a href="E. LOGGED IN DASHBOARD.php"> Dashboard </a></li>
					<li><a href="F. VIEW PROFILE.php"> View Profile </a></li>
					<li><a href="G. EDIT PROFILE.php"> Edit Profile </a></li>
					<li><a href="H. CHANGE PROFILE PICTURE.php"> Change Profile Picture </a></li>
					<li><a href="I. CHANGE PASSWORD.php"> Change Password </a></li>
					<li><a href="J. LOGOUT.php"> Logout </a></li>
				</ul>
				
			</td>
			<td style="width: 100px;"><STRONG> Welcome Bob</STRONG></td>
		</tr>
		<tr>
			<td colspan="2"; style="text-align: center;" >
				<?php require 'footer.php';?>
			</td>
		</tr>
	</table>
</body>
</html>


