<?php
session_start();
$grade = $_SESSION['grade'];
$teacher = $_SESSION['fullName'];
?>
<?php
include('../includes/config.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Absentees Update - Rajarshi Gurukul</title>
<?php include '../includes/headfiles.php'; ;?>
</head>

<body>

<?php
include_once('../includes/header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php
            include_once('staffmenu.php');
            ?>
        </div>
        
        <div class="col-md-9 container-fluid" >
        </br>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Attendance Record of Grade <b><?php echo $grade; ?></b> </h3>
                    Today's Date: <b><?php $_SESSION['date'] = date('Y/m/d') ; $date = $_SESSION['date']; echo $_SESSION['date']; $_SESSION['day'] = date('w', strtotime($date)); $day = $_SESSION['day'];  ?></b></br>
                Grade Teacher: <b><?php echo $_SESSION['fullName'] ;?></b>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" name="attendanceForm">
                        <div class="form-group">
                         <table class="table table-striped">
                             
                        <?php
                         $sql = "select * from tbl_absentees where stu_grade='$grade' && ab_status = 1 order by ab_date DESC";
                         
                         $result = mysqli_query($con, $sql);
                         
                         $num_rows = mysqli_num_rows($result);
                         if($num_rows<1){
                            ?><h3><span class = "label label-primary">No students found.</span></h3><?php
                            }
                            else{
                              ?><tr><th>Absent Date/Day</th><th>Students' Name</th><th>Reason for being absent</th></tr><?php
                              }
                         while($row = mysqli_fetch_array($result))
                        {
                             
                        ?>
                              
                              <tr><td><?php echo $row[1];?></td><td><?php echo $row[8];?></td><td><?php echo $row[5];?></td></tr>
                        <?php   
                        
                        }
                        ?>
                        
                         <table class="table table-striped">
                             
                        <?php
                         $sql = "select * from tbl_absentees where stu_grade='$grade' && ab_status = 0 order by ab_date DESC";
                         
                         $result = mysqli_query($con, $sql);
                         
                         $num_rows = mysqli_num_rows($result);
                         if($num_rows<1){
                            echo "";
                            }
                            else{
                              ?>
                             <tr><td colspan="3">Parents of following students are not REACHABLE!</td></tr>     
                             <tr><th>Absent Date/Day</th><th>Students' Name</th><th>Status</th></tr><?php
                              }
                         while($row = mysqli_fetch_array($result))
                        {
                             
                        ?>
                              
                              <tr><td><?php if($row[1]==$_SESSION['date']){echo "Today";}else {echo $row[1];}?></td><td><?php echo $row[8];?></td><td><?php echo "NOT REACHABLE";?></td></tr>
                        <?php   
                        
                        }
                        ?>
                        
                             
                         </table>    
                         </table>
                            
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
