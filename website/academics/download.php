<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    if(isset($_GET["sem"])){
      
      if(isset($_GET["subject"])){
        
        require_once './dbh.inc.php';
        $sub = $_GET["subject"];
        $sem = $_GET["sem"];
        $query = mysqli_query($conn, "SELECT * FROM filedata");
        $rowCount = mysqli_num_rows($query);
        ?>
        <table>
          <td>DOWNLOAD</td>
          <tr>
          </tr>
        <?php
          $sub = $_GET["subject"];
          $sem = $_GET["sem"];
          for($i=0;$i<$rowCount;$i++){
            $row = mysqli_fetch_assoc($query);
            $rSem = strval($row["fSem"]);
            $rSub = strval($row["fSubject"]);
            if("'$rSem'" == $sem and "'$rSub'" == $sub){
            ?>
            <tr>
              <td><a target="_blank" href="uploads/<?php echo $row["fUnqId"]?>"><?php echo $row["fName"];?></a></td>
            </tr>
            <?php
            }
            

          }
      }
    }
    
      

    ?>
    
</body>
</html>