<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{
header('location:index.php');
}
// Change/Update Password
if(isset($_POST['submit']))
{
$password=md5($_POST['password']);
$newpassword=md5($_POST['newpassword']);
$eamil=($_POST['']);
$username=$_SESSION['alogin'];
$sql ="SELECT * FROM admin WHERE UserName=:username and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update admin set Password=:newpassword where UserName=:username";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':username', $username, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Your Password succesfully changed";
}
else {
$error="Your current password is not valid.";
}
}
//Update Profile
if(isset($_POST['submitup']))
{
$aname=$_POST['name'];
$aemail=$_POST['email'];
$ausername=$_POST['username'];
$aprofile=$_POST['jprofile'];
$alocation=$_POST['locate'];
$experience=$_POST['inputExperience'];
$sql="update admin set Name=:aname, Email=:aemail, jobProfile=:aprofile, location=:alocation, exp=:experience";
$query = $dbh->prepare($sql);
$query->bindParam(':aname',$aname,PDO::PARAM_STR);
$query->bindParam(':aemail',$aemail,PDO::PARAM_STR);
$query->bindParam(':aprofile',$aprofile,PDO::PARAM_STR);
$query->bindParam(':alocation',$alocation,PDO::PARAM_STR);
$query->bindParam(':experience',$experience,PDO::PARAM_STR);
$query->execute();
$msgup=" Info Updated successfully";
}

?>
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
<!-- Content Header (Page header) -->
          
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
                <a href="edit-profile">
                  <i class="ti-hummer"></i>
                  <span class="text">Edit Profile</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="ti-user"></i>
                  <span class="text">User Profile</span>
                </a>
              </li>
          </section>
            <!-- Main content -->
          <div class="content">
          <div class="container-fluid">
            <?php
              $query = "SELECT * FROM admin";
              $stmt = $dbh->prepare( $query );
              $stmt->execute();
              while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
              ?>
            <div class="row">
              <div class="col-lg-4 col-md-5 mb-4">
                <div class="card card-user h-100">
                  <div class="image">
                    <img src="<?php echo $basepath ?>packageimages/quote-1.png" alt="..."/>
                  </div>
                  <div class="card-content">
                    <div class="author">
                      <img class="avatar border-white" src="<?php echo $basepath ?>packageimages/<?php echo $row['profileimg']; ?>" alt="..."/>
                      <h4 class="card-title"><?php echo $row['Name']; ?><br />
                      <a href="#"><small><?php echo $row['UserName']; ?></small></a>
                      </h4>
                    </div>
                    <p class="description text-center mb-2">
                      <?php echo $row['jobProfile']; ?>
                    </p>
                    <p class="description text-center">
                      <?php echo $row['exp']; ?>
                    </p>
                  </div>
                </div>
              </div>

              <div class="col-lg-8 col-md-7 mb-4">
                <div class="card h-100">
                              <div class="card-header text-center">
                                  <h4 class="card-title">Admin</h4>
                                  <p class="category">Profile</p>
                              </div>
                              <div class="card-content">
                            <div id="my-tab-content" class="tab-contentz text-center">
                                
                                <div class="tab-panel" id="profile">
                                    <div class="card">
                                      <img src="packageimages/quoteimg.jpg" alt="" class="card-img">
                                    </div>
                                    <div class="location">
                                      <p><i class="ti-location-pin"></i> <?php echo $row['location']; ?></p>
                                      <p><i class="ti-notepad"></i> <?php echo $row['exp']; ?></p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                                    <p>Here are your messages.</p>
                                </div>
                            </div>
                              </div>
                          </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
</div>
</div>
<?php include 'includes/footer.php'; ?>

</div>
</div>
<?php include 'includes/scripts.php'; ?>
</body>
</html>