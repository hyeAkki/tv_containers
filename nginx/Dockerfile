FROM nginx
ADD VERSION .
MAINTAINER Akshay Gupta
LABEL maintainer="hy.akshay@gmail.com"

COPY ./conf /etc/nginx/sites-available/
COPY ./tv_data /usr/app

EXPOSE 80

CMD nginx -g "daemon off;"
