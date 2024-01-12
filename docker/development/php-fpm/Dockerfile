ARG PHP_VERSION

FROM php:${PHP_VERSION}-fpm-alpine

ARG XDEBUG_VERSION

RUN apk add --no-cache linux-headers postgresql-dev git pcre-dev ${PHPIZE_DEPS} \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && git clone --branch ${XDEBUG_VERSION} --depth 1 https://github.com/xdebug/xdebug.git /usr/src/php/ext/xdebug \
    && docker-php-ext-configure xdebug --enable-xdebug-dev \
    && docker-php-ext-install pdo_pgsql xdebug intl \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apk del git

COPY ./common/php/conf.d /usr/local/etc/php/conf.d

WORKDIR /application
