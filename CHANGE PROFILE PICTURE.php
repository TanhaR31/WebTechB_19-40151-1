<!DOCTYPE HTML>  
<html>
<head>
  <title>Profile Picture</title>
  <h1 > <img src="companylogo.jpg" alt="company" width="100" height="50"></h1>
</head>
<body>
<table align="center">
	<tr>
    <td> Logged in as<a href="VIEW PROFILE.php"> Bob |</a></td>
    <td><a href="LOGOUT.php"> Logout </a></td>
    </tr>
</table>

<h2>PROFILE PICTURE</h2>
<img src="login logo.jpg" alt="logo" width="100" height="100"><br><br>
<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 400000){
         $errors[]='File size must be excately 4 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>

<form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" /><br><br>
         <input type="submit"/>
      </form>
<br><br>

<p><a href="LOGGED IN DASHBOARD.php"> Dashboard </a></p>
<p><a href="VIEW PROFILE.php"> View Profile </a></p>
<p><a href="EDIT PROFILE.php"> Edit Profile </a></p>
<p><a href="CHANGE PROFILE PICTURE.php"> Change Profile Picture </a></p>
<p><a href="CHANGE PASSWORD.php"> Change Password </a></p>
<p><a href="LOGOUT.php"> Logout </a></p>
<?php include 'footer.php';?>
</body>
</html>