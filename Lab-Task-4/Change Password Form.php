<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
  <style type="text/css">
    .error{color: red;}
  </style>
</head>
<body>
<?php

$cpass = "abcdefgh@";
$npass = $rnpass = $cpassErr = $npassErr = $rnpassErr = "";
$error = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $npass = $_POST['npass'];
  $rnpass = $_POST['rnpass'];
  // Current Password
  if (empty($cpass)) 
  {
    $cpassErr = "Cannot be empty";
    $error = 0;
  }
  else
  {
    if (!preg_match("/^([A-Za-z0-9 .-_]).{7,}$/",$cpass)) 
    {
      $cpassErr = "Password must not be less than eight (8) characters";
      $error = 0;
    }

    elseif (!preg_match("/^(?=.*?[#?!@$%^&*-]).{1,}$/", $cpass)) 
    {
      $cpassErr = "Password must contain at least one of the special characters (@, #, $, %)";
      $error = 0;
    }   
  }

  // New Password
  if (empty($npass)) 
  {
    $npassErr = "Cannot be empty";
    $error = 0;
  }
  else
  {
    if (!preg_match("/^([A-Za-z0-9 .-_]).{7,}$/",$npass)) 
    {
      $npassErr = "Password must not be less than eight (8) characters";
      $error = 0;
    }

    elseif (!preg_match("/^(?=.*?[#?!@$%^&*-]).{1,}$/", $npass)) 
    {
      $npassErr = "Password must contain at least one of the special characters (@, #, $, %)";
      $error = 0;
    }   
  }

  // Retype New Password
  if (empty($rnpass)) 
  {
    $rnpassErr = "Cannot be empty";
    $error = 0;
  }
  else
  {
    if (!preg_match("/^([A-Za-z0-9 .-_]).{7,}$/",$rnpass)) 
    {
      $rnpassErr = "Password must not be less than eight (8) characters";
      $error = 0;
    }

    elseif (!preg_match("/^(?=.*?[#?!@$%^&*-]).{1,}$/", $rnpass)) 
    {
      $rnpassErr = "Password must contain at least one of the special characters (@, #, $, %)";
      $error = 0;
    }   
  }

  if ($cpass != $_POST['cpass']) 
  {
    $cpassErr = "Current Password Not Matched";
    $error = 0;
  }
  else
  {
    if ($npass == $cpass) 
    {
      $npassErr = "New Password should not be same as the Current Password";
      $error = 0;
    }
    elseif ($npass != $rnpass) 
    {
      $npassErr = "Confirm Password Not Matched";
      $error = 0;
    }
  }

  if ($error == 1) 
  {
    $rnpassErr = "Password Changed";
  }
}

?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <fieldset>
    <legend><strong>CHANGE PASSWORD</strong></legend>
    Current Password :&emsp;&emsp;<input type="password" name="cpass">
    <span class="error"><?php echo $cpassErr;?></span>
    <br><br>
    <span style="color: green;">New Password : &emsp;&emsp;&emsp;</span><input type="password" name="npass">
    <span class="error"><?php echo $npassErr;?></span>
    <br><br>
    <span class="error">Retype New Password : </span><input type="password" name="rnpass">
    <span class="error"><?php echo $rnpassErr;?></span>
  </fieldset>
  <br><br>
  <input type="submit" name="submit" value="Submit"> 
</form>
</body>
</html>
