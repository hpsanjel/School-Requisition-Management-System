<?php
include('../includes/config.php');
$userID = htmlspecialchars($_GET["userID"]);
$sql = "select * from tbl_users where userId = '$userID'";
$retval = mysqli_query($con, $sql);
if(!$retval){
    echo "Cannot be retrived!".mysqli_error();
}
else{
?>
<form method="post" name="form_userupdate" enctype="multipart/form-data">
<h3 style="color:#A29933">User Update</h3><hr>
   <div id="status"></div>
   
   <div class="form-group">
    <label for="mode">User Mode</label>
        <select name="mode" class="form-control" id="mode">
           <option value="0">-- Select --</option>
           <option value="<?php echo $row[5];?>">Admin</option>
           <option value="staff">Staff</option>
           <option value="store">Store</option>
       	</select>
  </div>
  
   <div class="form-group">
    <label for="fullname">Full Name</label>
    <input type="text" class="form-control" placeholder="Full name" name="fullname" id="fullname" />
  </div>
   <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" placeholder="username" name="username" id="username" />

  </div>
  
  <div class="form-group">
    <label for="password">Password</label>
        <input type="password" class="form-control" placeholder="password" name="password" id="password" />
  </div>
  
  <div class="form-group">
    <label for="email">Email</label>
        <input type="email" class="form-control" placeholder="email" name="email" id="email" />
  </div>
   
   <div class="form-group">
    <label for="fileToUpload">Photo</label>
        <input type="file" name="fileToUpload" id="fileToUpload" />
  </div>
  
  

      <button type="submit" class="btn btn-primary" name="createUser" id="createUser">Create User</button>
</form>
<?php
    //$myfun->redirect("usersetup.php");
}
?>