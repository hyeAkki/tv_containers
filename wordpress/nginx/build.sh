#!/bin/bash
# SET THE FOLLOWING VARIABLES
# docker hub username
USERNAME=hiakki
# image name
IMAGE=my-nginx

loc=$(dirname "$0")
cd $PWD/$loc

case "$1" in
tv)
git clone https://github.com/hyeAkki/tricksvibe.git app
;;
hd)
git clone https://github.com/hyeAkki/hdhxmovies.git app
;;
*)
echo "Usage: sh build.sh <hd/tv>"
exit
;;
esac

cp ../test.php app/
docker build -t $USERNAME/$IMAGE .
rm -rf app
