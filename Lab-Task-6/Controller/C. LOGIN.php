<?php include('../Model/DATABASE.php') ?>
<!DOCTYPE HTML>  
<html>
<head>
  <title>xCompany</title>
  <link rel="stylesheet" type="text/css" href="Table.css">
  <style>
  .error {color: #FF0000;}
  </style>
</head>
<body>
<table style="width: 50%;">
    <tr>
      <td>
      <br><img src="companylogo.jpg" alt="company" width="100" height="40">
        <p style="text-align: right;">
			      <a href="A. PUBLIC HOME.php"> Home |</a>
            <a href="C. LOGIN.php"> Login |</a>
            <a href="B. REGISTRATION.php"> Registration  </a><br><br><br>
	    </p>
      </td>
    </tr>
    <tr>
      <td style="padding-left: 100px; padding-right: 100px;">
        <form method="post" action="C. LOGIN.php">
          <br><br>
          <span class="error"><?php include('errors.php'); ?></span>  
          <fieldset>
            <legend><strong>LOGIN</strong></legend>            
            User Name : <input type="text" name="uname">
            <span class="error"><?php echo $unameErr;?></span>
            <br><br>
            Password&emsp;: <input type="password" name="pass">
            <span class="error"><?php echo $passErr;?></span>
          </fieldset>
          <input type="checkbox" name="remember" value="">Remember Me
          <br><br>
          <input type="submit" name="login_user" value="Submit">
          <a href="D. FORGOT PASSWORD.php">Forgot Password?</a><br><br><br><br>      
        </form>
      </td>
    </tr>
    <tr>
      <td style="text-align: center;">
        <?php require 'footer.php';?>
      </td>
    </tr>
  </table>
</body>
</html>
