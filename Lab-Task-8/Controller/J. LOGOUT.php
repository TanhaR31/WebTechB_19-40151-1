<?php 

session_start();

if (isset($_SESSION['uname'])) 
{
	session_destroy();
	setcookie("remember","", time()-60);
	echo "SESSION destroy"."<br>";
	echo "COOKIE TimeOUT";
	header("location:C. LOGIN.php");	
}
else
{
	header("location:C. LOGIN.php");
}



 ?>