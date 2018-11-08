<!doctype html>
<html lang="en">
  <head>
    <?php include 'includes/stylesheet.php'; ?>
  </head>
  <body>
    <div class="wrapper">
      <?php include 'includes/sidebar.php'; ?>
      <div class="main-panel">
        <?php include 'includes/header.php'; ?>
        
        <div class="content">
          <div class="container-fluid">
            <section class="content-header">
          <ol class="breadcrumb">
  <li>
    <a href="dashboard">
      <i class="ti-panel"></i>
      <span class="text">Home</span>
    </a>
  </li>
  <li>
    <a href="#">
      <i class="ti-na"></i>
      <span class="text">404 Error</span>
    </a>
  </li>
</ol>
        </section>
            <div class="error-page text-center">
              <h1 class="headline text-warning"> 404</h1>
              <div class="error-content">
                <h3><i class="ti-alert text-warning"></i> Oops! Page not found.</h3>
                <p>
                  We could not find the page you were looking for.<br />
                  <a href="<?php echo $basepath ?>dashboard">Return to dashboard</a>
                </p>
              </div>
            </div>
          </div>
        </div>
        <?php include 'includes/footer.php'; ?>
      </div>
    </div>
  </body>
  <?php include 'includes/scripts.php'; ?>
</html>