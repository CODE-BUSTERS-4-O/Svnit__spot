<?php
    require "header.php";
    require "includes/signup.inc.php"
?>

<main>
	<div class="wrapper-main">
		<section class="container grey-text">
			<h1 class= "centre">Signup</h1>
			<form class="white"action="./includes/signup.inc.php" method="post">
				<label>Username</label>
				<input type="text" name="uid" value="<?php echo htmlspecialchars($username) ?>">
				<div class="red-text"><?php echo $errors['uid'];?></div>

				<label>E-mail</label>
				<input type="text" name="mail" value="<?php echo htmlspecialchars($email) ?>" >
				<div class="red-text"><?php echo $errors['mail'];?></div>

				<label>Password</label>
				<input type="password" name="pwd" value="<?php echo htmlspecialchars($password) ?>" >
				<div class="red-text"><?php echo $errors['pwd'];?></div>

				<label>Confirm Password</label>
				<input type="password" name="pwd-repeat" >
				<div class="red-text"><?php echo $errors['pwd-repeat'];?></div>

				<button type="submit" name="signup-submit" >Signup</button>
			</form>
		</section>
</main>

<?php
    require "footer.php";
?>