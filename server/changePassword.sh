#!/bin/bash
username=$1
password=$2
echo -e $password$'\n'$password | (sudo passwd $username)