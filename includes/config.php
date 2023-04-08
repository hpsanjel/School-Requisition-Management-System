
<!-- php hatako
$con = mysqli_connect("localhost","root","","db_rgreq");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }-->


<?php
$con = mysqli_connect('localhost', 'root', '') or exit('Sorry we cannot connect you right now');
$db = mysqli_select_db($con, "db_rgreq") or exit(mysql_error());
$DB_HOST="localhost";
	$DB_USER="root";
	$DB_PASS="";
	$DB_NAME="db_rgreq";
	$site_url="http://localhost/rgreq/";
        $myroot = "";
$KEY="RG Online Requisition Management System";
require_once($myroot."mydb.class.php");
require_once($myroot."mysecurity.class.php");
require_once($myroot."myfunctions.class.php");
$mydb=new mydb($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
$mysec=new mysecurity();
$myfun=new myfunctions();
?>