#!/bin/bash
# SET THE FOLLOWING VARIABLES
# docker hub username
USERNAME=hiakki
# image name
IMAGE="$1-nginx"

loc=$(dirname "$0")
cd $PWD/$loc

docker build -t $USERNAME/$IMAGE .
