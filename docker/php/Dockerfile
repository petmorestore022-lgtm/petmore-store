FROM php:8.2-fpm

# Instalar Nginx e dependências do sistema
RUN apt-get update && apt-get install -y \
    nginx \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libicu-dev \
    libxml2-dev \
    libxslt1-dev \
    libzip-dev \
    libonig-dev \
    libsodium-dev \
    git \
    unzip \
    vim \
    wget \
    supervisor \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensões PHP necessárias para Magento 2.4.8
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    bcmath \
    gd \
    intl \
    pdo_mysql \
    soap \
    xsl \
    zip \
    sockets \
    sodium \
    opcache

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Configurações PHP otimizadas para Magento
RUN { \
    echo 'memory_limit = 4G'; \
    echo 'max_execution_time = 1800'; \
    echo 'zlib.output_compression = On'; \
    echo 'upload_max_filesize = 64M'; \
    echo 'post_max_size = 64M'; \
    echo 'max_input_vars = 10000'; \
    echo 'realpath_cache_size = 10M'; \
    echo 'realpath_cache_ttl = 7200'; \
    echo 'opcache.enable = 1'; \
    echo 'opcache.memory_consumption = 512'; \
    echo 'opcache.max_accelerated_files = 60000'; \
    echo 'opcache.consistency_checks = 0'; \
    echo 'opcache.validate_timestamps = 1'; \
    echo 'opcache.revalidate_freq = 2'; \
} > /usr/local/etc/php/conf.d/magento.ini

# Configuração do Nginx para Magento
COPY docker/nginx/nginx.conf /etc/nginx/sites-available/default

# Configuração do Supervisor
RUN { \
    echo '[supervisord]'; \
    echo 'nodaemon=true'; \
    echo ''; \
    echo '[program:php-fpm]'; \
    echo 'command=/usr/local/sbin/php-fpm -F'; \
    echo 'autostart=true'; \
    echo 'autorestart=true'; \
    echo 'stdout_logfile=/dev/stdout'; \
    echo 'stdout_logfile_maxbytes=0'; \
    echo 'stderr_logfile=/dev/stderr'; \
    echo 'stderr_logfile_maxbytes=0'; \
    echo ''; \
    echo '[program:nginx]'; \
    echo 'command=/usr/sbin/nginx -g "daemon off;"'; \
    echo 'autostart=true'; \
    echo 'autorestart=true'; \
    echo 'stdout_logfile=/dev/stdout'; \
    echo 'stdout_logfile_maxbytes=0'; \
    echo 'stderr_logfile=/dev/stderr'; \
    echo 'stderr_logfile_maxbytes=0'; \
} > /etc/supervisor/conf.d/supervisord.conf

WORKDIR /var/www/html

# Ajustar permissões
RUN chown -R www-data:www-data /var/www/html

RUN service nginx start

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
