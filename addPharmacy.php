<?php
include 'DBConfig.php';

 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
if($_SERVER['REQUEST_METHOD']=='POST'){
 $username = $_POST['username'];
	$name = $_POST['name']; 
	$tel = $_POST['tel'];
	$location = $_POST['address'];
	$email=$_POST['email'];
	$date=date("Y-m-d H:i:s");
	
 $CheckSQL = "SELECT * FROM pharmacy WHERE name = '$username'  AND address='$location'  ";
 
 $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
 
 if(isset($check)){

 echo 'Pharmacy Already Exist, Please use Another  username.';

 }else{ 
$Sql_Query = "INSERT INTO pharmacy(name,  tel,  email, address,type, date ) values ('$name','$tel','$email','$location','$username','$date')";

 if(mysqli_query($con,$Sql_Query))
{
 echo 'pharmacy Registration Successfully';
}
else
{
 echo 'Registration Not Successfully ';
 }
 }
}
 mysqli_close($con);
?>