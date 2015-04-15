#!/bin/bash
username=$1
app=$2
echo "$username $app"
sudo -u $username mkdir "/home/$username/$app.git"
if [ $? -eq 0 ];
then
	cd "/home/$username/$app.git" && sudo -u $username git --bare init
	sudo -u $username echo '#'$'!'$"/bin/bash"$'\n' > "/home/$username/$app.git/hooks/post-receive"
	sudo -u $username echo "GIT_WORK_TREE=/var/www/html/$app git checkout -f" >> "/home/$username/$app.git/hooks/post-receive"
	sudo chmod 755 "/home/$username/$app.git/hooks/post-receive"
	sudo chgrp $username "/home/$username/$app.git/hooks/post-receive"
	sudo chown $username "/home/$username/$app.git/hooks/post-receive"

	if [ $? -eq 0 ];
	then
		mkdir /var/www/html/$app
		chown $username /var/www/html/$app
		chgrp $username /var/www/html/$app
		sudo -u $username git init /var/www/html/$app
		exit 0
	else
		exit 2
	fi
else
	exit 1
fi