#!/bin/bash
# SET THE FOLLOWING VARIABLES
# docker hub username
USERNAME=hiakki
# image name
IMAGE=php-fpm7.3

loc=$(dirname "$0")
cd $PWD/$loc
pwd
git clone https://github.com/hyeAkki/tv_data.git
docker build -t $USERNAME/$IMAGE .
rm -rf tv_data
