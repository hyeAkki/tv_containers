FROM hiakki/php-fpm_on_alpine
ADD VERSION .
MAINTAINER Akshay Gupta
LABEL maintainer="hy.akshay@gmail.com"

RUN chown -R www:www /var/lib/nginx \
    && chown -R www:www /usr/app

COPY ./tv_data /usr/app
COPY ./conf /etc/php7/php-fpm.d/

EXPOSE 9000
