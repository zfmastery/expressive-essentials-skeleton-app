FROM php:7.3.7-fpm-alpine

MAINTAINER Matthew Setter <matthew@matthewsetter.com>

RUN apk add -U git libzip-dev unzip zip zlib-dev autoconf gcc g++ make

RUN docker-php-ext-install pdo_mysql zip

RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/local/bin --filename=composer

RUN yes | pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /usr/local/etc/php

COPY docker/php/php.ini .

WORKDIR /var/www/html

COPY --chown=www-data:www-data . .

RUN su -s /bin/ash www-data -c "composer install"
