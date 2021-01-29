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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    .buton{
        width: 50%;
        background-color:  antiquewhite;
        border: none;
        color: black;
        padding: 15px 32px;
        
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius:5px;
  }
  .btn {
  background-color:  rgb(228, 149, 149);
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  margin-left:20%;

  border-radius:5px;
}
  .back{
  color: antiquewhite;
  
  margin-left: 20px;
}
.left{
  font-size: 1.5cm;
}
</style>
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
      <div class="container choose">
    <?php
        require_once './dbh.inc.php';
        if(isset($_POST["submit"])){
            $sem = $_POST["sem"];
            
            $sql = "SELECT * FROM uploadsub WHERE semId = ?;";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "i", $sem);
            mysqli_stmt_execute($stmt);

            $resultData = mysqli_stmt_get_result($stmt);
            ?>
            <form action=<?php echo "./upload.php?sem=$sem" ?> method="POST" enctype="multipart/form-data">
                <select class="buton" name="subject">
                    <option value="">Select Subject</option>
            <?php
            foreach($resultData as $s){
                ?>
                <option value="<?php echo $s["subName"];?>"><?php echo $s["subName"];?></option>
                <?php
            }
            mysqli_stmt_close($stmt);
            ?>
                </select>
                <br>
                <br>
                <select class="buton"name="type">
                    <option value="">Select Type of Document</option>
                    <option value="THEORY">Theory</option>
                    <option value="PRACTICAL">Practical</option>
                    <option value="PAPERS">Previous year Paper</option>
                </select>
                <br>
                <br>
                <input class="buton" name="name" type="text" placeholder="Document Name">
                <br>
                <br>
                <input class= "buton" name="Uname" type = "text" placeholder="User Name">
                <br>
                <br>
                <input class ="buton" type="file" name="file">
                <br>
                <br>
                <button class ="btn" type="submit" name="submit">UPLOAD</button>
                <br>
            </form>
            <?php
        }
    ?>
    </div>
    <a class="left" href="index.php"><i class="fa fa-arrow-left back" aria-hidden="true"><br>Back</i></a>
</body>
</html>
