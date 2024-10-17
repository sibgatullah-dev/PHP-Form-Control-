<?php 
session_start();

require 'db.php';



$name = $_POST['name'] ;
$email= $_POST["e-mail"];
$password = $_POST['password'];
$after_hash = password_hash($password, PASSWORD_DEFAULT);
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
    $select = "SELECT COUNT(*)as total FROM users WHERE email='$email'";
    $select_querry= mysqli_query($db_connect, $select);
    $select_result = mysqli_fetch_assoc($select_querry);
    if($select_result['total']==1){
        $flag = true;
        $_SESSION['mail_err']= 'Email already exists';
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
else{
    $insert = "INSERT INTO users(name, email, password, gender, date_of_birth)VALUES('$name', '$email', '$after_hash', '$gender', '$date_of_birth')";

    mysqli_query($db_connect, $insert);

    $_SESSION['success'] = "Registration completed !!!";
    header('location:index.php');
}

?>