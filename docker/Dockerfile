FROM php:8.1-fpm-alpine as base-system

RUN apk add --no-cache \
    bash \
    nginx \
    && docker-php-ext-install pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Nginx Settings
# ADD ./docker/nginx/conf.d/ /etc/nginx/conf.d/
ADD ./docker/nginx/nginx.conf /etc/nginx/nginx.conf

# PHP-FPM Settings
ADD ./docker/php-fpm/php-fpm.d/www-data.conf /usr/local/etc/php-fpm.d/www-data.conf
ADD ./docker/php-fpm/php.ini /usr/local/etc/php/php.ini

RUN touch /run/php-fpm.sock
RUN chown www-data:www-data /run/php-fpm.sock

WORKDIR /var/www/html

FROM base-system

# Composer Install
COPY composer.json composer.lock ./
RUN composer --no-autoloader --no-scripts install --verbose

COPY --chown=www-data:www-data . .

# Generate autoload
RUN composer dump-autoload

RUN cp .env.example .env

# start nginx server
COPY ./docker/entrypoint.sh /usr/local/bin/docker-php-entrypoint
RUN chmod +x /usr/local/bin/docker-php-entrypoint
