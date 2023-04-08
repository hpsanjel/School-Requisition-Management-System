 <?php
                    if(isset($_POST['senddate'])){
                        $datee = addslashes($_POST['datepickerr']);
                        echo "You selected: ".$datee;
                    }
                    else{
                        echo "";
                    }
                    
                    ?>
<html>
	<head>
		<?php include '../includes/headfiles.php'; ?>
		<script>
			$(document).ready(function () {
				$("#datepicker").datepicker();
			});
		</script>
	</head>
	<body>
		
                <form method="post" action="jq.php">
                    <p>Date: <input id="datepicker" name="datepickerr"  type="text"></p>
                    <input type="submit" name="senddate" value="Submit Date"/>
                </form>
	<body>
</html>