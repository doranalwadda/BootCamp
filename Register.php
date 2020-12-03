<?php
include 'DBConfig.php';

 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
if($_SERVER['REQUEST_METHOD']=='POST'){
 $username = $_POST['username'];
	$name = $_POST['name']; 
	$tel = $_POST['tel'];
	$location = $_POST['address'];
	$user_type= $_POST['user_type'];
	$email=$_POST['email'];
	$date=date("Y-m-d H:i:s");
	$password = $_POST['password'];
	
 $CheckSQL = "SELECT * FROM users WHERE username = '$username'   ";
 
 $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
 
 if(isset($check)){

 echo 'User Already Exist, Please use Another  username.';

 }else{ 
$Sql_Query = "INSERT INTO users(fullname, user_type, tel, password, email, address, username, date ) values ('$name','$user_type','$tel','$password','$email','$location','$username','$date')";

 if(mysqli_query($con,$Sql_Query))
{
 echo 'User Registration Successfully';
}
else
{
 echo 'Registration Not Successfully ';
 }
 }
}
 mysqli_close($con);
?>