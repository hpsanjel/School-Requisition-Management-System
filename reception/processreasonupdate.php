<?php
session_start();
?>
<?php
include('../includes/config.php');
if(!isset($_SESSION['userMode']) && $_SESSION['userMode']!="reception" ){
$myfun->redirect("../index.php");
}
?>
<?php
if ( isset( $_POST['update_reason'] ) ) { 
    $ab_id = $_SESSION['ab_id'];
    $reason = $_POST['ab_reason_txt'];
    $query = "Update tbl_absentees set ab_reason = '$reason', ab_status = 1 where ab_id=$ab_id";
    $out = mysqli_query($con, $query);
    $myfun->redirect("index.php");
}
if ( isset( $_POST['update_reason_all'] ) ) { 
    $ab_id = $_SESSION['ab_id'];
    $reason = $_POST['ab_reason_txt'];
    $query = "Update tbl_absentees set ab_reason = '$reason', ab_status = 1 where ab_id=$ab_id";
    $out = mysqli_query($con, $query);
    $myfun->redirect("index.php");
}
?>