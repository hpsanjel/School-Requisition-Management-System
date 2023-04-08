<?php
session_start();
?>
<?php
include('../includes/config.php');
if(!isset($_SESSION['userMode']) && $_SESSION['userMode']!="reception" ){
$myfun->redirect("../index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard - Rajarshi Gurukul</title>
<?php include '../includes/headfiles.php'; ;?>
<style type="text/css">
.box{
width:200px;
height:200px;
float:left;
padding:40px;
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
			include_once('receptionmenu.php');
			?>
         </div>
        
        <div class="col-md-9 container-fluid" >
<!--            <select class="form_control" height="30px" title="Select date to filter">
                <option>---Select Date to Filter Data</option>
                <?php
                $sqldate = "select DISTINCT ab_date from tbl_absentees order by ab_date  DESC";
                $resultdate = mysqli_query($con, $sqldate);
                while($rowdate = mysqli_fetch_array($resultdate))
                {
                ?>
                <option><?php echo $rowdate['ab_date'];?></option>
                <?php
                }
                ?>
            </select>
            <button class="btn btn-primary">Filter by date</button>-->
        <?php
        $date = date('Y/m/d');        
        $sqll = "select * from tbl_absentees where ab_date='$date' order by ab_id  DESC";
                $result = mysqli_query($con, $sqll);
                $num_rows = mysqli_num_rows($result);
                
            ?>
            <h3 style="color:#A29933"> Total number of absentees today i.e. on <?php echo $date;?> : <?php echo $num_rows;?> </h3>
                <table class="table table-striped table-responsive">
                
                
                <?php
                if($num_rows<1){
                    ?><h3><span class = "label label-primary">No any records found!</span></h3><?php
                }
                else{
                    ?><tr><th>Absent on</th><th>Name of the absentees</th><th>Grade</th><th>Grade teacher</th><th>Detail</th><th>Reason</th></tr><?php
                }
                if(! $result )
                    {
                      die('No records found: ' . mysqli_error());
                    }
                    while($row = mysqli_fetch_array($result))
                    {
                    ?>
                    <tr><td><?php echo $row[1];?></td><td><?php echo $row[8];?></td><td><?php echo $row[3];?></td><td><?php echo $row[4] ?></td><td><a href="updatereason.php?stuName=<?php echo $row['stuName'];?>&ab_id=<?php echo $row['ab_id'];?>">View Details</a></td><td><?php echo $row[5] ?></td></tr>
                    <?php   
                    }
                    ?>
                
            </table>
            
        
        
        <?php
        $datee = date('Y/m/d');        
        $sqlll = "select * from tbl_absentees where ab_status=0 order by ab_id  DESC";
                $resultt = mysqli_query($con, $sqlll);
                $num_rowss = mysqli_num_rows($resultt);
                
            ?>
            <h3 style="color:#A29933"> Total number of absentees (unable to contact) : <?php echo $num_rowss;?> </h3>
                <table class="table table-striped table-responsive">
                
                
                <?php
                if($num_rowss<1){
                    ?><h3><span class = "label label-primary">No any records found!</span></h3><?php
                }
                else{
                    ?><tr><th>Absent on</th><th>Name of the absentees</th><th>Grade</th><th>Grade teacher</th><th>Detail</th><th>Reason</th></tr><?php
                }
                if(! $resultt )
                    {
                      die('No records found: ' . mysqli_error());
                    }
                    while($roww = mysqli_fetch_array($resultt))
                    {
                    ?>
                    <tr><td><?php echo $roww[1];?></td><td><?php echo $roww[8];?></td><td><?php echo $roww[3];?></td><td><?php echo $roww[4] ?></td><td><a href="updatereason.php?stuName=<?php echo $roww['stuName'];?>&ab_id=<?php echo $roww['ab_id'];?>">View Details</a></td><td><?php echo $roww[5] ?></td></tr>
                    <?php   
                    }
                    ?>
                
            </table>
        </div>
        
        
       

</div>

<script src="../js/jquery-2.1.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
