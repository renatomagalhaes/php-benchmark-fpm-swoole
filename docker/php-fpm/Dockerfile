FROM php:8.3-fpm as dev

COPY ./docker/php-fpm/fpm.ini /usr/local/etc/php-fpm.d/zz-app.conf
COPY ./docker/php-fpm/php.ini /usr/local/etc/php/conf.d/prod.ini

RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN apt update && apt install -y libpq-dev && docker-php-ext-install pdo_mysql && docker-php-ext-enable pdo_mysql

WORKDIR /app

COPY ../../src /app
