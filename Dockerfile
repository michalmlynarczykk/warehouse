FROM php:8.1-fpm
WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip pdo_mysql \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . .
RUN composer update && \
    composer install && \
    composer require doctrine/dbal && \
    chmod +x /var/www/html/run.sh

ENTRYPOINT ["/var/www/html/run.sh"]
