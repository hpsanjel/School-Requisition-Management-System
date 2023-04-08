<?php
include('../includes/config.php');
$stuID = htmlspecialchars($_GET["stuID"]);
$sql = "delete from tbl_students where stuID = '$stuID'";
$retval = mysqli_query($sql);
if(!$retval){
    echo "Cannot be deleted!".mysql_error();
}
else{
   $myfun->redirect("studentsetup.php");
}
?>