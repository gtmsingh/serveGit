<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="../resources/css/layout.css">
    <script src="../resources/js/jquery.min.js"></script>
    <script type="text/javascript" src="../resources/js/bootstrap.min.js"></script>
</head>
	<body>
		
		<div class="container">
			
			<div id="header" class="container page-header text-center">
				<div class="col-md-8">
					<h1 class="voffset">Edit profile</h1>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-2">
					<!-- avatar-create new repo-logout -->
					<div class="dropdown">
		  
					<a class="dropdown-toggle avatar" data-toggle="dropdown" role="button" aria-expanded="false" href="#">
					    <img height="30" width="30" src="../resources/img/raj.jpg" alt="@hippozippo"></img>
				        	<span>hippozippo</span>
							<span class="caret"></span>
					</a>
			    	<ul class="dropdown-menu" role="menu">
					    <li><a href="repo.php">Repositories</a></li>
					    <li><a href="dashboard.php">Dashboard</a></li>
					    <li><a href="../index.php">Logout</a></li>
					</ul>
					
					</div>
				</div>
			</div>

			<form action="register.php" method="POST" role="form" class="form-horizontal voffset6">
				<div class="form-group">

					<label for="username" class="col-md-offset-1 col-sm-3 control-label">First Name</label>
					<div class="col-sm-5">
						<input type="text" name="username" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="username" class="col-md-offset-1 col-sm-3 control-label">Last name</label>
					<div class="col-sm-5">
						<input type="text" name="username" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="username" class="col-md-offset-1 col-sm-3 control-label">Username</label>
					<div class="col-sm-5">
						<input type="text" name="username" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="username" class="col-md-offset-1 col-sm-3 control-label">Email</label>
					<div class="col-sm-5">
						<input type="text" name="email" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-md-offset-1 col-sm-3 control-label">Old Password</label>
					<div class="col-sm-5">
						<input type="password" name="password" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-md-offset-1 col-sm-3 control-label">New Password</label>
					<div class="col-sm-5">
						<input type="password" name="password" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="confirm_pass" class="col-md-offset-1 col-sm-3 control-label">Confirm new Password</label>
					<div class="col-sm-5">
						<input type="password" name="confirm_pass" class="form-control">
					</div>
				</div>
				<div class="col-md-offset-5 col-md-3">
					<input type="submit" name="register-btn" id="register-btn" class="btn btn-success btn-block voffset1" value="Update">
				</div>
			</form>
	</body>
</html>
