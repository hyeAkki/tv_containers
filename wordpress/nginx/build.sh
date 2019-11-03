#!/bin/bash
# SET THE FOLLOWING VARIABLES
# docker hub username
USERNAME=hiakki
# image name
IMAGE=my-nginx

loc=$(dirname "$0")
cd $PWD/$loc

wget https://wordpress.org/latest.tar.gz
tar xzf latest.tar.gz
cp ../wp-config.php wordpress/wp-config.php
cp ../test.php wordpress/test.php
docker build -t $USERNAME/$IMAGE .
rm -rf wordpress
rm -rf latest.tar.gz*
