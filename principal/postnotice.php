<?php
session_start();
?>
<?php
include('../includes/config.php');
if(!isset($_SESSION['userMode']) && $_SESSION['userMode']!="admin" ){
$myfun->redirect("../index.php");
}
?>
<?php
if(isset($_POST['btn_notice'])){
    $notice = addslashes($_POST['notice']);
if($notice==""){
    echo "<script type='text/javascript'>alert('Notice cannot be blank!');</script>";
    }
    else{
   $notice = addslashes($_POST['notice']);
   
   $subject = addslashes($_POST['subject']);
   $notFrom = addslashes($_POST['notFrom']);
   //$stuID = addslashes($_POST['stuID']);
    $sql = "insert into tbl_notice(notDate, notSubject, notice, notFrom) values(now(),'$subject','$notice','$notFrom')";
    $result = mysqli_query($con, $sql);

    if($result)
    {
        echo '<script type="text/javascript">alert("Notice successfully sent!"); location.href="postnotice.php"</script>';
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
<title>Post Notice</title>
<?php include '../includes/headfiles.php'; ;?>
</head>

<body>

<?php
include_once('../includes/header.php');
?>
<div class="container">

        <div class="col-md-3">
			<?php
			include_once('principalmenu.php');
			?>
         </div>
        
        <div class="col-md-9" >
            <form method="POST">
                <div class="form-group">
                    Date <input type="date" name="date" class="form-control" value="<?php echo 'HEHE';?>" />
                    <hr/>
                    Subject <input type="text" name="subject" class="form-control" placeholder="Subject goes here"/>
                    <hr/>
                    Notice <textarea rows="10" type="textarea" class="form-control" id="notice" name="notice"  placeholder="Notice goes here" ></textarea><br/>
                    Send as a  <select name="notFrom" class="form-control">
                            <option>Principal</option>
                            <option>Co-ordinator</option>
                            <option>Accountant</option>
                            </select>
                    <hr></hr> 
                   <button type="submit" class="form-control btn-primary" name="btn_notice" value="Send Notice">Publish Notice</button>
                            
                </div>
            </form>
        </div>
</div>

<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
