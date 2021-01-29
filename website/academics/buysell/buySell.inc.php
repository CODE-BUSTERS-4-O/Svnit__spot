<?php
    require_once '../dbh.inc.php';

    if(isset($_POST["submit"])){
        echo "1";

        $sub = $_POST["subName"];
        $book = $_POST["book"];
        $contact = $_POST["contact"];
        $price = $_POST["price"];

        if(empty($sub) || empty($book) || empty($contact) || empty($price)){
            header("Location: buySell.php?error=emptyfield");
            exit();
        }

        $sql =  "INSERT INTO buysell (sSub, sBook, sContact, sPrice) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: buySell.php?error=stmtfailed1");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ssss", $sub, $book, $contact, $price);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: buySell.php?error=none");
        exit();
        

    }else{
        echo "2";
    }
?>