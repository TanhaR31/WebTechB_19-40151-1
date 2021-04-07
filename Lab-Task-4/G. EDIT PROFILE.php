</html>
<!DOCTYPE HTML>  
<html>
<head>
  <title>xCompany</title>
  <link rel="stylesheet" type="text/css" href="Table.css">
  <style type="text/css">
    .error
    {
      color: red;
    }
  </style>
</head>
<body>
  <table style="width: 80%">
    <tr>
      <td colspan="2">
      <br><img src="companylogo.jpg" alt="company" width="100" height="40">
      <p style="text-align: right;">
      Logged in as <a href="F. VIEW PROFILE.php"> Bob |</a>
            <a href="J. LOGOUT.php"> Logout  </a><br><br><br>
      </p>
      </td>
    </tr>
    <tr>
      <td style="width: 25px;">
        <span>Account</span><hr>
        <ul>
          <li><a href="E. LOGGED IN DASHBOARD.php"> Dashboard </a></li>
          <li><a href="F. VIEW PROFILE.php"> View Profile </a></li>
          <li><a href="G. EDIT PROFILE.php"> Edit Profile </a></li>
          <li><a href="H. CHANGE PROFILE PICTURE.php"> Change Profile Picture </a></li>
          <li><a href="I. CHANGE PASSWORD.php"> Change Password </a></li>
          <li><a href="J. LOGOUT.php"> Logout </a></li>
        </ul>
        
      </td>
      <td style="width: 20px; padding-left: 30px; padding-right: 30px; padding-top: 25px; padding-bottom: 25px;"">
<?php

$name = $email = $gender = $dob = " ";
$nameErr = $emailErr = $genderErr = $dobErr = " ";

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
    <legend><strong>EDIT PROFILE</strong></legend>

    Name &emsp;&emsp;&emsp;: <input type="text" name="name">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><hr>

    Email &emsp;&emsp;&emsp;: <input type="text" name="email">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><hr>

    Gender &emsp; &emsp; :<input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="female">Female   
    <input type="radio" name="gender" value="other">Other
    <span class="error">* <?php echo $genderErr;?></span>
    <br><hr>

    Date of Birth : <input type="date" name="dob">
    <span class="error">* <?php echo $dobErr;?></span>
    <br><hr>
    <br>
    <input type="submit" name="submit" value="Submit">
  </fieldset>
  <br>

</form>
      </td>
    </tr>
    <tr>
      <td colspan="2"; style="text-align: center;" >
        <?php require 'footer.php';?>
      </td>
    </tr>
  </table>
</body>
</html>


