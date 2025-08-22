<?php 

$conn= mysqli_connect("localhost","root","","financetracker","3307");

$type=$_GET['type'];
$moincome=array();


	

    $sql_monin="SELECT MONTH(t_date) As `month`,SUM(amount) As `income` FROM transactionss WHERE transaction_type='$type' AND YEAR(t_date)=YEAR(CURRENT_DATE()) Group By MONTH(t_date) Order By month ";



$result=mysqli_query($conn,$sql_monin);
if(mysqli_num_rows($result)>0){
	foreach($result As $mon){
		$moincome[]=$mon;


	}
}
	
	
echo json_encode($moincome);










?>