#!/bin/bash
# SET THE FOLLOWING VARIABLES
# docker hub username
USERNAME=hiakki
# image name
IMAGE=my-django

loc=$(dirname "$0")
cd $PWD/$loc

git clone https://github.com/hiAkki/PyShop.git app
docker build -t $USERNAME/$IMAGE .
rm -rf app
