<?php session_start() ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  </head>
  <body>
    
   <div class="container">
    <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card" style="margin-top:150px ;">
                  
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Register Form</h3>
                    </div>
                    
                    <div class="card-body">
                        <?php if(isset($_SESSION['success'])){?>
                            <div class="alert alert-success"><?=$_SESSION['success']?></div>
                        <?php } unset($_SESSION['success']) ?>
                        <form action="register_post.php" method="POST">

                            <div class="mb-3">
                                <label class="form_label text-primary">Name</label>
                                <input type="text" class="form-control" name="name" value =" <?= (isset($_SESSION['name_value'])? $_SESSION['name_value']:'')?>" >
                                <?php if(isset($_SESSION['name_err'])){?>
                                    <strong class="text-danger"><?= $_SESSION['name_err'] ?></strong>
                                <?php } unset($_SESSION['name_err'])  ?>   
                            </div>

                            <div class="mb-3">
                                <label class="form_label text-primary">E-mail</label>
                                <input type="mail" class="form-control" name="e-mail" value = "<?= (isset($_SESSION['email_value'])? $_SESSION['email_value']:'')?>">
                                <?php if(isset($_SESSION['mail_err'])){?>
                                    <strong class="text-danger"><?= $_SESSION['mail_err'] ?></strong>
                                <?php } unset($_SESSION['mail_err']) ?>
                            </div>

                            <div class="mb-3">
                               <div class="pass position-relative">
                                    <label class="form_label text-primary">Password</label>
                                    <input id="pass" type="password" class="form-control" name="password">
                                    <?php if(isset($_SESSION['pass_err'])){ ?>
                                        <strong class="text-danger"><?= $_SESSION['pass_err']?></strong>
                                    <?php } unset($_SESSION['pass_err'])?>
                                    <i class="fa-solid fa-eye fa-regular fa-eye-slash fa-fw  position-absolute end-0 bg-primary text-white  rounded-end" style="top: 24px; width:40px; height:38px; line-height:40px; "></i>
                               </div> 
                            </div>

                            <div class="mb-3">
                               <div class="pass position-relative">
                                    <label class="form_label text-primary">Confirm Password</label>
                                    <input id="pass" type="password" class="form-control" name="confirm_password">
                                    <?php if(isset($_SESSION['conpass_err'])){ ?>
                                        <strong class="text-danger"><?= $_SESSION['conpass_err']?></strong>
                                    <?php } unset($_SESSION['conpass_err'])?>
                               </div>  
                            </div>

                            <div class="mb-3">
                                <?php
                                    if(isset($_SESSION['gen_value'])){
                                        $gender = $_SESSION['gen_value'];
                                    }
                                    else{
                                        $gender = '';
                                    }
                                ?>

                                <div class="form-check">
                                    <input <?= ($gender == 'male' ?'checked':'') ?>  value='male' class="form-check-input" type="radio" name="gender" id="male">
                                    <label class="form-check-label " for="male">
                                       Male
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input <?= ($gender == 'female' ?'checked':'') ?>  value="female" class="form-check-input" type="radio" name="gender" id="female">
                                    <label class="form-check-label " for="female">
                                        Female
                                    </label>
                                </div>

                                <?php if(isset($_SESSION['gender_err'])){ ?>
                                    <strong class="text-danger"><?=$_SESSION['gender_err']?></strong>
                                 <?php } unset($_SESSION['gender_err']) ?>
                            </div>
                           

                            <div class="mb-3">
                                <label for="" class="form_label text-primary">Data of Birth</label>
                                <input type="date" class="form-control" name = 'date_of_birth' value = "<?= (isset($_SESSION['date_of_birth_value'])? $_SESSION['date_of_birth_value']:'')?>">
                                <?php if(isset($_SESSION['date_of_birth_err'])){ ?>
                                    <strong class="text-danger"><?=$_SESSION['date_of_birth_err']?></strong>
                                <?php } unset($_SESSION['date_of_birth_err']) ?>
                            </div>


                            <div class="mb-3 mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

   </div>








    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>

    <script>

        $('.fa-eye').click(function(){
            let password = document.getElementById('pass');
            if(password.type == 'password'){
                password.type = 'text';
                $(this).removeClass('fa-eye');
            }
            else{
                password.type = 'password';
                $(this).addClass('fa-eye');
            }
        })

    </script>
  </body>
</html>

