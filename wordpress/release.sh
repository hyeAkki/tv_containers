#!/bin/bash

# docker hub username
USERNAME=hiakki

cp wp-config.php.bak wp-config.php

case "$1" in
tv)
sed -i 's/dbnameva/tvdb/g' wp-config.php
sed -i 's/usernameva/chutiyatv/g' wp-config.php
sed -i 's/passwordva/asdf1234/g' wp-config.php
sed -i 's/hostva/tvdb.c8tjsfky7e62.ap-south-1.rds.amazonaws.com/g' wp-config.php
sed -i 's/prefixva/tvchu/g' wp-config.php
;;
hd)
sed -i 's/dbnameva/hddb/g' wp-config.php
sed -i 's/usernameva/chutiyatv/g' wp-config.php
sed -i 's/passwordva/asdf1234/g' wp-config.php
sed -i 's/hostva/hddb.c8tjsfky7e62.ap-south-1.rds.amazonaws.com/g' wp-config.php
sed -i 's/prefixva/hdchu/g' wp-config.php
;;
*)
echo "Usage: sh release.sh <hd/tv>"
exit
;;
esac

nginx_img() {
# image name
IMAGE="$1-nginx"
# run build

loc=$(dirname "$0")
cd $PWD/$loc/nginx

cp ../app . -r
cp ../wp-config.php app/

version=$(cat VERSION)

echo "version: $version"

case "$1" in
tv)
sed -i 's/$host/www.tricksvibe.tk/g' ./conf/default.conf
docker build -t $USERNAME/$IMAGE .
sed -i 's/www.tricksvibe.tk/$host/g' ./conf/default.conf
;;
hd)
sed -i 's/$host/www.hdhxmovies.ga/g' ./conf/default.conf
docker build -t $USERNAME/$IMAGE .
sed -i 's/www.hdhxmovies.ga/$host/g' ./conf/default.conf
;;
esac

# tag it
docker tag $USERNAME/$IMAGE:latest $USERNAME/$IMAGE:$version
# push it
docker push $USERNAME/$IMAGE:latest
docker push $USERNAME/$IMAGE:$version

rm -rf app
cd ..
}

php_img() {
# image name
IMAGE="$1-php"

loc=$(dirname "$0")
cd $PWD/$loc/php

cp ../app . -r
cp ../wp-config.php app/

version=$(cat VERSION)
echo "version: $version"
# run build
docker build -t $USERNAME/$IMAGE .

docker tag $USERNAME/$IMAGE:latest $USERNAME/$IMAGE:$version
# push it
docker push $USERNAME/$IMAGE:latest
docker push $USERNAME/$IMAGE:$version

rm -rf app
cd ..
}

nginx_img $1
php_img $1

rm -rf wp-config.php
