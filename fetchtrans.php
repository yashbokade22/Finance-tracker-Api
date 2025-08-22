<?php
$con =mysqli_connect("localhost","root","","financetracker","3307");
$t=$_GET['t'];
$sql="Select user_id,amount,description,payment_mode From transactionss where transaction_type='$t'";
$result= mysqli_query($con , $sql);
$data=array();
if(mysqli_num_rows($result)>0){
	foreach($result as $rows){
		$data[]=$rows;

	}
}
    echo json_encode($data);


?>