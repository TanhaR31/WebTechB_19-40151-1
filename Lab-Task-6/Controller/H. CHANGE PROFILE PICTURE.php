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
  .error {color: #FF0000;}
  </style>
</head>
<body>
  <table style="width: 70%;">
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
      <td style="width: 20px;">
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
      <td style="width: 20px; padding-left: 30px; padding-right: 30px; padding-top: 25px; padding-bottom: 25px;">

        <form action="H. CHANGE PROFILE PICTURE.php" method="post" enctype="multipart/form-data">
        <fieldset>
          <legend><strong>PROFILE PICTURE</strong></legend>
          <img src="pp logo.png" width="100" height="100"><br>
          <input type="file" name="image">
          <p class="error">* <?php echo $imageErr;?></p>
          <hr>
          <input type="submit" name="change_pp" value="Submit">
        </fieldset>
      </form>

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


