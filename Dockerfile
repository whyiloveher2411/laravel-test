FROM php:7.3-fpm-stretch

RUN docker-php-ext-install pdo pdo_mysql