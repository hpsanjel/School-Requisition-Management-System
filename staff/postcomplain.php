<?php
session_start();
?>
<?php
include('../includes/config.php');
?>

<?php

if(isset($_POST['sendcomplain'])){
    if($_POST['complain']==""){
    echo "<script type='text/javascript'>alert('What is the complain? It cannot be blank!');</script>";
    }
    else{
   $reqby = addslashes($_POST['reqby']);
   $complain = addslashes($_POST['complain']);
   $stuname = addslashes($_POST['stunames']);
   $witness = addslashes($_POST['witness']);
   //$stuID = addslashes($_POST['stuID']);
    $sql = "insert into tbl_complain(stuNAME, complain, complainedBY, witness, status, complainDate) values('$stuname','$complain','$reqby','$witness',0, now())";
    $result = mysqli_query($con, $sql);

    if($result)
    {
        echo '<script type="text/javascript">alert("Complain successfully sent to Principal!"); location.href="postcomplain.php"</script>';
    }
    else{
      echo "OOPS! something went wrong!".mysqli_error($con);  
    }
    }
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Post Complain</title>
<?php include '../includes/headfiles.php'; ;?>
<script type="text/javascript">
   window.onload = function() {
  document.getElementById("stunames").focus();
};
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
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Complain Form</h3>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" role="form" name="fillreqform">
                        
                        <div class="form-group">
                            <label for="reqby" class="col-sm-2 control-label">Posted By</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="reqby" name="reqby" value="<?php echo $_SESSION['fullName'] ?>" placeholder="<?php echo $_SESSION['fullName'] ?>"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="stuname" class="col-sm-2 control-label">Student</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="stunames" id="stunames">
                                    <option value="0">--- Select Student ---</option>
                                <?php
                                $qrystu = "select stuName, stuGrade from tbl_students order by stuName";
                                $result = mysqli_query($con, $qrystu);
                                
                                while($row = mysqli_fetch_array($result))
                                {
                                ?>
                                    <option value="<?php echo $row['stuName'] ;?>"><?php echo $row['stuName']." | ". $row['stuGrade'] ;?></option>
                                <?php   
                                }
                                
                                ?>
                                   
                                </select>
                                
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="witness" class="col-sm-2 control-label">Witnessed by</label>
                            <div class="col-sm-10">
                                
                                <input type="text" class="form-control" name="witness" id="witness"/>
                            </div>
                        </div>
                      
                        
                        <div class="form-group">
                            <label for="complain" class="col-sm-2 control-label">Detail Info</label>
                            <div class="col-sm-10">
                                <div id="erritems" style="color: darkred"></div>
                                <textarea type="textarea" class="form-control" id="complain" name="complain"  placeholder="What did you see? What do you want to share with Principal?" onblur="validate()"></textarea>
                                <label>Please provide brief information!</label>
                            </div>
                        </div>

                       

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="btn btn-primary" name="sendcomplain" value="Submit Complain"></input>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php
                $sqll = "select * from tbl_complain where complainedBY = '".$_SESSION['fullName']."' order by complainID DESC";
                
                $result = mysqli_query($con, $sqll);
                $num_rows = mysqli_num_rows($result);
            ?>
            <h3 style="color:#A29933">Total complains filed: ( <?php echo $num_rows;?> )</h3>
        <h3><b>History</b></h3>
        <table class="table table-hover table-responsive">
                
                
                <?php
                if($num_rows<1){
                    ?><h3><span class = "label label-primary">No any previous record! </span></h3><?php
                }
                else{
                    ?><tr><th>Student Name</th><th>Complain</th><th>Complained By</th><th>Complained Date</th><th>Remarks</th></tr><?php
                }
                if(! $result )
                    {
                      die('No new complains found: ' . mysqli_error($con));
                    }
                    while($row = mysqli_fetch_array($result))
                    {
                    ?>
                    <tr><td><?php echo $row[1];?></td><td><?php echo $row[2];?></td><td><?php echo $row[3] ;?></td><td><?php echo $row[6] ;?></td><td><?php if($row[5]==1){echo 'Noted by Principal';} else echo 'Principal has not noted';?></td></tr>
                    <?php   
                    }
                    ?>
               
                
            </table>
        </div>
    </div>
    
    
</div>

        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
