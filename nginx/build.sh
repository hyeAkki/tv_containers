#!/bin/bash
# SET THE FOLLOWING VARIABLES
# docker hub username
USERNAME=hiakki
# image name
IMAGE=my-nginx

loc=$(dirname "$0")
cd $PWD/$loc

git clone https://github.com/hyeAkki/tv_data.git
docker build -t $USERNAME/$IMAGE .
rm -rf tv_data
