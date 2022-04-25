FROM php:7.4-fpm

RUN curl --insecure https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www