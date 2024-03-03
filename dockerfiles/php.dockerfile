FROM php:8.2.0-fpm-alpine

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql

#if you don't have a command in the end, the container will run the default command of the image