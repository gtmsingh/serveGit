<?php
session_start();
if(isset($_SESSION["error"])) {
	$message = $_SESSION["error"];
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Home Page</title>
		<link rel="stylesheet" href="resources/css/bootstrap.min.css">
		<link rel="stylesheet" href="resources/css/layout.css">
	</head>
	<body class="background">
		<div class="container text-center col-md-offset-3 col-md-6">
			<?php
			if (isset($message["others"])) {
				echo '<p class="text-danger">'.$message["others"].'</p>';
			}
			?>
			<form action="login.php" method="POST" role="form" class="form-horizontal voffset3">
				<?php
				if (isset($message["login"])) {
					echo '<p class="text-danger">'.$message["login"].'</p>';
				}
				?>
				<legend>Login</legend>
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Email</label>
					<div class="col-sm-8">
						<input type="text" name="email" placeholder="Email ID" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-3 control-label">Password</label>
					<div class="col-sm-8">
						<input type="password" name="password" placeholder="Password" class="form-control">
					</div>
				</div>
				<div class="col-md-offset-8 col-md-3">
					<input type="submit" name="login-btn" id="login-btn" class="btn btn-success btn-block" value="Login">
				</div>
			</form>
			<form action="register.php" method="POST" role="form" class="form-horizontal voffset7">
				<?php
				if (isset($message["register"])) {
					echo '<p class="text-danger">'.$message["register"].'</p>';
				}
				?>
				<legend>Register</legend>
				<div class="form-group">

					<label for="first_name" class="col-sm-3 control-label">First Name</label>
					<div class="col-sm-8">
						<input type="text" name="username" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="last_name" class="col-sm-3 control-label">Last name</label>
					<div class="col-sm-8">
						<input type="text" name="username" class="form-control">
					</div>
				</div>
				<div class="form-group">

					<label for="username" class="col-sm-3 control-label">Username</label>
					<div class="col-sm-8">
						<input type="text" name="username" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="username" class="col-sm-3 control-label">Email</label>
					<div class="col-sm-8">
						<input type="text" name="email" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-3 control-label">Password</label>
					<div class="col-sm-8">
						<input type="password" name="password" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="confirm_pass" class="col-sm-3 control-label">Confirm Password</label>
					<div class="col-sm-8">
						<input type="password" name="confirm_pass" class="form-control">
					</div>
				</div>
				<div class="col-md-offset-8 col-md-3">
					<input type="submit" name="register-btn" id="register-btn" class="btn btn-success btn-block" value="Register">
				</div>
			</form>
		</div>
	</body>
</html>
<?php
if(isset($_SESSION["error"])) {
	unset($_SESSION["error"]);
}
?>