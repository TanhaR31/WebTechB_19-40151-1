<?php include('../Model/DATABASE.php') ?>
<!DOCTYPE HTML> 

<html>

<head>
  <meta charset="UTF-8">
  <title>xCompany</title>
  <link rel = "icon" href = "https://icons.iconarchive.com/icons/mag1cwind0w/akisame/128/Leaf-icon.png">
  <link rel="stylesheet" href="../CSS/form_style.css">
  <style>
  .error {color: #FF0000; text-align: center;}
  </style>
</head>

<body>

<div class="wrapper">
  <img src="favicon.ico" alt="company" width="64px" height="64px" class="img" onClick="window.location.reload();">
<p><span class="error">* required field</span></p>
<form method="post" action="" enctype="multipart/form-data">

  <fieldset>
    <legend><h2>REGISTRATION</h2></legend>
    <div id="error_message"></div>
    <span class="error"><?php include('errors.php'); ?></span>

    <div class="input_field">
      <input type="text" placeholder="NAME" name="name" id="name" autocomplete="off">
      <span class="error">* <?php echo $nameErr;?></span>
    </div>

    <div class="input_field">
      <input type="text" placeholder="EMAIL" name="email" id="email" autocomplete="off">      
      <span class="error">* <?php echo $emailErr;?></span>
    </div>

    <div class="input_field">
      <input type="text" placeholder="USER NAME" name="uname" id="uname" autocomplete="off">
      <span class="error">* <?php echo $unameErr;?></span>
    </div>

    <div class="input_field">
      <input type="password" placeholder="PASSWORD" name="pass" id="pass">
      <span class="error">* <?php echo $passErr;?></span>
    </div>
                
    <div class="input_field">
      <input type="password" placeholder="CONFIRM PASSWORD" name="cpass" id="cpass">
      <span class="error">* <?php echo $cpassErr;?></span>
    </div>

    <div class="input_field">
      <input type="file" placeholder="PROFILE PICTURE" name="image" id="image"><br>
      <span class="error">* <?php echo $imageErr;?></span>
    </div>

    <div>
      <fieldset>
      <legend>GENDER</legend>
      <input type="radio" name="gender" value="Male"> Male
      <input type="radio" name="gender" value="Female"> Female   
      <input type="radio" name="gender" value="Other"> Other
      <br><span class="error">* <?php echo $genderErr;?></span>
      </fieldset>
      <br>
    </div>

    <div class="input_field">
      <fieldset>
      <legend>DATE OF BIRTH</legend>
      <input type="date" name="dob" id="dob" autocomplete="off">
      <span class="error">* <?php echo $dobErr;?></span>
      </fieldset>
    </div>

  </fieldset>

  <div class="btn">
    <input type="submit" name="reg_user" value="Submit">
    <input type="reset" value="Reset"> <br><br>
    <?php echo $message;?>
  </div> 
  <a href="C. LOGIN.php">Already Have An Account?</a>
</form>
</div>        

</body>

</html>