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
  <style type="text/css">
  .error {color: #FF0000;}
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
      <td style="width: 5px;">
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
      <td style="width: 10px; padding-left: 50px; padding-right: 50px; padding-top: 25px; padding-bottom: 25px;">

      <p><span class="error">* required field</span></p>
      <form method="post" action="G. EDIT PROFILE.php">

        <fieldset>
          <div id="error_message"></div>
          <legend><strong>EDIT PROFILE</strong></legend>
            <?php 
              $uname = $_SESSION['uname'];
                  $sql = "SELECT * FROM users WHERE UserName='$uname'";
                  $result = mysqli_query($db, $sql);

                  if (mysqli_num_rows($result) > 0) 
                  {
                     while($row = mysqli_fetch_assoc($result)) 
                     { 
            ?>
          <div class="input_field">
            <input type="text" placeholder="NAME" name="name" id="name" value="<?php echo $row["Name"]; ?>" autocomplete="off">
            <span class="error">* <?php echo $nameErr;?></span>
          </div>
          <div class="input_field">
            <input type="text" placeholder="EMAIL" name="email" id="email" value="<?php echo $row["Email"]; ?>" autocomplete="off">
            <span class="error">* <?php echo $emailErr;?></span>
          </div>      
          Gender<br><input type="radio" name="gender" value="Male" <?php echo ($row['Gender'] == "Male" ? 'checked="checked"': ''); ?> >Male
          <input type="radio" name="gender" value="Female" <?php echo ($row['Gender'] == "Female" ? 'checked="checked"': ''); ?> >Female   
          <input type="radio" name="gender" value="Other" <?php echo ($row['Gender'] == "Other" ? 'checked="checked"': ''); ?> >Other
          <br><span class="error">* <?php echo $genderErr;?></span>
          <br>
          <div class="input_field">
            <fieldset>
            <legend>DATE OF BIRTH</legend>
            <input type="date" name="dob" id="dob" value="<?php echo $row["DoB"]; ?>" autocomplete="off">
            <span class="error">* <?php echo $dobErr;?></span>
            </fieldset>
          </div>
            <?php            
                     }
                  } 
            ?>
        </fieldset>
      
          <div class="btn">
            <input type="submit" name="edit_user" value="Submit">
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