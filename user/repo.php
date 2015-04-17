<?php
session_start();
if (isset($_SESSION["message"])) {
	$message = $_SESSION["message"];
}
if (isset($message["register"])) {
	echo $_SESSION["message"]["register"];
	unset($_SESSION["message"]["register"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Repositories</title>
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="../resources/css/layout.css">
</head>
	<body>
		<div class="container">
			<div id="header" class="container page-header text-center">
				<div class="col-md-8">
					<h1 class="voffset">Welcome to your own repositories</h1>
				</div>
				<div class="col-md-2 col-md-offset-2">
					<!-- avatar-create new repo-logout -->
					<div class="dropdown">
		  
					<a class="dropdown-toggle avatar pull-left" data-toggle="dropdown" role="button" aria-expanded="false" href="#">
					    <img height="30" width="30" src="../resources/img/raj.jpg" alt="@hippozippo"></img>
				        	<span>hippozippo</span>
							<span class="caret"></span>
					</a>
			    	<ul class="dropdown-menu" role="menu">
					    <li><a href="dashboard.php">Dashboard</a></li>
					    <li><a href="../index.php">Logout</a></li>
					</ul>
					</div>
				</div>

			</div>
			<!-- Create repo div -->
			
			<div class="container block form-group col-md-12">
				<label for="repo_name" class="col-md-2 control-label voffset2">Repository name: </label>
				<div class="col-md-4">
					<input type="text" name="repo_name" placeholder="eg. repo123" id="repo_inp" class="form-control input-md">
				</div>
				<div class="container col-md-2">
					<input type="button" name="repo_name" id="createRepo" class="btn btn-primary" value="Create">
				</div>
			</div>
			

			<!-- Side panel listing all repositories -->

			<div class="container" id="wrapper">
				<ul id="side-panel" class="nav nav-pills nav-stacked col-md-3 voffset1">
					
				</ul>

				<div id="main-panel" class="container tab-content col-md-9 voffset2" style="overflow-y: auto;">
					<div class="container">
						<label for="repo_url">Remote link: </label>
						<span id="repo_url" name="repo_url"></span>
					</div>
					<div class="container background">
						
					</div>
					<div class="alert alert-warning text-center" id="no-file-div">
						There are no files in here!
					</div>
				</div>
			</div>
			<div class="alert alert-warning text-center" id="no-repo-div">
				There are no repositories created by you!
			</div>
		</div>
		<script type="text/javascript" src="../resources/js/jquery.min.js"></script>
		<script type="text/javascript" src="../resources/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../resources/js/repo.js"></script>
	</body>
</html>