<?php
session_start();

if(!isset($_SESSION['login_confirm'])){
    header('location:login.php');
}

?>


<h1>Welcome to Dashboard!!</h1>