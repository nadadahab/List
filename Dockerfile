FROM php:7

RUN apt-get update && \
    apt-get install -y autoconf pkg-config libssl-dev git && \
    pecl install mongodb git zlib1g-dev && docker-php-ext-enable mongodb

RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR  /List
COPY . /List
RUN composer self-update
RUN composer install --no-scripts
CMD php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000
