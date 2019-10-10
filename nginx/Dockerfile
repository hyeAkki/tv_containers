FROM debian
ADD VERSION .
LABEL maintainer="hy.akshay@gmail.com"
RUN apt update -y && apt install nginx -y
COPY ./conf /etc/nginx/conf.d
COPY ./tv_data /usr/app
EXPOSE 80
