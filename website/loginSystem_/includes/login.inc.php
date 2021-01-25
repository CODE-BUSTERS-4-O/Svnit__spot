<?php

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    echo "login";
    require_once '../includes/dbh.inc.php';
    require_once '../includes/functions.inc.php';


    if(emptyInputLogin($email, $pwd) !== false){
        header("location: ../signIn_Up.php?error=emptyinput");
        exit();
    }
    

    loginUser($conn, $email, $pwd);

    
}else{
    header("location: ../signIn_Up.php");
    exit();
}
?>