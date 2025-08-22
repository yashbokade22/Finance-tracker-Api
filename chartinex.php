<?php
$conn= mysqli_connect("localhost","root","","financetracker","3307");
$data=array();

$sql_chart="SELECT DAY(t_date) As Day ,SUM(amount) As income FROM transactionss WHERE transaction_type='Income' AND MONTH(t_date)=MONTH(CURRENT_DATE) AND MONTH(t_date)=MONTH(CURRENT_DATE) GROUP BY DAY(t_date)
ORDER BY DAY";
$result_chart=mysqli_query($conn,$sql_chart);

if(mysqli_num_rows($result_chart)>0){
	foreach($result_chart As $r_chart){
		$data[]=$r_chart;

	}
}
echo json_encode($data);

?>