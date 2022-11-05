FROM composer AS build
RUN mkdir -p /var/www/laravel
COPY ./ /var/www/laravel
WORKDIR /var/www/laravel
ENV APP_DEBUG=false APP_ENV=production
RUN \
rm -rf docker && \
composer install --optimize-autoloader --no-dev && \
php artisan config:cache && \
php artisan route:cache && \
php artisan view:cache

FROM topthammanun/php
RUN \
mkdir -p /var/www/laravel && \
chown www-data:www-data /var/www/laravel
COPY docker/php/root /
COPY --from=build --chown=www-data:www-data /var/www/laravel \
/var/www/laravel/