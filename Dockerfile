FROM php:7.2-fpm-alpine

# @doc: https://github.com/docker-library/docs/tree/master/php#other-extensions
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer && \
install-php-extensions pdo_mysql pdo_pgsql opcache imagick