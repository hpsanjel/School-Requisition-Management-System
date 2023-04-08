<?php
session_start();
session_destroy();
session_unset();
$_SESSION['userName']="";
?>
<script>
alert("You are successfully logout.\nThank you.");
</script>
<font color='#336699'>Please Wait ...</font>
<meta http-equiv="refresh" content="0;URL=../rg/index.php"> 