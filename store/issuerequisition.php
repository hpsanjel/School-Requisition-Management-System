<?php
session_start();
?>
<?php
include('../includes/config.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

        <div class="col-md-3">
			<?php
			include_once('storemenu.php');
			?>
         </div>
        
        <div class="col-md-9 container-fluid" >
            <table class="table table-striped">
               
                <?php
                $sql = "select * from tbl_order where status = 1 order by orderedDate DESC";
                $result = mysqli_query($con, $sql);
                $num_rows = mysqli_num_rows($result);
                
                if($num_rows<1){
                    ?><h3><span class = "label label-primary">No any request! Please visit later.</span></h3><?php
                }
                else{
                     ?><tr><th>Order ID</th><th>Order Date</th><th>Requested By</th><th>Particulars</th><th>For</th><th>Purpose</th><th>Action<br /> (Please print first)</th></tr><?php
                }
                if(! $result )
                    {
                      die('No new orders found: ' . mysql_error());
                    }
                    while($row = mysqli_fetch_array($result))
                    {
                    ?>
                     <tr><td><?php echo $row[0]; ?></td><td><?php echo $row[1];?></td><td><?php echo $row[2];?></td><td><?php echo $row[3]."<br>".$row[4]."<br>".$row[5]."<br>".$row[6]."<br>".$row[7];?></td><td><?php if($row[8]==""){ echo $row[9];} if($row[9]==""){ echo $row[8];} if($row[8]!="" & $row[9]!=""){ echo $row[8]."/".$row[9];}?></td><td><?php if ($row[10]!=""){echo "<b>Student's Purpose:</b> ".$row[10]."</br>";} if ($row[11]!=""){echo "<b>Teacher's Purpose:</b> ".$row[11];}?></td><td> <a href="print.php?orderid=<?php echo $row[0]; ?>"> Print </a> | <a href="issued.php?orderid=<?php echo $row[0]; ?>">Issue</a> </td></tr>
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
