<!DOCTYPE HTML>  
<html>
<head>
  <title>xCompany</title>
  <h1 ><img src="companylogo.jpg" alt="company" width="100" height="50"></h1>
</head>
<body> 
	<table align="center">
	<tr>
    <td> Logged in <a href="VIEW PROFILE.php"> bob |</a></td>
    <td><a href="LOGOUT.php"> Logout </a></td>
    </tr>
</table>

<p>Account</p>
<?php
echo "Welcome Bob";
?>
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
