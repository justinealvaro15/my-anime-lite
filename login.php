<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>MyAnimeLite</title>
	<link rel="stylesheet" type="text/css" href="stylev2.css">
</head>
<body>
	<h1>MyAnimeLite</h1>	
	<form class="container" method="post" action="login.php">

		<?php include('errors.php'); ?>
		<div class="input-group">
			<h2>Log In</h2>
		</div>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user" id="login">Login</button>
			<script>
				var btn = document.getElementById('login');
				btn.addEventListener('click', function() {
					document.location.href = '<?php echo "user/HomeV2.php"; ?>';
				});
			</script>
		</div>
		<p>
			Create an account! <a href="register.php" style="color: #f99a2c">Sign up</a>
		</p>
	</form>


</body>
</html>