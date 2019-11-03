FROM hiakki/nginx_on_alpine
ADD VERSION .
MAINTAINER Akshay Gupta
LABEL maintainer="hy.akshay@gmail.com"

COPY ./conf/default.conf /etc/nginx/conf.d/default.conf
COPY ./wordpress /usr/app

RUN chmod 777 -R /usr/app

WORKDIR /usr/app
