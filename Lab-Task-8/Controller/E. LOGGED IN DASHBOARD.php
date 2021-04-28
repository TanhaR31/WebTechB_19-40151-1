<?php include('../Model/DATABASE.php') ?>
<?php
	//session_start(); 

	if (!isset($_SESSION['uname'])) 
	{
		$_SESSION['msg'] = "You must log in first";
		echo $_SESSION['msg'];
		header('location:C. LOGIN.php');
	}
?>
<!DOCTYPE HTML>  
<html>
<head>
  <meta charset="UTF-8">
  <title>xCompany</title>
  <!--<link rel = "icon" href = "favicon.ico" type="image/x-icon">-->
  <link rel = "icon" href = "https://icons.iconarchive.com/icons/mag1cwind0w/akisame/128/Leaf-icon.png">
  <link rel="stylesheet" type="text/css" href="Table.css">
  <link rel="stylesheet" href="../CSS/form_style.css">
</head>
<body>
	<div class="wrapper">
	<table style="width: 90%;">
		<tr>
			<td colspan="2">
			<br><img src="favicon.ico" alt="company" width="64px" height="64px" class="img" onClick="window.location.reload();">
			<p style="text-align: right;">
			Logged in as <a href="F. VIEW PROFILE.php"> <?php echo $_SESSION['uname'] ?> |</a>
            <a href="J. LOGOUT.php"> Logout  </a><br><br><br>
			</p>
			</td>
		</tr>
		<tr>
			<td style="width: 25px;">
				<p style="margin-top: auto; background: #cc99ff;"><strong> Account</strong></p><hr>
				<ul>
					<li><a href="E. LOGGED IN DASHBOARD.php"> Dashboard </a></li>
					<li><a href="F. VIEW PROFILE.php"> View Profile </a></li>
					<li><a href="G. EDIT PROFILE.php"> Edit Profile </a></li>
					<li><a href="H. CHANGE PROFILE PICTURE.php"> Change Profile Picture </a></li>
					<li><a href="I. CHANGE PASSWORD.php"> Change Password </a></li>
					<li><a href="J. LOGOUT.php"> Logout </a></li>
				</ul>
				
			</td>
			<td style="width: 100px;"><STRONG> Welcome <?php echo $_SESSION['uname'] ?>
		<tr>
			<td colspan="2"; style="text-align: center; background: #cc99ff;" >
				<?php require 'footer.php';?>
			</td>
		</tr>
	</table>
</div>
</body>
</html>


