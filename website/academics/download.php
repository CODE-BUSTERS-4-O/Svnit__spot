<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./download.css">
    <link rel="stylesheet" type="text/css" href="../src/css/menuToggle.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body class="body">
      <nav role="navigation">
        <div id="menuToggle">
          <!--
          A fake / hidden checkbox is used as click reciever,
          so you can use the :checked selector on it.
          -->
          <input type="checkbox" />
          <!--
          Some spans to act as a hamburger.
          
          They are acting like a real hamburger,
          not that McDonalds stuff.
          -->
          <span></span>
          <span></span>
          <span></span>
          
          <!--
          Too bad the menu has to be inside of the button
          but hey, it's pure CSS magic.
          -->
          <ul id="menu">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Academics</a></li>
            <li><a href="#">Attendance Manager</a></li>
            <li><a href="cgpa/cgpa.html">CGPA calculator</a></li>
            <li><a href="src/phonebook.pdf" target="_blank">Imp Contacts</a></li>
            <li><a href="contact.html">About Us</a></li>
          </ul>
        </div>
      </nav>
      <div class="container">
    <?php
    
    if(isset($_GET["sem"])){
      
      if(isset($_GET["subject"])){
        
        require_once './dbh.inc.php';
        $sub = $_GET["subject"];
        $sem = $_GET["sem"];
        $query = mysqli_query($conn, "SELECT * FROM filedata");
        $rowCount = mysqli_num_rows($query);
        ?>
        <table class="table">
          <tr>
          <td class="first">DOWNLOAD</td>
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
          ?>
        </table>
        <?php
      }
    }

    ?>
    </div>
</body>
</html>