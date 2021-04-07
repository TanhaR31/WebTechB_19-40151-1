</html>
<!DOCTYPE HTML>  
<html>
<head>
  <title>xCompany</title>
  <link rel="stylesheet" type="text/css" href="Table.css">
  <style>
      .container 
      {
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .image 
      {
      	align-items: center;
      	text-align: right;
        flex-basis: 40%
      }
    </style>
</head>
<body>
	<table style="width: 80%;">
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
			<td style="width: 5px;">
				<span><strong> Account</strong></span><hr>
				<ul>
					<li><a href="E. LOGGED IN DASHBOARD.php"> Dashboard </a></li>
					<li><a href="F. VIEW PROFILE.php"> View Profile </a></li>
					<li><a href="G. EDIT PROFILE.php"> Edit Profile </a></li>
					<li><a href="H. CHANGE PROFILE PICTURE.php"> Change Profile Picture </a></li>
					<li><a href="I. CHANGE PASSWORD.php"> Change Password </a></li>
					<li><a href="J. LOGOUT.php"> Logout </a></li>
				</ul>
				
			</td>
			<td style="width: 10px; padding-left: 50px; padding-right: 50px; padding-top: 25px; padding-bottom: 25px;">
				<fieldset>
					<legend>PROFILE</legend><br>
					<div class="container">
						<div>
							Name : Bob <hr>
					        Email : bob@aiub.edu<hr>
					        Gender : Male<hr>
					        Date of Birth : 19/09/1998<hr>
					        <a href="G. EDIT PROFILE.php"> Edit Profile </a>
						</div>
						<div class="image">
							&emsp;&emsp;&emsp;&emsp;&emsp;<img src="pp logo.png" alt="logo" width="100" height="100"><br><br>
							<div>
								<a href="H. CHANGE PROFILE PICTURE.php">&emsp;Change&emsp;</a>
							</div>
						</div>
					</div>
				</fieldset>
			</td>
		</tr>
		<tr>
			<td colspan="2"; style="text-align: center;" >
				<?php require 'footer.php';?>
			</td>
		</tr>
	</table>
</body>
</html>


