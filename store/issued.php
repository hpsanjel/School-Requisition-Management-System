<?php
include('../includes/config.php');
$orderID = htmlspecialchars($_GET["orderid"]);
$sql = "update tbl_order set status=2 where orderID = $orderID";
$retval = mysqli_query($con, $sql);
if(!$retval){
    echo "OOPS! something went wrong, please try again!".mysqli_error();
}
else{
    $myfun->redirect("issuerequisition.php");
}
?>