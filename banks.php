<?php
$conn= mysqli_connect("localhost","root","","financetracker","3307");
$data= array();
$sql= "SELECT * FROM banks ";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
foreach($result as $rows){
	$data[]=$rows;
}
}
echo json_encode($data);













?>