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
<table style="width: 90%;">
	<tr>
		<td colspan="2">
		<br><img src="companylogo.jpg" alt="company" width="100" height="40">
		<p style="text-align: right;">
		Logged in as <a href="F. VIEW PROFILE.php"> <?php echo $_SESSION['uname'] ?> |</a>
        <a href="J. LOGOUT.php"> Logout  </a><br><br><br>
		</p>
		</td>
	</tr>
	<tr>
		<td style="width: 5px;">
			<p style="margin-top: auto;"><strong> Account</strong></p>
			<?php
				if (isset($_COOKIE['remember'])) 
				{
					$uname = $_COOKIE['remember'];
					echo $uname;
				}
				else
				{
					echo "Cookie TimeOut";
				}
			?>
			<hr>
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
				    <?php if (isset($_SESSION['success'])) : ?>
				        <h3>
				          <?php 
				            echo $_SESSION['success']; 
				            unset($_SESSION['success']);
				          ?>
				        </h3>
				    <?php endif ?>
				<div class="container">
					<div>
						<?php 
							$uname = $_SESSION['uname'];
					        $sql = "SELECT * FROM users WHERE UserName='$uname'";
					        $result = mysqli_query($db, $sql);

					        if (mysqli_num_rows($result) > 0) 
					        {
					           while($row = mysqli_fetch_assoc($result)) 
					           {
					              echo "Name : " . $row["UserName"]. "<hr>";
					              echo "Email : " . $row["Email"]. "<hr>";
					              echo "Gender : " . $row["Gender"]. "<hr>";
					              echo "Date of Birth : " . $row["DoB"]. "<hr>";
					           }
					        } 
						?>
				        <a href="G. EDIT PROFILE.php"> Edit Profile </a>
					</div>
					<div class="image">
						<?php 
							$uname = $_SESSION['uname'];
					        $sql = "SELECT * FROM users WHERE UserName='$uname'";
					        $result = mysqli_query($db, $sql);

					        if (mysqli_num_rows($result) > 0) 
					        {
					           while($row = mysqli_fetch_assoc($result)) 
					           { 
					            echo "<img src='uploads/".$row['Image']."'height=150 width=180 >";
						       }
						    } 
						?>
												
						<!--&emsp;&emsp;&emsp;&emsp;&emsp;<img src="" alt="pp" width="100" height="100"><br><br>-->
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


