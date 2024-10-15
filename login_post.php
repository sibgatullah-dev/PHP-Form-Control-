<?php
session_start();


$email = $_SESSION['email'];
$password = $_SESSION['password'];

$flag = false;

if(empty($email)){
    $flag = true;
    $_SESSION['email_err'] = 'Enter Email';
}
else{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $flag= true;
        $_SESSION['email_err'] = 'Invalid Email';
    }
}

if(empty($password)){
    $flag = true;
    $_SESSION['password_err'] = 'Enter Password';
}


if($flag){
    header('location:login.php');
}


?>