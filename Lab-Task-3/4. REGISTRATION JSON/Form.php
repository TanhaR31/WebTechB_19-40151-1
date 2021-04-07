<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$name = $email = $uname = $pass = $cpass =  $gender = $dob = " ";
$nameErr = $emailErr = $unameErr = $passErr = $cpassErr =  $genderErr = $dobErr = " ";

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

    if (!preg_match("/^([A-Za-z0-9 .-_]).{1,}$/",$name)) 
    {
      $nameErr = "User Name must contain at least two (2) characters";
    } 

    elseif (!preg_match("/^[A-Za-z0-9 .-_]*$/",$name)) 
    {
      $nameErr = "UserName can contain alpha numeric characters, period, dash or underscore only";
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

  //User Name
  if (empty($_POST["uname"])) 
  {
    $unameErr = "Cannot be empty";
  } 
  else 
  {
    $uname = test_input($_POST["uname"]);
  }

  //Password
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

    elseif (!preg_match("/^(?=.*?[#?!@$%^&*-]).{1,}$/", $pass)) 
    {
      $passErr = "Password must contain at least one of the special characters (@, #, $, %)";
    }   
  }

  //Confirm Password
  if(isset($_POST['submit']))
  {
    $cpass = $_POST['cpass'];

    if ($pass == $cpass) 
    {}
    else
    {
      $cpassErr = "Confirm Password Not Matched";
    }
  }
  else
  {}
  
  //Gender
  if (empty($_POST["gender"])) 
  {
    $genderErr = "At least one of them must be selected";
  } 
  else 
  {
    $gender = test_input($_POST["gender"]);
  }

  //Date Of Birth
  if (empty($_POST["dob"])) 
  {
    $dobErr = "Cannot be empty";
  } 
  else 
  {
    $dob = test_input($_POST["dob"]);

    if (!preg_match("/^((19[5-9][3-8])-0[1-9]|1[0-2]-0[1-9]|[1-2][0-9]|3[0-1])$/",$dob)) 
    {
      $dobErr = "Must be valid numbers (dd: 1-31, mm: 1-12, yyyy: 1953-1998)";
    }
  }

  //json
  if(isset($_POST["submit"]))  
  {  
      if(empty($_POST["name"]))  
      {  
           echo '<script>alert("Enter Name")</script>';

      }  
      else if(empty($_POST["email"]))  
      {  
           echo '<script>alert("Enter Email")</script>';;  
      }  
      else if(empty($_POST["uname"]))  
      {  
           echo '<script>alert("Enter User Name")</script>';  
      } 
      else if(empty($_POST["pass"]))  
      {  
           echo '<script>alert("Enter Password")</script>'; 
      } 
      else if(empty($_POST["cpass"]))  
      {  
           echo '<script>alert("Enter Confirm Password")</script>';  
      }
      else if(empty($_POST["gender"]))  
      {  
           echo '<script>alert("Enter Gender")</script>';   
      }
      else if(empty($_POST["dob"]))  
      {  
           echo '<script>alert("Enter Date of Birth")</script>';  
      }
      else  
      {  
           if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                      'name'      =>     $_POST['name'],  
                      'email'     =>     $_POST["email"],  
                      'uname'     =>     $_POST["uname"],
                      'pass'      =>     md5($_POST["pass"]),
                      'cpass'     =>     md5($_POST["cpass"]),
                      'gender'    =>     $_POST["gender"],
                      'dob'       =>     $_POST["dob"]  
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('data.json', $final_data))  
                {  
                     $message = "<label class='text-success'>File Appended Success fully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
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
    <legend><strong>REGISTRATION</strong></legend>

    Name &emsp;&emsp;&emsp;&emsp;&emsp;: <input type="text" name="name">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>

    Email &emsp;&emsp;&emsp;&emsp;&emsp;: <input type="text" name="email">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>

    User Name &emsp;&emsp;&emsp;: <input type="text" name="uname">
    <span class="error">* <?php echo $unameErr;?></span>
    <br><br>

    Passsword &emsp; &emsp;&emsp;: <input type="password" name="pass">
    <span class="error">* <?php echo $passErr;?></span>
    <br><br>

    Confirm Password : <input type="password" name="cpass">
    <span class="error">* <?php echo $cpassErr;?></span>
    <br><br>

    <fieldset>
    <legend>GENDER</legend>
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="female">Female   
    <input type="radio" name="gender" value="other">Other
    <span class="error">* <?php echo $genderErr;?></span>
    <br>
    </fieldset>
    <br>

    <fieldset>
    <legend>DATE OF BIRTH</legend>
    <input type="date" name="dob">
    <span class="error">* <?php echo $dobErr;?></span>
    <br>
    </fieldset>
    <br>
    <hr>
    <br>
    <input type="submit" name="submit" value="Submit">
    <input type="reset" value="Reset"> 

  </fieldset>
  <br>

</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name."<br>";
echo $email."<br>";
echo $uname."<br>";
echo $pass."<br>";
echo $cpass."<br>";
echo $gender."<br>";
echo $dob."<br>";
?>

</body>
</html>