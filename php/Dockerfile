FROM debian
ADD VERSION .
MAINTAINER Akshay Gupta
LABEL maintainer="hy.akshay@gmail.com"

RUN apt-get update \
    && apt-get install -y php7.3 php7.3-cli php7.3-fpm php7.3-json php7.3-pdo php7.3-mysql php7.3-zip php7.3-gd  php7.3-mbstring php7.3-curl php7.3-xml php7.3-bcmath \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
#    && echo "daemon off;" >> /etc/nginx/nginx.conf

#COPY ./conf /etc/nginx/sites-available/
COPY ./tv_data /usr/app

EXPOSE 9000

CMD ["nginx"]
