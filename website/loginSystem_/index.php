<?php 
    include_once 'header.php';
?>
            <?php
                if(isset($_SESSION["useremail"])){
                    echo "<li><a href="profile.php">PROFILE</a></li>";
                    echo "<li><a href="logout.inc.php">LOgOUT</a></li>";
                }else{
                    echo "<a href="signIn_Up.php">SIGN IN</a>";
                }
            ?> 


<?php
    include_once 'footer.php';