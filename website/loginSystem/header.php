<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Flamenco&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="style.css">-->
    <link rel="stylesheet" type="text/css" href="../src/css/menuToggle.css">
</head>

<body class=""> 

   	<header class="navBar" >
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
            <li><a href="#">Academics</a></li>
            <li><a href="../entertainment.html">Entertainment</a></li>
            <li><a href="#">Attendance Manager</a></li>
            <li><a href="#">CGPA calculator</a></li>
            <li><a href="#">Imp Contacts</a></li>
            <li><a href="#">About Us</a></li>
          </ul>
        </div>
      </nav>

   	</header>