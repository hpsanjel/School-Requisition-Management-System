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
<title>Dashboard - Rajarshi Gurukul</title>
<?php include '../includes/headfiles.php'; ;?>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
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
                    <h3 class="panel-title">Daily Attendance of Grade <b><?php echo $_SESSION['grade']; ?></b> </h3>
                    Date: <b><?php $_SESSION['date'] = date('Y/m/d') ; $date = $_SESSION['date']; echo $_SESSION['date']; $_SESSION['day'] = date('w', strtotime($date)); $day = $_SESSION['day'];  ?></b></br>
                Grade Teacher: <b><?php echo $_SESSION['fullName'] ;?></b>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" name="attendanceForm">
                        <div class="form-group">
                         <table class="table table-striped">
                             
                        <?php
                         $sql = "select * from tbl_students where stuGrade = '$grade' order by stuName";
                         $result = mysqli_query($con, $sql);
                         $num_rows = mysqli_num_rows($result);
                         if($num_rows<1){
                            ?><h3><span class = "label label-primary">No students found.</span></h3><?php
                            }
                            else{
                              ?><tr><th>Students' Name</th><th>Grade</th><th>Father's Contact No.</th><th>Mother's Contact No.</th><th>Bus</th><th>Mark Absentees</th></tr><?php
                              }
                         while($row = mysqli_fetch_array($result))
                        {
                             
                        ?>
                              
                              <tr><td><?php echo $row[1];?></td><td><?php echo $row[2];?></td><td><?php echo $row[6];?></td><td><?php echo $row[7];?></td><td><?php echo $row[10];?></td><td><input type="checkbox" name="absent[]" value="<?php echo $row[1];?>"></input></td></tr>
                        <?php   
                        
                        }
                        ?>
                        
                              <tr><td colspan="6"><button class="btn btn-primary" name="list_ab">Send name-list of the absentees to reception</button></td></tr>
                         </table>
                            <div id="list_ab">
                                 <?php
                                 if(isset($_POST['list_ab'])){
                                 if(!empty($_POST['absent'])){
                                 $absentees = $_POST['absent'];
                                 
                                 $absenteescount = count($_POST['absent']);
                                 $i = 0;
                                 if($absenteescount>1){
                                 echo "<u><h4>Following absentees name-list is successfully sent to the reception!<h4></u>";
                                 }
                                 else{
                                 echo "<u><h4>Following absentee's name is successfully sent to the reception!</h4></u>";  
                                 }
                                 
                                 While($i < sizeof($absentees))
                                 {
                                 echo "<h4>" .($i+1).") ".$absentees[$i] . "</h4>";
                                 $sql = "insert into tbl_absentees(ab_date, ab_day, stuName, stu_grade, grade_teacher) values('$date','$day','$absentees[$i]', '$grade', '$teacher')";
                                 $result = mysqli_query($con, $sql);
                                 
                                 $i++;
                                 }
                                 
                                 }
                                 else{
                                     echo '<script type="text/javascript"> alert("Oops! No absentees are selected!");</script>';
                                 }
                                 }
                                 
                                 ?>
                            </div>
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
