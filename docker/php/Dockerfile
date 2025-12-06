FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    libxml2-dev libzip-dev libpng-dev libonig-dev libicu-dev \
    libxslt1-dev git unzip cron nano \
    && docker-php-ext-install intl pdo_mysql zip xsl soap bcmath

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
