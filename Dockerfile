# Instructions from this Dockerfile will be executed on "app" container build.
FROM php:7.2-fpm-alpine

# @doc: https://github.com/mlocati/docker-php-extension-installer - discover a list of supported extensions there.
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

# Example RUN directive.
# We need to install fresh composer. Also change default repositories to yandex mirror to speed up build.
# Some symfony bundles relying on original "grep" implementation, so install it to avoid exceptions
# during composer install.
# Default symfony project needs at least pdo_mysql and opcache modules. Many projects needs zip and gd or imagick
# extensions as well.
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer && \
echo "https://mirror.yandex.ru/mirrors/alpine/latest-stable/main" | tee /etc/apk/repositories && \
echo "https://mirror.yandex.ru/mirrors/alpine/latest-stable/community" | tee -a /etc/apk/repositories && \
apk update && \
apk add grep && \
install-php-extensions pdo_mysql opcache zip gd