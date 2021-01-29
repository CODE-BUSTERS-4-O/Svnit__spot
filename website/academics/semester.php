<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="semester.css">
    <link rel="stylesheet" type="text/css" href="../src/css/menuToggle.css">

<style>
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
  margin-left:23.5%;
  float:left;
  border-radius:5px;
}.buy {
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
  margin-right:23.5%;
  float:right;
  border-radius:5px;
}

</style>
</head>
<body>
  <?php
    $allSubjects = array (
      array("MLFO", "MATHS-1", "AC", "EEE"),
      array("Sub 1", "Sub 2", "Sub 3"),
      array("Sub 4", "Sub 5", "Sub 6"),
      array("Sub 7", "Sub 8", "Sub 9"),
      array("Sub 7", "Sub 8", "Sub 9"),
      array("Sub 7", "Sub 8", "Sub 9"),
      array("Sub 7", "Sub 8", "Sub 9"),
      array("Sub 7", "Sub 8", "Sub 9"),
    );
  
  ?>
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
            <li><a href="../index.html">Home</a></li>
            <li><a href="../entertainment">Entertainment</a></li>
            <li><a href="#">Attendance Manager</a></li>
            <li><a href="../cgpa/cgpa.html">CGPA calculator</a></li>
            <li><a href="../src/phonebook.pdf" target="_blank">Imp Contacts</a></li>
            <li><a href="../contact.html">About Us</a></li>
          </ul>
        </div>
      </nav>
      
      <h1>All semester</h1>
      
      <div class="container">
      
        <div class="demo-section">
        </div>
      
        <div class="tab-wrap">
          <?php
            require_once './dbh.inc.php';
            for($i =0; $i<3;$i++){
             ?>
            <input type="radio" id="tab<?php echo $i+1;?>" name="tabGroup1" class="tab" checked>
            <label for="tab<?php echo $i+1;?>">SEM<?php echo $i+1;?></label>
            <div class="tab__content">
              <ul>
            <?php
              for($j=0;$j<count($allSubjects[$i]);$j++){
              
                ?>
                <li><a href=<?php $sem = $i+1;$sub= $allSubjects[$i][$j]; echo "./download.php?sem='$sem'&subject='$sub'"?>><?php echo $allSubjects[$i][$j]."\n";?></a> </li>
                <?php
              }
              ?>
              </ul>
              </div>
              <?php
            }
          ?>
        </div>
      
        
        <div class="tab-wrap">
        <?php
            for($i=3; $i<count($allSubjects);$i++){?>
            <input type="radio" id="tab<?php echo $i+1;?>" name="tabGroup2" class="tab" checked>
            <label for="tab<?php echo $i+1;?>">SEM<?php echo $i+1;?></label>
            <div class="tab__content">
              <ul>
            <?php
              for($j=0;$j<count($allSubjects[$i]);$j++){
                ?>
                <li><a href=<?php $sem = $i+1;$sub= $allSubjects[$i][$j]; echo "./download.php?sem='$sem'&subject='$sub'"?>><?php echo $allSubjects[$i][$j]."\n";?></a></li>
                <?php
              }
              ?>
              </ul>
              </div>
              <?php
            }
          ?>
        </div>
        
        
      </div>
      <a href="index.php" class="btn">UPLOAD DOCUMENT</a>
      <a href="#" class="buy">BUY OR SELL BOOKS</a>
</body>
</html>