FROM php:7.3-fpm-alpine

MAINTAINER Matthew Setter <matthew@matthewsetter.com>

RUN docker-php-ext-install pdo_mysql

RUN apk add -U git unzip zip

RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY --chown=www-data:www-data . .

RUN su -s /bin/ash www-data -c "composer install"

