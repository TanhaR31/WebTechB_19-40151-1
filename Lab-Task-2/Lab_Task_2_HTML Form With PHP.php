<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$nameErr = $emailErr = $dobErr =$genderErr = $degErr = $blgErr = " ";
$name = $email = $dob = $gender = $degSSC = $deg = $blg = " ";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  //Name
  if (empty($_POST["name"])) 
  {
    $nameErr = "Cannot be empty";
  } 
  else 
  {
    $name = test_input($_POST["name"]);

    if (preg_match("/^([0-9 #?!@$%^&*-])$/",$name)) 
    {
      $nameErr = "Must start with a letter";
    }

    elseif (!preg_match("/^([a-zA-Z-' ]*[ ][a-zA-Z-' ]*)*$/",$name)) 
    {
      $nameErr = "Contains at least two words";
    }
    elseif (!preg_match("/^([a-zA-Z-' ])*$/",$name)) 
    {
      $nameErr = "Can contain a-z, A-Z, period, dash only";
    }
  }

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

  //Date Of Birth
  if (empty($_POST["dob"])) 
  {
    $dobErr = "Cannot be empty";
  } 
  else 
  {
    $dob = test_input($_POST["dob"]);

    if (!preg_match("/^([0[1-9]|1[0-2]][-][0[1-9]|[1-2][0-9]|3[0-1]][-][19[5-9][3-8]])$/",$dob)) 
    {
      $dobErr = "Must be valid numbers (dd: 1-31, mm: 1-12, yyyy: 1953-1998)";
    }
  }

  //Gender
  if (empty($_POST["gender"])) 
  {
    $genderErr = "At least one of them must be selected";
  } 
  else 
  {
    $gender = test_input($_POST["gender"]);
  }

  //Degree
  if (isset($_POST["deg"])) 
  {
    $num = $_POST['deg'];
    if (count($num)<2) 
    {
      $degErr = "At least two of them must be selected";
    }
    else
    {
        foreach ($num as $deg) 
        {
        //echo $deg ."<br>";
        $deg = ($_POST["deg"]);
        }
    }
  }

  //Blood Group
  if (isset($_POST['blg'])) 
  {
    if ($_POST['blg'] == 'NULL') 
    {
      $blgErr = "Must be selected";
    }
    else 
    {
      $blg = test_input($_POST['blg']);
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
    <legend>NAME</legend>
    <input type="text" name="name">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
  </fieldset>
  <br>
  <fieldset>
    <legend>EMAIL</legend>
    <input type="text" name="email">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
  </fieldset>
  <br>
  <fieldset>
    <legend>DATE OF BIRTH</legend>
    <input type="date" name="dob">
    <span class="error">* <?php echo $dobErr;?></span>
    <br><br>
  </fieldset>
  <br>
  <fieldset>
    <legend>GENDER</legend>
    Gender:
    <input type="radio" name="gender"
    <?php if (isset($gender) && $gender=="male") echo "checked";?>
    value="male">Male
    <input type="radio" name="gender"
    <?php if (isset($gender) && $gender=="female") echo "checked";?>
    value="female">Female
    <input type="radio" name="gender"
    <?php if (isset($gender) && $gender=="other") echo "checked";?>
    value="other">Other
    <span class="error">* <?php echo $genderErr;?></span>
  </fieldset>
  <br>
  <fieldset>
    <legend>DEGREE</legend>
    <input type="checkbox" name="deg[]" value="SSC">SSC
    <input type="checkbox" name="deg[]" value="HSC">HSC
    <input type="checkbox" name="deg[]" value="BSc">BSc
    <input type="checkbox" name="deg[]" value="MSc">MSc
    <span class="error">* <?php echo $degErr;?></span>
    <br><br>
  </fieldset> 
  <br>
  <fieldset>
    <legend>BLOOD GROUP</legend>
    <select name="blg">
    <option value="NULL"></option>
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="B-">B-</option>
    <option value="O+">O+</option>
    <option value="O-">O-</option>
    <option value="AB+">AB+</option>
    <option value="AB-">AB-</option>
    </select>
    <span class="error">* <?php echo $blgErr;?></span>
    <br><br>
  </fieldset>
  <p><input type="submit" name="submit" value="Submit"></p>   
</form>
<?php
echo "<h2>Your Input:</h2>";
echo $name."<br>";
echo $email."<br>";
echo $dob."<br>";
echo $gender."<br>"; 
//echo $deg ."<br>";
echo $blg."<br>";
?>

</body>
</html>