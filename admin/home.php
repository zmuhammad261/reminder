
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
                    <div class="msg-wrap">
                    <p id="msg"></p>
                  </div>
                    <form id="login_form" method="post">
                      <label for="" class="text-uppercase text-sm text-white">Your Username </label>
                      <input type="text" placeholder="Username" name="username" class="form-control mb">
                      <label for="" class="text-uppercase text-sm text-white">Password</label>
                      <input type="password" placeholder="Password" name="password" class="form-control mb">
                      <button class="btn btn-info mt-3" name="login" type="submit">LOGIN</button>
                      <input type="button" class="btn btn-danger mt-3" value="CANCEL" onclick="document.location.href='../';" />
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
  </body>
</html>