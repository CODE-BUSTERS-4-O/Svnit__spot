<?php
		require 'dbh.inc.php';
		$email = $password = $passwordRepeat ='';
		$errors = array('mail'=>'', 'pwd'=>'','pwd-repeat'=>'');
	
	if(isset($_POST['signup-submit'])){
		$email = $_POST['mail'];
		$password = $_POST['pwd'];
		$passwordRepeat = $_POST['pwd-repeat'];

		if(empty($username)){
			header("Location: ../signup.php?error=emptyfield&uid=".$username."&email=".$email);
			$errors['uid'] = 'Username is required </br>';
			exit();
		}
		if(empty($email)){
			header("Location: ../signup.php?error=emptyfield&uid=".$username."&email=".$email);
			$errors['mail'] = 'Email ID is required </br>';
			exit();
		}if(empty($password)){
			header("Location: ../signup.php?error=emptyfield&uid=".$username."&email=".$email);
			$errors['pwd'] = 'Password is required </br>';
			exit();
		}if(empty($passwordRepeat)){
			header("Location: ../signup.php?error=emptyfield&uid=".$username."&email=".$email);
			$errors['pwd-repeat'] = 'Confirm your password </br>';
			exit();
		}else if(!preg_match("/^[a-zA-Z0-9]*$/",$username) & !filter_var($email, FILTER_VALIDATE_EMAIL)){
			header("Location: ../signup.php?error=invalidemail&uid");
			$errors['uid'] = 'Invalid username </br>';
			exit();
		} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header("Location: ../signup.php?error=invalidemail&uid=".$username);
			$errors['mail'] = 'Invalid Email ID </br>';
			exit();
		} else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
			header("Location: ../signup.php?error=invalidemail&uid=".$mail);
			$errors['uid'] = 'Invalid username</br>';
			exit();
		}else if($password !== $passwordRepeat){
			header("Location: ../signup.php?error=passwordchaeckuid=".$username."&mail=",$email);
			$errors['pwd'] = 'Password and confirm password should be same</br>';
			exit();
		}else{
			$sql = "SELECT email FROM users WHERE uidUsers=?";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				header("Location: ../signup.php?error=sqlerror");
				exit();
			}else{
				mysqli_stmt_bind_param($stmt, "s" ,$username);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);
				if($resultCheck > 0){
					header("Location: ../signup.php?error=sqlerror");
					exit();
				}else{
					$sql = "INSERT INTO users(emailUsers, pwdUsers) VALUES (?, ?)";
					$stmt = mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt,$sql)){
						header("Location: ../signup.php?error=sqlerror");
						exit();
					}else{
						$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
						mysqli_stmt_bind_param($stmt, "ss",$email, $hashedPwd);
						mysqli_stmt_execute($stmt);
						header("Location: ../signIn_Up.php?signup=success");
						exit();

					}
				}
			}
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);

	} else {
		header("Location: ../signup.php");
		exit();
	}
?>
