<?php
include('../includes/config.php');
$userID = htmlspecialchars($_GET["userID"]);
$sql = "delete from tbl_users where userId = '$userID'";
$retval = mysqli_query($con, $sql);
if(!$retval){
    echo "Cannot be deleted!".mysql_error();
}
else{
   $myfun->redirect("usersetup.php");
}
?>