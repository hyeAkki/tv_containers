FROM hiakki/my_nginx
ADD VERSION .
LABEL maintainer="hy.akshay@gmail.com"
COPY ./conf /etc/nginx/conf.d
COPY ./wordpress /usr/app
ADD ./logs /var/log/nginx
EXPOSE 80
