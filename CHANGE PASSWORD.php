<!DOCTYPE HTML>  
<html>
<head>
  <title>Change Password</title>
  <h1 ><img src="companylogo.jpg" alt="company" width="100" height="50"></h1>
</head>
<body>
<table align="center">
	<tr>
    <td> Logged in as<a href="VIEW PROFILE.php"> Bob |</a></td>
    <td><a href="LOGOUT.php"> Logout </a></td>
    </tr>
</table>

<h2>CHANGE PASSWORD</h2>

<div><?php if(isset($message)) { echo $message; } ?></div>
<form method="post" action="">
Current Password:<br>
<input type="password" name="currentPassword"><span id="currentPassword" class="required"></span>
<br>
New Password:<br>
<input type="password" name="newPassword"><span id="newPassword" class="required"></span>
<br>
Retype New Password:<br>
<input type="password" name="confirmPassword"><span id="confirmPassword" class="required"></span>
<br><br>
<input type="submit">
</form>




<br><br>

<p><a href="LOGGED IN DASHBOARD.php"> Dashboard </a></p>
<p><a href="VIEW PROFILE.php"> View Profile </a></p>
<p><a href="EDIT PROFILE.php"> Edit Profile </a></p>
<p><a href="CHANGE PROFILE PICTURE.php"> Change Profile Picture </a></p>
<p><a href="CHANGE PASSWORD.php"> Change Password </a></p>
<p><a href="LOGOUT.php"> Logout </a></p>
<?php include 'footer.php';?>
</body>
</html>