<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$email = " ";
$emailErr = " ";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  //Email
  if (empty($_POST["email"])) 
  {
    $emailErr = "Cannot be empty";
  } 
  else 
  {
    $email = test_input($_POST["email"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      $emailErr = "Must be a valid email address: anything@example.com";
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


<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

  <fieldset>
    <legend><strong>FORGOT PASSWORD</strong></legend>

    Enter Email : <input type="text" name="email">
    <span class="error">* <?php echo $emailErr;?></span>

    <br>
    <hr>
    <input type="submit" name="submit" value="Submit">
    <input type="reset" value="Reset"> 

  </fieldset>
  <br>

</form>

</body>
</html>