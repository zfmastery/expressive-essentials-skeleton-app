FROM php:7.3-fpm

# Maintainer and license information
MAINTAINER Matthew Setter <matthew@matthewsetter.com>

# Expose the required ports for the application
EXPOSE 9000

# Create the required directory structure for the application
# and copy the code to it from the local working copy
RUN mkdir -p /var/www/html
COPY . /var/www/html
WORKDIR /var/www/html

# Install PHP's required dependencies
RUN docker-php-ext-install pdo_mysql \
    && docker-php-ext-install json

# Add binaries required for using Composer
RUN apt-get update \
    && apt-get --yes --force-yes install git \
    && apt-get --yes --force-yes install zip \
    && apt-get --yes --force-yes install unzip
