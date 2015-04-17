$(document).ready(function(){
	var remainLength = $(window).height() - $("#header").outerHeight(true) - ($("#wrapper").outerHeight(true) - $("#wrapper").outerHeight())/2;
  $('#side-panel').css("height", remainLength);
  $('#main-panel').css("height", remainLength);

  $("#createRepo").on('click', function() {
  	var repo_name = $("#repo_inp").val();
  	if(repo_name !== "") {
			$.ajax({
				url: 'php/createRepo.php',
				type: 'POST',
				data: {"repo": repo_name},
				success: function(res) {
					console.log(res);
					$("#no-repo-div").hide();
					$("#side-panel").show();
					$("#main-panel").show();
					$("#repo_url").html(res);
					$("repo_inp").val("");
					fetchRepo(0);
				},
				error: function(err) {
					console.log(err);
				}
			})
  	}
  });


  init();
	$(document).on('click', '.browse-repo', function() {
		var repo = $(this).children("a:first").attr('id'); 
		readDir(repo);
		var url = getUrl(repo, {
			success: function(url) {
				$("#repo_url").html(url);
			},
			error: function(err) {
				console.log(err);
			}
		});
		$("#repo_url").html(url);
	});

	$(document).on('click', '.browse-dir', function() {
		var id = $(this).attr("id");
		readDir(id);
	})
});




function init() {
	fetchRepo(0);
}

function fetchRepo(index) {
	$.ajax({
		url: './php/repoList.php',
		type: 'GET', 
		success: function(res) {
			if(res === "") {
				$("#side-panel").hide();
				$("#main-panel").hide();
				$("#no-repo-div").show();

			} else {
				$("#side-panel").html(res);
				$("#no-repo-div").hide();

				$(".browse-repo:nth-child("+(index+1)+")").addClass("active");

				var id = $(".browse-repo:nth-child("+(index+1)+") a:first").attr("id");
				readDir(id);
				var url = getUrl(id, {
					success: function(url) {
						$("#repo_url").html(url);
					},
					error: function(err) {
						console.log(err);
					}
				});
			}
		},
		error: function(err) {
			console.log("Could not fetch repo list");
		}
	})
}

function readDir(dir) {
	// console.log(dir);
	$.ajax({
		url: 'php/readDir.php',
		type: 'POST',
		data: {dir: dir},
		success: function(res) {
			if(res === "") {
				$("#main-panel div:nth-child(2)").html("");
				$("#main-panel div:nth-child(2)").hide();
				$("#no-file-div").show();
			} else {
				$("#main-panel").show();
				$("#main-panel div:nth-child(2)").show();
				$("#main-panel div:nth-child(2)").html(res);
				$("#no-file-div").hide();
			}
		},
		error: function(err) {
			console.log("Error in reading dirs");
		}
	})
}

function getUrl(repo, callback) {
	$.ajax({
		url: "php/getUrl.php",
		type: "GET",
		data: {repo: repo},
		success: function(res) {
			callback.success(res);
		},
		error: function(err) {
			callback.error(err);
		}
	})
}