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
  <style type="text/css">
    .error
    {
      color: red;
    }
  </style>
</head>
<body>
  <table style="width: 50%;">
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
      <td style="width: 40px;">
        <p style="margin-top: auto;"><strong> Account</strong></p><hr>
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



      <p><span class="error">* required field</span></p>
      <form method="post" action="G. EDIT PROFILE.php">

        <fieldset>
          <legend><strong>EDIT PROFILE</strong></legend>

          Name &emsp;&emsp;&emsp;: <input type="text" name="name">
          <span class="error">* <?php echo $nameErr;?></span>
          <br><hr>

          Email &emsp;&emsp;&emsp;: <input type="text" name="email">
          <span class="error">* <?php echo $emailErr;?></span>
          <br><hr>

          Gender &emsp; &emsp; :<input type="radio" name="gender" value="Male">Male
          <input type="radio" name="gender" value="Female">Female   
          <input type="radio" name="gender" value="Other">Other
          <span class="error">* <?php echo $genderErr;?></span>
          <br><hr>

          Date of Birth : <input type="date" name="dob">
          <span class="error">* <?php echo $dobErr;?></span>
          <br><hr>
          <br>
          <input type="submit" name="edit_user" value="Submit">
        </fieldset>
        <br>

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


