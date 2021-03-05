FROM php:7.3-apache
RUN docker-php-ext-install mysqli \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && apt-get update \
    && apt-get upgrade -y \
    && apt-get install -y git
