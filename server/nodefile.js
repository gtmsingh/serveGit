var fs = require('fs');
var path = require("path");
var express = require('express');
var app = express();
var http = require('http').Server(app);
var execFile = require('child_process').exec;
var bodyParser = require('body-parser');

app.use(bodyParser.json());

app.set('port', 8081);
var rootPassword = "a";

http.listen(app.get('port'), function(err) {
	if(err) {
		console.log("Error occured");
	} else {
		console.log("Started git node server on port " + app.get('port'));
	}
});

app.post('/createUser', function(req, res) {
	var username = req.body.username;
	var password = req.body.password;
	console.log(username+" "+password);
	execFile('echo '+rootPassword+' | sudo -S ./createUser.sh '+ username +' '+ password, function(error, stdout, stderr) {
		console.log('stdout: ' + stdout);
		console.log('stderr: ' + stderr);
		if (error !== null) {
			console.log('exec error: ' + error);
			res.status(500).send({error: error});
		} else {
			res.status(200).send({success: "OK"});
		}
	});
})

app.post('/createRepo', function(req, res) {
	var username = req.body.username;
	var repoName = req.body.repo_name;

	console.log(username+" "+repoName);
	var host = req.get('host');
	host = ( host.match(/:/g) ) ? host.slice( 0, host.indexOf(":") ) : host;
	execFile('echo '+rootPassword+' | sudo -S ./createRepo.sh '+username +' '+ repoName, function(error, stdout, stderr) {
		console.log('stdout: ' + stdout);
		console.log('stderr: ' + stderr);
		if (error !== null) {
			console.log('exec error: ' + error);
			res.status(500).send({error: error});
		} else {
			res.status(200).send({success: "OK", url: username+"@"+host+":"+repoName+".git"});
		}
	});
})

app.post('/changePassword', function(req, res) {
	var username = req.body.username;
	var newPass = req.body.newPass;

	console.log(username+" "+newPass);
	var host = req.get('host');
	execFile('echo '+rootPassword+' | sudo -S ./changePassword.sh '+username +' '+ newPass, function(error, stdout, stderr) {
		console.log('stdout: ' + stdout);
		console.log('stderr: ' + stderr);
		if (error !== null) {
			console.log('exec error: ' + error);
			res.status(500).send({error: error});
		} else {
			res.status(200).send({success: "OK"});
		}
	});
})

app.post('/list', function(req, res) {
	var username = req.body.username;
	var default_dir = "/var/www/"+username+"/";
	var dir = req.body.cur_dir;

	fs.readdir(default_dir + dir, function(err, files) {
		if(err) {
			res.status(500).json({error: err});
		} else {
			var list = {};
			var i = 0;
			files.map(function(file) {
				if(file === ".git") {
					return file;
				} else {
					return path.join(dir, file);
				}
			}).forEach(function(file) {
				if(file !== ".git") {
					list[i] = {};
					list[i]["name"] = file;
					if(fs.statSync(default_dir+file).isFile()) {
						list[i]["type"] = "file";
					} else {
						list[i]["type"] = "dir";
					}
					i++;
				}
			});
			res.status(200).json(list);
		}
	})
});

app.post('/getUrl', function(req, res) {
	var username = req.body.username;
	var repoName = req.body.repo_name;

	var host = req.get('host');
	host = ( host.match(/:/g) ) ? host.slice( 0, host.indexOf(":") ) : host;
	
	res.status(200).send({success: "OK", url: username+"@"+host+":"+repoName+".git"});
})