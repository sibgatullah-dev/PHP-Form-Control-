<?php
session_start();
require 'db.php';


$email = $_POST['email'];
$password = $_POST['password'];

$flag = false;

if(empty($email)){
    $flag = true;
    $_SESSION['email_err'] = 'Enter Email';
}
else{
    // if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    //     $flag= true;
    //     $_SESSION['email_err'] = 'Invalid Email';
    // }
    $select = "SELECT COUNT(*)as totla FROM users WHERE email='$email'";
    $select_querry= mysqli_query($db_connect, $select);
    $select_result = mysqli_fetch_assoc($select_result);
    echo $select_result['total'];
}

if(empty($password)){
    $flag = true;
    $_SESSION['password_err'] = 'Enter Password';
}


if($flag){
    header('location:login.php');
}



?>