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

$name = $pass = " ";
$nameErr = $passErr = " ";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  //name
  if (empty($_POST["name"])) 
  {
    $nameErr = "Cannot be empty";
  } 
  else 
  {
    $name = test_input($_POST["name"]);

    if (!preg_match("/^[A-Za-z0-9 .-_]*$/",$name)) 
    {
      $nameErr = "User Name can contain alpha numeric characters, period, dash or underscore only";
    }

    elseif (!preg_match("/^([A-Za-z0-9 .-_]).{1,}$/",$name)) 
    {
      $nameErr = "User Name must contain at least two (2) characters";
    }      
  }

  //password
  if (empty($_POST["pass"])) 
  {
  	$passErr = "Cannot be empty";
  }
  else
  {
    $pass = test_input($_POST["pass"]);
  	if (!preg_match("/^([A-Za-z0-9 .-_]).{7,}$/",$pass)) 
  	{
  		$passErr = "Password must not be less than eight (8) characters";
    }

    else if (!preg_match("/^(?=.*?[#?!@$%^&*-]).{1,}$/", $pass)) 
    {
    	$passErr = "Password must contain at least one of the special characters (@, #, $, %)";
    }   
   }

 }

function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <br><br>
  <fieldset>
    <legend><strong>LOGIN</strong></legend>
    User Name : <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error"><?php echo $nameErr;?></span>
    <br><br>
    Password&emsp;: <input type="password" name="pass">
    <span class="error"><?php echo $passErr;?></span>
  </fieldset>
  <input type="checkbox" name="remember" value="">Remember Me
  <br><br>
  <input type="submit" name="submit" value="Submit">
  <a href="D. FORGOT PASSWORD.php">Forgot Password?</a><br><br><br><br>
</form>
</body>
</html>