#!/bin/bash
# SET THE FOLLOWING VARIABLES
# docker hub username
USERNAME=hiakki
# image name
IMAGE=my_nginx

loc=$(dirname "$0")
cd $PWD/$loc
pwd
cp ../../wordpress . -r
docker build -t $USERNAME/$IMAGE .
rm -rf wordpress
