FROM debian
ADD VERSION .
LABEL maintainer="hy.akshay@gmail.com"
RUN apt update -y && apt install php7.3 \
				 php7.3-cli \
				 php7.3-fpm \
				 php7.3-pdo \
				 php7.3-mysql \
				 php7.3-zip \
				 php7.3-gd  \
				 php7.3-mbstring \
				 php7.3-curl \
				 php7.3-xml \
				 php7.3-bcmath \
				 php7.3-json -y
COPY ./tv_data /usr/app
