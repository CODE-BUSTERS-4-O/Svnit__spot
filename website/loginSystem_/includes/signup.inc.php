<?php

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $rePwd = $_POST["rePwd"];

    require '../includes/dbh.inc.php';
    require '../includes/functions.inc.php';

    if(emptyInputSignup($name, $email, $pwd, $rePwd) !== false){
        header("location: ../signIn_Up.php?error=emptyinput");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location: ../signIn_Up.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($pwd, $rePwd) !== false){
        header("location: ../signIn_Up.php?error=passwordsdontmatch");
        exit();
    }
    if(emailExists($conn,$email) !== false){
        header("location: ../signIn_Up.php?error=emailtaken");
        exit();
    }

    createUser($conn, $name, $email, $pwd);
    header("location: ../signUp.html");
    exit();
    
}else{
    header("location: ../signIn_Up.php");
    exit();
}
?>