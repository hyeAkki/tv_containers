#!/bin/bash
# SET THE FOLLOWING VARIABLES
# docker hub username
USERNAME=hiakki
# image name
IMAGE=my_nginx
docker build -t $USERNAME/$IMAGE:latest .
