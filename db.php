<?php
try{
$host="mysql:host=localhost;dbname=u829526653_phermacy";
$user_name="u829526653_padmin";
$user_password="Kmbeatrice@12";
$dbh=new PDO($host,$user_name,$user_password);
}
 
catch(Exception $e){
exit("Connection Error".$e->getMessage());
}
 
?>