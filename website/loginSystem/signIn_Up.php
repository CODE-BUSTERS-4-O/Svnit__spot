
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" typr = "text/css" href = "signIn_up.css">
    <title>Login</title>
</head>
<body>
    <div class="container right-panel-active">
        <!-- Sign Up code-->
    
        <div class="container__form container--signup">
            <form action="../includes/signup.inc.php" class="form" id="form1" method ="post"> 
                <h2 class="form__title">Sign Up</h2>
                <input type="text" placeholder="Email" class="input" name="mail" value="<?php echo htmlspecialchars($email) ?>" >
				<div class="red-text"><?php echo $errors['mail'];?></div>
                <input type="password" name="pwd" placeholder="Password" class="input" value="<?php echo htmlspecialchars($password) ?>" >
				<div class="red-text"><?php echo $errors['pwd'];?></div>
                <input type="password" placeholder="Password" class="input" name = "pwd-repeat"/>
                <div class="red-text"><?php echo $errors['pwd-repeat'];?></div>
                <button type ="submit" class="btn" name="signup-submit" >Sign Up</button>
            </form>
        </div>

        <!-- Sign In Code-->
        <div class="container__form container--signin">
            <form action="../includes/login.inc.php" class="form" id="form2" method="post">
                <h2 class="form__title">Sign In</h2>
                <input type="text" placeholder="Email" name = "mail" class="input" />
                <input type="password" placeholder="Password" class="input" name ="pwd"/>
                <a href="#" class="link">Forgot your password?</a>
                <button class="btn" name="login-submit" >Sign In</button>
            </form>
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