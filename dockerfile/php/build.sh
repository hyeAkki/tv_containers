#!/bin/bash
# SET THE FOLLOWING VARIABLES
# docker hub username
USERNAME=hiakki
# image name
IMAGE=my_php
docker build -t $USERNAME/$IMAGE:latest .
