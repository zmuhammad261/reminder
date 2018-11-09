<?php
error_reporting(0);
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard'; </script>";
} else{
$error=" Login Failed. Please try again";
}
}
?>
<!doctype html>
<html lang="en" class="no-js">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    <title>Admin Login | Creating Conversion</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
  </head>
  <body>
    <div class="login-page bk-img" style="background-image: url(img/banner-img.png);">
      <div class="overlay section-wrapper">
        <div class="form-content container-wrapper">
          <div class="container">
            <div class="row">
              <div class="col-md-6 offset-md-3 mt-5">
                <h1 class="text-center text-bold text-light mt-5">Sign in</h1>
                <div class="row pt-2 pb-3">
                  <div class="col-md-8 offset-md-2">
                    <?php if($error){?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ERROR</strong>:<?php echo htmlentities($error); ?> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <?php } ?>
                    <form method="post">
                      <label for="" class="text-uppercase text-sm text-white">Your Username </label>
                      <input type="text" placeholder="Username" name="username" class="form-control mb">
                      <label for="" class="text-uppercase text-sm text-white">Password</label>
                      <input type="password" placeholder="Password" name="password" class="form-control mb">
                      <div class="btn-group m-auto">
                        <button class="btn btn-primary mt-3" name="login" type="submit">LOGIN</button>
                        <a href="../" class="btn btn-secondary mt-3">Cancel</a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <script type="text/javascript" src="../fonts/fontawesome/svg-with-js/js/fontawesome-all.min.js"></script>
    <?php include 'js/main.php' ?>
    <script>
      $('.alert').alert()
    </script>
  </body>
</html>