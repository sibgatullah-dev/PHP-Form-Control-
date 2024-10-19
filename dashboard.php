<?php
session_start();

if(!isset($_SESSION['login_confirm'])){
    header('location:login.php');
}

?>


<h1>Welcome to Dashboard!!</h1>


<div class="mt-4">
    <a href="logout.php">
        <button type="submit" class="btn btn-primary">Logout</button>
    </a>
</div>