FROM php:8.3-fpm

# Install system dependencies and PHP extensions required by Laravel
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git \
        unzip \
        libzip-dev \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        bcmath \
        exif \
        zip \
        opcache \
    && rm -rf /var/lib/apt/lists/*

# Copy in local PHP config
COPY local.ini /usr/local/etc/php/conf.d/local.ini

WORKDIR /var/www/html

