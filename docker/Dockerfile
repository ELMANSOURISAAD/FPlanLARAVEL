FROM php:8.1-cli-alpine

WORKDIR /var/www/app

ARG HOST_UID=1000

ENV TZ=UTC

# Default system packets
RUN apk add --no-cache --update --repository http://nl.alpinelinux.org/alpine/edge/testing/ $PHPIZE_DEPS \
    git \
    tzdata \
    gnupg \
    su-exec \
    supervisor \
    nodejs \
    npm \
    make \
    curl \
    zip \
    unzip \
    patch

# Php extensions manager
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN set -eux;
RUN chmod +x /usr/local/bin/install-php-extensions

# Install PHP extensions
RUN install-php-extensions \
    http \
    opcache \
    intl \
    gd \
    pdo_mysql \
    bcmath \
    zip \
    exif \
    @composer


# Composer configuration
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV COMPOSER_ALLOW_XDEBUG=0
ENV COMPOSER_DISABLE_XDEBUG_WARN=1

# Add UID and GID
RUN apk add shadow \
    && usermod -u $HOST_UID www-data

COPY start-container /usr/local/bin/start-container
COPY php.ini /usr/local/etc/php/conf.d/99-php.ini
COPY supervisord.conf /etc/supervisord.conf

# Permission
RUN chmod +x /usr/local/bin/start-container
RUN chown -R www-data:www-data /var/www
RUN chown -R www-data:www-data /tmp
RUN chown -R www-data:www-data /usr/local/bin/start-container


ENTRYPOINT ["start-container"]

