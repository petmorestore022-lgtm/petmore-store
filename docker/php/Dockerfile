FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    libxslt1-dev libzip-dev libicu-dev libonig-dev \
    git unzip curl libgcrypt20-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    gd bcmath intl pdo_mysql soap sockets xsl zip opcache

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer config -g http-basic.repo.magento.com \
    "714fcbfbb1ba025b9b6eac3b9e430e12" \
    "da6248b3c9fbf325fb9d723e4534254f"

WORKDIR /var/www/html

