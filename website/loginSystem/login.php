<?php
    require "header.php";
?>
<main>
	<div>
		<section class="container grey-text">
	  		<form action="includes/login.inc.php" method="post">
	  			<input type="text" name="mailuid" placeholder="Username/E-mail...">
	  			<input type="password" name="pwd" placeholder="password...">
	  			<button type="submit" name="login-submit">Login</button>
	  		</form>
		</section>
			<p>Don't have a account<span><a href="signup.php">register</a></span> here.
			
			
	</div>
</main>

<?php 
	require "footer.php";
?>