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
$sql="update admin set Name=:aname, Email=:aemail, Username=:ausername, jobProfile=:aprofile, location=:alocation, exp=:experience";
$query = $dbh->prepare($sql);
$query->bindParam(':aname',$aname,PDO::PARAM_STR);
$query->bindParam(':aemail',$aemail,PDO::PARAM_STR);
$query->bindParam(':ausername',$ausername,PDO::PARAM_STR);
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
									<a href="profile">
										<i class="ti-panel"></i>
										<span class="text">User Profile</span>
									</a>
								</li>
								<li>
									<a href="">
										<i class="ti-user"></i>
										<span class="text">User Profile</span>
									</a>
								</li>
							</section>
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
												<a href="profile-image?imgid=<?php echo htmlentities($result->id);?>">
													<img class="avatar border-white" src="<?php echo $basepath ?>packageimages/<?php echo $row['profileimg']; ?>" alt="..."/>
													<div class="change-user-image">
														<a href="profile-image?imgid=<?php echo htmlentities($result->id);?>" class="btn btn-warning btn-fill btn-icon btn-sm">
															<i class="ti-paint-roller"></i>
														</a>
													</div>
												</a>
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
										<div class="card-header">
											<h4 class="card-title">Edit Profile</h4>
										</div>
										<div class="card-content">
											<form method="post" name="proup" class="form-horizontal" onSubmit="return valid();">
												<?php if($error){?>
												<div class="alert errorWrap alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
													<strong>ERROR</strong>:<?php echo htmlentities($errorup); ?>
												</div>
												<?php }
												else if($msgup){?>
												<div class="alert succWrap"><button type="button" class="close" data-dismiss="alert">×</button>
													<strong>SUCCESS</strong>:<?php echo htmlentities($msgup); ?>
												</div>
												<?php }?>
												<div class="row">
													<div class="col-lg-6 col-md-12">
														<div class="form-group">
															<label for="company">Company</label>
															<input type="text" class="form-control border-input" disabled name="dcompany" id="dcompany" placeholder="Company" value="Creating Conversion">
														</div>
													</div>
													<div class="col-lg-6 col-md-6">
														<div class="form-group">
															<label for="username">Username</label>
															<input type="text" class="form-control border-input" id="username" name="username" placeholder="Username" value="<?php echo $row[UserName]; ?>" required>
														</div>
													</div>
													<div class="col-lg-6 col-md-6">
														<div class="form-group">
															<label for="email">Email address</label>
															<input type="email" class="form-control border-input" id="email" name="email" placeholder="Email" value="<?php echo $row[Email];?>" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="name">Name</label>
															<input type="text" class="form-control border-input" id="name" name="name" placeholder="User" value="<?php echo $row[Name];?>" required>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="jprofile">Job Profile</label>
															<input type="text" class="form-control" id="jprofile" name="jprofile" placeholder="What you do" value="<?php echo $row[jobProfile];?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="locate">Location</label>
															<input type="text" class="form-control border-input" id="locate" name="locate" placeholder="Home Address" value="<?php echo $row[location];?>">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label>About Me</label>
															<textarea rows="5" class="form-control border-input" id="inputExperience" name="inputExperience" placeholder="Here can be your description or experience"><?php echo $row[exp]; ?>
															</textarea>
														</div>
													</div>
												</div>
												<div class="text-center">
													<button type="submit" name="submitup" class="btn btn-info btn-fill btn-wd">Update Profile</button>
												</div>
												<div class="clearfix"></div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-8"><div class="card">
											<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">
												<div class="card-header">
													<h4 class="card-title">
													Change Password
													</h4>
												</div>
												<div class="card-content">
													<?php if($error){?>
													<div class="alert errorWrap"><button type="button" class="close" data-dismiss="alert">×</button>
														<strong>ERROR</strong>:<?php echo htmlentities($error); ?>
													</div>
													<?php }
													else if($msg){?>
													<div class="alert succWrap"><button type="button" class="close" data-dismiss="alert">×</button>
														<strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?>
													</div>
													<?php } ?>
													<div class="form-group">
														<label>Current Password</label>
														<input type="password" name="password" id="password" placeholder="Enter current Password" class="form-control">
													</div>
													<div class="form-group">
														<label>New Password</label>
														<input type="password" name="newpassword" id="newpassword" placeholder="Latest Password" class="form-control">
													</div>
													<div class="form-group">
														<label>Confirm Password</label>
														<input type="password" name="confirmpassword" id="confirmpassword" placeholder="Password Surety" class="form-control">
													</div>
													<div class="text-center"><button name="submit" type="submit" class="btn btn-fill btn-info btn-wd btn-block">Submit</button></div>
												</div>
											</form>
										</div> <!-- end card --></div>
							</div>
								<?php } ?>
							</div>
						</div>
						<?php include 'includes/footer.php'; ?>
					</div>
				</div>
			</body>
			<?php include 'includes/scripts.php'; ?>
		</html>