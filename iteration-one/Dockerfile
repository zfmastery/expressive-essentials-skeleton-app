FROM php:7.3-fpm

MAINTAINER Matthew Setter <matthew@matthewsetter.com>

RUN docker-php-ext-install pdo_mysql

RUN apt-get update \
    && apt-get --yes --force-yes install \
        git \
        sudo \
        unzip \
        zip

RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY --chown=www-data:www-data . .

RUN su -s /bin/bash www-data -c "composer install"
