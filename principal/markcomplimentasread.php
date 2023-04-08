<?php
include('../includes/config.php');
$complimentID = htmlspecialchars($_GET["complimentID"]);
$sql = "update tbl_compliment set status=1 where complimentID = $complimentID";
$retval = mysqli_query($con, $sql);
if(!$retval){
    echo "OOPS! something went wrong, please try again!".mysql_error();
}
else{
   $myfun->redirect("viewcompliment.php");
}
?>