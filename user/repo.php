<?php
session_start();
if (isset($_SESSION["message"])) {
	$message = $_SESSION["message"];
}
if (isset($message["register"])) {
	echo $_SESSION["message"]["register"];
	unset($_SESSION["message"]["register"]);
}
$repos = array("repo1", "repo2", "repo3");
$dirs = array(
	"repo1" => array("dir1", "dir2", "dir3"),
	"repo2" => array("dir4", "dir5", "dir6"),
	"repo3" => array("dir7", "dir8", "dir9")
);
// echo $_SESSION["uid"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Repositories</title>
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
					<h1 class="voffset">Welcome to your own repositories</h1>
				</div>
				<div class="col-md-2">
					<button class="btn btn-primary pull-right btn-sm">New Repo</button>
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
					    <li><a href="dashboard.php">Dashboard</a></li>
					    <li><a href="../index.php">Logout</a></li>
					</ul>
					
					</div>
				</div>

			</div>

			<!-- Side panel listing all repositories -->

			<div class="container">
				<ul id="side-panel" class="nav nav-pills nav-stacked col-md-3 voffset1">
					<?php
					$num_repo = count($repos);
					if($num_repo > 0)
					{
						echo '<li class="active"><a href="#' . $repos[0] . '" data-toggle="tab">' . $repos[0] . '</a></li>';
						for ($i = 1; $i < $num_repo; $i++) {
							echo '<li><a href="#' . $repos[$i] . '" data-toggle="tab">' . $repos[$i] . '</a></li>';
						}
					}
					?>
				</ul>
				<div id="main-panel" class="container tab-content col-md-9 background voffset2" style="overflow: auto;">
					<?php
					if ($num_repo > 0) {
						echo '<div class="tab-pane active" id="' . $repos[0] . '">';
								foreach ($dirs[$repos[0]] as $dir) {
									echo $dir . "<br/>";
								}
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";
								echo "afdfnhsns<br/>";

						echo '</div>';
						
						for ($i = 1; $i < $num_repo; $i++) {
							echo '<div class="tab-pane" id="' . $repos[$i] . '">';
									$dir = $dirs[$repos[$i]];
									$num_dirs = count($dir);
									for ($j = 0; $j < $num_dirs; $j++) {
										echo $dir[$j] . "<br/>";
									}
							echo '</div>';
						}
					}
					?>
				</div>
				<?php
					if($num_repo == 0) {
						echo '<div class="alert alert-warning text-center">
							There are no repositories created by you!
						</div>';
					}
				?>
			</div>
		</div>
		<script type="text/javascript" src="../resources/js/jquery.min.js"></script>
		<script type="text/javascript" src="../resources/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../resources/js/repo.js"></script>
	</body>
</html>