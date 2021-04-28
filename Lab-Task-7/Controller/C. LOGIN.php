<?php include('../Model/DATABASE.php') ?>

<!DOCTYPE HTML>  

<html>

<head>
  <title>xCompany</title>
  <link rel = "icon" href = "https://icons.iconarchive.com/icons/mag1cwind0w/akisame/128/Leaf-icon.png">
  <link rel="stylesheet" href="../CSS/form_style.css">
  <style>
  .error {color: #FF0000;}
  </style>
</head>

<body>

<div class="wrapper">
  <img src="favicon.ico" alt="company" width="64px" height="64px" class="img" onClick="window.location.reload();">
  <p><span class="error">* required field</span></p>
  <form method="post" action="">

    <fieldset>
      <legend><h2>LOGIN</h2></legend>        
        <div id="error_message"></div>
        <span class="error"><?php include('errors.php'); ?></span>     
      <div class="input_field">
        <input type="text" placeholder="USER NAME" name="uname" id="uname" autocomplete="off">
        <span class="error">* <?php echo $unameErr;?></span>
        <br><br>
      </div>
      <div class="input_field">
        <input type="password" placeholder="PASSWORD" name="pass" id="pass">
        <span class="error">* <?php echo $passErr;?></span>
        <br><br>
      </div>
    </fieldset>
    <div class="input_field">
      <input type="checkbox" name="remember" value=""> Remember Me
    </div>
    <br>
    <div class="btn">
      <input type="submit" name="login_user" value="Submit"><br><br>
    </div>    
    <a href="B. REGISTRATION.php">Doesn't Have An Account?</a><br>
    <a href="D. FORGOT PASSWORD.php">Forgot Password?</a><br>
  </form>
</div>
</body>
</html>
