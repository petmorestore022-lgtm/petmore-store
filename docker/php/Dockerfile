FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    libxml2-dev libzip-dev libpng-dev libonig-dev libicu-dev \
    libxslt1-dev git unzip cron nano \
    && docker-php-ext-install intl pdo_mysql zip xsl soap bcmath sockets

RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    && docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
    && docker-php-ext-install gd

RUN docker-php-ext-install ftp

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
