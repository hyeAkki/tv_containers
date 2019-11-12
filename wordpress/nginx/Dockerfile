FROM nginx:alpine
ADD VERSION .
MAINTAINER Akshay Gupta
LABEL maintainer="hy.akshay@gmail.com"

COPY ./run_nginx.sh /run_nginx.sh
COPY ./start.sh /start.sh
COPY ./conf/nginx.conf /etc/nginx/nginx.conf
COPY ./conf/default.conf /etc/nginx/conf.d/default.conf
COPY ./app /usr/app

RUN chmod +x /run_nginx.sh /start.sh
RUN addgroup -S chullu && adduser -S chullu -G chullu
RUN chown chullu:chullu -R /usr/app
RUN chmod 777 -R /usr/app

WORKDIR /usr/app

ENTRYPOINT ["sh","-c","/start.sh"]
