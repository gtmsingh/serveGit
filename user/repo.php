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
		<meta charset="UTF-8">
		<title>Repositories</title>
		<link rel="stylesheet" href="../resources/css/bootstrap.min.css">
		<link rel="stylesheet" href="../resources/css/layout.css">
	</head>
	<body>
		<div class="container">
			<div id="header" class="container page-header text-center">
				<div class="col-md-12">
					<h1>Welcome to your own repos <button class="btn btn-primary pull-right btn-sm voffset2">New Repo</button></h1>
				</div>
			</div>
			<div class="container">
				<ul id="side-panel" class="nav nav-pills nav-stacked col-md-3">
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
				<div id="main-panel" class="container tab-content col-md-9 background" style="overflow: auto;">
					<?php
					if ($num_repo > 0) {
						echo '<div class="tab-pane active" id="' . $repos[0] . '">';
								foreach ($dirs[$repos[0]] as $dir) {
									echo $dir . "<br/>";
								}
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