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
  <title>xCompany</title>
  <link rel = "icon" href = "https://icons.iconarchive.com/icons/mag1cwind0w/akisame/128/Leaf-icon.png">
  <link rel="stylesheet" type="text/css" href="Table.css">
  <link rel="stylesheet" href="../CSS/form_style.css">
  <script src="../JS/form_scripts.js"></script>
  <style type="text/css">
    .error{color: red;}
  </style>
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
      <td style="width: 20px;">
        <p style="background: #cc99ff;"><strong> Account</strong></p><hr>
        <ul>
          <li><a href="E. LOGGED IN DASHBOARD.php"> Dashboard </a></li>
          <li><a href="F. VIEW PROFILE.php"> View Profile </a></li>
          <li><a href="G. EDIT PROFILE.php"> Edit Profile </a></li>
          <li><a href="H. CHANGE PROFILE PICTURE.php"> Change Profile Picture </a></li>
          <li><a href="I. CHANGE PASSWORD.php"> Change Password </a></li>
          <li><a href="J. LOGOUT.php"> Logout </a></li>
        </ul>
      </td>
      <td style="width: 20px; padding-left: 30px; padding-right: 30px; padding-top: 25px; padding-bottom: 25px;">
        <form method="post" action="I. CHANGE PASSWORD.php">
          <div id="error_message"></div>
          <fieldset>
            <legend><strong>CHANGE PASSWORD</strong></legend>
            <div class="input_field">
              <input type="password" placeholder="CURRENT PASSWORD" name="crpass" id="pass" onkeyup="return validatePass()">
              <span class="error">* <?php echo $crpassErr;?></span>
            </div>
            <div class="input_field">
              <input type="password" placeholder="NEW PASSWORD" name="npass">
              <span class="error">* <?php echo $npassErr;?></span>
            </div>
            <div class="input_field">
              <input type="password" placeholder="RETYPE PASSWORD" name="rnpass" id="cpass" onkeyup="return validateCpass()">
              <span class="error">* <?php echo $rnpassErr;?></span>
            </div>
          </fieldset>

          <div class="btn">
            <input type="submit" name="change_pass" value="Submit">
          </div>
        </form>
      </td>
    </tr>
    <tr>
      <td colspan="2"; style="text-align: center; background: #cc99ff;" >
        <?php require 'footer.php';?>
      </td>
    </tr>
  </table>
</div>
</body>
</html>


