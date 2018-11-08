<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
	$imgid=intval($_GET['imgid']);
if(isset($_POST['submit']))
{
$proimage=$_FILES["pflimage"]["name"];
move_uploaded_file($_FILES["pflimage"]["tmp_name"],"packageimages/".$_FILES["pflimage"]["name"]);
$sql="update admin set profileimg=:proimage where id=:imgid";
$query = $dbh->prepare($sql);
$query->bindParam(':imgid',$imgid,PDO::PARAM_STR);
$query->bindParam(':proimage',$proimage,PDO::PARAM_STR);
$query->execute();
$msg=" Image Changed Successfully";
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
										<span class="text">Profile Image</span>
									</a>
								</li>
							</section>
							<div class="row">
					<div class="col-md-12">
						<div class="card card-default">
							<div class="card-body">
								<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
								else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<div class="tab-content">
									<div class="tab-pane active" id="horizontal-form">
										<form class="form-horizontal" name="team" method="post" enctype="multipart/form-data">
											<?php
											$imgid=intval($_GET['imgid']);
											$sql = "SELECT profileimg from admin where id=:imgid";
											$query = $dbh -> prepare($sql);
											$query -> bindParam(':imgid', $imgid, PDO::PARAM_STR);
											$query->execute();
											$results=$query->fetchAll(PDO::FETCH_OBJ);
											$cnt=1;
											if($query->rowCount() > 0)
											{
											foreach($results as $result)
											{	?>
											<div class="form-group row">
												<label for="focusedinput" class="col-md-2 offset-1 control-label"> Team Member Image </label>
												<div class="col-md-8">
													<img src="packageimages/<?php echo htmlentities($result->profileimg);?>" width="auto">
												</div>
											</div>
											<div class="form-group row">
												<label for="focusedinput" class="col-md-2 offset-1 control-label">New Image</label>
												<div class="col-md-8">
													<!-- <input type="file" name="pflimage" id="pflimage" required> -->
													<input type="file" name="pflimage" id="pflimage" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
													<label class="bg-info" for="pflimage"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
												</div>
											</div>
											<div class="row">
												<div class="col-md-8 offset-3">
													<button type="submit" name="submit" class="btn-primary btn">Update</button>
													<a class="btn btn-dark" href="profile">Back</a>
												</div>
											</div>
											<?php }} ?>
										</form>
									</div>
								</div>
							</div>
						</div>
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
<?php } ?>