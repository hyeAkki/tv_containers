#!/bin/bash
# SET THE FOLLOWING VARIABLES
# docker hub username
USERNAME=hiakki
# image name
IMAGE=my-php

loc=$(dirname "$0")
cd $PWD/$loc

https://github.com/hyeAkki/tricksvibe.git app
docker build -t $USERNAME/$IMAGE .
rm -rf app
