<?php
include('../includes/config.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard - Rajarshi Gurukul</title>
<?php include '../includes/headfiles.php'; ;?>
<style type="text/css">
    #printdiv{
        width: 440px;
        margin: 10px 0 0 5px;
        padding: 10px 0 0 15px;
        border: #000 solid thin;
        
    }
    #gap{
        position: fixed;
        top: 480px;
        right: 425px;
        
    }
</style>
</head>
<body>

        <div style="margin-top: 10px"></div>
<!--        <button onclick="PrintContent('printdiv')">Print Order</button>-->

<div id="printdiv" style="margin-top: 5px; min-height: 500px">
<?php
$orderID = htmlspecialchars($_GET["orderid"]);
$sql = "select * from tbl_order where orderID = $orderID";
$retval = mysqli_query($sql);
$row = mysql_fetch_row($retval);
if(!$retval){
    echo "OOPS! something went wrong, please try again!".mysql_error();
}
else{
    ?>
    <img src="../images/rajarshiheader.jpg" alt="Rajarshi Gurukul" width="250px"></img><p align="right" style="padding-right:10px">Order ID: <strong><?php echo $row[0]; ?></strong></p>
    <hr></hr>
    <p>Items requested by <strong><?php echo "$row[2]"; ?></strong> on <strong><?php echo "$row[1]"; ?></strong> </p>
    <?php if ($row[10]!=""){echo "<b>Student's Purpose:</b> ".$row[10]."</br>";} if ($row[11]!=""){echo "<b>Teacher's Purpose:</b> ".$row[11];}?></strong>
   
   <table class="table table-hover" style="width:400px">
       <?php 
        if($row[3]!=""){
       ?>
       <tr><td><?php echo $row[3]; ?></td><td>&nbsp;</td></tr>
       <?php
        }
       ?>
        
        
         <?php 
        if($row[4]!=""){
       ?>
       <tr><td><?php echo $row[4]; ?></td><td>&nbsp;</td></tr>
       <?php
        }
       ?>
        
        
         <?php 
        if($row[5]!=""){
       ?>
       <tr><td><?php echo $row[5]; ?></td><td>&nbsp;</td></tr>
       <?php
        }
       ?>
        
        
         <?php 
        if($row[6]!=""){
       ?>
       <tr><td><?php echo $row[6]; ?></td><td>&nbsp;</td></tr>
       <?php
        }
       ?>
        
        
         <?php 
        if($row[7]!=""){
       ?>
       <tr><td><?php echo $row[7]; ?></td><td>&nbsp;</td></tr>
       <?php
        }
       ?>
        
       
    </table>
   
       <table border="0" width="400px">
           <tr><td align="left">................</td><td align="right">....................</td></tr>
           <tr><td align="left">For Store</td><td align="right"><?php echo $row[2]; ?></td></tr>
       </table>
   
   
    <?php
}
 ?>
    
        </div>
    

<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
window.print();
</script>
</body>

</html>
