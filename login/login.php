<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../login/login.css">
	<script src="https://kit.fontawesome.com/bd27c824e3.js" crossorigin="anonymous"></script>

</head>
<body>
<div class="form">
	<span class="form_title">Login</span>
	<form class="content" action="login_process.php" method="POST">

		<div class="field">
			<i class="icon fa-solid fa-user"></i>
			<input type="text" class="input" name="id_num" placeholder="Your ID..." required>
		
   
		</div>

		<div class="field">
			<i class=" icon fa-solid fa-lock"></i>
			<input type="password" class ="input" name="password" placeholder="Your Password..." required>
		</div>
		<div class="forgot_pass"><a href="reset_password.php">Forgot password?</a></div>

		<input type="submit" value="Login" name="login" class="btn">

		
	</form>
</div>
</body>
</html>