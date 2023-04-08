<?php
session_start();
?>
<?php
include('../includes/config.php');
?>

<?php

if(isset($_POST['sendforapproval'])){
    if($_POST['items']==""){
    echo "<script type='text/javascript'>alert('Items cannot be blank!');</script>";
    }
    else{
    $reqby = $_POST['reqby'];
       // $date = $_POST['date'];
    $items = $_POST['items'];
    
    $forstu = $_POST['forstudent'];
    $stupurpose = $_POST['divstudentpurpose'];
    $fortea = $_POST['forteacher'];
    $teapurpose = $_POST['divteacherpurpose'];
    
    $pieces = explode(",", $items);
    $totalno = count($pieces);
    $item1 = $pieces[0];
    $item2 = $pieces[1];
    $item3 = $pieces[2];
    $item4 = $pieces[3];
    $item5 = $pieces[4];

    $sql = "insert into tbl_order(orderedBy, item1,item2,item3,item4,item5, forstudent, stupurpose, forteacher, teapurpose, status) values('$reqby', '$item1','$item2','$item3','$item4','$item5','$forstu','$stupurpose','$fortea','$teapurpose',0)";
    $result = mysqli_query($con, $sql);

    if($result)
    {
        echo '<script type="text/javascript">alert("Ordered successfully sent for approval to the co-ordinator!"); location.href="fillrequisition.php"</script>';
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
<title>Dashboard - Rajarshi Gurukul</title>
<?php include '../includes/headfiles.php'; ;?>

<script type="text/javascript">
   window.onload = function() {
  document.getElementById("items").focus();
};
    </script>

<script type="text/javascript">
    function ShowHideDivstudent(forstudent) {
        var divstudentpurpose = document.getElementById("divstudentpurpose");
        divstudentpurpose.style.display = forstudent.checked ? "block" : "none";
    }
    </script>

 <script type="text/javascript">
    function ShowHideDivteacher(forteacher) {
        var divteacherpurpose = document.getElementById("divteacherpurpose");
        divteacherpurpose.style.display = forteacher.checked ? "block" : "none";
    }
 </script>

<script type="text/javascript">
 function validate() {
  if(fillreqform.items.value.length==0)
  {
    document.getElementById('erritems').innerHTML="Please fill at least an item to proceed!";
  }
  else{
    document.getElementById('erritems').innerHTML="";
  }
 }
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
                    <h3 class="panel-title">Requisition Form</h3>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" role="form" name="fillreqform">
                        <div class="form-group">
                            <label for="reqby" class="col-sm-2 control-label">Requested By</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="reqby" name="reqby" value="<?php echo $_SESSION['fullName'] ?>" placeholder="<?php echo $_SESSION['fullName'] ?>">
                            </div>
                        </div>

<!--                        <div class="form-group">
                            <label for="date" class="col-sm-2 control-label">Date of order</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="date" name="date" placeholder="Today's date" value="<?php echo date("Y-m-d H:i:s") ?>"></input>
                            </div>
                        </div>-->

                        <div class="form-group">
                            <label for="items" class="col-sm-2 control-label">Items</label>
                            <div class="col-sm-10">
                                <div id="erritems" style="color: darkred"></div>
                                <textarea type="textarea" class="form-control" id="items" name="items"  placeholder="Maximum 5 items separated by commas" onblur="validate()"></textarea>
                                <label>Eg: Exercise copies (math)- 100 copies, Board marker - 2, Pencils - 10</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">

                                <label for="forstudent">
                                    <input type="checkbox" name="forstudent" id="forstudent" value="student" onclick="ShowHideDivstudent(this)"> For student </br>
                                    <div id="divstudentpurpose" style="display: none">
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="divstudentpurpose" name="divstudentpurpose"  placeholder="Purpose...." /></br>
                                        </div>
                                    </div>
                                </label>
                                </br>
                                </hr>

                                <label for="forteacher">
                                    <input type="checkbox" name="forteacher" id="forteacher" value="teacher" onclick="ShowHideDivteacher(this)"> For teacher </br>
                                    <div id="divteacherpurpose" style="display: none">
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="divteacherpurpose" name="divteacherpurpose"  placeholder="Purpose...." />
                                        </div>
                                    </div>
                                </label>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="btn btn-default" name="sendforapproval" value="Send requisition for approval"></input>
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
