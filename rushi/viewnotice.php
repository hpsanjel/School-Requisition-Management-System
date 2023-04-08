<?php
session_start();
?>
<?php
include('../includes/config.php');
if(!isset($_SESSION['userMode']) && $_SESSION['userMode']!="staff" ){
$myfun->redirect("../index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard - Rajarshi Gurukul</title>
<?php include '../includes/headfiles.php'; ;?>
</head>

<body>

<?php
include_once('../includes/header.php');
?>
<div class="container">

        <div class="col-md-3">
			<?php
			include_once('rushimenu.php');
			?>
         </div>
        
        <div class="col-md-9 container-fluid" >
        <?php
                $sqll = "select * from tbl_notice order by notID DESC";
                
                $result = mysqli_query($con, $sqll);
                $num_rows = mysqli_num_rows($result);
            ?>
            
        <button class="btn btn-primary btn-md" type="button">Notices<span class="badge"><?php echo $num_rows;?></span></button>
        <table class="table table-hover table-responsive">
                
                
                <?php
                if($num_rows<1){
                    ?><h3><span class = "label label-primary">No any notices! </span></h3><?php
                }
                else{
                    ?><tr><th>Notice No.</th><th>Date</th><th>Subject</th><th>Notice</th><th>From</th></tr><?php
                }
                if(! $result )
                    {
                      die('No new complains found: ' . mysqli_error($con));
                    }
                    while($row = mysqli_fetch_array($result))
                    {
                    ?>
                    <tr><td><?php echo $row[0];?></td><td><?php echo $row[1];?></td><td><?php echo $row[2] ;?></td><td><?php echo $row[3] ;?></td><td><?php echo $row[4] ;?></td></tr>
                    <?php   
                    }
                    ?>
               
                
            </table>
        </div>
        
        
       

</div>

<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
