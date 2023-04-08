    <ul id="sidebar" class="nav nav-pills nav-stacked" style="max-width: 250px;">
        <img class="img-responsive" width="100px" src="../images/rajarshi logo final.png"></img><br>
        
        <li class="active"><a href="index.php"><span class="glyphicon glyphicon-menu-hamburger"></span> Staff Menu</a></li>
                <li><a href="../staff/fillrequisition.php"><span class="glyphicon glyphicon-duplicate"></span> Fill Requisition Form</a></li>
                <li><a href="../staff/viewnotice.php"><span class="glyphicon glyphicon-duplicate"></span> View Notice</a></li>
                <li><a href="../staff/postcomplain.php"><span class="glyphicon glyphicon-info-sign"></span> Post Complain</a></li>
                <li><a href="../staff/postcompliment.php"><span class="glyphicon glyphicon-check"></span> Post Compliment</a></li>
                <?php if(($_SESSION['grade'])!=""){?>
                <li><a href="../staff/studentsetup.php"><span class="glyphicon glyphicon-user"></span> Student Setup Form</a></li>
                <li><a href="../staff/attendance.php?stugrade=<?php echo $_SESSION['grade'];?>"><span class="glyphicon glyphicon-info-sign"></span> Take Daily Attendance</a></li>
                <li><a href="../staff/absenteesupdate.php?stugrade=<?php echo $_SESSION['grade'];?>"><span class="glyphicon glyphicon-duplicate"></span> Absentees Update</a></li>
                <?php
                }
                ?>
        <li><a href="../logout.php"><span class="glyphicon glyphicon-off"></span> Log Out</a></li>
    </ul>