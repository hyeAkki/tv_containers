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
cp ../test.php app/
cp ../wp-config.php app/

sed -i 's/dbnameva/tvdb/g' app/wp-config.php
sed -i 's/usernameva/chutiyatv/g' app/wp-config.php
sed -i 's/passwordva/asdf1234/g' app/wp-config.php
sed -i 's/hostva/tvdb.c8tjsfky7e62.ap-south-1.rds.amazonaws.com/g' app/wp-config.php
sed -i 's/prefixva/tvchu/g' app/wp-config.php

sed -i 's/$host/www.tricksvibe.tk/g' ./conf/default.conf
sudo sh build.sh "$1"
sed -i 's/www.tricksvibe.tk/$host/g' ./conf/default.conf
;;
hd)
git clone https://github.com/hyeAkki/hdhxmovies.git app
cp ../test.php app/
cp ../wp-config.php app/

sed -i 's/dbnameva/hddb/g' app/wp-config.php
sed -i 's/usernameva/chutiyatv/g' app/wp-config.php
sed -i 's/passwordva/asdf1234/g' app/wp-config.php
sed -i 's/hostva/hddb.c8tjsfky7e62.ap-south-1.rds.amazonaws.com/g' app/wp-config.php
sed -i 's/prefixva/hdchu/g' app/wp-config.php

sed -i 's/$host/www.hdhxmovies.ga/g' ./conf/default.conf
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
