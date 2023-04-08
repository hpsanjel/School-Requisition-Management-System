<?php
session_start();
$grade = $_SESSION['grade'];
$teacher = $_SESSION['fullName'];
?>
<?php
include('../includes/config.php');
if(!isset($_SESSION['userMode']) && $_SESSION['userMode']!="staff" ){
$myfun->redirect("../index.php");
}
?>
    <?php 
    if(isset($_POST["Import"]))
    {
    echo $filename=$_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"] > 0)
    {
    $file = fopen($filename, "r");
    //$sql_data = "SELECT * FROM prod_list_1 ";
    while (($emapData[] = fgetcsv($file, 10000, ",")) !== FALSE)
    {
    //print_r($emapData);
    //exit();
    $sql = "INSERT into tbl_students(stuID, stuName, stuGrade, stuSection, stuAddress, stuHouse, stuFNo, stuMNo, stuHomeNo, stuDOB, stuBus, stuGender, stuECA1, stuECA2) values ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]','$emapData[8]','$emapData[9]','$emapData[10]','$emapData[11]','$emapData[12]','$emapData[13]')";
    mysql_query($sql);
    }
    fclose($file);
    echo 'CSV File has been successfully Imported';
    }
    else
    echo 'Invalid File: Please Upload CSV File';
    }
    ?>
