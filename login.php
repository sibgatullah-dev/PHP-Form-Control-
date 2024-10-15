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
        <div class="col-lg-6 m-auto " >
            <div class="card" style="margin-top: 200px;">
                <div class="card-header bg-primary text-white">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    <form action="login_post.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control">
                            <?php if(isset($_SESSION['email_err'])){ ?>
                               <strong class="text-danger"><?=$_SESSION['email_err']?></strong>
                            <?php } unset($_SESSION['email_err']) ?>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                            <?php if(isset($_SESSION['password_err'])){ ?>
                               <strong class="text-danger"><?=$_SESSION['password_err']?></strong>
                            <?php } unset($_SESSION['password_err']) ?>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>






  
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>

  </body>
</html>

