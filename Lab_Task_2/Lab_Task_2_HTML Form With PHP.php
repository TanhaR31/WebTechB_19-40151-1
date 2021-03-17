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
$name = $email = $dob = $gender = $degSSC = $degHSC = $degBSC = $degMSC = $blg = " ";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if (empty($_POST["name"])) 
  {
    $nameErr = "Cannot be empty";
  } 
  else 
  {
    $name = test_input($_POST["name"]);

    if (!preg_match("/^[a-zA-Z]*$/",$name)) 
    {
      $nameErr = "Must start with a letter";
    }

    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) 
    {
      $nameErr = "Can contain a-z, A-Z, period, dash only";
    }
  }


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


  if (empty($_POST["dob"])) 
  {
    $dobErr = "Cannot be empty";
  } 
  else 
  {
    $dob = test_input($_POST["dob"]);

    if (!preg_match("/^((0[1-9]|[1-2][0-9]|3[0-1]-0[1-9]|1[0-2]-19[5-9][3-8]))$/",$dob)) 
    {
      $dobErr = "Must be valid numbers (dd: 1-31, mm: 1-12, yyyy: 1953-1998)";
    }
  }


  if (empty($_POST["gender"])) 
  {
    $genderErr = "At least one of them must be selected";
  } 
  else 
  {
    $gender = test_input($_POST["gender"]);
  }


  if (empty($_POST["degSSC"])) 
  {
    if (empty($_POST["degHSC"]))
    {
      $degErr = "At least two of them must be selected";
    }
  }
  else 
  {
    $degSSC = test_input($_POST["degSSC"]);
    $degHSC = test_input($_POST["degHSC"]);

    if (empty($_POST["degBSC"])) 
    {
      $degBSC = " ";
    }
    else
    {
      $degBSC = test_input($_POST["degBSC"]);
    }
    if (empty($_POST["degMSC"])) 
    {
      $degMSC = " ";
    }
    else
    {
      $degMSC = test_input($_POST["degMSC"]);
    }
  }


  if (empty($_POST["blg"])) 
  {
    $blgErr = "Must be selected";
  } 
  else 
  {
    $blg = test_input($_POST["blg"]);
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
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="other">Other
    <span class="error">* <?php echo $genderErr;?></span>
    <br><br>
  </fieldset>
  <br>
  <fieldset>
    <legend>DEGREE</legend>
    <input type="checkbox" name="degSSC" value="SSC">SSC
    <input type="checkbox" name="degHSC" value="HSC">HSC
    <input type="checkbox" name="degBSC" value="BSc">BSc
    <input type="checkbox" name="degMSC" value="MSc">MSc
    <span class="error">* <?php echo $degErr;?></span>
    <br><br>
  </fieldset> 
  <br>
  <fieldset>
    <legend>BLOOD GROUP</legend>
    <select id="blg" name="blg">
    <option value=" "></option>
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="B-">B-</option>
    <option value="O+">O+</option>
    <option value="O-">O-</option>
    <option value="AB+">AB+</option>
    <option value="AB-">AB-</option>
    <span class="error">* <?php echo $blgErr;?></span>
    <br><br>
  </fieldset>

  <br>
  <input type="submit" name="submit" value="Submit">  
</form>
<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $dob;
echo "<br>";
echo $gender;
echo "<br>";
echo $degSSC; echo " ";
echo $degHSC; echo " ";
echo $degBSC; echo " ";
echo $degMSC; 
echo "<br>";
echo $blg;
?>

</body>
</html>