FROM php:8.3-cli as base
RUN apt update && apt install -y libpq-dev libbrotli-dev && docker-php-ext-install pdo_mysql && docker-php-ext-enable pdo_mysql
RUN pecl install swoole && docker-php-ext-enable swoole
WORKDIR /app
CMD ["php", "public/index-swoole.php"]

FROM base as dev
RUN pecl install xdebug && docker-php-ext-enable xdebug
