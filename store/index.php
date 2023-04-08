<?php
session_start();
?>
<?php
include('../includes/config.php');
if(!isset($_SESSION['userMode']) && $_SESSION['userMode']!="store" ){
$myfun->redirect("../index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard - Rajarshi Gurukul</title>
<?php include '../includes/headfiles.php'; ;?>
<style type="text/css">
.box{
width:200px;
height:200px;
float:left;
padding:40px;
text-align:center;
}
#imgbg {
    position: fixed;
    margin-top: -150px;
    top: 100%;
    left: 100%;
    margin-left: -120px;
    z-index: 11000;
}
#imgbg img{
    width: 100px;
}
</style>
</head>

<body>
<!---Navbar--->
<?php
include_once('../includes/header.php');
?>
<div class="container">
    <div id="imgbg"><img class="img-responsive" width="100px" src="../images/rajarshi logo final.png"></img></div><br>

        <div class="col-md-3">
			<?php
			include_once('storemenu.php');
			?>
         </div>
        
        <div class="col-md-9 container-fluid" >
        <?php
                $sqll = "select * from tbl_order order by orderedDate DESC";
                $result = mysqli_query($con, $sqll);
                $num_rows = mysqli_num_rows($result);
            ?>
            <h3 style="color:#A29933"> Requisition Records ( <?php echo $num_rows;?> )</h3>
                <table class="table table-striped table-responsive">
                
                
                <?php
                if($num_rows<1){
                    ?><h3><span class = "label label-primary">No any records found!</span></h3><?php
                }
                else{
                    ?><tr><th>Date</th><th>Requested By</th><th>Requested Items</th><th>Status</th></tr><?php
                }
                if(! $result )
                    {
                      die('No records found: ' . mysqli_error());
                    }
                    while($row = mysqli_fetch_array($result))
                    {
                    ?>
                    <tr><td><?php echo $row[1];?></td><td><?php echo $row[2];?></td><td><?php echo $row[3]."<br>".$row[4]."<br>".$row[5]."<br>".$row[6]."<br>".$row[7];?></td><td><?php if($row[12]==-1){echo "Disapproved by Rushi";} if($row[12]==1){echo "<strong><p style='color:blue'>Forwarded by Rushi!</p></strong>" ;} if($row[12]==2){ echo "Already dispatched";} if($row[12]==0){ echo "Request received by Rushi";} ?></td></tr>
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
