#!/bin/bash
username=$1
app=$2
echo "$username $app"
sudo -u $username mkdir "/home/$username/$app.git"
if [ $? -eq 0 ];
then
	cd "/home/$username/$app.git" && sudo -u $username git --bare init
	exit 0
else
	exit 1
fi