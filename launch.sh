#!/bin/bash

# Removing if any containers with given names are running
docker rm -f $(docker ps | grep my_nginx | awk {'print $1'})
docker rm -f $(docker ps | grep my_php | awk {'print $1'})

# Removing previous images
docker rmi -f $(docker images | grep my_nginx | awk {'print $3'})
docker rmi -f $(docker images | grep my_php | awk {'print $3'})

# Running and linking NGINX and PHP-FPM containers
docker run -d --name my_php hiakki/my_php
docker run -d --name my_nginx --link my_php:my_php -p 80:80 hiakki/my_nginx -v ~/logs:/var/log/nginx
