FROM  php:8.3.21-apache




RUN apt-get update && apt-upgrade -y 
RUN docker-php-ext install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli pdo pdo_mysql

EXPOSE 80

