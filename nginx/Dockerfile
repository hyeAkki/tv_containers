<<<<<<< HEAD
FROM alpine
=======
FROM debian
>>>>>>> f8dc333d15c4d0a0217ed4a1f56ef15b69995063
ADD VERSION .
MAINTAINER Akshay Gupta
LABEL maintainer="hy.akshay@gmail.com"
<<<<<<< HEAD

RUN apk update \
    && apk add nginx \
    && adduser -D -u 1000 -g 'www' www \
    && mkdir /usr/app \
    && chown -R www:www /var/lib/nginx \
    && chown -R www:www /usr/app

COPY ./start.sh /start.sh
COPY ./conf /etc/nginx/conf.d/
=======
RUN apt update -y && apt install nginx -y
COPY ./conf /etc/nginx/conf.d
>>>>>>> f8dc333d15c4d0a0217ed4a1f56ef15b69995063
COPY ./tv_data /usr/app
COPY ./run_nginx.sh /run_nginx.sh

RUN chmod +x /run_nginx.sh /start.sh

EXPOSE 80

CMD ["/start.sh"]
ENTRYPOINT ["tail", "-f", "/dev/null"]
