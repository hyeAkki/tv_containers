FROM hiakki/nginx_on_alpine
ADD VERSION .
MAINTAINER Akshay Gupta
LABEL maintainer="hy.akshay@gmail.com"

COPY ./conf/default.conf /etc/nginx/conf.d/default.conf
COPY ./tv_data /usr/app
