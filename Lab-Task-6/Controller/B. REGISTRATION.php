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
<table>
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
<p><span class="error">* required field</span></p>
<form method="post" action="B. REGISTRATION.php"  enctype="multipart/form-data">
  <fieldset>
    <legend><strong>REGISTRATION</strong></legend>
    <span class="error"><?php include('errors.php'); ?></span>
    Name &emsp;&emsp;&emsp;&emsp;&emsp;: <input type="text" name="name">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>

    Email &emsp;&emsp;&emsp;&emsp;&emsp;: <input type="text" name="email">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>

    User Name &emsp;&emsp;&emsp;: <input type="text" name="uname">
    <span class="error">* <?php echo $unameErr;?></span>
    <br><br>

    Passsword &emsp; &emsp;&emsp;: <input type="password" name="pass">
    <span class="error">* <?php echo $passErr;?></span>
    <br><br>

    Confirm Password : <input type="password" name="cpass">
    <span class="error">* <?php echo $cpassErr;?></span>
    <br><br>

    Profile Picture&emsp;&emsp;: <input type="file" name="image"><br>
    <span class="error">* <?php echo $imageErr;?></span>
    <br><br>

    <fieldset>
    <legend>GENDER</legend>
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male">Male
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value="Female">Female
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Other") echo "checked";?> value="Other">Other  
    <span class="error">* <?php echo $genderErr;?></span>
    <br>
    </fieldset>
    <br>

    <fieldset>
    <legend>DATE OF BIRTH</legend>
    <input type="date" name="dob">
    <span class="error">* <?php echo $dobErr;?></span>
    <br>
    </fieldset>
    <br>
    <hr>
    <br>
    <input type="submit" name="reg_user" value="Submit">
    <input type="reset" value="Reset"> <br><br>
    <?php echo $message;?>
  </fieldset>
  <br>
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
