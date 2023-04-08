<?php
session_start();
include('../includes/config.php');
?>

<?php
if(isset($_POST['createUser'])){
$fullname = addslashes($_POST['fullname']);
$username = addslashes($_POST['username']);
$password = md5(addslashes($_POST['password']));
$email = addslashes($_POST['email']);
$grade = addslashes($_POST['grade']);
$mode = addslashes($_POST['mode']);
$logintime = date("Y-m-d");    
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
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
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, New User Not Added in a system! Try again!";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $sql = "insert into tbl_users(fullName, userName, passWord, email, userMode,imageURL, loginTime, code) values('$fullname','$username','$password','$email','$mode','$target_file','$logintime','abc')";
    
    $retval = mysqli_query($con, $sql);
    if(! $retval )
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
<title>User Setup - Rajarshi Gurukul</title>
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
			include('principalmenu.php');
		?>
                     
      </div>
      <div class="col-md-4">
<form method="post" name="form_usersetup" enctype="multipart/form-data">
<h3 style="color:#A29933">User Setup</h3>
<!--<button type="submit" class="btn btn-primary" name="UploadCSV" id="UploadCSV">Add directly  from Excel File</button>-->
   <div id="status"></div>
   
   <div class="form-group">
    <label for="mode">User Mode</label>
        <select name="mode" class="form-control" id="mode">
           <option value="0">-- Select --</option>
           <option value="principal">Principal</option>
           <option value="admin">Admin</option>
           <option value="staff">Staff</option>
           <option value="store">Store</option>
           <option value="reception">Reception</option>
       	</select>
  </div>
  
   <div class="form-group">
    <label for="fullname">Full Name</label>
    <input type="text" class="form-control" placeholder="Full name" name="fullname" id="fullname" />
  </div>
   <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" placeholder="username" name="username" id="username" value="" />

  </div>
  
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" placeholder="password" name="password" id="password" value="" />
  </div>
  
  <div class="form-group">
    <label for="email">Email</label>
        <input type="email" class="form-control" placeholder="email" name="email" id="email" />
  </div>
   
   <div class="form-group">
    <label for="grade">Grade Teacher of </label>
        <input type="text" class="form-control" placeholder="grade teacher?" name="grade" id="grade" />
  </div>
   
   <div class="form-group">
    <label for="fileToUpload">Photo</label>
        <input type="file" name="fileToUpload" id="fileToUpload" />
  </div>
  
  

      <button type="submit" class="btn btn-primary" name="createUser" id="createUser">Create User</button>
</form>
      </div>
        <div class="col-md-5">
            <?php
                $sqll = "select * from tbl_users order by userId DESC";
                $result = mysqli_query($con, $sqll);
                $num_rows = mysqli_num_rows($result);
            ?>
            <h3 style="color:#A29933">Active Users ( <?php echo $num_rows;?> )</h3>
                <table class="table table-hover table-responsive">
                
                
                <?php
                if($num_rows<1){
                    ?><h3><span class = "label label-primary">No any users! Please visit later.</span></h3><?php
                }
                else{
                    ?><tr><th>Photo</th><th>Full Name</th><th>Username</th><th>Mode</th><th>Delete</th></tr><?php
                }
                if(! $result )
                    {
                      die('No new orders found: ' . mysqli_error());
                    }
                    while($row = mysqli_fetch_array($result))
                    {
                    ?>
                    <tr><td><img src="<?php if($row[6]==""){ echo "../uploads/users.png";} else {echo $row[6];}?>" width="50px"></img></td><td><?php echo $row[1]; ?></td><td><?php echo $row[2];?></td><td><?php echo $row[5];?></td><td><a href="deleteuser.php?userID=<?php echo $row[0] ;?>" onclick="return confirm('Are you sure you want to delete this item?');"><img src="../images/delete.png" width="20px"></img></a></td></tr>
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
