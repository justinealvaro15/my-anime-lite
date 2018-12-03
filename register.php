<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Create an account</title>
	<link rel="stylesheet" type="text/css" href="stylev2.css">
</head>
<body>
	<h1>MyAnimeLite</h1>
	
	<form class="container" method="post" action="register.php">
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>

		<?php include('errors.php'); ?>

		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already have an account? <a href="login.php" style="color: #f99a2c">Sign in</a>
		</p>
	</form>
</body>
</html>