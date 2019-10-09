#!/bin/bash
# SET THE FOLLOWING VARIABLES
# docker hub username
USERNAME=hiakki
# image name
IMAGE=my_nginx

loc=$(dirname "$0")
cd $PWD/$loc/../../
pwd
docker build -t $USERNAME/$IMAGE -f $PWD/$loc/Dockerfile .
