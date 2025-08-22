<?php
$conn= mysqli_connect("localhost","root","","financetracker","3307");

$username = isset($_POST['user_name']) ? $_POST['user_name'] : '';
$email = isset($_POST['user_email']) ? $_POST['user_email'] : '';
$password = isset($_POST['user_password']) ? $_POST['user_password'] : '';


$Sql = "Insert Into sign_up (user_name,user_email,user_password) Values('$username','$email','$password')";
if(mysqli_query($conn,$Sql)){
	echo "1";
}else{
	echo "please try later";
}





?>