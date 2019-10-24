FROM hiakki/django_on_alpine
ADD VERSION .
MAINTAINER Akshay Gupta
LABEL maintainer="hy.akshay@gmail.com"

COPY ./app /usr/app

WORKDIR /usr/app

CMD ["sh","-c","/start.sh"]
