<?php
session_start();
$fullName = $_SESSION['fullName'];
?>
<?php
include('includes/config.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password - Rajarshi Gurukul</title>
<meta name="description" content="Rajarhi Gurukul School" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-theme.css" />
<link rel="icon" type="image/ico" href="images/favicon.ico">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/notify.js"></script>
<link rel="stylesheet" href="css/notify.css" />
</head>

<body>

<?php
include_once('includes/header.php');
?>
<div class="container">
    <div class="row">
      <div class="col-md-3">
			
      </div>
        
        
      <div class="col-md-6">
	
          <form class="form-signin" method="POST">       
                <center><img class="img-responsive" width="100px" src="images/rajarshi logo final.png"></img></center><br>


             <?php
                if($_SERVER["REQUEST_METHOD"]=="POST")
                        {
                        $username = addslashes($_SESSION['userName']);
                        //$password = md5(addslashes($_POST['password']));
                        $password = md5(addslashes($_POST['password']));
                        $sql = "UPDATE TBL_USERS SET password = '$password', code='' WHERE username='$username'";
                        $result = mysqli_query($con, $sql);
                        

                                if($result)
                                    {
                                        if($_SESSION['userMode']=='admin'){
                                        $myfun->redirect("rushi/index.php");
                                        }
                                        if($_SESSION['userMode']=='staff'){
                                        $myfun->redirect("staff/index.php");
                                        }
                                        if($_SESSION['userMode']=='store'){
                                        $myfun->redirect("store/index.php");
                                        }
                                        if($_SESSION['userMode']=='reception'){
                                        $myfun->redirect("reception/index.php");
                                        }
                                        if($_SESSION['userMode']=='principal'){
                                        $myfun->redirect("principal/index.php");
                                        }
                                    }
                                else{
                                $myfun->redirect("changepassword.php");
                                }
                                }
                        else{
                            echo mysqli_error($con);
                        }
       ?>       

                    <center>You must change your password now! Please enter a new password for your account!</center><br/>
              <input type="password" class="form-control" name="password" placeholder="New Password" autocomplete="off"/> </br>     
              <button class="btn btn-lg btn-primary btn-block" type="submit">Change password now and proceed!</button>   
            </form>
      
      </div>
        
        
      <div class="col-md-3">
			
      </div>
        
    </div>
</div>

        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
