FROM hiakki/nginx_on_alpine
ADD VERSION .
MAINTAINER Akshay Gupta
LABEL maintainer="hy.akshay@gmail.com"

COPY ./conf/nginx.conf /etc/nginx/nginx.conf
COPY ./conf/default.conf /etc/nginx/conf.d/default.conf
COPY ./app /usr/app

RUN chmod -R 755 /usr/app
RUN chmod -R 644 /usr/app/.htaccess
RUN chmod -R 644 /usr/app/wp-admin/index.php
RUN chmod -R 640 /usr/app/wp-config.php

WORKDIR /usr/app
