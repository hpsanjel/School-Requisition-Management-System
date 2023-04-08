<?php
session_start();
?>

<?php
include('../includes/config.php');
if(!isset($_SESSION['userMode']) && $_SESSION['userMode']!="reception" ){
$myfun->redirect("../index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<title>Dashboard - Rajarshi Gurukul</title>
<?php include '../includes/headfiles.php'; ;?>

<style>
.box{
width:200px;
height:200px;
float:left;
padding:40px;
text-align:center;
}


</style>
</head>

<body>
<!---Navbar--->
<?php
include_once('../includes/header.php');
?>
<div class="container">

        
  <div class="col-md-12 container-fluid" >
<form action="processreasonupdate.php" method="POST">            
<?php
include('../includes/config.php');
$stuname = $_GET['stuName'];
$_SESSION['ab_id'] = $_GET['ab_id'];
$ab_id = $_SESSION['ab_id'];
$_SESSION['date'] = date('Y/m/d') ; $date = $_SESSION['date']; $_SESSION['day'] = date('w', strtotime($date)); $day = $_SESSION['day'];
$query = "SELECT b.ab_id, b.ab_date, b.ab_day, a.stuID, a.stuName, a.stuGrade, a.stuAddress,  a.stuFNo, a.stuMNo, a.stuHomeNo, a.stuBus,a.stuHouse, a.stuECA1, a.stuECA2,  b.ab_reason FROM tbl_students a, tbl_absentees b WHERE a.stuName = '$stuname' && ab_date='$date' && ab_id = '$ab_id'";
$out = mysqli_query($con, $query);
$count = mysqli_num_rows($out);


if($out){
?>
<table class="table table-hover table-responsive">
    <tr><th>Absent on</th><th>Name of the absentees</th><th>Grade</th><th>Address</th><th>Father"s contact</th><th>Mother's Contact</th><th>Residence contact</th><th>ECA First</th><th>ECA Second</th><th>Reason</th><th>Update</th></tr><?php
    }
    if(!$out )
        {
          die('No records found: ' . mysqli_error());
        }
        while($row = mysqli_fetch_array($out))
        {
        ?>
   
    <tr><td><?php echo $row['ab_date'];?></td><td><?php echo $row['stuName'];?></td><td><?php echo $row['stuGrade'];?></td><td><?php echo $row['stuAddress']; ?><td><?php echo $row['stuFNo']; ?></td><td><?php echo $row['stuMNo']; ?></td><td><?php echo $row['stuHomeNo']; ?></td><td><?php echo $row['stuECA1']; ?></td><td><?php echo $row['stuECA2']; ?></td><td><textarea rows="3" cols="5" width="50px" name="ab_reason_txt" id="ab_reason_txt" placeholder="<?php echo $row['ab_reason'];?>"></textarea></td><td><input type="submit" value="Update" name="update_reason"></input></td></tr>
<?php   
        }
 ?>
</table>
<?php
    
?>
      </form>
    </div>
        
        
       

</div>

<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

