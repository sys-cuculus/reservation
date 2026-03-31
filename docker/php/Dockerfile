FROM php:8.2-fpm

# 必要パッケージ
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev libonig-dev \
    && docker-php-ext-install pdo_mysql mbstring zip

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www