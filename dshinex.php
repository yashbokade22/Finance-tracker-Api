<?php
$conn = mysqli_connect("localhost","root","","financetracker","3307");

$data=array();
$totalincome=0;
$totalexpense=0;
$todaytotalincome=0;
$todaytotalexpenses=0;
$today=date('Y-m-d');
$Yesterdayinc=date('Y-m-d',strtotime("-1 day"));
$Yesterdayexp=date('Y-m-d',strtotime("-1 day"));
$Monthin=date('Y-m-d',strtotime("-1 month"));
$Monthex=date('Y-m-d',strtotime("-1 month"));
$Yearinc=date('Y-m-d',strtotime("-1 year "));
$Yearexp=date('Y-m-d',strtotime("-1 year"));
$yearin=0;
$yearex=0;
$monthin=0;
$monthex=0;
$Yesterdayexpenses=0;
$Yesterdayincome=0;

//Totalexpenses
$sql_exp ="SELECT SUM(amount) As totalexpenses FROM transactionss WHERE transaction_type='Expenses'";

$result =mysqli_query($conn,$sql_exp);
if(mysqli_num_rows($result)>0){
	foreach($result as $exp ){
		$totalexpense= $exp['totalexpenses'];
		$data[]=$exp;
	}
}

//Totalincome
$sql_in ="SELECT SUM(amount) As totalincome FROM transactionss WHERE transaction_type='Income'";

$result_in =mysqli_query($conn,$sql_in);
if(mysqli_num_rows($result_in)>0){
	foreach($result_in as $inc ){
		$totalincome= $inc['totalincome'];
		$data[]=$inc;
	}


//TodayTotalincome
}
$sql_todayin="SELECT SUM(amount) As todaytotalincome FROM transactionss WHERE t_date='$today' AND transaction_type='Income'";

$result_e=mysqli_query($conn,$sql_todayin);
 if (mysqli_num_rows($result_e)>0){
 	foreach($result_e as $todayin){
 		$todaytotalincome=$todayin['todaytotalincome'];

 	}
 }

//TodayTotalexpenses
 $sql_todayex="SELECT SUM(amount) As todaytotalexp FROM transactionss WHERE t_date='$today' AND transaction_type='Expenses'";
$result_ex=mysqli_query($conn,$sql_todayex);

 if (mysqli_num_rows($result_ex)>0){
 	foreach($result_ex as $todayexp){
 		$todaytotalexpenses=$todayexp['todaytotalexp'];
 		
 	}
 }


//Yesterdayincome
$sql_yesterdayin="SELECT SUM(amount) AS Yesterdayincome FROM transactionss WHERE t_date='$Yesterdayinc' AND transaction_type='Income' ";
$result_yesterdayin=mysqli_query($conn,$sql_yesterdayin);

if (mysqli_num_rows($result_yesterdayin)>0){
	foreach($result_yesterdayin as $yesterdayin){
	$Yesterdayincome=$yesterdayin['Yesterdayincome'];

	//$data[]=$yesterdayex;
}
}	

//Yesterdayexpenses
$sql_yesterdayex="SELECT SUM(amount) AS Yesterdayexpense FROM transactionss WHERE t_date='$Yesterdayexp' AND transaction_type='Expenses'";

$result_yesterdayex=mysqli_query($conn,$sql_yesterdayex);
if(mysqli_num_rows($result_yesterdayex)>0){
	foreach($result_yesterdayex as $yesterdayex){
		$Yesterdayexpenses=$yesterdayex['Yesterdayexpense'];
	}
}
                                                          
//Month Income
$sql_month_in="SELECT SUM(amount)AS Monthincome FROM transactionss WHERE t_date='$Monthin'
AND transaction_type='Income'";
$result_monthin=mysqli_query($conn,$sql_month_in);
if(mysqli_num_rows($result_monthin)>= 0){
	foreach($result_monthin As $monthinc){
		$monthin=$monthinc['Monthincome'];
	}
}


//MonthExpense
$sql_monthex="SELECT SUM(amount) AS Monthexpense FROM transactionss WHERE t_date ='Monthex'
AND transaction_type='Expenses'";
$result_monthex=mysqli_query($conn,$sql_monthex);
if(mysqli_num_rows($result_monthex)>=0){
	foreach($result_monthex As $monthexp){
		$monthex=$monthexp['Monthexpense'];
	}
}


//YEarIncome
$sql_year_in="SELECT SUM(amount) As Yearincome FROM transactionss WHERE t_date='Yearinc'
AND transaction_type='Income'";
$result_year_in=mysqli_query($conn,$sql_year_in);
if(mysqli_num_rows($result_year_in)>=0){
	foreach($result_year_in As $yearinc){
		$yearin=$yearinc['Yearincome'];
	}
}

//YEarexpense
$sql_year_ex="SELECT SUM(amount) As Yearexpense FROM transactionss WHERE t_date='Yearexp'
AND transaction_type='Expenses'";
$result_year_in=mysqli_query($conn,$sql_year_ex);
if(mysqli_num_rows($result_year_in)>=0){
	foreach($result_year_in As $yearexp){
		$yearex=$yearexp['Yearexpense'];
	}
}


echo json_encode(array("totalexpenses"=>$totalexpense,"totalincome"=>$totalincome,"todaytotalincome"=>$todaytotalincome,"todaytotalexpenses"=>$todaytotalexpenses,"Yesterdayincome"=>$Yesterdayincome,
"Yesterdayexpense"=>$Yesterdayexpenses,"Monthincome"=>$monthin,"Monthexpense"=>$monthex,"yearin"=>$Yearincome,"yearex"=>$Yearexpense));




?>