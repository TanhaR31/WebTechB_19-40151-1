<?php  
 $message = '';  
 $error = '';  
 $name = $email = $uname = $pass = $cpass =  $gender = $dob = " ";
 $nameErr = $emailErr = $unameErr = $passErr = $cpassErr =  $genderErr = $dobErr = " ";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  //Name
  
    if (empty($_POST["name"])) 
    {
      $nameErr = "<label class='text-danger'>Cannot be empty</label>";
    } 
    else 
    {
    $name = test_input($_POST["name"]);

    if (!preg_match("/^([A-Za-z0-9 .-_]).{1,}$/",$name)) 
    {
      $nameErr = "<label class='text-danger'>User Name must contain at least two (2) characters</label>";
    } 

    elseif (!preg_match("/^[A-Za-z0-9 .-_]*$/",$name)) 
    {
      $nameErr = "<label class='text-danger'>UserName can contain alpha numeric characters, period, dash or underscore only</label>";
    }
    }
  
  

  //Email
  
    if (empty($_POST["email"])) 
    {
      $emailErr = "<label class='text-danger'>Cannot be empty</label>";
    } 
    else 
    {
      $email = test_input($_POST["email"]);

      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
      {
        $emailErr = "<label class='text-danger'>Must be a valid email address: anything@example.com</label>";
      }
    }
  


  //User Name
  
    if (empty($_POST["uname"])) 
    {
      $unameErr = "<label class='text-danger'>Cannot be empty</label>";
    } 
    else 
    {
      $uname = test_input($_POST["uname"]);
    } 
  
  

  //Password
  
    if (empty($_POST["pass"])) 
    {
      $passErr = "<label class='text-danger'>Cannot be empty</label>";
    }
    else
    {
    $pass = test_input($_POST["pass"]);

    if (!preg_match("/^([A-Za-z0-9 .-_]).{7,}$/",$pass)) 
    {
      $passErr = "<label class='text-danger'>Password must not be less than eight (8) characters</label>";
    }

    elseif (!preg_match("/^(?=.*?[#?!@$%^&*-]).{1,}$/", $pass)) 
    {
      $passErr = "<label class='text-danger'>Password must contain at least one of the special characters (@, #, $, %)</label>";
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
      $cpassErr = "<label class='text-danger'>Confirm Password Not Matched</label>";
    }
    }
    else
    {}
  
  
  
  //Gender
  
    if (empty($_POST["gender"])) 
    {
    $genderErr = "<label class='text-danger'>At least one of them must be selected</label>";
    } 
    else 
    {
      $gender = test_input($_POST["gender"]);
    }
  
  

  //Date Of Birth
  
    if (empty($_POST["dob"])) 
    {
    $dobErr = "<label class='text-danger'>Cannot be empty</label>";
    } 
    else 
    {
    $dob = test_input($_POST["dob"]);

    if (!preg_match("/^((19[5-9][3-8])-0[1-9]|1[0-2]-0[1-9]|[1-2][0-9]|3[0-1])$/",$dob)) 
    {
      $dobErr = "<label class='text-danger'>Must be valid numbers (dd: 1-31, mm: 1-12, yyyy: 1953-1998)</label>";
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
<!DOCTYPE html>  
<html>  
<head>  
  <title>JSON</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
  .error {color: #FF0000;}
  </style>  
</head>  
<body>  
<br />  
<p><span class="error">* required field</span></p>
 <div class="container" style="width:500px;">                   
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
      <?php   
      if(isset($error))  
      {  
        echo $error;  
      }  
      ?>  
      <br />  
  <fieldset>
    <legend><strong>REGISTRATION</strong></legend>

    Name : <input type="text" name="name" class="form-control">
    <span class="error">* <?php echo $nameErr;?></span>
    <br /><br>

    Email : <input type="text" name="email" class="form-control">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>

    User Name : <input type="text" name="uname" class="form-control">
    <span class="error">* <?php echo $unameErr;?></span>
    <br><br>

    Passsword : <input type="password" name="pass" class="form-control">
    <span class="error">* <?php echo $passErr;?></span>
    <br><br>

    Confirm Password : <input type="password" name="cpass" class="form-control">
    <span class="error">* <?php echo $cpassErr;?></span>
    <br><br>

    Gender : <input type="radio" name="gender"  value="male">Male
    <input type="radio" name="gender"  value="female">Female   
    <input type="radio" name="gender"  value="other">Other<br>
    <span class="error">* <?php echo $genderErr;?></span>
    <br><br>

    Date of Birth : <input type="date" name="dob" class="form-control">
    <span class="error">* <?php echo $dobErr;?></span>
    <br><br>
    <hr>
    <br>
    <input type="submit" name="submit" value="Submit" class="btn btn-info" />
    <input type="reset" value="Reset" class="btn btn-info" /> 

  </fieldset>
  <br><br />                      
       <?php  
        if(isset($message))  
        {  
          echo $message;  
         }  
       ?>  
    </form>  
  </div> 
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