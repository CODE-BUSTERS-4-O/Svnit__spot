<?php 
    require_once './dbh.inc.php';

    if(isset($_POST['submit'])){
        $sem = $_POST["sem"];
        $name = $_POST["name"];
        $type = $_POST["type"];
        $subject = $_POST["subject"];
        ?>
        <table>
            <tr> download</tr>
        </table>
        <?php
            $query = mysqi_query("SELECT fName from filedata WHERE fName = ? ;");
            
    }
