FROM php:8.2-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git unzip curl libpq-dev nodejs npm

RUN docker-php-ext-install pdo pdo_pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy php-fpm config
COPY docker/php/www.conf /usr/local/etc/php-fpm.d/www.conf

COPY . .

RUN composer install