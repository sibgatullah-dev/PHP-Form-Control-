<?php 
session_start();

$host_name = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'register_form';

$db_connect = mysqli_connect($host_name, $db_user, $db_password, $db_name);



$name = $_POST['name'] ;
$email= $_POST["e-mail"];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$gender = $_POST['gender'];
$date_of_birth = $_POST['date_of_birth'];

$upper = preg_match('@[A-Z]@', $password);
$lower = preg_match('@[a-z]@', $password);
$number = preg_match('@[0-9]@', $password);
$special = preg_match('^[!,@,#,$,%.&]^', $password);

$flag = false;

if(empty($name)){
    $flag= true;
    $_SESSION['name_err'] = 'Please Enter Your Name'; 
}
else{
    $_SESSION['name_value'] = $name;
}

if(empty($email)){
    $flag=true;
    $_SESSION['mail_err'] = 'Please Enter Your E-mail';
}
else{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $flag = true;
        $_SESSION['mail_err'] = 'Inalid E-mail Format!' ;
    }
    $_SESSION["email_value"] = $email ;
}

if(empty($password)){
    $flag=true;
    $_SESSION['pass_err'] = "Please Enter Your Password";
}
else{
    if(!$upper){
        $flag = true;
        $_SESSION['pass_err'] = "Password must contain one Uppercase";
    }
    if(!$lower){
        $flag = true;
        $_SESSION['pass_err'] = "Password must contain one Lowercase";
    }
    if(!$number){
        $flag = true;
        $_SESSION['pass_err'] = "Password must contain one Number";
    }
    if(!$special){
        $flag = true;
        $_SESSION['pass_err'] = "Password must contain one Special character";
    }
    if(strlen($password) < 8){
        $flag = true;
        $_SESSION['pass_err'] = "Password can't be less then 8 character";
    }
}


if(empty($confirm_password)){
    $flag=true;
    $_SESSION['conpass_err'] = "Please Re-enter Your Password";
}
else{
    if($password != $confirm_password){
        $flag=true;
        $_SESSION['conpass_err'] = "Password didn't match" ;
    }
}

if(empty($gender)){
    $falg=true;
    $_SESSION['gender_err']= "Please Select Your Gender";
}
else{
    $_SESSION['gen_value'] = $gender;
}



if(empty($date_of_birth)){
    $flag = true;
    $_SESSION['date_of_birth_err'] = 'Please Enter Your Date of Birth';
}
else{
    $d1 = new DateTime($date_of_birth);
    $d2 = new DateTime(date('y-m-d'));

    $diff = $d2->diff($d1);

   if($diff->y <= 18 && $diff->y < 30){
    $flag=true;
    $_SESSION['date_of_birth_err'] = "Didn't match age requirment";
   }
   else{
    $_SESSION['date_of_birth_value'] = $date_of_birth;
   }
}





if($flag){
    header('location:index.php');
}

?>