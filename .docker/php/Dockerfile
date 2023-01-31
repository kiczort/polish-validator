FROM php:cli-alpine as php-base

# Install composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /var/www/.composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apk add --update --no-cache --virtual .build-deps linux-headers $PHPIZE_DEPS && \
    pecl install xdebug && docker-php-ext-enable xdebug && \
    apk del .build-deps \
