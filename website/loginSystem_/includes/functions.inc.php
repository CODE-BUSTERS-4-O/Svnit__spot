<?php
function emptyInputSignup($name, $email, $pwd, $rePwd){
    $result;
    if(empty($name) || empty($email) || empty($pwd) || empty($rePwd)){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}

function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}

function pwdMatch($pwd, $rePwd){
    $result;

    if($pwd !== $rePwd){
        $result = true;
    }else{
        $result = false;
    }

    return $result;

}
function emailExists($conn, $email){
    $sql = "SELECT * FROM users WHERE usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signIn_Up.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
   
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
} 

function createUser($conn, $name, $email, $pwd){
    $sql = "INSERT INTO users (usersName, usersEmail, usersPwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signIn_Up.php?error=stmtfailed1");
        exit();
    }

    $heshedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
} 

function emptyInputLogin($email, $pwd){
    $result;
    if(empty($email) || empty($pwd)){
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}

function loginUser($conn, $email, $pwd){
    $emailExist = emailExists($conn,$email);

    if($emailExist === false){
        header("Location : ../signIn_Up.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $emailExist["usersPwd"];

    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("Location : ../signIn_Up.php?error=wronglogin");
        exit();
    }else if($checkPwd === true){
        session_start();

        $_SESSION["usersId"] = $emailExist["usersId"];
        $_SESSION["useremail"] = $emailExist["usersEmail"];
        
        header("Location : ../index.html");
        exit();
    }
}
?>