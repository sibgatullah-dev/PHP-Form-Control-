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
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $flag= true;
        $_SESSION['email_err'] = 'Invalid Email';
    }
    $select = "SELECT COUNT(*)as total FROM users WHERE email='$email'";
    $select_querry= mysqli_query($db_connect, $select);
    $select_result = mysqli_fetch_assoc($select_querry);
    if($select_result['total']==0){
        $flag = true;
        $_SESSION['email_err']= 'E-mail does not exist';
    }
}

if(empty($password)){
    $flag = true;
    $_SESSION['password_err'] = 'Enter Password';
}
else{
    $select = "SELECT password FROM users WHERE email='$email'";
    $select_querry= mysqli_query($db_connect, $select);
    $select_result = mysqli_fetch_assoc($select_querry);
    if(!password_verify($password, $select_result['password'])){
        $flag = true ;
        $_SESSION['password_err'] = 'Incorrect Password';
    }
    
}


if($flag){
    header('location:login.php');
}
else{
    $_SESSION['login_confirm'] = 'logged in';
    header('location:dashboard.php');
}



?>