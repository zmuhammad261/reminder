<?php
session_start();
error_reporting(0);
include('includes/config.php');
// include("checklogin.php");
if(strlen($_SESSION['alogin'])==0)
{
header('location:index.php');
}
//Create a todo
if(isset($_POST['submit']))
{
$stitle=$_POST['sltitle'];
$sql="INSERT INTO tbltodos(title) VALUES(:stitle)";
$query = $dbh->prepare($sql);
$query->bindParam(':stitle',$stitle,PDO::PARAM_STR);
// $query->bindParam(':sid',$sid,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
header("Location: " . $_SERVER['REQUEST_URI'] . "?submit=true");
$msg=" Slide Created Successfully";
}
else
{
$error=" Something went wrong. Please try again";
}
}
if(isset($_REQUEST['eid']))
{
$eid=intval($_GET['eid']);
$status=1;
$sql = "UPDATE tblcontactusquery SET status=:status WHERE  id=:eid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> execute();
$msg=" Query Successfully Inactive";
}
if(isset($_REQUEST['del']))
{
$did=intval($_GET['del']);
$sql = "delete from tblcontactusquery WHERE  id=:did";
$query = $dbh->prepare($sql);
$query-> bindParam(':did',$did, PDO::PARAM_STR);
$query -> execute();
$msg="Record deleted Successfully ";
}
?>
<!doctype html>
<html lang="en">
    <head>
        <?php include 'includes/stylesheet.php'; ?>
        <style type="text/css">
        .checkbox input[type=checkbox]:checked + span.text{
        text-decoration: line-through;
        }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <?php include 'includes/sidebar.php'; ?>
            <div class="main-panel">
                <?php include 'includes/header.php'; ?>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="icon-big icon-danger text-center">
                                                    <i class="ti-pulse"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <?php
                                                $sql ="SELECT id from tblcontactusquery";
                                                $query = $dbh -> prepare($sql);
                                                $query->execute();
                                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                $contactz=$query->rowCount();
                                                ?>
                                                <div class="numbers text-center text-md-right">
                                                    <p>Queries</p>
                                                    <?php echo htmlentities($contactz);?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <hr />
                                        <div class="stats footer-title">
                                            <i class="ti-timer"></i> In the last hour
                                        </div>
                                        <div class="float-right">
                                            <a href="manage-conactusquery" class="btn btn-danger btn-fill btn-icon btn-sm">
                                                <i class="ti-angle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            <!-- Zero Configuration Table -->
                            <div class="card card-default">
                                <div class="card-body">
                                    <?php if($error){?>
                                    <div class="alert errorWrap">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>ERROR</strong>:<?php echo htmlentities($error); ?>
                                    </div>
                                    <?php }
                                    else if($msg){?>
                                    <div class="alert succWrap">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?>
                                    </div>
                                    <?php }?>
                                    <table id="dtablez" class="table table-striped table-bordered mt-3" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Message</th>
                                                <th>Posting date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sql = "SELECT * from  tblcontactusquery ORDER by id DESC LIMIT 5";
                                            $query = $dbh -> prepare($sql);
                                            $query->execute();
                                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt=1;
                                            if($query->rowCount() > 0)
                                            {
                                            foreach($results as $result)
                                            {               ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt);?></td>
                                                <td><?php echo htmlentities($result->name);?></td>
                                                <td><?php echo htmlentities($result->EmailId);?></td>
                                                <td><?php echo htmlentities($result->Message);?></td>
                                                <td><?php echo htmlentities($result->PostingDate);?></td>
                                                <?php if($result->status==1)
                                                {
                                                ?>
                                                <td class="text-center">
                                                    <i class="ti-check text-success"></i>
                                                    <a class="pl-3" href="dashboard?del=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to delete')" ><i class="ti-close text-danger"></i></a>
                                                </td>
                                                    <?php } else {?>
                                                <td class="text-center">
                                                    <a href="dashboard?eid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Mark it as read?')" ><i class="ti-email text-primary"></i></a>
                                                    <a class="pl-3" href="dashboard?eid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to delete')" ><i class="ti-close text-danger"></i></a>
                                                </td>
                                                <?php } ?>
                                            </tr>
                                            <?php $cnt=$cnt+1; }} ?>
                                        </tbody>
                                    </table>
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