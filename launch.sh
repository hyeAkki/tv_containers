#!/bin/bash

loc=$(dirname "$0")
cd $PWD/$loc

rm_old_conts() {
	# Removing if any containers with given names are running
	docker rm -f $(docker ps | grep my-nginx | awk {'print $1'})
	docker rm -f $(docker ps | grep my-php | awk {'print $1'})
}

rm_old_imgs() {
	# Removing previous images
	docker rmi -f $(docker images | grep my_nginx | awk {'print $3'})
	docker rmi -f $(docker images | grep my_php | awk {'print $3'})
}

new_conts() {
	echo "Running and linking NGINX and PHP-FPM containers"
	# Running and linking NGINX and PHP-FPM containers
	docker run -d --name my-php \
		       -p 9000:9000 \
			hiakki/my_php
	docker run -d --name my-nginx \
        	      --link my-php:my-php \
	               -p 80:80 \
        	      --mount type=bind,source="$PWD"/nginx/logs,target=/var/log/nginx \
			hiakki/my_nginx
}

echo "Do you want to update images?(y/n)"
read choice

echo "Removing if any containers with given names are running"
rm_old_conts > /dev/null 2>&1

case $choice in
y)
echo "Removing previous images"
rm_old_imgs > /dev/null 2>&1
;;
*)
echo "Not updating docker images"
;;
esac

new_conts
