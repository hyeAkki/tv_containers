FROM hiakki/my_php
ADD VERSION .
LABEL maintainer="hy.akshay@gmail.com"
COPY ./tv_data /usr/app
COPY ./conf/www.conf /etc/php/7.3/fpm/pool.d/www.conf
