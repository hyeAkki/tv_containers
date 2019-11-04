#!/bin/bash
# SET THE FOLLOWING VARIABLES
# docker hub username
USERNAME=hiakki

# image name
IMAGE="$1-nginx"

loc=$(dirname "$0")
cd $PWD/$loc

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
