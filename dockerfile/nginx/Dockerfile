FROM hiakki/my_nginx
ADD VERSION .
COPY ./conf/nginx /etc/nginx/conf.d
COPY ./wordpress /usr/app
ADD ./logs/nginx /var/log/nginx
EXPOSE 80
