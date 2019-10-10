#!/bin/bash
cids=$(docker ps | grep my_ | awk {'print $1'} | tr '\n' ,)

IFS=',' read -r -a cid <<< $cids

for b in 2 1
do
  echo ${cid[$b]}
  docker rm -f ${cid[$b]}
done

mkdir -p socket
docker run -d --name my_php hiakki/my_php
docker run -d --name my_nginx --link my_php:my_php -p 80:80 hiakki/my_nginx

