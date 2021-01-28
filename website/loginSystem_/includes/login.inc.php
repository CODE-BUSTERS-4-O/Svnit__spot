<?php

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    echo "login";
    require_once './dbh.inc.php';
    require_once './functions.inc.php';


    if(emptyInputLogin($email, $pwd) !== false){
        header("location: ../signIn_Up.php?error=emptyinput");
        exit();
    }
    

    // loginUser($conn, $email, $pwd);
    // header("location: ../signIn_Up.php");
    // exit();
    $emailExist = emailExists($conn, $email);
    
    if($emailExist === false){
        header("Location : ../signIn_Up.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $emailExist["usersPwd"];

    // $checkPwd = password_verify($pwd, $pwdHashed);

    if($pwd !== $pwdHashed){
        header("Location : ../signIn_Up.php?error=wronglogin");
        exit();
    }else if($pwd === $pwdHashed){
        session_start();

        $_SESSION["usersId"] = $emailExist["usersId"];
        $_SESSION["useremail"] = $emailExist["usersEmail"];
        
        header("Location : ../index.html");
        exit();
    }
    
}else{
    header("location: ../signIn_Up.php");
    exit();
}
?>