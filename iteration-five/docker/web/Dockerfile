FROM php:7.3-apache

WORKDIR /var/www/html

COPY ./ /var/www/html/

COPY ./files/default.conf /etc/apache2/sites-enabled/000-default.conf

EXPOSE 80

RUN a2enmod -q rewrite

RUN docker-php-ext-install pdo_mysql \
    && docker-php-ext-install json

