#!/bin/bash
cids=$(docker ps | grep my_ | awk {'print $1'} | tr '\n' ,)

IFS=',' read -r -a cid <<< $cids

for b in 0 1
do
  echo ${cid[$b]}
  docker rm -f ${cid[$b]}
done

docker run --name my_php -d -p 9000:9000 hiakki/my_php
docker run --name my_nginx -d -p 80:80 hiakki/my_nginx

