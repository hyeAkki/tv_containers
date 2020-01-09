FROM php:7.4.1-fpm-alpine
ADD VERSION .
MAINTAINER Akshay Gupta
LABEL maintainer="hy.akshay@gmail.com"

ADD https://raw.githubusercontent.com/mlocati/docker-php-extension-installer/ma$
RUN chmod uga+x /usr/local/bin/install-php-extensions && sync
RUN install-php-extensions      gd \
                                mcrypt \
                                imagick \
                                mysqli

COPY ./start.sh /start.sh
COPY ./conf /etc/php7/php-fpm.d/
COPY ./app /usr/app

RUN addgroup -S chullu && adduser -S chullu -G chullu
RUN chown chullu:chullu -R /usr/app
RUN chmod 777 -R /usr/app

WORKDIR /usr/app

RUN chmod +x /start.sh

ENTRYPOINT ["sh","-c","/start.sh"]

