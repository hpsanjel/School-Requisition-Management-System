<?php
session_start();
include_once("includes/config.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RG Requisition Management System</title>
<?php include "includes/headfiles.php"; ?>

<!--    
      <script>
  $(document).ready(function() {
    $( "#dialog-message" ).dialog({
      modal: true,
      buttons: {
        Ok: function() {
          $( this ).dialog( "close" );
        }
      }
    });
  });
  </script>-->
</head>

    <body>
        <?php
        include_once('includes/header.php');
        ?>

        <div class="container">
          <div class="wrapper">
                <form class="form-signin" method="POST">       
                <center><img class="img-responsive" width="100px" src="images/rg_logo.ico"></img></center><br>


             <?php
                if($_SERVER["REQUEST_METHOD"]=="POST")
                        {
                        $username = addslashes($_POST['username']);
                        $password = md5(addslashes($_POST['password']));
                        $sql = "SELECT * FROM TBL_USERS WHERE username='$username' AND password = '$password'";
                        $result = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($result);

                        if($count==1)
                                {
                                $_SESSION['username'] = $username;
                                $row = mysqli_fetch_array($result);
                                $_SESSION['fullName'] = $row[1];
                                $_SESSION['userName'] = $row[2];
                                $_SESSION['email'] = $row[4];
                                $_SESSION['userMode'] = $row[5];
                                $_SESSION['grade']=$row[10];
                                $_SESSION['code']=$row[8];
                                $_SESSION['userimage']=$row[6];

                                if($_SESSION['code']=="")
                                    {
                                        if($_SESSION['userMode']=='admin'){
                                        $myfun->redirect("rushi/index.php");
                                        }
                                        if($_SESSION['userMode']=='staff'){
                                        $myfun->redirect("staff/index.php");
                                        }
                                        if($_SESSION['userMode']=='principal'){
                                        $myfun->redirect("principal/index.php");
                                        }
                                        if($_SESSION['userMode']=='store'){
                                        $myfun->redirect("store/index.php");
                                        }
                                        if($_SESSION['userMode']=='reception'){
                                        $myfun->redirect("reception/index.php");
                                        }
                                    }
                                else{
                                $myfun->redirect("changepassword.php");
                                }
                                }
                        else{
                            echo "<center><font color='red'>Please enter correct username/password!</font></center>";
                        }


         }
        ?>       

              <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" /> </br>
              <input type="password" class="form-control" name="password" placeholder="Password" required=""/> </br>     
              <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
            </form>
          </div>
        </div>
        <script src="js/jquery-1.12.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
