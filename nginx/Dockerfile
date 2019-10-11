FROM alpine

RUN apk update \
    && apk add openrc --no-cache \
#    && touch /run/openrc/softlevel \
    && mkdir /usr/app \
    && adduser -D -g 'www' www \
    && chown -R www:www /usr/app \
    && apk add nginx \
    && chown -R www:www /var/lib/nginx

COPY ./tv_data /usr/app
COPY ./conf /etc/nginx/conf.d

CMD nginx -g "daemon off;"
