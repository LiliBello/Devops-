FROM composer:2.8 AS composer

FROM php:8.4-fpm-alpine3.22

RUN docker-php-ext-install pdo_mysql

COPY --from=composer /usr/bin/composer /usr/bin/composer
ENV COMPOSER_HOME=/tmp/composer

WORKDIR /var/www/html

COPY --chown=www-data:www-data . .