#!/bin/bash
username=$1
password=$2
count=$(getent passwd $username | wc -l)
if [ $count -gt 0 ];
then
	echo "$username already exists"
	exit 1
else
	pass=$(perl -e 'print crypt($ARGV[0], "password")' $password)
	sudo useradd --create-home -p $pass $username
	if [ $? -eq 0 ];
	then 
		sudo rm -rf /home/$username/*
		echo "User has been created!"
		exit 0
	else
		echo "Could not create user"
		exit 2
	fi
fi