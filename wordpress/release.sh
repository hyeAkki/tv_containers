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


case "$1" in
tv)
git clone https://github.com/hyeAkki/tricksvibe.git app
sed -i 's/$host/www.tricksvibe.tk/g' ./conf/default.conf
cp ../test.php app/
sudo sh build.sh "$1"
sed -i 's/www.tricksvibe.tk/$host/g' ./conf/default.conf
;;
hd)
git clone https://github.com/hyeAkki/hdhxmovies.git app
sed -i 's/$host/www.hdhxmovies.ga/g' ./conf/default.conf
cp ../test.php app/
sudo sh build.sh "$1"
sed -i 's/www.hdhxmovies.ga/$host/g' ./conf/default.conf
;;
*)
echo "Usage: sh build.sh <hd/tv>"
exit
;;
esac

echo "version: $version"

# tag it
docker tag $USERNAME/$IMAGE:latest $USERNAME/$IMAGE:$version
# push it
docker push $USERNAME/$IMAGE:latest
docker push $USERNAME/$IMAGE:$version

mv app/ ../php/

# image name
IMAGE="$1-php"

cd ../php

version=$(cat VERSION)
echo "version: $version"
# run build
if [ -z $1 ]
then
  echo "Usage: release.sh <hd/tv>"
  exit
fi
sudo sh build.sh "$1"

docker tag $USERNAME/$IMAGE:latest $USERNAME/$IMAGE:$version
# push it
docker push $USERNAME/$IMAGE:latest
docker push $USERNAME/$IMAGE:$version

rm -rf app

# tag it
git add -A
git commit -m "version $version"
git tag -a "$version" -m "version $version"
git push
git push --tags
