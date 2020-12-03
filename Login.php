<?php

//requires database connection
require_once('db.php');
$output = array();

//getting user values
 $email=$_POST['username'];
 $password=$_POST['password'];
// 	$email="emmy1234";
// $password="emmy1234";
//an array of response

//checking if email exit
$conn=$dbh->prepare("SELECT * FROM users WHERE username=? and password=?");
//$pass=md5($password);
$conn->bindParam(1,$email);
$conn->bindParam(2,$password);
$conn->execute();
if($conn->rowCount() == 0){
$output['error'] = true;
$output['message'] = "Wrong Email or Password";
}
 
//checking password correctness
if($conn->rowCount() !==0){
$results=$conn->fetch(PDO::FETCH_OBJ);

$username=$results->username;
$fullname=$results->fullname;
$user_type=$results->user_type;
$tel=$results->tel;
$eml=$results->email;
$address=$results->address;
$correctpass=$results->password;
 
$output['error'] = false;
$output['message'] = "login sucessful";
$output['user_type'] = $user_type;
$output['username'] = $username;
$output['fullname'] = $fullname;
$output['address'] = $address;
$output['tel'] = $tel;
$output['email'] = $eml;
}
echo json_encode($output);
 
?>
