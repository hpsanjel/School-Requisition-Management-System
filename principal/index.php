<?php
session_start();
?>
<?php
include('../includes/config.php');
if(!isset($_SESSION['userMode']) && $_SESSION['userMode']!="admin" ){
$myfun->redirect("../index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard - Rajarshi Gurukul (Prinicpal)</title>
<?php include '../includes/headfiles.php'; ;?>
<style type="text/css">
.box{
width:200px;
height:200px;
float:left;
//padding:40px;
text-align:center;
}
#imgbg {
    position: fixed;
    margin-top: -150px;
    top: 100%;
    left: 100%;
    margin-left: -120px;
    z-index: 11000;
}
#imgbg img{
    width: 100px;
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
			include_once('principalmenu.php');
			?>
         </div>
        
        <div class="col-md-9">
            <div class="spaceup">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Quick Navigation</h3>
                </div>
                <div class="panel-body">
                    <table class="table-responsive" class='bg-success' cellpadding="20px" cellspacing="20px">
                        <tr><td><center><img src="../images/admission.png" height="200px"/> <br/> View Requisition</center></td><td><td><center><img src="../images/admission.png" height="100px"/> <br/> View Requisition</center></td><td><td><center><img src="../images/admission.png" height="100px"/> <br/> View Requisition</center></td>
                        
                        <td><center><img src="../images/admission.png" height="200px"/> <br/> View Requisition</center></td><td><td><center><img src="../images/admission.png" height="100px"/> <br/> View Requisition</center></td><td><td><center><img src="../images/admission.png" height="100px"/> <br/> View Requisition</center></td></tr>
                    </table>
                </div>
            </div>
            </div>
            
        </div>
</div>

<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
