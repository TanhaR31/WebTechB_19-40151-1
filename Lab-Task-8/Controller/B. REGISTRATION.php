<?php include('../Model/DATABASE.php') ?>
<!DOCTYPE HTML> 

<html>

<head>
  <meta charset="UTF-8">
  <title>xCompany</title>
  <link rel = "icon" href = "https://icons.iconarchive.com/icons/mag1cwind0w/akisame/128/Leaf-icon.png">
  <link rel="stylesheet" href="../CSS/form_style.css">
  <script src="../JS/form_scripts.js"></script> 
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
      <input type="text" placeholder="NAME" name="name" id="name" onkeyup="return validateName()" autocomplete="off">
      <span class="error">* <?php echo $nameErr;?></span>
    </div>

    <div class="input_field">
      <input type="text" placeholder="EMAIL" name="email" id="email" onkeyup="return validateEmail()" onchange="EMAIL(this.value)" autocomplete="off">      
      <span class="error">* <?php echo $emailErr;?></span>
      <span id="checkEmail"></span>
    </div>

    <div class="input_field">
      <input type="text" placeholder="USER NAME" name="uname" id="uname" onkeyup="return validateUname()" onchange="UNAME(this.value)" autocomplete="off">
      <span class="error">* <?php echo $unameErr;?></span>
      <span id="checkUname"></span>
    </div>

    <div class="input_field">
      <input type="password" placeholder="PASSWORD" name="pass" id="pass" onkeyup="return validatePass()">
      <span class="error">* <?php echo $passErr;?></span>
    </div>
                
    <div class="input_field">
      <input type="password" placeholder="CONFIRM PASSWORD" name="cpass" id="cpass" onkeyup="return validateCpass()">
      <span class="error">* <?php echo $cpassErr;?></span>
    </div>

    <div class="input_field">
      <input type="file" placeholder="PROFILE PICTURE" name="image" id="image" onblur="return validateImage()"><br>
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
      <input type="date" name="dob" id="dob" onblur="return validateDob()" autocomplete="off">
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

<script>
  function EMAIL(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("checkEmail").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("checkEmail").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "testEmail.php?q="+str, true);
  xhttp.send();
}

  function UNAME(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("checkUname").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("checkUname").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "testUname.php?p="+str, true);
  xhttp.send();
}
</script>