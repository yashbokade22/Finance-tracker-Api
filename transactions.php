<?php
$conn= mysqli_connect("localhost","root","","financetracker","3307");
date_default_timezone_set("Asia/Kolkata");
echo $transtype =$_POST['transaction_type'];
echo $amt =$_POST['amount'];
echo $descrp =$_POST['description'];
echo $paymod =$_POST['payment_mode'];
$t_date=date('Y-m-d');
$t_time=date('H:i:s');

$sql="INSERT INTO `transactionss`(`transaction_type`, `amount`, `description`, `payment_mode`,`t_date`,`t_time`) VALUES ('$transtype','$amt','$descrp','$paymod','$t_date','$t_time')";
mysqli_query($conn,$sql);
 













?>