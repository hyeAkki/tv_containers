FROM alpine
ADD VERSION .
MAINTAINER Akshay Gupta
LABEL maintainer="hy.akshay@gmail.com"

RUN apk update \
    && apk add nginx \
    && adduser -D -u 1000 -g 'www' www \
    && mkdir /usr/app \
    && chown -R www:www /var/lib/nginx \
    && chown -R www:www /usr/app

COPY ./start.sh /start.sh
COPY ./conf /etc/nginx/conf.d/
COPY ./tv_data /usr/app

RUN chmod +x /start.sh

EXPOSE 80

CMD ["/start.sh"]
