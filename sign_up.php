<?php
$con = mysqli_connect("localhost", "root", "", "lms", "3307");

$usernamee = $_POST['username'] ?? '';
$passwordd = $_POST['userpassword'] ?? '';

if (!empty($usernamee) && !empty($passwordd)) {
    $sql = "SELECT * FROM signupp WHERE user_name='$usernamee' AND user_password='$passwordd'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "1"; // login success
    } else {
        echo "2"; // login failed
    }
} else {
    echo "please enter the values";
}
?>
