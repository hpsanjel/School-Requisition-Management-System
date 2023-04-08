<?php
session_start();
?>
<?php
include('../includes/config.php');
if(!isset($_SESSION['userMode']) && $_SESSION['userMode']!="staff" ){
$myfun->redirect("../index.php");
}
?>
 <?php
                $sqll = "select * from tbl_order where orderedBy = '".$_SESSION['fullName']."' order by orderedDate DESC";
                $result = mysqli_query($con, $sqll);
                $num_rows = mysqli_num_rows($result);
            ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard - Rajarshi Gurukul</title>
<?php include '../includes/headfiles.php'; ;?>
<script>
$(document).ready(function(){
    $("#datepicker").datepicker();
    })
</script>
<script>
$('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script>

<style type="text/css">
.box{
width:200px;
height:200px;
float:left;
padding:40px;
text-align:center;
}
.welcome{
    float: right;
}

</style>
</head>

<body>
<!---Navbar--->
<?php
include_once('../includes/header.php');
?>
<div class="container">
    
    
    
    <div class="row">
        <div class="welcome"><img class="img img-circle" src="<?php echo $_SESSION['userimage'];?>" title="<?php echo $_SESSION['fullName'];?>" width="50px"></img></label></div>
    </div>
        <div class="col-md-3">
			<?php
			include_once('staffmenu.php');
			?>
         </div>
   
        <div class="col-md-9 container-fluid" >
       
            <button class="btn btn-primary btn-md" type="button"> Your Order Records <span class="badge"><?php echo $num_rows;?></span></button>
                <table class="table table-striped table-responsive">
                
                
                <?php
                if($num_rows<1){
                    ?><h3><span class = "label label-primary">No any records found!</span></h3><?php
                }
                else{
                    ?><tr><th>Date</th><th>Ordered Items</th><th>Status</th></tr><?php
                }
                if(! $result )
                    {
                      die('No records found: ' . mysql_error());
                    }
                    while($row = mysqli_fetch_array($result))
                    {
                    ?>
                    <tr><td><?php echo $row[1];?></td><td><?php echo $row[3]."<br>".$row[4]."<br>".$row[5]."<br>".$row[6]."<br>".$row[7];?></td><td><?php if($row[12]==-1){echo "<font color='red'>Disapproved</font>";} if($row[12]==1){echo "Forwarded to Store" ;} if($row[12]==2){echo "<font color='green'>Accepted and dispatched</font>";} if($row[12]==0){echo "<font color='brown'>Request sent for validation</font>";} ?></td></tr>
                    <?php   
                    }
                    ?>
                
            </table>
        </div>
        
<!--       <p>Date: <input id="datepicker" type="text"></p> -->
       

</div>

<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