<?php
if(isset($_POST['createStudent'])){
$stuID = addslashes($_POST['stuid']);
$stuName = addslashes($_POST['stuname']);
$stuGrade = addslashes($_POST['stugrade']);
$stuSection = addslashes($_POST['stusection']);
$stuAddress = addslashes($_POST['stuaddress']);
$stuHouse = addslashes($_POST['stuhouse']);
$stuFNo = addslashes($_POST['stufno']);
$stuMNo = addslashes($_POST['stumno']);
$stuHomeNo = addslashes($_POST['stuhomeno']);
//$password = md5(mysql_real_escape_string($_POST['password']));
$stuDOB = addslashes($_POST['studob']);
$stuBus = addslashes($_POST['stubus']);
$stuGender = addslashes($_POST['stugender']);
$stuECA1 = addslashes($_POST['stueca1']);
$stuECA2 = addslashes($_POST['stueca2']);
//$mode = mysql_real_escape_string($_POST['mode']);
$logintime = date("Y-m-d");    
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.".mysql_error();
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, New User Not Added in a system! Try again!".mysql_error();
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $sql = "insert into tbl_students(stuID, stuName, stuGrade, stuSection, stuAddress,stuHouse, stuFNo, stuMNo, stuHomeNo, stuDOB, stuBus, stuGender, stuECA1, stuECA2,stuImage) values('$stuID','$stuName','$stuGrade','$stuSection','$stuAddress','$stuHouse','$stuFNo','$stuMNo','$stuHomeNo','$stuDOB','$stuBus','$stuGender','$stuECA1','$stuECA2','$target_file')";
    $retval = mysqli_query($con, $sql);
    if(!$retval )
        {
            die('Could not enter data: ' . mysqli_error());
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Setup - Rajarshi Gurukul</title>
<?php include '../includes/headfiles.php'; ;?>
     <script type="text/javascript">
        $("#username").keyup(function(){
        var pass = $('#username').val();
        $("#password").val(pass);
        });
    </script>
</head>

<body>
<?php
include('../includes/header.php');

?>

<div class="container" style="min-height:500px">
    <div class="row">
      <div class="col-md-3">
      <?php
			include('staffmenu.php');
		?>
                     
      </div>
      <div class="col-md-4">
    <form enctype="multipart/form-data" method="post" role="form">
                            <div class="form-group">
                                     <label for="exampleInputFile">Import Student Data</label>
                                     <input type="file" name="file" id="file" size="150">
                                    <p class="help-block">
                                            Only Excel/CSV File Import.
                                    </p>
                            </div>
                             <button type="submit" class="btn btn-default" name="Import" value="Import">Import</button>
    </form>          
<form method="post" name="form_studentsetup" enctype="multipart/form-data">
<h3 style="color:#A29933">Student Setup</h3>
   <div id="status"></div>
   
   <div class="form-group">
    <label for="stuid">Student ID</label>
    <input type="text" class="form-control" placeholder="Student ID" name="stuid" id="stuid" maxlength="15" />
  </div>
   
   <div class="form-group">
    <label for="stuname">Full Name</label>
    <input type="text" class="form-control" placeholder="Full name" name="stuname" id="fullname" />
  </div>
   
   <div class="form-group">
    <label for="stugrade">Grade</label>
    <input type="text" class="form-control" value="<?php echo $grade;?>" name="stugrade" id="stugrade" />
  </div>
  
  <div class="form-group">
    <label for="stusection">Section</label>
    <input type="text" class="form-control" placeholder="A" value="A" name="stusection" id="stusection" />
  </div>
   
   <div class="form-group">
    <label for="stuaddress">Address</label>
    <input type="text" class="form-control" placeholder="Current Address" name="stuaddress" id="stuaddress" />
  </div>


    <div class="form-group">
    <label for="stuhouse">House</label>
    <select name="stuhouse" class="form-control" id="mode">
           <option value="0">-- Select --</option>
           <option value="Rock">Rock</option>
           <option value="Sun">Sun</option>
           <option value="Tree">Tree</option>
           <option value="Water">Water</option>
    </select>
    </div>

    <div class="form-group">
    <label for="stufno">Father's Contact No.</label>
    <input type="text" class="form-control" placeholder="Father's Contact No." name="stufno" id="stufno" maxlength="10" />
    </div>

     <div class="form-group">
    <label for="stumno">Mother's Contact No.</label>
    <input type="text" class="form-control" placeholder="Father's Contact No." name="stumno" id="stumno" maxlength="10" />
    </div>

    <div class="form-group">
    <label for="stuhomeno">Home Contact No.</label>
    <input type="text" class="form-control" placeholder="Home Contact No." name="stuhomeno" id="stuhomeno" maxlength="10" />
    </div>

    <div class="form-group">
    <label for="studob">DOB</label>
    <input type="text" class="form-control" placeholder="Date of birth (Eg. 2060/12/05)" name="studob" id="studob" />
    </div>

    <div class="form-group">
    <label for="stubus">Bus No.</label>
    <select name="stubus" class="form-control" id="mode">
           <option value="0">-- Select --</option>
           <option value="BO1">BO1</option>
           <option value="BO2">BO2</option>
           <option value="BO3">BO3</option>
           <option value="BO4">BO4</option>
           <option value="BO5">BO5</option>
           <option value="BO6">BO6</option>
           <option value="BO7">BO7</option>
           <option value="VO1">VO1</option>
           <option value="VO2">VO2</option>
    </select>
    </div>

    <div class="form-group">
    <label for="stugender">Gender</label>
    <select name="stugender" class="form-control" id="mode">
           <option value="0">-- Select --</option>
           <option value="Male">Male</option>
           <option value="Female">Female</option>
    </select>
    </div>

    <div class="form-group">
    <label for="stueca1">ECA 1</label>
    <input type="text" class="form-control" placeholder="ECA 1" name="stueca1" id="stueca1" />
    </div>

    <div class="form-group">
    <label for="stueca2">ECA 2</label>
    <input type="text" class="form-control" placeholder="ECA 2" name="stueca2" id="stueca2" />
    </div>

   <div class="form-group">
    <label for="fileToUpload">Photo</label>
        <input type="file" name="fileToUpload" id="fileToUpload" />
  </div>
  
  

      <button type="submit" class="btn btn-primary" name="createStudent" id="createStudent">Add Student</button>
</form>
      </div>
        <div class="col-md-5">
            <?php
                $sqll = "select * from tbl_students where stuGrade='$grade' order by stuName";
                $result = mysqli_query($con, $sqll);
                $num_rows = mysqli_num_rows($result);
            ?>
            <h3 style="color:#A29933">Active Students ( <?php echo $num_rows;?> )</h3>
                <table class="table table-hover table-responsive">
                
                
                <?php
                if($num_rows<1){
                    ?><h3><span class = "label label-primary">No any students! Please visit later.</span></h3><?php
                }
                else{
                    ?><tr><th>Photo</th><th>Full Name</th><th>Grade</th><th>Contact No.</th><th>Delete</th></tr><?php
                }
                if(! $result )
                    {
                      die('No new students found: ' . mysql_error());
                    }
                    while($row = mysqli_fetch_array($result))
                    {
                    ?>
                    <tr><td><img src="<?php if($row[14]==""){ echo "../uploads/users.png";} else {echo $row[14];}?>" width="50px"></img></td><td><?php echo $row[1]; ?></td><td><?php echo $row[2];?></td><td><?php echo $row[6]."</br>".$row[7]."</br>".$row[8];?></td><td><a href="deletestudent.php?stuID=<?php echo $row[0] ;?>" onclick="return confirm('Are you sure you want to remove the student data from the system?');"><img src="../images/delete.png" width="20px"></img></a></td></tr>
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
