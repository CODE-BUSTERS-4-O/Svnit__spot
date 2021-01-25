<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
   
    <link rel="stylesheet" type="text/css" href="signIn_up.css">
</head>
<body>
    

    <div class="container right-panel-active">
        <!-- Sign Up code-->
        <div class="container__form container--signup">
            
            <form action="../loginSystem_/includes/signup.inc.php" class="form" id="form1" method="post">
                <h2 class="form__title">Sign Up</h2>
                <input type="text" name="name" placeholder="Full Name.." class="input"/>
                <input type="test" placeholder="Email" class="input" name="email"/>
                <input type="password" placeholder="Password" class="input" name="pwd"/>
                <input type="password" placeholder="Re-enter Password" class="input" name="rePwd"/>
                <button type="submit" name="submit" class="btn">Sign Up</button>
                <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"]== "emptyinput"){
                            echo "<p>Fill in all Fields!</p>";
                        }else if ($_GET["error"] == "invalidemail"){
                            echo "<p>Choose proper email!</p>";
                        }else if ($_GET["error"] == "passwordsdontmatch"){
                            echo "<p>Passwords doesn't match!</p>";
                        }else if ($_GET["error"] == "stmtfailed"){
                            echo "<p>Something went wrong, try again!</p>";
                        }else if ($_GET["error"] == "emailtaken"){
                            echo "<p>Email already taken!</p>";
                        }else if ($_GET["error"] == "none"){
                            echo "<p>Signup successfull..</p>";
                        }
                    }
                ?>
            </form>
            
        </div>

        <!-- Sign In Code-->
        <div class="container__form container--signin">
                    
            <form action="../loginSystem_/includes/login.inc.php" class="form" id="form2" method="post">
                <h2 class="form__title">Sign In</h2>
                <input type="text" placeholder="email" class="input" name="name" />
                <input type="password" placeholder="Password" class="input" name="pwd" />
                <a href="#" class="link">Forgot your password?</a>
                <button type = "submit" class="btn">Sign In</button>
            </form>
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"]== "emptyinput"){
                        echo "<p>Fill in all Fields!</p>";
                    }else if ($_GET["error"] == "wronglogin"){
                        echo "<p>Incorrect login information</p>";
                    }
                }
            ?>
        </div>

        <!-- Overlay -->
        <div class="container__overlay">
            <div class="overlay">
                <div class="overlay__panel overlay--left">
                    <button class="btn" id="signIn">Sign In</button>
                </div>
                <div class="overlay__panel overlay--right">
                    <button class="btn" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    const signInBtn = document.getElementById("signIn");
    const signUpBtn = document.getElementById("signUp");
    const fistForm = document.getElementById("form1");
    const secondForm = document.getElementById("form2");
    const container = document.querySelector(".container");

    signInBtn.addEventListener("click", () => {
        container.classList.remove("right-panel-active");
    });

    signUpBtn.addEventListener("click", () => {
        container.classList.add("right-panel-active");
    });

    fistForm.addEventListener("submit", (e) => e.preventDefault());
    secondForm.addEventListener("submit", (e) => e.preventDefault());
</script>
</html>