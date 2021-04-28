<?php
session_start();

// initializing variables
$message = "";
$name = $email = $uname = $pass = $cpass = $image =  $gender = $dob = "";
$nameErr = $emailErr = $unameErr = $passErr = $cpassErr = $imageErr =  $genderErr = $dobErr = "";
$crpass = $npass = $rnpass = $matchpass = "";
$crpassErr = $npassErr = $rnpassErr = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'Lab6');
// Check connection
if (!$db) 
{
  echo "<br>Database Not Found<br><br>";
  die("Connection failed: " . mysqli_connect_error());
}

// REGISTER USER
if (isset($_POST['reg_user'])) 
{
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = strtoupper(mysqli_real_escape_string($db, $_POST['email']));
  $uname = strtoupper(mysqli_real_escape_string($db, $_POST['uname']));
  $pass = mysqli_real_escape_string($db, $_POST['pass']);
  $cpass = mysqli_real_escape_string($db, $_POST['cpass']);
  $gender = isset($_POST['gender']) ? mysqli_real_escape_string($db, $_POST['gender']) : false;
  $dob = mysqli_real_escape_string($db, $_POST['dob']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array

  //Name
  if (empty($name)) 
  {
    $nameErr = "Cannot be empty";
    array_push($errors, "");
  } 
  else 
  {
    if (!preg_match("/^([A-Za-z0-9 .-_]).{1,}$/",$name)) 
    {
      $nameErr = "User Name must contain at least two (2) characters";
      array_push($errors, "");
    } 

    elseif (!preg_match("/^[A-Za-z0-9 .-_]*$/",$name)) 
    {
      $nameErr = "UserName can contain alpha numeric characters, period, dash or underscore only";
      array_push($errors, "");
    }
  }

  //Email
  if (empty($email)) 
  {
    $emailErr = "Cannot be empty";
    array_push($errors, "");
  } 
  else 
  {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      $emailErr = "Must be a valid email address: anything@example.com";
      array_push($errors, "");
    }
  }

  //User Name
  if (empty($uname)) 
  {
    $unameErr = "Cannot be empty";
    array_push($errors, "");
  } 

  //Password
  if (empty($pass)) 
  {
    $passErr = "Cannot be empty";
    array_push($errors, "");
  }
  else
  {
    if (!preg_match("/^([A-Za-z0-9 .-_]).{7,}$/",$pass)) 
    {
      $passErr = "Password must not be less than eight (8) characters";
      array_push($errors, "");
    }

    elseif (!preg_match("/^(?=.*?[#?!@$%^&*-]).{1,}$/", $pass)) 
    {
      $passErr = "Password must contain at least one of the special characters (@, #, $, %)";
      array_push($errors, "");
    }   
  }

  //Confirm Password
  if ($pass != $cpass) 
  {
    $cpassErr = "Confirm Password Not Matched";
    array_push($errors, "");
  }

  //Image
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
  {
    $imageErr = "Picture format must be in jpeg or jpg or png"; echo "<br>";
    array_push($errors, "");
    $uploadOk = 0;
  }

  if ($_FILES["image"]["size"] > 5000000) 
  {
    $imageErr = "Picture size should not be more than 5MB"; echo "<br>";
    array_push($errors, "");
    $uploadOk = 0;
  }

  if ($uploadOk == 0) 
  {
    $imageErr = "Sorry, your picture was not uploaded. Choose a different picture"; echo "<br>";
    array_push($errors, "");
  } 
  else 
  {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
    {
      $imageErr = "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
      $image = $_FILES['image']['name'];
    } 
    else 
    {
      $imageErr = "Sorry, there was an error uploading your file."; echo "<br>";
      array_push($errors, "");
    }
  }
  
  //Gender
  if (empty($gender)) 
  {
    $genderErr = "At least one of them must be selected";
    array_push($errors, "");
  } 

  //Date Of Birth
  if (empty($dob)) 
  {
    $dobErr = "Cannot be empty";
    array_push($errors, "");
  } 
  /*else 
  {
    if (!preg_match("/^((19[5-9][3-8])-0[1-9]|1[0-2]-0[1-9]|[1-2][0-9]|3[0-1])$/",$dob)) 
    {
      $dobErr = "Must be valid numbers (dd: 1-31, mm: 1-12, yyyy: 1953-1998)";
    }
  }*/


  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE UserName='$uname' OR Email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) // if user exists
  { 
    if ($user['UserName'] === $uname) 
    {
      array_push($errors, "Username already exists");
    }

    if ($user['Email'] === $email) 
    {
      array_push($errors, "Email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
  {
    //encrypt the password before saving in the database
  	$pass = md5($pass);

  	$query = "INSERT INTO users (Name, Email, UserName, Password, Image, Gender, DoB) 
  			  VALUES('$name', '$email', '$uname', '$pass', '$image', '$gender', '$dob')";
  	mysqli_query($db, $query);
  	$_SESSION['uname'] = $uname;
  	header('location:C. LOGIN.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) 
{
  $uname = strtoupper(mysqli_real_escape_string($db, $_POST['uname']));
  $pass = mysqli_real_escape_string($db, $_POST['pass']);

  if (empty($uname)) 
  {
    $unameErr = "Username Cannot be empty";
    array_push($errors, "");
  }
  if (empty($pass)) 
  {
    $passErr = "Password Cannot be empty";
    array_push($errors, "");
  }

  if (count($errors) == 0) 
  {
    $pass = md5($pass);
    $query = "SELECT * FROM users WHERE UserName='$uname' AND Password='$pass'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) 
    {
      $_SESSION['uname'] = $uname;
      $_SESSION['success'] = "You are now logged in";
      header('location:E. LOGGED IN DASHBOARD.php');
      if( isset($_POST['remember']) )
      {
         // Set cookie variables
         setcookie ("remember",$uname,time()+60);
      }
    }
    else 
    {
      array_push($errors, "User Not Found. WHO ARE YOU? :)");
    }
  }
}

// EDIT USER
if (isset($_POST['edit_user']))
{
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = strtoupper(mysqli_real_escape_string($db, $_POST['email']));
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $dob = mysqli_real_escape_string($db, $_POST['dob']);


    //Name
    if (empty($name)) 
    {
      $nameErr = "Cannot be empty";
      array_push($errors, "");
    } 
    else 
    {
      if (!preg_match("/^([A-Za-z0-9 .-_]).{1,}$/",$name)) 
      {
        $nameErr = "User Name must contain at least two (2) characters";
        array_push($errors, "");
      } 

      elseif (!preg_match("/^[A-Za-z0-9 .-_]*$/",$name)) 
      {
        $nameErr = "UserName can contain alpha numeric characters, period, dash or underscore only";
        array_push($errors, "");
      }
    }

    //Email
    if (empty($email)) 
    {
      $emailErr = "Cannot be empty";
      array_push($errors, "");
    } 
    else 
    {
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
      {
        $emailErr = "Must be a valid email address: anything@example.com";
        array_push($errors, "");
      }
    }
    
    //Gender
    if (empty($gender)) 
    {
      $genderErr = "At least one of them must be selected";
      array_push($errors, "");
    } 

    //Date Of Birth
    if (empty($dob)) 
    {
      $dobErr = "Cannot be empty";
      array_push($errors, "");
    } 
    /*else 
    {
      if (!preg_match("/^((19[5-9][3-8])-0[1-9]|1[0-2]-0[1-9]|[1-2][0-9]|3[0-1])$/",$dob)) 
      {
        $dobErr = "Must be valid numbers (dd: 1-31, mm: 1-12, yyyy: 1953-1998)";
      }
    }*/

  if (count($errors) == 0) 
  {
    $uname = $_SESSION['uname'];
    $query = "UPDATE users SET Name='$name', Email='$email', Gender='$gender', DoB='$dob' WHERE UserName = '$uname'";
    if (mysqli_query($db, $query)) 
    {
      echo "Record updated successfully";
    } 
    else 
    {
      echo "Error updating record: " . mysqli_error($db);
    }
    $_SESSION['uname'] = $uname;
    header('location:E. LOGGED IN DASHBOARD.php');
  }
}

// CHANGE PASSWORD
if (isset($_POST['change_pass'])) 
{
  $crpass = mysqli_real_escape_string($db, $_POST['crpass']);
  $npass = mysqli_real_escape_string($db, $_POST['npass']);
  $rnpass = mysqli_real_escape_string($db, $_POST['rnpass']);

  // Current Password
  if (empty($crpass)) 
  {
    $crpassErr = "Cannot be empty";
    array_push($errors, "");
  }
  else
  {
    if (!preg_match("/^([A-Za-z0-9 .-_]).{7,}$/",$crpass)) 
    {
      $crpassErr = "Password must not be less than eight (8) characters";
      array_push($errors, "");
    }

    elseif (!preg_match("/^(?=.*?[#?!@$%^&*-]).{1,}$/", $crpass)) 
    {
      $crpassErr = "Password must contain at least one of the special characters (@, #, $, %)";
      array_push($errors, "");
    }   
  }

  // New Password
  if (empty($npass)) 
  {
    $npassErr = "Cannot be empty";
    array_push($errors, "");
  }
  else
  {
    if (!preg_match("/^([A-Za-z0-9 .-_]).{7,}$/",$npass)) 
    {
      $npassErr = "Password must not be less than eight (8) characters";
      array_push($errors, "");
    }

    elseif (!preg_match("/^(?=.*?[#?!@$%^&*-]).{1,}$/", $npass)) 
    {
      $npassErr = "Password must contain at least one of the special characters (@, #, $, %)";
      array_push($errors, "");
    }   
  }

  // Retype New Password
  if (empty($rnpass)) 
  {
    $rnpassErr = "Cannot be empty";
    array_push($errors, "");
  }
  else
  {
    if (!preg_match("/^([A-Za-z0-9 .-_]).{7,}$/",$rnpass)) 
    {
      $rnpassErr = "Password must not be less than eight (8) characters";
      array_push($errors, "");
    }

    elseif (!preg_match("/^(?=.*?[#?!@$%^&*-]).{1,}$/", $rnpass)) 
    {
      $rnpassErr = "Password must contain at least one of the special characters (@, #, $, %)";
      array_push($errors, "");
    }   
  }

  // Current Password match
  $uname = $_SESSION['uname'];
  $sql = "SELECT Password FROM users WHERE UserName='$uname'";
  $result = mysqli_query($db, $sql);

  if (mysqli_num_rows($result) > 0) 
  {
     while($row = mysqli_fetch_assoc($result)) 
     {
      $matchpass = $row["Password"];
     }
  } 
  if (md5($crpass) != $matchpass) 
  {
    $crpassErr = "Current Password Not Matched";
    array_push($errors, "");
  }
  else
  {
    //current and new pass should not match
    if ($crpass == $npass) 
    {
      $npassErr = "New Password should not be same as the Current Password";
      array_push($errors, "");

    }
    //new and retype pass match
    elseif ($npass != $rnpass) 
    {
      $rnpassErr = "New Passwords Not Matched";
      array_push($errors, "");
    }
  }

  if (count($errors) == 0) 
  {
    $uname = $_SESSION['uname'];
    $npass = md5($npass);
    $query = "UPDATE users SET Password='$npass' WHERE UserName = '$uname'";
    if (mysqli_query($db, $query)) 
    {
      echo "Password Changed successfully";
    } 
    else 
    {
      echo "Error Changing Password: " . mysqli_error($db);
    }
    $_SESSION['uname'] = $uname;
    header('location:E. LOGGED IN DASHBOARD.php');
  }
}

// FORGOT PASSWORD
if (isset($_POST['forgot_pass'])) 
{
  $email = strtoupper(mysqli_real_escape_string($db, $_POST['email']));

  //Email
  if (empty($email)) 
  {
    $emailErr = "Cannot be empty";
    array_push($errors, "");
  } 
  else 
  {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      $emailErr = "Must be a valid email address: anything@example.com";
      array_push($errors, "");
    }
  }

  // Email match
  $sql = "SELECT UserName FROM users WHERE Email='$email'";
  $result = mysqli_query($db, $sql);

  if (mysqli_num_rows($result) > 0) 
  {
     while($row = mysqli_fetch_assoc($result)) 
     {
      $uname = $row["UserName"];
     }
  }
  else
  {
    array_push($errors, "Email Not Matched");
  }

  if (count($errors) == 0) 
  {
    $_SESSION['uname'] = $uname;
    header('location:E. LOGGED IN DASHBOARD.php');
  }
}

// CHANGE PROFILE PICTURE
if (isset($_POST['change_pp'])) 
{
  //Image
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
  {
    $imageErr = "Picture format must be in jpeg or jpg or png"; echo "<br>";
    array_push($errors, "");
    $uploadOk = 0;
  }

  if ($_FILES["image"]["size"] > 5000000) 
  {
    $imageErr = "Picture size should not be more than 5MB"; echo "<br>";
    array_push($errors, "");
    $uploadOk = 0;
  }

  if ($uploadOk == 0) 
  {
    $imageErr = "Sorry, your picture was not uploaded. Choose a different picture"; echo "<br>";
    array_push($errors, "");
  } 
  else 
  {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
    {
      $imageErr = "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
      $image = $_FILES['image']['name'];
    } 
    else 
    {
      $imageErr = "Sorry, there was an error uploading your file."; echo "<br>";
      array_push($errors, "");
    }
  }

  if (count($errors) == 0) 
  {
    $uname = $_SESSION['uname'];
    $query = "UPDATE users SET Image='$image' WHERE UserName = '$uname'";
    if (mysqli_query($db, $query)) 
    {
      echo "Profile Picture Changed successfully";
    } 
    else 
    {
      echo "Error Changing Profile Picture: " . mysqli_error($db);
    }
    $_SESSION['uname'] = $uname;
    header('location:E. LOGGED IN DASHBOARD.php');
  }
}

?>