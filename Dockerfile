FROM php:8.4.1-fpm

# Gerekli PHP uzantılarını kurun
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# PHP konfigürasyonlarını ekleyin
COPY ./docker/php/php.ini /usr/local/etc/php/

# Çalışma dizinini ayarlayın
WORKDIR /var/www/html
