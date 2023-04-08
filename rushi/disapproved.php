<?php
include('../includes/config.php');
$orderID = htmlspecialchars($_GET["orderid"]);
$sql = "update tbl_order set status=-1 where orderID = $orderID";
$retval = mysqli_query($con, $sql);
if(!$retval){
    echo "OOPS! something went wrong, please try again!".mysql_error();
}
else{
   $myfun->redirect("viewrequisition.php");
}
?>