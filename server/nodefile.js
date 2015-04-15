var express = require('express');
var app = express();
var http = require('http').Server(app);
var execFile = require('child_process').exec;

app.set('port', 8081);
var rootPassword = "1";

http.listen(app.get('port'), function() {
	console.log("Started git node server");
});

app.get('/createUser/:username/:password', function(req, res) {
	var username = req.params.username;
	var password = req.params.password;
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

app.get('/createRepo/:username/:appName', function(req, res) {
	var username = req.params.username;
	var appName = req.params.appName;

	console.log(username+" "+appName);
	var host = req.get('host');
	execFile('echo '+rootPassword+' | sudo -S ./createRepo.sh '+username +' '+ appName, function(error, stdout, stderr) {
		console.log('stdout: ' + stdout);
		console.log('stderr: ' + stderr);
		if (error !== null) {
			console.log('exec error: ' + error);
			res.status(500).send({error: error});
		} else {
			res.status(200).send({success: "OK", url: username+"@"+host+":"+appName+".git"});
		}
	});
})

app.get('/changePassword/:username/:newPass', function(req, res) {
	var username = req.params.username;
	var newPass = req.params.newPass;

	console.log(username+" "+newPass);
	var host = req.get('host');
	execFile('echo '+rootPassword+' | sudo -S ./changePassword.sh '+username +' '+ newPass, function(error, stdout, stderr) {
		console.log('stdout: ' + stdout);
		console.log('stderr: ' + stderr);
		if (error !== null) {
			console.log('exec error: ' + error);
			res.status(500).send({error: error});
		} else {
			res.status(200).send({success: "OK", url: username+"@"+host+":"+appName+".git"});
		}
	});
})