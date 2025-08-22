<?php 
$conn = mysqli_connect("localhost","root","","financetracker","3307");

$email = $_POST['email_1'];
$password = $_POST['password_1'];
	if (!empty($email) && !empty($password)) {
		
    
  // $email = mysqli_real_escape_string($conn, $email);
 //$password = mysqli_real_escape_string($conn, $password);

	$sql ="SELECT * From sign_up Where user_email='$email' AND user_password='$password'";
	$result =mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
        echo "1";


    } else {
        echo "2";
    

}
	}else {
		echo "please enter the values";
	}
	
	








?>