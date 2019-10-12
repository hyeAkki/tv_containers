FROM hiakki/nginx_on_alpine
ADD VERSION .
MAINTAINER Akshay Gupta
LABEL maintainer="hy.akshay@gmail.com"

RUN mkdir -p /usr/app \
    && chown -R www:www /var/lib/nginx \
    && chown -R www:www /usr/app

COPY ./conf/default.conf /etc/nginx/conf.d/default.conf
COPY ./tv_data /usr/app

EXPOSE 80
