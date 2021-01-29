<?php

require_once './dbh.inc.php';

if(isset($_POST['submit'])) {
    $sem = $_GET["sem"];
    

    $name = $_POST["name"];
    
    $userName = $_POST["Uname"];
    $subject = $_POST["subject"];
    $type = $_POST["type"];


    $file = $_FILES["file"];
  
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);

    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpeg', 'jpg', 'png', 'pdf');

    if( in_array($fileActualExt, $allowed)) {
        if($fileError===0){
            if($fileSize < 1000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                $sql =  "INSERT INTO  filedata (fType, fUnqId , fName, fSubject, fSem, uName) VALUES (?, ?, ?, ?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("location: semester.html?error=stmtfailed1");
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "ssssis", $type, $fileNameNew, $name, $subject, $sem, $userName);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                header("Location: semester.php?uploadsuccess");
            }else{
                echo "File Size too big!";
            }

        }else{
          echo "There was an error uploading your file." ;
        }
    }else{
        echo " You Can not upload files of thhis type";

    }
}


?>