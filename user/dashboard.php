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
					<h1 class="voffset">Welcome to your profile</h1>
				</div>
				<div class="col-md-2">
					<a href="edit_profile.php"><button class="btn btn-primary pull-right btn-sm">Edit details</button></a>
				</div>
				<div class="col-md-2">
					<!-- avatar-create new repo-logout -->
					<div class="dropdown">
		  
					<a class="dropdown-toggle avatar pull-left" data-toggle="dropdown" role="button" aria-expanded="false" href="#">
					    <img height="30" width="30" src="../resources/img/raj.jpg" alt="@hippozippo"></img>
				        	<span>hippozippo</span>
							<span class="caret"></span>
					</a>
			    	<ul class="dropdown-menu" role="menu">
					    <li><a href="repo.php">Repositories</a></li>
					    <li><a href="../index.php">Logout</a></li>
					</ul>
					
					</div>
				</div>
			</div>

			<div class="container">
				<div class="col-md-3"></div>
			<div class="table-responsive col-md-6">	
		    <table class="table table-striped">

		        <tbody>

		            <tr>

		                <td>First Name</td>

		                <td>Raj</td>

		            </tr>

		            <tr>

		                <td>Last Name</td>

		                <td>Praveen</td>

		            </tr>

		            <tr>

		                <td>Username</td>

		                <td>hippozippo</td>

		            </tr>

		            <tr>

		                <td>E-mail id</td>

		                <td>raj92.mckv@gmail.com</td>

		            </tr>

		        </tbody>

		    </table>
			</div>
		</div>
	</div>
</body>
</html>