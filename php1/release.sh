#!/bin/bash
# SET THE FOLLOWING VARIABLES

# docker hub username
USERNAME=hiakki
# image name
IMAGE=my_php
loc=$(dirname "$0")
version=$(cat VERSION)

cd $PWD/$loc

echo "version: $version"
# run build
sudo sh build.sh
# tag it
git add -A
git commit -m "version $version"
git tag -a "$version" -m "version $version"
git push
git push --tags
docker tag $USERNAME/$IMAGE:latest $USERNAME/$IMAGE:$version
# push it
docker push $USERNAME/$IMAGE:latest
docker push $USERNAME/$IMAGE:$version
