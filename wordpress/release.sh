#!/bin/bash
# SET THE FOLLOWING VARIABLES
# docker hub username
USERNAME=hiakki

# image name
IMAGE="$1-nginx"
# run build
if [ -z $1 ]
then
  echo "Usage: release.sh <hd/tv>"
  exit
fi

loc=$(dirname "$0")
cd $PWD/$loc/nginx

version=$(cat VERSION)
echo "version: $version"
sudo sh build.sh "$1"
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


# image name
IMAGE="$1-php"

cd ..
cd $PWD/$loc/php

version=$(cat VERSION)
echo "version: $version"
# run build
if [ -z $1 ]
then
  echo "Usage: release.sh <hd/tv>"
  exit
fi
sudo sh build.sh "$1"
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

