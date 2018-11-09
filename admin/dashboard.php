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
$msg="Created Successfully";
}
else
{
$error=" Something went wrong. Please try again";
}
}
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "DELETE from tbltodos WHERE tid=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
// $msg="Skill deleted";
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
                        <div class="row justify-content-center">
                        <div class="col-md-6">
                            <!-- Zero Configuration Table -->
                            <div class="card">
<div class="card-header">
<h4 class="card-title">Todos</h4>
</div>
<div class="card-content">
<div class="table-full-width table-tasks">
<table class="table">
<tbody>
    <?php
                        $query = "SELECT * FROM tbltodos";
                        $stmtz = $dbh->prepare( $query );
                        $stmtz->execute();
                        while($row=$stmtz->fetch(PDO::FETCH_ASSOC)){
                        ?>
    <tr>
        <td>
            <div class="form-check checkbox">
                <input class="form-check-input" type="checkbox" value="" data-toggle="checkbox">
                <label class="form-check-label" class="checkbox"></label>
            </div>
        </td>
        <td><?php echo $row[title]; ?></td>
        <td class="td-actions text-right">
            <div class="table-icons">
                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                <i class="ti-pencil-alt"></i>
                </button>
                <a href="dashboard?del=<?php echo $row[tid];?>" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs" onclick="alert('You Surely want to delete it')">
                <i class="ti-close"></i>
                </a>
            </div>
        </td>
    </tr>
    <?php } ?>
</tbody>
</table>
</div>
</div>
<div class="card-footer">
<hr>
<?php if($error){?>
                      <div class="alert errorWrap"><button type="button" class="close" data-dismiss="alert">×</button><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div>
                      <?php }
                      else if($msg){?>
                      <div class="alert succWrap"><button type="button" class="close" data-dismiss="alert">×</button><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
                      <?php }?>
<div class="stats">
<form name="post" method="post" enctype="multipart/form-data">
<div class="form-group">
    <input type="text" class="form-control" name="sltitle" id="sltitle" placeholder="What to do!" required>
</div>
<button type="submit" name="submit" class="btn btn-fill btn-info">Create</button>
</form>
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