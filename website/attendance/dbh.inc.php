<?php
    $serverName="localhost";
    $dBUsername="Prince";
    $dBPassword="Prince@1234";
    $dBName="attendance";
    
    $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

    if(!$conn){
        echo "Connection failed";
        die("Connection failed: ". mysqli_connect_error());
        exit();
    }
?>