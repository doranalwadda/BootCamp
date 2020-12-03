<?php

include 'DBConfig.php';

 $conn = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
//Checking if any error occured while connecting
 if (mysqli_connect_errno()) {
 echo "Failed to connect to server: " . mysqli_connect_error();
 die();
 }
 
 //creating a query
 $stmt = $conn->prepare("SELECT id, userid,category, rooms_size, address, type, cost, starting_fee,image1,image2,image3,descr,lati,longi,contact FROM property WHERE type='Rent'");
 
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($id, $userid,$cate, $nor, $address,$type, $price,$sfee, $image1,$image2,$image3,$descr,$lati,$longi,$contact);
 
 $products = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
 $temp = array();
 $temp['id'] = $id; 
 $temp['userid'] = $userid; 
 $temp['rooms_size'] = $nor; 
 $temp['category'] = $cate; 
 $temp['address'] = $address; 
 $temp['type'] = $type; 
 $temp['cost'] = $price; 
 $temp['starting_fee'] = $sfee; 
 $temp['image1'] = $image1;
 $temp['image2'] = $image2;
 $temp['image3'] = $image3;
 $temp['descr'] =$descr;
 $temp['lati'] = $lati;
 $temp['longi'] = $longi;
 $temp['contact'] =$contact;
 array_push($products, $temp);
 }
 
 //displaying the result in json format 
 echo json_encode($products);
