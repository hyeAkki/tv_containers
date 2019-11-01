FROM hiakki/php-fpm_on_alpine
ADD VERSION .
MAINTAINER Akshay Gupta
LABEL maintainer="hy.akshay@gmail.com"

COPY ./tv_data /usr/app
COPY ./conf /etc/php7/php-fpm.d/
