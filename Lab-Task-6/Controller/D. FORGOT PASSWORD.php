<?php include('../Model/DATABASE.php') ?>
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
        <form method="post" action="D. FORGOT PASSWORD.php">
          <span class="error"><?php include('errors.php'); ?></span>
          <fieldset>
            <legend><strong>FORGOT PASSWORD</strong></legend>

            Enter Email : <input type="text" name="email">
            <span class="error">* <?php echo $emailErr;?></span>

            <br>
            <hr>
            <input type="submit" name="forgot_pass" value="Submit">
            <input type="reset" value="Reset"> 

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
