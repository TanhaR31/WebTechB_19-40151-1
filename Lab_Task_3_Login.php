<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<?php

$name = $pass = " ";
$nameErr = $passErr = " ";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if (empty($_POST["name"])) 
  {
    $nameErr = "Cannot be empty";
  } 
  else 
  {
    $name = test_input($_POST["name"]);

    if (!preg_match("/^[A-Za-z_-][A-Za-z0-9_-]*$/",$name)) 
    {
      $nameErr = "User Name can contain alpha numeric characters, period, dash or underscore only";
    }

    if (!preg_match("/^((?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])).{2,}$/",$name)) 
    {
      $nameErr = "User Name must contain at least two (2) characters";
    }
  }


  if (empty($_POST["pass"])) 
  {
  	$passErr = "Cannot be empty";
  }
  else
  {
  	$pass = test_input($_POST["pass"]);

  	if (!preg_match("/^((?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])).{8,}$/",$pass)) 
  	{
  		$passErr = "Password must not be less than eight (8) characters";
    }

    if (!preg_match("/^(?=.*?[#?!@$%^&*-])$/", $pass)) 
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
  <fieldset>
    <legend>User Name : </legend>
    <input type="text" name="name">
    <span> <?php echo $nameErr;?></span>
  </fieldset>
  <br>
  <fieldset>
    <legend>Password : </legend>
    <input type="text" name="pass">
    <span> <?php echo $passErr;?></span>
  </fieldset>
  <br>
  <input type="checkbox" name="" value="">Remember me
  <br><br>

  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>