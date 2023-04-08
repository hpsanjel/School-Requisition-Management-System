<?php
include('../includes/config.php');
$complainID = htmlspecialchars($_GET["complainID"]);
$sql = "update tbl_complain set status=1 where complainID = $complainID";
$retval = mysqli_query($con, $sql);
if(!$retval){
    echo "OOPS! something went wrong, please try again!".mysql_error();
}
else{
   $myfun->redirect("viewcomplain.php");
}
?>