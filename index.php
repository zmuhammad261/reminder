<?php include 'handler.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Reminder App</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body class="text-center">

    
      <header class="masthead mb-auto">
        <div class="inner">
          <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container">
              <a class="navbar-brand" href="#">RemMe</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" >About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled" data-toggle="modal" data-target="#loginModal">Login</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </header>

      
        <main role="main" class="hero">
        </main>
        <div class="cover-container text-center m-auto"> 
        <section class="inner cover py-5">
          <h1 class="cover-heading">Cover your page.</h1>
          <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
          <p class="lead">
            <a href="#" class="btn btn-lg btn-secondary">Learn more</a>
          </p>
        </section>
      </div>

      <footer class="mastfoot mt-auto bg-dark">
        <div class="inner pt-3 pb-2">
          <p>Reminder App <span class="lead">RemMe</span>, by <a href="#">Me</a>.</p>
        </div>
      </footer>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title h3 font-weight-normal" id="loginModalLabel">Please sign in</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="msg-wrap py-2">
                    <p id="msg"></p>
                  </div>
        <form id="login_form" class="form-signin" method="post">
      <img class="mb-4" src="img/d-logo.png" alt="" width="72">
      <!-- <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1> -->
      <div class="form-group mb-3">
        <label for="username" class="sr-only">User Name</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="UserName" required autofocus>
      </div>
      <div class="form-group mb-3">
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        <div class="py-3">
      </div>
        <div class="btn-group">
          <button class="btn btn-lg btn-primary" name="login" type="submit">Sign in</button>
          <button type="button" class="btn btn-lg btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
      </div>
    </div>
  </div>
</div>


    <!-- JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
